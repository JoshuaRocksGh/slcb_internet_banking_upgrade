<?php
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    /*

$response =  [
    'responseCode' => '000',
    'message' => 'Login successful',
    'data' => [
            [
                'id' => 'JOSHUA1234',
                'acocoun' => '09930',
                'f_login' => 'Y',
                'c_type' => 'I'
            ],
            [
                'user_id' => 'JOSHUA1234',
                'customer_no' => '09930',
                'f_login' => 'Y',
                'c_type' => 'I'
            ],
            [
                'user_id' => 'JOSHUA1234',
                'customer_no' => '09930',
                'f_login' => 'Y',
                'c_type' => 'I'
            ]
        ]
    ];

*/



$response =  [
    'responseCode' => '000',
    'message' => 'Login successful',
    'data' => 
            [
                'email' => 'email@gmail.com',
                'user_id' => 'JOSHUA1234',
                'customer_no' => '09930',
                'f_login' => 'Y',
                'c_type' => 'I'
            ]
        
    ];

        exit(json_encode($response));