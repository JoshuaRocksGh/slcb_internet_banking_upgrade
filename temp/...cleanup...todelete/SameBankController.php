<?php

namespace App\Http\Controllers\API\Transfer;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\classes\WEB\UserAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class SameBankController extends Controller
{
    //
    public function beneficiary_payment_from_account()
    {

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');


        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];

        $response = Http::post(env('API_BASE_URL') . "/account/getAccounts", $data);

        //return $response->body();

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function beneficiary_payment_to_account()
    {

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];



        $response = Http::get("http://localhost/IIE/same-bank-beneficiary.php", $data);

        //return $response;
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function transfer_to_beneficiary(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'from_account' => 'required',
            'to_account' => 'required',
            'transfer_amount' => 'required',
            'category' => 'required',
            //'select_frequency' => 'required' ,
            'purpose' => 'required',
            'alias_name' => 'required',
            'type' => 'required'
        ]);


        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };
        // return $req;





        $user_pin = $req->secPin;

        // return $user_pin;
        // if ($user_pin != '123456') {

        //     return $base_response->api_response('098', 'Incorrect Pin',  null); // return API BASERESPONSE

        // }

        $user = (object) UserAuth::getDetails();
        //return $user;

        $authToken = $user->userToken;
        $userID = $user->userId;



        $data = [

            "amount" => (float) $req->transfer_amount,
            "authToken" => $authToken,
            "creditAccount" => $req->to_account,
            "debitAccount" => $req->from_account,
            "deviceIp" => "string",
            "entrySource" => "string",
            "narration" => $req->purpose,
            //security pin
            "secPin" => $user_pin,
            "userName" => "string",
            "category" => $req->category,
            "posted_by" => $userID

        ];

        if ($req->type == 'onetime') {
            $data['alias_name'] = $req->alias_name;
        }


        if (isset($req->select_frequency)) {
            $frequency = explode('~', $req->select_frequency);
            // return $frequency;
            $selected_frequency_code = $frequency[0];
            $data['schedulePaymentDate'] = $req->schedule_payment_date;
            $data['selectFrequency'] = $selected_frequency_code;
        }

        //return $data ;
        // if($schedule_paymen == "Y")
        // {
        //     $data['schedule_date'] = '03-23-20021';
        // }


        // $from_account = $req->from_account;


        try {

            $response = Http::post(env('API_BASE_URL') . "transfers/sameBank", $data);

            // return $response;

            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {

            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'message' => (string) $e->getMessage()
            ]);

            return $base_response->api_response('500', $e->getMessage(),  NULL); // return API BASERESPONSE


        }
    }



    public function one_time_beneficiary(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'from_account' => 'required',
            'alias_name' => 'required',
            'beneficiary_account_number' => 'required',
            'beneficiary_account_currency' => 'required',
            'beneficiary_email' => 'required',
            'amount' => 'required',
            'category' => 'required',
            'purpose' => 'required',
            //'select_frequency' => 'required' ,
            //'naration' => 'required' ,

        ]);



        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        //return $req;

        $user_pin = $req->secPin;

        // return $user_pin;
        // if ($user_pin != '123456') {

        //     return $base_response->api_response('098', 'Incorrect Pin',  null); // return API BASERESPONSE

        // }

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $data = [

            "amount" => (float) $req->amount,
            "authToken" => $authToken,
            "creditAccount" => $req->beneficiary_account_number,
            "debitAccount" => $req->from_account,
            "deviceIp" => "string",
            "entrySource" => "string",
            "narration" => $req->purpose,
            //security pin
            "secPin" => $user_pin,
            "userName" => "string",
            "category" => $req->category,
            "aliasName" => $req->alias_name,
            'beneficiaryCurrency' => $req->beneficiary_account_currency,
            'beneficiaryEmail' => $req->beneficiary_email,
        ];


        if (isset($req->select_frequency)) {
            $frequency = explode('~', $req->select_frequency);
            // return $frequency;
            $selected_frequency_code = $frequency[0];
            $data['schedulePaymentDate'] = $req->schedule_payment_date;
            $data['selectFrequency'] = $selected_frequency_code;
        }

        //return $data ;
        // if($schedule_paymen == "Y")
        // {
        //     $data['schedule_date'] = '03-23-20021';
        // }


        // $from_account = $req->from_account;


        try {

            $response = Http::post(env('API_BASE_URL') . "transfers/sameBank", $data);

            // return $response;
            // return json_decode($response->body();

            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {

            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'message' => (string) $e->getMessage()
            ]);

            return $base_response->api_response('500', $e->getMessage(),  NULL); // return API BASERESPONSE


        }
    }
}
