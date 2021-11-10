<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use App\Http\classes\WEB\ApiBaseResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LoansController extends Controller
{
    //
    public function loan_request()
    {
        return view('pages.loans.loan_request');
    }

    public function sendLoanRequestQuote(Request $request)
    {

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        // return $authToken;

        // $base_response = new BaseResponse();

        $loanProduct = $request->loanProductCode;
        $loanAmount = $request->loanAmount;
        // $entrySource = $request->entrySource;
        $tenureInMonths = $request->tenureInMonths;
        $interestRateType = $request->interestRateTypeCode;
        $principalRepayFreq = $request->principalRepayFreqCode;
        $interestRepayFrequency = $request->interestRepayFreqCode;
        $data = [

            "amount" => $loanAmount,
            "authToken" => $authToken,
            "deviceIp" => "A",
            "entrySource" => "I",
            "interestRepayFrequency" => $interestRepayFrequency,
            "interestType" => $interestRateType,
            "loanProduct" => $loanProduct,
            "principalRepayFrequency" => $principalRepayFreq,
            "tenure" => $tenureInMonths

        ];
        $response = Http::post(env('API_BASE_URL') . "/loans/loanQuotation", $data);
        // return $response;die();
        $result = new ApiBaseResponse();

        return $result->api_response($response);
    }

    public function postLoanOrigination(Request $request)
    {
        Log::alert("request");
        $authToken = session()->get('userToken');
        $userID = session()->get('userId');
        $data = [

            "amount" => $request->loanAmount,
            "authToken" => $authToken,
            "customerNumber" => session()->get("customerNumber"),
            "entrySource" => "i",
            "introSource" => "MOB",
            "otherPurpose" => "other",
            "pBranch" => $request->productBranchCode,
            "pin" => $request->secPin,
            "postedBy" => $userID,
            "productCode" => $request->loanProductCode,
            "purpose" => $request->loanPurpose,
            "sector" => $request->loanSectorCode,
            "subSector" => $request->loanSubSectorCode,
        ];
        // return $data;
        $response = Http::post(env('API_BASE_URL') . "/loans/loanOrigination", $data);
        $result = new ApiBaseResponse();

        return $result->api_response($response);
    }
}
