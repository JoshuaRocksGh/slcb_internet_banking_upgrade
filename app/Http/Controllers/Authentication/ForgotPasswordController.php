<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    //method to show email field page for password reset link
    public function email_reset_password(){
        return view('pages.authentication.email_reset_password');
    }
}
