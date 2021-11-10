<?php

namespace App\Http\Controllers\Transfers;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class LocalBankController extends Controller
{

    public function local_bank()
    {
        return view('pages.transfer.local_bank');
    }

    public function localBankTransfer(Request $request)
    {


        $base_response = new BaseResponse();

        // VALIDATION
        // return $request ;

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');



        $clientIp = request()->ip();
        $mode = $request->transferMode;
        if ($mode == "ACH") {
            $url = 'achBankTransfer';
        } else if ($mode == "RTGS") {
            $url = 'rtgsBankTransfer';
        } else {
            return $base_response->api_response('500', "Invalid Transaction Type",  NULL); // return API BASERESPONSE
        }

        $data = [
            "amount" => (float)$request->transferAmount,
            "authToken" => $authToken,
            "bankName" => $request->bankName,
            "beneficiaryAddress" => $request->beneficiaryAddress,
            "beneficiaryName" => $request->beneficiaryName,
            "brand" => "a",
            "channel" => "MOB",
            "country" => "a",
            "creditAccount" => $request->beneficiaryAccountNumber,
            "debitAccount" => $request->accountNumber,
            "deviceId" => "a",
            "deviceIp" => $clientIp,
            "deviceName" => "a",
            "entrySource" => 'MOB',
            "expenseType" => $request->transferCategory,
            "manufacturer" => "a",
            "secPin" => $request->secPin,
            "transactionDetails" => $request->transferPurpose,
            "transferCurrency" => "$request->accountCurrencyCode",
            "userName" => $userID,
            "email" => $request->beneficiaryEmail,

        ];
        // return $data;
        try {
            $response = Http::post(env('API_BASE_URL') . "transfers/$url", $data);
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

    public function corporateLocalBankTransfer(Request $request)
    {

        // return $request;
        $base_response = new BaseResponse();
        $mode = $request->transferMode;
        $userID = session()->get('userId');
        $userAlias = session()->get('userAlias');
        $customerPhone = session()->get('customerPhone');
        $customerNumber = session()->get('customerNumber');
        $userMandate = session()->get('userMandate');

        if ($mode == "ACH") {
            $url_endpoint = 'ach-bank-gone-for-pending';
        } else if ($mode == "RTGS") {
            $url_endpoint = 'rtgs-bank-gone-for-pending';
        } else if ($mode == "INSTANT") {
            $url_endpoint = 'instantBankTransfer';
        } else {
            $url_endpoint = '';
        }
        $data = [
            "customer_no" => $customerNumber,
            "user_id" => $userID,
            "user_alias" => $userAlias,
            "account_mandate" => $request->accountMandate,
            "account_no" => $request->accountNumber,
            "bank_code" => $request->bankCode,
            "bank_name" => $request->bankName,
            "bene_account" => $request->beneficiaryAccountNumber,
            "bene_name" => $request->beneficiaryName,
            "bene_address" => $request->beneficiaryAddress,
            "bene_tel" => $customerPhone,
            "amount" => $request->transferamount,
            "currency" => $request->accountCurrency,
            "currency_iso" => $request->currencyCode,
            "narration" => $request->transferpurpose,
            "expense_type" => $request->transfercategory,
        ];

        // return $data;
        try {
            $response = Http::post(env('CIB_API_BASE_URL') . $url_endpoint, $data);
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