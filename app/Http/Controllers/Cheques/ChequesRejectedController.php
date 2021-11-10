<?php

namespace App\Http\Controllers\Cheques;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChequesRejectedController extends Controller
{
    //method to return the rejected cheques screen
    public function cheques_rejected(){
        return view('pages.cheques.rejected_cheques');
    }
}
