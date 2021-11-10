<?php

namespace App\Http\Controllers\Transfers\beneficiary;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\classes\WEB\UserAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class LocalBankController extends Controller
{
    //

    public function currency_list()
    {
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $data = [
            "authToken" => $authToken,
            "userId"    => $userID
        ];

        $response = Http::get("http://localhost/IIE/currency-code.php", $data);

        //return $response;
        // return $response->status();


        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function local_bank(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'beneficiary_name'  => 'required',
            'beneficiary_email' => 'required',
            'beneficiary_address' => 'required',
            'number' => 'required',
            'account_currency' => 'required',
            'bank_swift_code' => 'required',
            'currency_code' => 'required'
        ]);

        // return $req;

        $base_response = new BaseResponse();


        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };
        // return $req;

        //return $user;
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $data = [
            "accountDetails" => [
                "beneficiaryAccount" => $req->account_number,
                "beneficiaryAccountCurrency" => $req->account_currency,
                "beneficiaryAcountName" => $req->account_name
            ],

            "addressDetails" => [
                "address1" => $req->beneficiary_address,
                "address2" => null,
                "address3" => null,
                "city" => null,
                "countryOfResidence" => null
            ],

            "bankDetails" => [
                "bankAddress" => null,
                "bankBranch" => null,
                "bankCity" => null,
                "bankCountry" => null,
                "bankName" => $req->bank_name . '' . '||' . '' . $req->bank_swift_code,
                "bankSwiftCode" => $req->currency_code
            ],

            "beneID" => null,

            "beneficiaryDetails" => [
                "email" => $req->beneficiary_email,
                "firstName" => null,
                "lastName" => null,
                "nationality" => null,
                "nickname" => $req->beneficiary_name,
                "otherName" => null,
                "sendMail" => $req->transfer_email
            ],

            "beneficiaryType" => "OTB",

            "securityDetails" => [
                "approvedBy" => null,
                "approvedDateTime" => date('Y-m-d'),
                "createdBy" => null,
                "createdDateTime" =>  date('Y-m-d'),
                "entrySource" => null,
                "modifyBy" => null,
                "modifyDateTime" =>  date('Y-m-d')
            ],

            "transactionType" => null,
            "userID" => $userID,
            // "telephone" => $req->number

        ];

        // return $data;

        try {
            $response = Http::post(env('API_BASE_URL') . "beneficiary/addTransferBeneficiary", $data);

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

    public function edit_local_bank_beneficiary(Request $request)
    {

        $bene_type = $request->query('bene_type');
        $bene_id = $request->query('bene_id');

        return view('pages.transfer.edit_local_bank_beneficiary', ['bene_type' => $bene_type, 'bene_id' => $bene_id]);
    }

    public function updaate_local_bank_beneficiary(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'beneficiary_name'  => 'required',
            'beneficiary_email' => 'required',
            'beneficiary_address' => 'required',
            'number' => 'required',
            'account_currency' => 'required',
            'bank_swift_code' => 'required'
            //'send_mail' => 'required',
        ]);

        //return $req;

        $base_response = new BaseResponse();


        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };
        // return $req;

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');


        $data = [
            "accountDetails" => [
                "beneficiaryAccount" => $req->account_number,
                "beneficiaryAccountCurrency" => $req->account_currency,
                "beneficiaryAcountName" => $req->account_name
            ],

            "addressDetails" => [
                "address1" => $req->beneficiary_address,
                "address2" => "string",
                "address3" => "string",
                "city" => "string",
                "countryOfResidence" => "string"
            ],

            "bankDetails" => [
                "bankAddress" => "string",
                "bankBranch" => "string",
                "bankCity" => "string",
                "bankCountry" => "string",
                "bankName" => $req->bank_name,
                "bankSwiftCode" => $req->bank_swift_code
            ],

            "beneID" => "string",

            "beneficiaryDetails" => [
                "email" => $req->beneficiary_email,
                "firstName" => "string",
                "lastName" => "string",
                "nationality" => "string",
                "nickname" => $req->beneficiary_name,
                "otherName" => "string",
                "sendMail" => $req->transfer_email
            ],

            "beneficiaryType" => "OTB",

            "securityDetails" => [
                "approvedBy" => "string",
                "approvedDateTime" => date('Y-m-d'),
                "createdBy" => "string",
                "createdDateTime" =>  date('Y-m-d'),
                "entrySource" => "string",
                "modifyBy" => "string",
                "modifyDateTime" =>  date('Y-m-d')
            ],

            "transactionType" => "string",
            "userID" => $userID,
            "telephone" => $req->number

        ];

        //return $data;

        try {
            $response = Http::post(env('API_BASE_URL') . "beneficiary/addTransferBeneficiary", $data);

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


    public function edit_local_bank(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'beneficiary_name'  => 'required',
            'beneficiary_email' => 'required',
            'beneficiary_address' => 'required',
            'number' => 'required',
            'account_currency' => 'required',
            'bank_swift_code' => 'required',
            'bene_id' => 'required',
            'bene_type' => 'required'
            //'send_mail' => 'required',
        ]);

        // return $req;

        $base_response = new BaseResponse();


        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };
        // return $req;


        $user = (object) UserAuth::getDetails();
        //return $user;
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $data = [
            "accountDetails" => [
                "beneficiaryAccount" => $req->account_number,
                "beneficiaryAccountCurrency" => $req->account_currency,
                "beneficiaryAcountName" => $req->account_name
            ],

            "addressDetails" => [
                "address1" => $req->beneficiary_address,
                "address2" => "string",
                "address3" => "string",
                "city" => "string",
                "countryOfResidence" => "string"
            ],

            "bankDetails" => [
                "bankAddress" => "string",
                "bankBranch" => "string",
                "bankCity" => "string",
                "bankCountry" => "string",
                "bankName" => $req->bank_name,
                "bankSwiftCode" => $req->bank_swift_code
            ],

            "beneID" => $req->bene_id,

            "beneficiaryDetails" => [
                "email" => $req->beneficiary_email,
                "firstName" => "string",
                "lastName" => "string",
                "nationality" => "string",
                "nickname" => $req->beneficiary_name,
                "otherName" => "string",
                "sendMail" => $req->transfer_email
            ],

            "beneficiaryType" => $req->bene_type,

            "securityDetails" => [
                "approvedBy" => "string",
                "approvedDateTime" => date('Y-m-d'),
                "createdBy" => "string",
                "createdDateTime" =>  date('Y-m-d'),
                "entrySource" => "string",
                "modifyBy" => "string",
                "modifyDateTime" =>  date('Y-m-d')
            ],

            "transactionType" => "string",
            "userID" => $userID,
            "telephone" => $req->number

        ];

        // return $data;


        try {
            $response = Http::put(env('API_BASE_URL') . "/beneficiary/updateTransferBeneficiary", $data);

            // return json_decode($response->body());

            if ($response->ok()) { // API response status code is 200

                $result = json_decode($response->body());
                // return $result;

                if ($result->responseCode == '000') {

                    // $result_data = $result->data;
                    // return $result_data;

                    return $base_response->api_response($result->responseCode, $result->message,  $result->data); // return API BASERESPONSE



                } else {  // API responseCode is not 000

                    return $base_response->api_response($result->responseCode, $result->message,  $result->data); // return API BASERESPONSE

                }
            } else { // API response status code not 200

                DB::table('tb_error_logs')->insert([
                    'platform' => 'ONLINE_INTERNET_BANKING',
                    'user_id' => 'AUTH',
                    'code' => $response->status(),
                    'message' => $response->body()
                ]);

                return $base_response->api_response('500', 'API SERVER ERROR',  NULL); // return API BASERESPONSE

            }
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
