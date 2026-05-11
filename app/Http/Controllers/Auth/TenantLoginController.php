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
        if (Auth::check()) {
            return redirect()->to('/dashboard');
        }
        return view('tenants.login');
    }

    public function login(TenantLoginRequest $request)
    {
        $credentials = $request->validated();
        Log::debug('tenant.login', [$credentials]);

        if (! Auth::attempt($credentials, true)) {
            return back()->withErrors([
                'email' => 'invalid credentials',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();
        return redirect()->to('/dashboard');
    }
}
