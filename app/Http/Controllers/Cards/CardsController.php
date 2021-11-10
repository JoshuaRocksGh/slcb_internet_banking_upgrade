<?php

namespace App\Http\Controllers\Cards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    //method to return the block debit screen
    public function block_debit_card(){
        return view('pages.cards.block_debit_card');
    }

    //method to return the replace card screen
    public function replace_card(){
        return view('pages.cards.replace_card');
    }

    //method to return the activate card screen
    public function activate_card(){
        return view('pages.cards.activate_card');
    }
}
