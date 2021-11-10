<?php

namespace App\Http\Controllers\Settings;

use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChangePinController extends Controller
{
    //controller for change pin
    public function change_pin(Request $request){
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $new_pin = $request->new_pin;
        $old_pin = $request->old_pin;
        $security_answer = $request->security_answer;

        $mac = exec('getmac');
        $macaddress = strtok($mac, '');

        $data = [

                "authToken"=> $authToken,
                "deviceId"=> $macaddress,
                "newPin"=> $new_pin,
                "oldPin"=> $old_pin,
                "securityAnswer"=> $security_answer

        ];
        // return $data;

        $response = Http::post(env('API_BASE_URL')."/user/changePin", $data);

        $result = new ApiBaseResponse();

        return $result->api_response($response);
        }
}
