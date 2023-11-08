<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\MailSubscription;

class MailSubscriptionReceived extends Notification implements ShouldQueue
{
    use Queueable;
	
     /* The mailsubscription instance.
     *
     * @var \App\Models\Subscription
     */ 
    public $mailSubscription;
	
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(MailSubscription $mailSubscription)
    {
        $this->mailSubscription = $mailSubscription;
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
		
		  $url = url('/subscription/'.$this->mailSubscription->id);
		  
        return (new MailMessage)
					->greeting('Hie  ' .$this->mailSubscription->email)
                    ->line('We have received your subscription request!')
	                ->line('Please click the button below to activate your subscription!')				
                    ->action('Activate Subscription', $url)
                    ->line('Thank you for subscribing to our weekly newsletter!');					
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
                  'mailsubscription_id' => $this->mailSubscription->id,
                  'mailsubscription_email' => $this->mailSubscription->email,
                  'mailsubscription_status' => $this->mailSubscription->status,				  
        ];
    }
}
