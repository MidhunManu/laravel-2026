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
        $userId = $data['user_id'];
        $cachedOtp = Cache::get("forgot_password_otp_:{$userId}");

        if ($cachedOtp !== $data['otp']) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP']);
        }

        $user = User::find($user_id);
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->to('/dashboard');
    }

    public function show()
    {
        Log::debug("verify otp");
        return view('tenants.verify_otp');
    }
}
