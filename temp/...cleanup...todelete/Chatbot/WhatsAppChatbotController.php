<?php

namespace App\Http\Controllers\Chatbot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhatsAppChatbotController extends Controller
{
    //method to return whatsapp chatbot screen
    public function whatsApp_chatbot(){
        return view('pages.chatbot.whatsapp_chatbot');
    }
}
