<?php

namespace App\Http\Controllers\FixedDeposit;

use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FixedDepositAccountController extends Controller
{
    //

    function fixed_deposit_account ()
    {
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $customerNumber = session()->get('customerNumber');


        // return $customerNumber;

        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];


        $response = Http::get(env('API_BASE_URL') ."account/accountFD/$customerNumber");

        $result = new ApiBaseResponse();
        return $result->api_response($response);

    }

}
