<?php

namespace App\Http\Controllers;

use App\Http\Requests\OtpVerificationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class OtpVerificationController extends Controller
{
    public function store(OtpVerificationRequest $request)
    {
        $data = $request->validated();
        $email = $request->email;
        $cachedOtp = Cache::get("forgot_password_otp_:{$email}");

        if ($cachedOtp !== $data['otp']) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP']);
        }

        $user = User::where('email', $email)->first();
        Auth::login($user);
        $request->session()->regenerate();
        Log::info('otp verified successfully log');

        return redirect()->to('/dashboard');
    }

    public function show()
    {
        Log::debug("verify otp view");
        return view('tenants.verify_otp', [
            'email' => request('email')
        ]);
    }
}
