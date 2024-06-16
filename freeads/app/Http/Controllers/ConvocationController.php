<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

// use App\Http\Controllers\Auth;


class ConvocationController extends Controller
{
    public function index():View{
        return view('mesConversation');
    }
    public function newConvo($id){
        $user = auth()->user()->id;
        $convocation = Conversation::create([
            'from' => $user,
            'to' =>(int)$id,
        ]);
        $message = Message::create([
            'user_id' => $user,
            'convers_id'=>$convocation->id,
            'content'=>"Bonjour, votre offre m'intéresse",
        ]);
        return view('mesConversation');
    }

}
