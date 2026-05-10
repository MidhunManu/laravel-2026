<?php

use App\Http\Controllers\Auth\TenantLoginController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::get('/tenant/register', [TenantController::class, 'create'])
    ->name('tenant.create');

Route::post('/tenant/new', [TenantController::class, 'store'])
    ->name('tenant.store');
    