<?php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$response = [
    'responseCode' => '000',
    'message' => 'My Accounts',
    'data' => [
        [
            'account_name' => 'Joshua Tetteh',
            'account_number' => '1011102536923',
            'currency' => 'GHS',
            'amount' => '8200.23',
            'bank_branch' => 'Accra Central',
            'account_type' => 'Savings Account',
            'date_open' => '14-03-2018',

        ],
        [
            'account_name' => 'Joshua Tetteh',
            'account_number' => '1011102500000',
            'currency' => 'GHS',
            'amount' => '260.23',
            'bank_branch' => 'Accra Central',
            'account_type' => 'Current Account',
            'date_open' => '16-09-2020',  
        ],
        [
            'account_name' => 'Joshua Tetteh',
            'account_number' => '10111025602365',
            'currency' => 'GHS',
            'amount' => '32845.23',
            'bank_branch' => 'Accra Central',
            'account_type' => 'Savings Account',
            'date_open' => '01-04-2015',  
        ]
        
    ]

];

exit(json_encode($response));