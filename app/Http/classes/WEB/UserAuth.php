<?php

namespace App\Http\classes\WEB;

use Illuminate\Support\Facades\Session;

class UserAuth
{
    public static function getDetails()
    {
        if (!is_null(session()->get('user')) )
        {
            return session()->get('user');
        }else{
            return 'hellss';
        }
        // return 'HEY';
    }
}
