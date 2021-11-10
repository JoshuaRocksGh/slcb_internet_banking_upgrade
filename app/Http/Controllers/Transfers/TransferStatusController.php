<?php

namespace App\Http\Controllers\Transfers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferStatusController extends Controller
{
    public function transfer_status()
    {
        return view('pages.transfer.transfer_status');
    }
}
