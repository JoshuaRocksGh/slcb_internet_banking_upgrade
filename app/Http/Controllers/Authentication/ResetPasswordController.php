<?php

namespace App\Http\Controllers\Authentication;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\UserAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{

    //method to show the change password page
    public function change_password()
    {
        return view('pages.authentication.change_password');
    }

    //method to show reset success page
    public function reset_success()
    {
        return view('pages.authentication.reset_success');
    }

    public function post_change_password(Request $request)
    {

        // return $request;

        $validator = Validator::make($request->all(), [
            "security_question" => 'required',
            "security_answer" => 'required',
            "new_password" => 'required',
            // "new_pin" => 'required',
        ]);

        $base_response = new BaseResponse();
        // VALIDATION
        if ($validator->fails()) {
            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        $security_question = $request->security_question;
        $security_answer = $request->security_answer;
        $new_password = $request->new_password;
        $new_pin = $request->new_pin;

        $user = (object) UserAuth::getDetails();
        //return $user;

        $authToken = $user->userToken;
        $userID = $user->userId;


        $data = [

            "authToken" => $authToken,
            "deviceBrand" => "string",
            "deviceCountry" => "string",
            "deviceId" => "A",
            "deviceIp" => "A",
            "deviceModel" => "string",
            "password" => $new_password,
            "securityAnswer" => $security_answer,
            "securityQuestion" => $security_question,
            "userId" => $userID

        ];


        // return $data;



        $response = Http::post(env('API_BASE_URL') . "/user/initialPasswordSetup", $data);

        //return $response;
        // return $response->status();


        if ($response->ok()) {    // API response status code is 200

            $result = json_decode($response->body());
            // return $result->responseCode;


            if ($result->responseCode == '000') {

                return $base_response->api_response($result->responseCode, $result->message,  $result->data); // return API BASERESPONSE

            } else {   // API responseCode is not 000

                return $base_response->api_response($result->responseCode, $result->message,  $result->data); // return API BASERESPONSE

            }
        } else { // API response status code not 200

            return $response->body();
            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'code' => $response->status(),
                'message' => $response->body()
            ]);

            return $base_response->api_response('500', 'API SERVER ERROR',  NULL); // return API BASERESPONSE

        }
    }
}
