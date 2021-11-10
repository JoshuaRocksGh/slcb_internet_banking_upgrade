<?php

namespace App\Http\Controllers\Transfers;

use App\Http\classes\API\BaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\classes\WEB\ApiBaseResponse;
use Illuminate\Support\Facades\Validator;

class InternationalBankController extends Controller
{
    //

    public function internationalBankTransfer(Request $req)
    {
        $base_response = new BaseResponse();
        $authToken = session()->get('userToken');
        $userId = session()->get('userId');
        $data = [
            "amount" => $req->transferAmount,
            "authToken" => $authToken,
            "beneBankSwift" => $req->bankCode,
            "beneficiaryAccount" => $req->beneficiaryAccountNumber,
            "beneficiaryAddress1" => $req->beneficiaryAddress,
            "beneficiaryAddress2" => "string",
            "beneficiaryAddress3" => "string",
            "beneficiaryName" => $req->beneficiaryName,
            "brand" => "string",
            "channel" => "MOB",
            "chargeAccount" => $req->accountNumber,
            "country" => $req->bankCountryCode,
            "debitAccount" => $req->accountNumber,
            "deviceId" => "string",
            "deviceIp" => "string",
            "deviceName" => "string",
            "entrySource" => "MOB",
            "expenseType" => $req->transferCategory,
            "isoCode" => "USD",
            "manufacturer" => "string",
            "pinCode" => $req->secPin,
            "remitInfo1" => $req->transferPurpose,
            "remitInfo2" => "string",
            "remitInfo3" => "string",
            "remittanceCode" => "IPI",
            "userName" => $userId
        ];
        // return $data;


        try {
            $response = Http::post(env('API_BASE_URL') . "/transfers/swiftTransfer", $data);

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

    public function corporate_international_bank(Request $request)
    {
        // return $request;

        $validator = Validator::make($request->all(), [
            "accountMandate" => "required",
            "amount" => "required",
            "bankCode" => "required",
            "bankName" => "required",
            "category" => "required",
            "currency" => "required",
            "currencyCode" => "required",
            "fromAccount" => "required",
            "purpose" => "required",
            "toAccount" => "required",
        ]);

        $base_response = new BaseResponse();


        if ($validator->fails()) {
            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        // return $request;
        $authToken = session()->get('userToken');


        $userID = session()->get('userId');
        $userAlias = session()->get('userAlias');
        $customerPhone = session()->get('customerPhone');
        $customerNumber = session()->get('customerNumber');
        $userMandate = session()->get('userMandate');
        $customerPhone = session()->get('customerPhone');


        $data = [
            "authToken" => $authToken,
            "customer_no" => $customerNumber,
            "user_id" => $userID,
            "user_alias" => $userAlias,
            "account_mandate" => $request->accountMandate,
            "account_no" => $request->fromAccount,
            "bank_code" => $request->bankCode,
            "bank_country_code" => $request->bankCountryCode,
            "bank_name" => $request->bankName,
            "bene_account" => $request->toAccount,
            "bene_name" => $request->beneficiaryName,
            "bene_address" => $request->beneficiaryAddress,
            "telno" => $customerPhone,
            "amount" => $request->amount,
            "currency" => $request->currency,
            "currency_iso" => $request->currencyCode,
            "narration" => $request->purpose,
            "expense_type" => $request->category,
            "channel" => 'NET',
            "transBy" => $userAlias,
            "postBy" => $userID,
            "user_mandate" => $userMandate,
            "documentRef" => strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 2) . time()),


        ];

        // return $data;

        try {
            // return $data;
            // dd(env('CIB_API_BASE_URL') . "international-bank-gone-for-pending", $data);

            $response = Http::post(env('CIB_API_BASE_URL') . "international-bank-gone-for-pending", $data);
            // return $response;
            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {

            DB::table('tb_error_logs')->insert([
                'platform' => 'ONLINE_INTERNET_BANKING',
                'user_id' => 'AUTH',
                'message' => (string) $e->getMessage()
            ]);

            return $base_response->api_response('500', 'SERVER ERROR',  NULL); // return API BASERESPONSE


        }
    }
}