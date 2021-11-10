<?php

namespace App\Http\Controllers\Loan;

use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoanProductsController extends Controller
{
    //public function beneficiary_payment_from_account()
    public function loan_products()
        {

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');



        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];


        $response = Http::get(env('API_BASE_URL') . "/loans/loanProducts", $data);

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
}
