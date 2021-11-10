<?php 

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$response = [
    'responseCode' => '000',
    'message' => 'Other Local Bank',
    'data' => [
            'bank_name' => 'GCB BANK',
            'account_name' => 'Joshua Tetteh',
            'account_number' => '200120365223',
            'currency' => 'USD',
            'account_type' => 'DOLLAR',
            'email' => 'josh.tetteh01@gmail.com'
    ]
];
    exit(json_encode($response));