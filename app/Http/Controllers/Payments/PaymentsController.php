<?php

namespace App\Http\Controllers\Payments;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PaymentsController extends Controller
{

    public function paymentTypes()
    {

        return view('pages.payments.payment_types');
    }

    public function makePayment(Request $req)
    {

        $base_response = new BaseResponse();
        $data = [

            'accountNumber' => $req->account,
            'amount' => $req->amount,
            'customerName' => session()->get('userId'),
            'customerNumber' => session()->get('customerNumber'),
            'customerPhone' => session()->get('customerPhone'),
            'entrySource' => "MOM",
            'naration' => $req->paymentDescription,
            'payeeName' => $req->payeeName,
            'payeeNumber' => $req->paymentAccount,
            'paymentCode' => $req->payeeName,
            'paymentType' => $req->paymentType,
            'pinCode' => $req->pinCode,
        ];
        // return $data;
        try {
            $response = Http::post(env('API_BASE_URL') . "payment/makePayment", $data);
            $result = new ApiBaseResponse();
            return $result->api_response($response);
        } catch (\Exception $e) {
            return $base_response->api_response('500', $e->getMessage(),  NULL); // return API BASERESPONSE
        }
    }
}
