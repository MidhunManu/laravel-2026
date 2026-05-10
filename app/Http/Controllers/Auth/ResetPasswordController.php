<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        return view('tenants.reset_password');
    }
}
