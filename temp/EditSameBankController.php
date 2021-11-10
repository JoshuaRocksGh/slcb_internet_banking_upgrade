<?php

namespace App\Http\Controllers\Transfer\beneficiary;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\classes\WEB\UserAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class EditSameBankController extends Controller
{
    //


    public function get_same_bank_beneficiary(Request $request)
    {


        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $bene_id = $request->bene_id;


        // http://192.168.1.195:9096/beneficiary/getTransferBeneficiariesById?beneId=20210408135826


        $response = Http::get(env('API_BASE_URL') . "beneficiary/getTransferBeneficiariesById?beneId=$bene_id");

        // return $response;
        // return $response->status();

        $result = new ApiBaseResponse();
        return $result->api_response($response);
    }

    public function update_same_bank_beneficiary(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'account_number' => 'required',
            'account_name' => 'required',
            'beneficiary_name' => 'required',
            'beneficiary_email' => 'required',
            'beneficiary_address' => 'required',
            'number' => 'required',
            'account_currency' => 'required',
            'beneID' => 'required',
            'beneficiaryType' => 'required',
            //'send_mail' => 'required',

        ]);

        // return $req;

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
                "bankName" => "ROKEL COMMERCIAL BANK",
                "bankSwiftCode" => "string"
            ],

            "beneID" => $req->beneID,

            "beneficiaryDetails" => [
                "email" => $req->beneficiary_email,
                "firstName" => "string",
                "lastName" => "string",
                "nationality" => "string",
                "nickname" => $req->beneficiary_name,
                "otherName" => "string",
                "sendMail" => $req->transfer_email
            ],

            "beneficiaryType" => $req->beneficiaryType,

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
            $response = Http::put(env('API_BASE_URL') . "beneficiary/updateTransferBeneficiary", $data);

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
