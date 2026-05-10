<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\TenantLoginController;
use App\Http\Controllers\OtpVerificationController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/tenant/login', [TenantLoginController::class, 'loginView'])
        ->name('login');

    Route::post('/tenant/login', [TenantLoginController::class, 'login'])
        ->name('tenant.login');

    Route::post('/tenant/forgot_password', [ForgetPasswordController::class, 'store'])
        ->name('tenant.forgot_password');

    Route::get('/tenant/forgot_password', [ForgetPasswordController::class, 'show'])
        ->name('forgot_password');
    
    Route::get('/tenant/otp-verify', [OtpVerificationController::class, 'show'])
        ->name('tenant.otp-verify');

    Route::post('/tenant/otp-verify', [OtpVerificationController::class, 'store'])
        ->name('tenant.otp-verify');
    
    Route::middleware('auth')->group(function() {
        Route::get('/dashboard', function () {
            return "dashboard";
        });
    });
});
