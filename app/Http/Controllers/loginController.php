<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    //
    public function login()
    {
        // return "Welcome";
        return view('login');
    }

    public function reset_password()
    {
        // return "reset password";
        return view('reset_password');
    }

    public function forget_password()
    {
        // return "forget password";
        return view('forget_password');
    }
}
