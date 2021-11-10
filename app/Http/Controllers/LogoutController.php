<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('login');
    }
}
