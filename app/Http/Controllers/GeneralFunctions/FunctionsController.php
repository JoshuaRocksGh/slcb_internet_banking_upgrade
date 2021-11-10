<?php

namespace App\Http\Controllers\GeneralFunctions;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\AcceptHeader;
use Illuminate\Support\Facades\Log;

class FunctionsController extends Controller
{


    public function baseResponseApi($response)
    {

        $base_response = new BaseResponse();

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


    public function get_fx_rate(Request $request)
    {

        if ($request->has("rateType")) {
            $rateType = $request->query("rateType");
        }

        $rateType = $request->query("rateType");

        if (empty($rateType)) {
            $rateType = "Transfer rate";
        }

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $data = [
            "authToken" => $authToken,
            "rateType" => $rateType
        ];

        $response = Http::post(env('API_BASE_URL') . "utilities/getFxRates", $data);

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }



    public function get_correct_fx_rate()
    {

        $response = Http::get(env('API_BASE_URL') . "utilities/getCorrectFxRates");

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }



    public function get_my_loans_accounts()
    {

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $api_headers = session()->get('headers');

        $data = [
            "token" => $authToken,
        ];

        $response = Http::withHeaders($api_headers)->post(env('API_BASE_URL') . "loans/getLoans", $data);

        $result = new ApiBaseResponse();
        return $result->api_response($response);

        // return $response;
        // return $response->status();

    }



    public function get_accounts()
    {
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $api_headers = session()->get('headers');
        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];

        $response = Http::withHeaders($api_headers)->post(env('API_BASE_URL') . "account/getAccounts", $data);
        if ($response->ok()) { // API response status code is 200

            $res = json_decode($response->body());
            if ($res->responseCode === "000") {
                session([
                    "customerAccounts" => $res->data
                ]);
            }
        }
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }


    public function currency_list()
    {

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $base_response = new BaseResponse();

        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];

        $response = Http::get(env('API_BASE_URL') . "/utilities/getCurrencies");

