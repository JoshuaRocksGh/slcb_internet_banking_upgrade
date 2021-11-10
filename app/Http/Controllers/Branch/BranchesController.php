<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    //
    public function branches()
    {
        return view('pages.branches.branches');
    }
}
