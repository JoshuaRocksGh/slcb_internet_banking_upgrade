<?php

namespace App\Http\Controllers\Payments;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class CardlessController extends Controller
{

    public function initiate_cardless(Request $request)
    {


        $validator = Validator::make($request->all(), [

            'amount' => 'required',
            'debit_account' => 'required',
            'pin_code' => 'required',
            'receiver_address' => 'required',
            'receiver_name' => 'required',
            'receiver_phone' => 'required',
            'sender_name' => 'required'
        ]);

        // return $request;

        $base_response = new BaseResponse();

        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };
        // return $req;

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $api_headers = session()->get('headers');
        $sender_name = session()->get('userAlias');
        // return $api_headers;


        $amount = $request->amount;
        $debitAccount = $request->debit_account;
        $pinCode = $request->pin_code;
        $receiverAddress = $request->receiver_address;
        $receiverName = $request->receiver_name;
        $receiverPhone = $request->receiver_phone;
        // $senderName = $request->sender_name;
        // $deviceIP = $_SERVER['REMOTE_ADDR'];
        $fee = $request->fee;


        // return $deviceIP ;
        $user_ip_address =$request->ip();

        // return $user_ip_address ;

        $data = [
                // "amount"=>$amount,
                // "debitAccount"=>"004001100241700194",
                // "deviceIP"=> "A",
                // "fee"=> "",
                // "pinCode"=> "1234",
                // "receiverAddress"=> "P.0 BOX 259 AD",
                // "receiverName"=> "Josh",
                // "receiverPhone"=> "0549380507",
                // "senderName"=>"ATO",
                // "tokenID"=>"CA00BAB3-CCCD-4025-BEAC-8CE5853938A1"
                "amount"=> $amount,
                "debitAccount"=> $debitAccount,
                "deviceIP"=> $user_ip_address,
                "fee"=> '0',
                "pinCode"=> $pinCode,
                "receiverAddress"=> $receiverAddress,
                "receiverName"=> $receiverName,
                "receiverPhone"=> $receiverPhone,
                "senderName"=> $sender_name,
                "tokenID"=> $authToken

            ];

            // return $data;





        try {


            // $response = Http::post(env('API_BASE_URL') . "payment/cardless", $data)->headers({
            //     ''
            // });


            // return $data;
            $response = Http::withHeaders($api_headers)->post(env('API_BASE_URL') . "payment/cardless", $data);


            // return $response;

            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {

            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'message' => (string) $e->getMessage()
            ]);

