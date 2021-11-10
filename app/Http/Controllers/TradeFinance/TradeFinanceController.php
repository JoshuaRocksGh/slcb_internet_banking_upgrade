<?php

namespace App\Http\Controllers\TradeFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TradeFinanceController extends Controller
{
    //method to return lc origination screen
    public function lc_origination(){
        return view('pages.tradeFinance.lc_origination');
    }
}
