<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountEnquiryController extends Controller
{

    public function account_balance_info()
    {
        return [
                'responseCode' => '000',
                'message' => 'data received',
                'data' => [
                        'ACCOUNT_NUMBER' => '5363774.00',
                        'ACCOUNT_DESCRIPTION' => 'BEAN WHOLE SALE ENTERPRISE',
                        'CURRENCY' => 'GHS',
                        'PRODUCT' => 'Currenct  Account',
                        'LEGDER_BALANCE' => '0.00',
                        'AVAILABLE_BALANCE' => '0.00',
                        'AMOUNT_IN_ARREAS' => '00.0',
                        'OVERDRAFT_LIMIT' => '00.0',
                        'ACCRUED_CREDIT_INTREST' => '00.0',
                        'CREDIT_INTEREST_RATE' => '00.0',
                        'ACCRUED_DEBIT_INTEREST' => '00.0',
                        'DEBIT_INTERST_RATE' => '000'
                    ]
            ];
    }


    public function account_transactions()
    {
        return [
            'responseCode' => '000',
            'message' => 'data received',
            'data' =>[
                 [
                'POSTING_DATE' => '01-Mar-2018',
                'VALUE_DATE' => '02-OCT-2018',
                'TRANSACTION_DETAILS' => 'Balance Brought Forword',
                'DOCUMENT_REF' => '00000000',
                'BATCH_NO' => '2020dr55',
                'DEBIT' => '3007',
                'CREDIT' => '2889',
                'BALANCE' => '677300'
            ] ,
            [
                'POSTING_DATE' => '01-Mar-2018',
                'VALUE_DATE' => '02-OCT-2018',
                'TRANSACTION_DETAILS' => 'Balance Brought Forword',
                'DOCUMENT_REF' => '00000000',
                'BATCH_NO' => '2020dr55',
                'DEBIT' => '3007',
                'CREDIT' => '2889',
                'BALANCE' => '677300'
            ] ,
            [
                'POSTING_DATE' => '01-Mar-2018',
                'VALUE_DATE' => '02-OCT-2018',
                'TRANSACTION_DETAILS' => 'Balance Brought Forword',
                'DOCUMENT_REF' => '00000000',
                'BATCH_NO' => '2020dr55',
                'DEBIT' => '3007',
                'CREDIT' => '2889',
                'BALANCE' => '677300'
            ] ,
            [
                'POSTING_DATE' => '01-Mar-2018',
                'VALUE_DATE' => '02-OCT-2018',
                'TRANSACTION_DETAILS' => 'Balance Brought Forword',
                'DOCUMENT_REF' => '00000000',
                'BATCH_NO' => '2020dr55',
                'DEBIT' => '3007',
                'CREDIT' => '2889',
                'BALANCE' => '677300'
            ] ,
            [
                'POSTING_DATE' => '01-Mar-2018',
                'VALUE_DATE' => '02-OCT-2018',
                'TRANSACTION_DETAILS' => 'Balance Brought Forword',
                'DOCUMENT_REF' => '00000000',
                'BATCH_NO' => '2020dr55',
                'DEBIT' => '3007',
                'CREDIT' => '2889',
                'BALANCE' => '677300'
            ] ,
            [
                'POSTING_DATE' => '01-Mar-2018',
                'VALUE_DATE' => '02-OCT-2018',
                'TRANSACTION_DETAILS' => 'Balance Brought Forword',
                'DOCUMENT_REF' => '00000000',
                'BATCH_NO' => '2020dr55',
                'DEBIT' => '3007',
                'CREDIT' => '2889',
                'BALANCE' => '677300'
            ] ,

            ]
        ];
    }
}
