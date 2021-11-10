<?php

namespace App\Http\Controllers\Cheques;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\classes\WEB\UserAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ChequeBookRequestController extends Controller
{
    //

    public function cheque_book_request(Request $request){

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $base_response = new BaseResponse();

        $accountNumber = $request->accountNumber;
        $branch = $request->branchCode;
        $leaflet = $request->leaflet;
        $pin = $request->pinCode;

        $data = [
                "accountNumber"=> $accountNumber,
                "branch" => $branch,
                "deviceIP" => "A",
                "numberOfLeaves" => $leaflet,
                "pinCode" =>$pin,
                "tokenID" => $authToken

        ];

        $response = Http::get(env('API_BASE_URL') ."/request/chequeBook", $data);

        //return $response;
        // return $response->status();


        $result = new ApiBaseResponse();
        return $result->api_response($response);

    }


}