            return $base_response->api_response('500', "Internal Server Error",  NULL); // return API BASERESPONSE


        }
    }

    public function send_unredeemed_request(Request $request){
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $api_headers = session()->get("headers");
        // return $authToken;

        // $base_response = new BaseResponse();



        $accountNumber = $request->accountNo;
        // $accountNumber = "004001100241700194";
        // $accountNumber = "004001160169700292";
        // $data = [

        //     "accountNumber" => $accountNumber

        // ];
        // return $accountNumber;


        $response = Http::withHeaders($api_headers)->get(env('API_BASE_URL') . "payment/unredeemedCardless/$accountNumber");
        // return $response;

        //for debugging purposes
        // return $data;
        // $response = Http::get(env('API_BASE_URL') . "payment/unredeemedCardless/$accountNumber");
        // return $response;die();
        $result = new ApiBaseResponse();

        return $result->api_response($response);
    }

    //method to show redeemed cardless transactions...
    public function send_redeemed_request(Request $request){
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $api_headers = session()->get("headers");
        // return $authToken;

        // $base_response = new BaseResponse();



        $accountNumber = $request->accountNo;
        // $accountNumber = "004001100241700194";
        // $accountNumber = "004001160169700292";
        // $data = [

        //     "accountNumber" => $accountNumber

        // ];
        // return $accountNumber;


        $response = Http::withHeaders($api_headers)->get(env('API_BASE_URL') . "payment/redeemedCardless/$accountNumber");
        // return $response;

        //for debugging purposes
        // return $data;
        // $response = Http::get(env('API_BASE_URL') . "payment/unredeemedCardless/$accountNumber");
        // return $response;die();
        $result = new ApiBaseResponse();

        return $result->api_response($response);
    }

    //method to send reversed cardless request for list of reversed cardless transactions.
    public function send_reversed_request(Request $request){
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $api_headers = session()->get("headers");
        // return $authToken;

        // $base_response = new BaseResponse();



        $accountNumber = $request->accountNo;
        // $accountNumber = "004001100241700194";
        // $accountNumber = "004001160169700292";
        // $data = [

        //     "accountNumber" => $accountNumber

        // ];
        // return $accountNumber;


        $response = Http::withHeaders($api_headers)->get(env('API_BASE_URL') . "payment/reversedCardless/$accountNumber");
        // return $response;

        //for debugging purposes
        // return $data;
        // $response = Http::get(env('API_BASE_URL') . "payment/unredeemedCardless/$accountNumber");
        // return $response;die();
        $result = new ApiBaseResponse();

        return $result->api_response($response);
    }

    public function cardless_otp(Request $request)
    {


        // $validator = Validator::make($request->all(), [


        //     'remittance_no' => 'required',
        //     'mobile_no' => 'required'

        // ]);

        // // return $request;

        // $base_response = new BaseResponse();

        // // VALIDATION
        // if ($validator->fails()) {

        //     return $base_response->api_response('500', $validator->errors(), NULL);
        // };
        // // return $req;

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $api_headers = session()->get('headers');
        $sender_name = session()->get('userAlias');
        // return $api_headers;



        $remittance_no = $request->remittance_no;
        $receiverPhone = $request->mobile_no;
        // $senderName = $request->sender_name;
        // $deviceIP = $_SERVER['REMOTE_ADDR'];

        // return $user_ip_address ;

        $data = [
                // "amount"=>$amount,
                // "debitAccount"=>"004001100241700194",
                // "deviceIP"=> "A",
                // "fee"=> "",
                // "pinCode"=> "1234",
                // "receiverAddress"=> "P.0 BOX 259 AD",
                // "receiverName"=> "Josh",
                // "receiverPhone"=> "0549380507",
                // "senderName"=>"ATO",
                // "tokenID"=>"CA00BAB3-CCCD-4025-BEAC-8CE5853938A1"

                    "beneficiaryTel"=> $receiverPhone,
                    "remittanceNumber"=> $remittance_no

                    // "beneficiaryTel"=> "0549380507",
                    // "remittanceNumber"=> "617432"

            ];

            // return $data;





        try {


            // $response = Http::post(env('API_BASE_URL') . "payment/cardless", $data)->headers({
            //     ''
            // });


            // return $data;
            $response = Http::withHeaders($api_headers)->post(env('API_BASE_URL') . "payment/cardlessOTP", $data);


            // return $response;

            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {

            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'message' => (string) $e->getMessage()
            ]);

            // return $base_response->api_response('500', "Internal Server Error",  NULL); // return API BASERESPONSE


        }
    }

    public function redeem_cardless(Request $request)
    {


        // $validator = Validator::make($request->all(), [


        //     'remittance_no' => 'required',
        //     'mobile_no' => 'required'

        // ]);

        // // return $request;

        // $base_response = new BaseResponse();

        // // VALIDATION
        // if ($validator->fails()) {

        //     return $base_response->api_response('500', $validator->errors(), NULL);
        // };
        // // return $req;

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $api_headers = session()->get('headers');
        $sender_name = session()->get('userAlias');
        // return $api_headers;



        $redeem_amount = $request->redeem_amount;
        $redeem_receiver_name = $request->redeem_receiver_name;
        $redeem_receiver_phone = $request->redeem_receiver_phone;
        $redeem_account = $request->redeem_account;
        $redeem_remittance_no = $request->redeem_remittance_no;
        $otp_number =$request->otp_number;

        // return $user_ip_address ;

        $data = [
                // "amount"=>$amount,
                // "debitAccount"=>"004001100241700194",
                // "deviceIP"=> "A",
                // "fee"=> "",
                // "pinCode"=> "1234",
                // "receiverAddress"=> "P.0 BOX 259 AD",
                // "receiverName"=> "Josh",
                // "receiverPhone"=> "0549380507",
                // "senderName"=>"ATO",
                // "tokenID"=>"CA00BAB3-CCCD-4025-BEAC-8CE5853938A1"


                    "amount"=> $redeem_amount,
                    "beneficiaryName"=> $redeem_receiver_name,
                    "beneficiaryTel"=> $redeem_receiver_phone,
                    "creditAccount"=> $redeem_account,
                    "otpNumber"=> $otp_number,
                    "remittanceNumber"=> $redeem_remittance_no

                    // "beneficiaryTel"=> $receiverPhone,
                    // "remittanceNumber"=> $remittance_no

                    // "beneficiaryTel"=> "0549380507",
                    // "remittanceNumber"=> "617432"

            ];

            //for debugging purposes
            // return $data;





        try {


            // $response = Http::post(env('API_BASE_URL') . "payment/cardless", $data)->headers({
            //     ''
            // });


            // return $data;
            $response = Http::withHeaders($api_headers)->post(env('API_BASE_URL') . "payment/redeemCardless", $data);


            // return $response;

            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {

            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'message' => (string) $e->getMessage()
            ]);

            // return $base_response->api_response('500', "Internal Server Error",  NULL); // return API BASERESPONSE


        }
    }


    public function reverse_cardless(Request $request){
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $api_headers = session()->get("headers");
        // return $authToken;

        // $base_response = new BaseResponse();



        // $accountNumber = $request->accountNo;
        // $accountNumber = "004001100241700194";
        $beneficiaryMobileNo = $request->receiver_phoneNo;
        $customerNo = session()->get('customerNumber');
        $postedBy = session()->get('userAlias');
        $referenceNo = $request->reference_no;
        $pinCode = $request->pin;

        $data = [

            "beneficiaryMobileNo"=> $beneficiaryMobileNo,
            "customberNumber"=> $customerNo,
            "pinCode"=> $pinCode,
            "postedBy"=> $postedBy,
            "referenceNo"=> $referenceNo

        ];


        // for debugging purposes
        // return $data;


        $response = Http::withHeaders($api_headers)->post(env('API_BASE_URL') . "payment/reverseCardless", $data);
        // return $response;

        //for debugging purposes
        // return $data;
        // $response = Http::get(env('API_BASE_URL') . "payment/unredeemedCardless/$accountNumber");
        // return $response;die();
        $result = new ApiBaseResponse();

        return $result->api_response($response);
    }


}
