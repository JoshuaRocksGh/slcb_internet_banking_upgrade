<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MaileController extends Controller
{
    public function send_email()
    {
        $detail = [
            'title' => 'Mail from Banking',
            'body' => 'This is for testing using gmail'
        ];

        Mail::to('ampahkwabena55@gmail.com')->send(new TestMail($detail));
        return "Email sent";
    }
}
