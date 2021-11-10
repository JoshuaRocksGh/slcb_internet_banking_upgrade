<?php

namespace App\Http\Controllers\Payments\Beneficiary;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class MobileMoneyController extends Controller
{
    //
    public function mobile_money(Request $request)
    {
        $validator = Validator::make($request->all(),  [

            'accountNumber' => 'required',
            // 'currency' => 'required',
            'amount' => 'required',
            'naration' => 'required',
            'payeeName' => 'required',
            'payeeNumber' => 'required',
            'paymentCode' => 'required',
            'paymentType' => 'required',
            'pinCode' => 'required'
        ]);

        // return $request;


        $base_response = new BaseResponse();


        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        // return $request;


        $user_pin = $request->user_pin;

        // return $user_pin;

        // if ($user_pin != '123456') {

        //     return $base_response->api_response('098', 'Incorrect Pin',  null); // return API BASERESPONSE

        // }

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $customerName = session()->get('userAlias');
        $customerNumber = session()->get('customerNumber');

        $data = [

            'accountNumber' => $request->accountNumber,
            'amount' => $request->amount,
            'userID' => $userID,
            'customerName' => $customerName,
            'customerNumber' => $customerNumber,
            'payeeName' => $request->payeeName,
            'payeeNumber' => $request->payeeNumber,
            'paymentCode' => $request->paymentCode,
            'naration' => $request->naration,
            'paymentType' => $request->paymentType,
            'pinCode' => $request->pinCode,

        ];

        return $data;

        // $response = [
        //     'responseCode' => "000",
        //     'message' => "Mobile Money transfer Successful"
        // ];

        // return $response;

        try {
            $response = Http::post(env('API_BASE_URL') . "payment/makePayment", $data);

            // return json_decode($response->body());

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
