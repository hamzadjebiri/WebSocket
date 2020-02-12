<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\comments ;

use App\Notifications\NewComment ;

use App\User;

//use Auth;

use Illuminate\Notifications\ChannelManager ;

class chatController extends Controller
{
   
    
     public function test(){

 
       auth()->user()->notify(new NewComment(auth()->user()));

      //dd( auth()->user()->name ) ;

     }
    
    public function sendMessage(Request $request){
       
        event(new comments(auth()->id(), $request->input('Message')  ));

        auth()->user()->notify(new NewComment(auth()->user()));


       // return response()->json($request->input('Message')) ; 

       

    }


}
