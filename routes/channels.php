<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/



//hnaya rani habe user whdb rk li yasma3 la chaine c pour ca dirte App.User.{id}
//lkn habite ndire chat par exemple lzm nremplacer id hada b clé li ikoun ghire bine les personnes li rahoum dakhel chat
//par exemple ki lancer bine 2 personnes nmade kl whd fihoum le mm clé mais unique pour ces 2 personnes
//yaani 2 autres personnes andhoum autre clé hadi 3la hsabe wch fhmte waleh a3lem

//user in function he is who try to auth , $id : kima 9lte clé unique f le cas hada rah ikoun kima user->id 
//psk ani habe chaque user iconnecter f channel dyalou

// for notifications
Broadcast::channel('App.User.{id}', function ($user , $id) {

    return  (int) $user->id ===  (int) $id ; // App\post::select('author_id')->where('author_id', $id)->first()->id ; 
   
});


// for comments
Broadcast::channel('post.{id}', function ($user , $id) {
    return  (int) $user->id !== $id; //lkn ndire return true => jmi3 whd rahu login ya9der yasmaa la chaine hadi
});

// here the channel of all client on my site ( we dont need to login to listen on this channel )
/* jamais essayer cette methode mais allahou a3lem tmchi
Broadcast::channel('post', function () {
    return true  ;
});
*/


/* only user who loged in who can access :

Broadcast::channel('post.{id}', function ($user) {
    return true  ;
});
*/
