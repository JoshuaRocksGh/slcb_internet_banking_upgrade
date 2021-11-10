<?php

namespace App\Http\Controllers\Corporate\Approvals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RejectedController extends Controller
{
    //this is for show the approvals approved screen
    public function approvals_rejected()
    {
        return view('pages.corporate.approvals.rejected');
    }
}
