<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Newsletter;

class NewsletterPublished extends Notification implements ShouldQueue
{
    use Queueable;

     /* The newsletter instance.
     *
     * @var \App\Models\Newsletter	 
     */ 
   
    public $newsletter;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Newsletter $newsletter)
    {
		$this->newsletter = $newsletter;
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
					->greeting('Hie, Subscriber ')		
                    ->line($this->newsletter->summary)
                    ->action('View Newsletter', url('/'))
                    ->line('Thank you for subscribing to our newsletter, Please enjoy reading it!')
					 ->attach( $this->newsletter->imagePath);;
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
                  'newsletter_id' => $this->newsletter->id,
                  'newsletter_title' => $this->newsletter->title,
                  'newsletter_type' => $this->newsletter->type,
                  'newsletter_summary' => $this->newsletter->summary,
                  'newsletter_created_by' => $this->newsletter->created_by,
                  'newsletter_status' => $this->newsletter->status,
                  'newsletter_published_date' => $this->newsletter->published_date,
                  'newsletter_image' => $this->newsletter->image,
                  'newsletter_imagePath' => $this->newsletter->imagePath,
                  'newsletter_username' => $this->newsletter->username,
                  'newsletter_created_at' => $this->newsletter->created_at,				  
				  
        ];
    }
}
