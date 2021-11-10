<?php

namespace App\Http\Controllers\AccountServices\KYC;

use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KycController extends Controller
{
    //

    public function kyc_update()
    {


        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $customerNumber = session()->get('customerNumber');

        // return $customerNumber ;


        $data = [
            "authToken" => $authToken,
            "userId"    => $userID ,
            "customerNumber"    => $customerNumber ,
        ];

        $response = Http::get(env('API_BASE_URL') . "user/kycInfo/056173");

        //return $response->body();

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
}
