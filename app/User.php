<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     

    //broadcasting : comments...etc

    public function broadcastOn()
    {
        return new PrivateChannel('users');//.$this->user->id
    }

    //Notifications :

        public function receivesBroadcastNotificationsOn()
        {
            return 'App.User.'.$this->id ;//.$this->id;
        }
}
