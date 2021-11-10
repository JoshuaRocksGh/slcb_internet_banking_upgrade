<?php

namespace App\Http\Controllers\AccountServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class accountCreationController extends Controller
{
    //method to return account creation screen
    public function account_creation()
    {
        return view('pages.accountCreation.account_creation');
    }

    //method to return savings account screen
    public function savings_account_creation()
    {
        return view('pages.accountCreation.savings_account_creation');
    }

}
