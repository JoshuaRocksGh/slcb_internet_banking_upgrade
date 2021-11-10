<?php

namespace App\Http\Controllers\Transfers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MultipleTransfersController extends Controller
{
    public function index()
    {
        return view('pages.transfer.multiple_transfer.index');
    }
}