        //return $response;
        // return $response->status();

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }



    public function security_question()
    {

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $base_response = new BaseResponse();

        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];

        $response = Http::get(env('API_BASE_URL') . "/utilities/getSecQuestions");

        //return $response;
        // return $response->status();
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }



    public function validate_account_no(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'accountNumber' => 'required',
        ]);

        $base_response = new BaseResponse();
        // VALIDATION
        if ($validator->fails()) {
            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        // return $request;
        $account_no = $request->accountNumber;


        $base_response = new BaseResponse();

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');



        $data = [
            "authToken" => $authToken,
            "accountNumber"    => $account_no
        ];

        // return $data;

        $response = Http::post(env('API_BASE_URL') . "/account/validateBBAN", $data);

        // return $response->body();

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }




    public function get_transfer_beneficiary(Request $request)
    {
        $beneType = $request->beneType;

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $base_response = new BaseResponse();

        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];
        // return env('API_BASE_URL') . "/beneficiary/getTransferBeneficiariestype}?userID=$userID&bankType=$beneType";

        $response = Http::get(env('API_BASE_URL') . "/beneficiary/getTransferBeneficiariestype}?userID=$userID&bankType=$beneType");

        // return $response;
        // return $response->status();
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
    public function getCountries()
    {

        $response = Http::get(env('API_BASE_URL') . "/utilities/getCountries");

        //return $response;
        // return $response->status();
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function bank_list()
    {

        $response = Http::get(env('API_BASE_URL') . "/utilities/getBanks");

        //return $response;
        // return $response->status();
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
    public function international_bank_list(Request $req)
    {
        $response = Http::get(env('API_BASE_URL') . "/utilities/getInternationalBanks/$req->countryCode");
        Log::alert($response);

        //return $response;
        // return $response->status();
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function branches_list()
    {

        // $response = Http::get(env('API_BASE_URL') . "/utilities/getBranches");
        $api_headers = session()->get('headers');

        $response = Http::withHeaders($api_headers)->get(env('API_BASE_URL') . "/utilities/getBranches");


        //return $response;
        // return $response->status();
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }


    public function lovs_list()
    {

        Log::critical("message");
        $response = Http::get(env('API_BASE_URL') . "account/lovs");
        $base_response = new BaseResponse();

        if ($response->ok()) {    // API response status code is 200
            $result = json_decode($response);
            // Log::critical($response->ok());

            // return $result->responseCode;

            return $base_response->api_response("000", "List of lOVs",  $result); // return API BASERESPONSE

        } else { // API response status code not 200

            //     return $response->body();
            //     DB::table('tb_error_logs')->insert([
            //         'platform' => 'ONLINE_INTERNET_BANKING',
            //         'user_id' => 'AUTH',
            //         'code' => $response->status(),
            //         'message' => $response->body()
            //     ]);

            return $base_response->api_response('500', 'API SERVER ERROR',  NULL); // return API BASERESPONSE

        }
    }

    public function get_Loan_products()
    {

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];

        $response = Http::get(env('API_BASE_URL') . "/loans/loanProducts", $data);

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }



    //method to return the interest types
    public function get_Interest_Types()
    {

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];

        $response = Http::get(env('API_BASE_URL') . "/loans/interestTypes", $data);

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function getLoanIntroSource()
    {
        $response = Http::get(env('API_BASE_URL') . "/loans/introSource");
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
    public function getLoanSectors()
    {
        $response = Http::get(env('API_BASE_URL') . "/loans/sectors");
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
    public function getLoanSubSectors(Request $request)
    {
        // $code = $request->loanSectorCode;
        // Log::alert($code);
        $response = Http::get(env('API_BASE_URL') . "/loans/subSectors/{$request->loanSectorCode}");

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
    public function getLoanPurpose()
    {
        $response = Http::get(env('API_BASE_URL') . "/loans/purpose");
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    //method to return the interest types
    public function get_loan_frequencies()
    {
        $response = Http::get(env('API_BASE_URL') . "/loans/loanFrequencies");

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    //method to return the interest types
    public function get_transaction_fees(Request $request)
    {

        $accountNumber = $request->accountNumber;
        $amount = $request->amount;
        $transfer_type = $request->transfer_type;
        // $feeType = $request->feeType;

        // return $request;
        // ACHP
        // RTG

        if ($transfer_type == "ACH") {
            $feeType = "ACHP";
        } else if ($transfer_type == "RTGS") {
            $feeType = "RTGS";
        } else {
            return false;
        }

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');



        $data = [
            "accountNumber" => $accountNumber,
            "amount"    => $amount,
            "feeType"    => $feeType,
            "authToken"    => $authToken,
        ];

        // return $data;

        // dd(env('API_BASE_URL') . "transfers/transactionFees");

        $response = Http::post(env('API_BASE_URL') . "transfers/transactionFees", $data);

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    // method to return expense types
    public function get_expenses()
    {
        $response = Http::get(env('API_BASE_URL') . "/utilities/expenseTypes");

        //return $response;
        // return $response->status();
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function get_standing_order_frequencies()
    {
        // return 'kjsdf';


        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $api_headers = session()->get('headers');

        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];

        $base_response = new BaseResponse();
        $response = Http::withHeaders($api_headers)->get(env('API_BASE_URL') . "/transfers/standingOrderFrequencies", $data);

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function payment_types()
    {
        $base_response = new BaseResponse();
        try {
            $response = Http::get(env('API_BASE_URL') . "payment/paymentType");
            $result = new ApiBaseResponse();
            return $result->api_response($response);
            // return $base_response->api_response("000", "payment types",  $result); // return API BASERESPONSE
        } catch (\Exception $e) {
            return $base_response->api_response('500', 'API SERVER ERROR',  NULL); // return API BASERESPONSE

        }
    }

    public function reset_security_question($user_id)
    {
        $user_id = $user_id;
        $response = Http::get(env('API_BASE_URL') . "/user/question/{$user_id}");
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function recipientNameEnquiry(Request $req)
    {
        $data = [
            'payNumber' => $req->beneficiaryAccount,
            'paymentCode' => $req->payeeName,
            'paymentType' => $req->paymentType
        ];
        // return $data;
        $response = Http::post(env('API_BASE_URL') . "/payment/nameEnquiry", $data);
        // return $response;
        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }
}