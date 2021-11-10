<?php

namespace App\Http\Controllers\Transfer\beneficiary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditBeneficiaryController extends Controller
{
    //
    public function index(Request $request)
    {
        $bene_type = $request->query('bene_type');
        $bene_id = $request->query('bene_id');

        // return $bene_type ;
        // return $bene_id ;

        if ($bene_type == "SAB") {

            return redirect()->route('edit-same-bank-beneficiary', ['bene_type' => $bene_type, 'bene_id' => $bene_id]);
        } else if ($bene_type == "OTB") {

            return redirect()->route('edit-other-local-bank-beneficiary', ['bene_type' => $bene_type, 'bene_id' => $bene_id]);
        } else if ($bene_type == "INTB") {

            return redirect()->route('edit-international-bank-beneficiary', ['bene_type' => $bene_type, 'bene_id' => $bene_id]);
        } else {
            return back();
        }
    }
}
