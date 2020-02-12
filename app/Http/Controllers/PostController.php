<?php

namespace App\Http\Controllers;


use App\Notifications\NewComment ;

use Illuminate\Http\Request;

use App\post ; 

use App\Comment ; 

use App\User ; 

use DB ; 

class PostController extends Controller
{
    public function AddNewPost(Request $request){
           
       $newpost= new post();

       $newpost->author_id = auth()->user()  ; 

       $newpost->title = $request->input('title');

       $newpost->content = $request->input('content');

 
       $newpost->save();

       return response()->json($newpost) ;

      // return response()->json($request->input('Message')) ; 

    }

    public function GetPosts(){
           
        $getpost =  Post::all() ; 
 
        return response()->json($getpost) ;
 
       // return response()->json($request->input('Message')) ; 
 
     }

     public function ReadOnePost($post_id){
           
      $getOnepost =  Post::find($post_id) ; // or use  DB::table('posts')->where('id',$post_id);
     
      return response()->json($getOnepost) ;

     // return response()->json($request->input('Message')) ; 

   }


    public function getComments($post_id){

        $getComment = DB::table('new_comments')->where('post_id',$post_id)->get();

       return response()->json($getComment) ;


    }

    public function AddNewComments(Request $request){

     
      $newcomment= new Comment();

      $newcomment->post_id =  $request->input('post_id');

      $newcomment->comment_content =  $request->input('comment_content'); 

      $newcomment->save();


      //i need to send notification to the user of this post 

      //then check if user has a post because if he dosent i will send null and i will get error
      
      $getPostAuther = User::find($request->input('author_id')) ; 

      if($getPostAuther)  $getPostAuther->notify(new NewComment($request->input('post_id')));

      
       $getpost = post::select('id')->where('author_id', 1)->get() ;

      return response()->json( $newcomment) ;

  }

   
     public function getNotifications(){
          
          
        // auth()->user()->notify(new NewComment(auth()->user()));response()->json()

         return  auth()->user()->unreadNotifications ;
       
     }
}
