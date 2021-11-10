<?php

namespace App\Http\Controllers\Chatbot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacebookChatbotController extends Controller
{
    //method to return facebook chatbot screen
    public function facebook_chatbot(){
        return view('pages.chatbot.facebook_chatbot');
    }
}
