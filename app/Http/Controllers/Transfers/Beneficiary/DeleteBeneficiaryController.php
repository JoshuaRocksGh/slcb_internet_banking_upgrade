<?php

namespace App\Http\Controllers\Transfers\beneficiary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeleteBeneficiaryController extends Controller
{
    //
    public function index(Request $request)
    {
        $bene_id = $request->query('bene_id');
        return $bene_id;

        $response = Http::delete(env('API_BASE_URL') . "deleteTransferBeneficiary", $bene_id);

        return $response;
    }
}
