<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Message; 

class MessageReceived extends Notification implements ShouldQueue
{
    use Queueable;
	
    /* The message instance.
     *
     * @var \App\Models\Message	 
     */ 
   
    public $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
		$this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
					->greeting('Hie, ')	
                    ->line('You have received a new email message!')					
                    ->line('From :'.$this->message->email)
                    ->action('View Message', url('/'))
                    ->line('Thank you!');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
                  'message_id' => $this->message->id,
                  'message_name' => $this->message->name,
                  'message_email' => $this->message->email,
                  'message_subject' => $this->message->subject,
                  'message_message' => $this->message->message,
                  'message_created_at' => $this->message->created_at,				  
				  
        ];
    }
}
