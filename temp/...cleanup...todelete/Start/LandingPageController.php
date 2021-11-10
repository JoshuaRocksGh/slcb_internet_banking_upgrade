<?php

namespace App\Http\Controllers\Start;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('pages.landingPage.index');
    }
}
