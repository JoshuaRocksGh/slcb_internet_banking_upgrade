<?php

namespace App\Http\Controllers\Transfers\SchedulePayment;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class SchedulePaymentController extends Controller
{
    //
    public function schedule_payment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from_account' => 'required' ,
            'beneficiary_account' => 'required' ,
            'effective_date_from' => 'required' ,
            'effective_data_to' => 'required' ,
            'frequency' => 'required' ,
            'maximum_attempts' => 'required' ,
            'transaction_details' => 'required' ,
            'amount' => 'required'
            //'send_mail' => 'required',

        ]);

        // return $request;

        $base_response = new BaseResponse();


        // VALIDATION
        if ($validator->fails()) {

            return $base_response->api_response('500', $validator->errors(), NULL);
        };

        // return $req;

        $authToken = session()->get('userToken');
        $userID = session()->get('userId');


        $data = [

            "accountNumber" => $request->from_account,
            "acctLink" => "string",
            "approvalTerminal" => "string",
            "approvedBy" => "string",
            "dueAmount" => $request->amount,
            "dueDate" => $request->effective_date_from,
            "postedBy" => $userID,
            "terminalId" => "string",
            "terminationDate" => $request->effective_data_to,
            "transactionDetails" => $request->transaction_details ,
            "beneficiaryAccount" => $request->beneficiary_account,
            "frequency" => $request->frequency,
            "maximumAttempts" => $request->maximum_attempts
        ];

        return $data;

        try {
            $response = Http::post(env('API_BASE_URL') . "transfers/scheduledPayment", $data);

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
