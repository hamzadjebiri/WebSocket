<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
   

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

     
    public function boot()
    {


        Broadcast::routes(); //i dont know when i must use this ['middleware' => ['auth:api']]
                             //but if i use it know broadcast will not work

        
        require base_path('routes/channels.php');

        
    }
}
