<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use App\Http\classes\WEB\ApiBaseResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoanRequestController extends Controller
{
    //
    public function send_loan_request(Request $request)
    {

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        // return $authToken;

        // $base_response = new BaseResponse();

        $loanProduct = $request->loan_product;
        $loanAmount = $request->loan_amount;
        // $entrySource = $request->entrySource;
        $loan_duration = $request->loan_duration;
        $interest_rate_type= $request->interest_rate_type;
        $principal_repay_freq = $request->principal_repay_freq;
        $interest_repay_freq = $request->interest_repay_freq;
        $loan_purpose = $request->loan_purpose;
        $disbursement_account = $request->disbursement_account;
        $data = [

            "amount" => $loanAmount,
            "authToken" => $authToken,
            "deviceIp" => "A",
            "entrySource" => "I",
            "interestRepayFrequency" => $interest_repay_freq,
            "interestType" => $interest_rate_type,
            "loanProduct" => $loanProduct,
            "principalRepayFrequency" => $principal_repay_freq,
            "tenure" => $loan_duration

        ];

        // return $data;
        $response = Http::post(env('API_BASE_URL') . "/loans/loanOrigination", $data);

        $result = new ApiBaseResponse();

        return $result->api_response($response);
    }
}
