<?php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



$response = [
    'responseCode' => '000',
    'message' => 'Success',
    'data' => [
        [

            'account_type' => 'CA - P' ,
            'account_number' => '004001016997522124' ,
            'alias_name' => 'Joshua Tetteh' ,
            'account_currency' => 'SLL',
            'email' => 'josh.tetteh@gmail.com',
            'phone' => '+232245369123',
            'bene_type' => 'SM',

        ],
        [
            'account_type' => 'CA - STAFF' ,
            'account_number' => '004001016997452652' ,
            'alias_name' => 'Kwabena Ampah' ,
            'account_currency' => 'SLL',
            'email' => 'kwabena.ampah@gmail.com',
            'phone' => '+232500369123',
            'bene_type' => 'CO',

        ],
        [
            'account_type' => 'SA - P' ,
            'account_number' => '00400101002432212013' ,
            'alias_name' => 'Jonas Korankye' ,
            'account_currency' => 'SLL',
            'email' => 'jonas100@gmail.com',
            'phone' => '+2324245369123',
            'bene_type' => 'SM',

        ],

    ]
];
    exit(json_encode($response));
