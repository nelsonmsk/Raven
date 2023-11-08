<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;
use App\Models\AppDefaults;

class CreateMessage extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

     /* The message instance.
     *
     * @var \App\Models\Message
     */
    public $messages;
	public $appdefaults;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $messages, AppDefaults $appdefaults, Array $data)
    {
        $this->messages = $messages;
		$this->appdefaults = $appdefaults;
		$this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       	$mail = $this->data;
       	//$messages = $this->messages;		
		$appdefaults = $this->appdefaults;
		
        return $this->view('emails.messages.preview',compact('mail','appdefaults'));
    }
}

