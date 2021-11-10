<?php

namespace App\Http\Controllers\Chatbot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstagramChatbotController extends Controller
{
    //method to return instagram chatbot screen
    public function instagram_chatbot(){
        return view('pages.chatbot.instagram_chatbot');
    }
}
