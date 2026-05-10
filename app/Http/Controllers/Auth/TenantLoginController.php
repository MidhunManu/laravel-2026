<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\TenantLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TenantLoginController extends Controller
{
    public function loginView()
    {
        return view('tenants.login');
    }

    public function login(TenantLoginRequest $request)
    {
        $data = $request->validated();
        Log::debug('tenant.login', [$data]);

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            abort(404, 'user not found');
        }

        if (Hash::check($data['password'], $user['password'])) {
            Auth::login($user, true);
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
    }
}
