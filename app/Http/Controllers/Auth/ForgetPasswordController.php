<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Models\User;
use App\Notifications\ForgotPasswordNotification;
use Illuminate\Support\Facades\Cache;

class ForgetPasswordController extends Controller
{
    public function show()
    {
        return view('tenants.forgot_password');
    }
    public function store(ForgotPasswordRequest $request)
    {
        $email = $request->validated()['email'];
        $user = User::where('email', $email)->first();
        if (! $user) {
            return back()->withErrors([
                'email' => 'Invalid email'
            ]);
        }

        $otp = random_int(100000, 999999);
        Cache::put("forgot_password_otp_:{$email}", $otp, now()->addMinutes(10));
        $user->notify(
            new ForgotPasswordNotification($otp)
        );

        return redirect()->route('tenant.otp-verify', ['email' => $email]);
    }
}
