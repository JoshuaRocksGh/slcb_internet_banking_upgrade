<?php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$response = [
    'responseCode' => '000',
    'message' => 'Beneficiary Successfully Added',
    'data' => [
        'bank_country' => 'Sierra Leonne',
        'bank_city' => 'Free Town',
        'bank_branch' => 'Head Office',
        'bank_name' => 'Rokel Bank' ,
        'bank_address' => '25/27 SIAKA STEVENS STREET' ,
        'swift_code' => 'RCBKSLFRXXX',
        'account_number'=> '100236566985412',
        'currency' => 'Le' ,
        'firstname' => 'Joshua' ,
        'lastname' => 'Tetteh' ,
        'middlename' => 'Boamah' ,
        'beneficiary_name' => 'Joshua Tetteh' ,
        'beneficiary_email' => 'josh.tetteh01@gmail.com' ,
        'nationality' => 'Ghanaian' ,
        'residence' => 'North Kaneshie' ,
        'city' => 'Greater Accra' ,
        'address' => '32 Ade Street'


    ]
];


exit(json_encode($response));