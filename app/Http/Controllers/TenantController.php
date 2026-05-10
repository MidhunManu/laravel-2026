<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\TenantCreateRequest;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TenantController extends Controller
{
    public function create()
    {
        return view('tenants.create_tenant');
    }

    public function store(TenantCreateRequest $request)
    {
        $data = $request->validated();
        Log::debug('request', $data);

        $tenant = Tenant::create([
            'trial_ends_at' => Carbon::now()->addMonth(),
            'plan'          => $data['plan'],
        ]);
        $tenant->domains()->create([
            'domain' => $data['sub_domain'] . 'localhost',
        ]);

        tenancy()->initialize($tenant);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => UserRole::ADMIN->value,
        ]);
        tenancy()->end();

        return response()->json([
            'tenant' => $tenant
        ]);
    }
}
