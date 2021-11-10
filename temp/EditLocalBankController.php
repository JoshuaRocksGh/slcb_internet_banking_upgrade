<?php

namespace App\Http\Controllers\Transfer\beneficiary;

use App\Http\classes\API\BaseResponse;
use App\Http\classes\WEB\ApiBaseResponse;
use App\Http\classes\WEB\UserAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EditLocalBankController extends Controller
{
    //


    public function update_local_bank_beneficiary(Request $request)
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
}
