<?php

namespace App\Http\Controllers;

use App\Http\classes\API\BaseResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KobbyController extends Controller
{
    public function call_external_api()
    {
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $base_response = new BaseResponse();

        $data = [
            // "authToken" => $authToken,
            // "userId"    => $userID

                "accountNumber" =>  "string",
                "branch" =>  "string",
                "deviceIP" =>  "string",
                "numberOfLeaves" =>  0,
                "pinCode" =>  "string",
                "tokenID" =>  "string"

        ];

        $response = Http::post(env('API_BASE_URL') ."request/chequeBook", $data);

        // return $result->api_response($response);

    }
}
