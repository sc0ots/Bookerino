<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Events\chatboxevent;   
class ChatboxController extends Controller
{
        
public function index1()
{
    $messages= Messages::all();
    return view('messages   ',compact('messages')); 

}
public function postSendMessage(Request $request){
    $messages = Messages :: create($request->all());
    event(
        $e = new chatboxevent($messages)


    );
    return redirect()->back();

}

}
