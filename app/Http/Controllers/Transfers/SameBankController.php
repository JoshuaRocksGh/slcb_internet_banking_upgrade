<?php

namespace App\Http\Controllers\Transfers;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class SameBankController extends Controller
{
    //

    public function same_bank()
    {
        return view('pages.transfer.same_bank_');
    }


    public function sameBankTransfer(Request $req)
    {


        $base_response = new BaseResponse();
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $client_ip = request()->ip();


        $data = [
            "amount" => (float) $req->transferAmount,
            "authToken" => $authToken,
            "brand" => "string",
            "creditAccount" => $req->beneficiaryAccountNumber,
            "channel" => "MOB",
            "country" => "SL",
            "currency" => $req->accountCurrency,
            "debitAccount" => $req->accountNumber,
            "deviceId" => "string",
            "deviceName" => "string",
            "deviceIp" => $client_ip,
            "entrySource" => 'MOB',
            "expenseType" => $req->transferCategory,
            "manufacturer" => "string",
            "narration" => $req->transferPurpose,
            "secPin" => $req->secPin,
            "userName" => $userID,
            "beneficiaryEmail" => $req->beneficiaryEmail
        ];
        try {

            $response = Http::post(env('API_BASE_URL') . "transfers/sameBank", $data);
            $result = new ApiBaseResponse();
            Log::alert($response);
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

    public function corporate_same_bank(Request $request)
    {
        $base_response = new BaseResponse();
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $userAlias = session()->get('userAlias');
        $customerPhone = session()->get('customerPhone');
        $customerNumber = session()->get('customerNumber');
        $userMandate = session()->get('userMandate');
        // return $request;
        $data = [
            "account_no" => $request->accountNumber,
            "authToken" => $authToken,
            "channel" => 'NET',
            "destinationAccountId" => $request->beneficiaryAccountNumber,
            "beneficiaryName" => $request->beneficiaryName,
            "currency" => $request->accountCurrency,
            "account_mandate" => $request->accountMandate,
            "amount" => $request->transferAmount,
            "narration" => $request->transferPurpose,
            "postBy" => $userID,
            // "appBy" => '';
            "customerTel" => $customerPhone,
            "transBy" => $userAlias,
            "customer_no" => $customerNumber,
            "user_alias" => $userAlias,
            "user_mandate" => $userMandate,
            "expense_type" => $request->transferCategory,
            "documentRef" => strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 2) . time()),
        ];
        // return $data;
        try {
            $response = Http::post(env('CIB_API_BASE_URL') . "same-bank-gone-for-pending", $data);
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
