<?php

namespace App\Http\Controllers\Budgeting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpendingStaticsController extends Controller
{
    //method to return spending statics screen
    public function spending_statics(){
        return view('pages.budgeting.spending_statics');
    }
}
