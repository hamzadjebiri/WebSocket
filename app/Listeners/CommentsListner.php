<?php

namespace App\Listeners;
use App\Events\comments;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentsListner
{
    /**
     * Remarque :  
     * 
     * ana créete manuellement listner hada mzl mafhmtch exactement whc ndire bihe rani nzreb
     * bch nrégler probléme taa broadcast notification et private channel 
     * 
     * hada dirtou copie coller 3la Accuel listner 
     */
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(comments $event)
    {
        //

        dd( "a acceder a l acculie ");
    }
}
