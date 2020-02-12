<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Notifications\Messages\BroadcastMessage;


use App\User;

class NewComment extends Notification 
{
    ///use Queueable; implements ShouldQueue
    
    protected $post_info ;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $post_info)
    {
        $this->post_info = $post_info ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
 
    }

    /**
     * Get the array representation of the notification.
     *notice:  we can use ''toDatabase'' if we cant save in database and send to user 
     * or ''toArray'' if want juste send to user without saving on database
     * @param  mixed  $notifiable
     * @return array
     */
    
    public function toArray($notifiable)
    { 
     
        return [
           
            'user' => auth()->user()->name ,
            'thead' => $this->post_info
            
        ];

         
    }

    public function toDatabase($notifiable)
    { 
     //  dd($this->post_info->name);
        return [
           
            'user' => auth()->user()->name ,
            'thead' => $this->post_info
            
        ];

        //'title' => $this->comment  
    }

    public function toBroadcast($notifiable)
    {
       return new BroadcastMessage([
           'user' => auth()->user()->name ,
           'thead' => $this->post_info
       ]);
    }


   

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
   /*
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }
*/
    

    
    
    
}
