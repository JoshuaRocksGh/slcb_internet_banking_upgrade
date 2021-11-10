<?php

namespace App\Http\Controllers\Cheques;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChequesApprovedController extends Controller
{
    //method to return the approved cheques screen
    public function cheques_approved(){
        return view('pages.cheques.approved_cheques');
    }
}
