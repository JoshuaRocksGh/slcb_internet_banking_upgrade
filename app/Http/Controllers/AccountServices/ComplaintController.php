<?php

namespace App\Http\Controllers\AccountServices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function make_complaint_api (Request $request){

        //collect data from ui through link using this methods
        $accountNumber = $request->account_no;
        $serviceType = $request->service_type;
        $description = $request->description;
        $request_type = 'comp';

        $data =[
            "accountNumber" => $accountNumber,
            "serviceType"=> $serviceType,
            "description" => $description,
            "request_type" => $request_type
        ];

        return $data;

        // message: "Success"
        // responseCode: "000"
        // $reponse = [
        //     "response" =>
        // ]




    }

    public function api_response($response_code = '500', $message = '', $data = NULL)
        {
        return response()->json([
            'responseCode' => $response_code,
            'message' => $message,
            'data' => $data
        ], 200);
        }
}
