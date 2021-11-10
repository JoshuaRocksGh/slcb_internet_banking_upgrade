<?php

namespace App\Http\Controllers\Cheques;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChequesPendingController extends Controller
{
    //method to return cheques pending approval
    public function pending_cheques(){
        return view('pages.cheques.pending_cheques');
    }
}
