<?php

namespace App\Http\Controllers\Corporate\Approvals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApprovedController extends Controller
{
    //this is for show the approvals approved screen
    public function approvals_approved()
    {
        return view('pages.corporate.approvals.approved');
    }
}
