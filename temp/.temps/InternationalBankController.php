<?php

namespace App\Http\Controllers\Transfers\beneficiary;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\UserAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class InternationalBankController extends Controller
{
    //
    public function international_bank_(Request $request)
    {

        // return $request;

        $base_response = new BaseResponse();

        $user = (object) UserAuth::getDetails();
        //return $user;

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');

        $data = [
            "accountDetails" => [
                "beneficiaryAccount" => $request->acc_number,
                "beneficiaryAccountCurrency" => $request->currency,
            ],

            "addressDetails" => [
                "address1" => $request->address,
                "address2" => null,
                "address3" => null,
                "city" => $request->city,
                "countryOfResidence" => $request->country_of_residence
            ],

            "bankDetails" => [
                "bankAddress" => $request->bank_address,
                "bankBranch" => $request->bank_branch,
                "bankCity" => $request->bank_city,
                "bankCountry" => $request->bank_country,
                "bankName" => $request->bank_name,
                "bankSwiftCode" => $request->swift_code
            ],

            "beneID" => null,

            "beneficiaryDetails" => [
                "email" => $request->beneficiary_email,
                "firstName" => $request->firstname,
                "lastName" => $request->lastname,
                "nationality" => $request->nationality,
                "nickname" => $request->beneficiary_name,
                "otherName" => $request->middlename,
                "sendMail" => $request->transfer_email
            ],

            "beneficiaryType" => "INTB",

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
            "telephone" => $request->telephone,
            "beneficiaryAcountName" => $request->acc_name

        ];

        // return $data;

        try {
            $response = Http::post(env('API_BASE_URL') . "beneficiary/addTransferBeneficiary", $data);

            //return $response;
            // return json_decode($response->body());

            if ($response->ok()) { // API response status code is 200

                $result = json_decode($response->body());
                //return $result;

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
