<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Order;
use App\AppDefaults;

class OrderShipped extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
	

     /* The order instance.
     *
     * @var \App\Models\Order
     */
    public $order;
	public $appdefaults;
    public $data;
	
    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function __construct(Order $order, AppDefaults $appdefaults, Array $data )
    {
        $this->order = $order;
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
		$appdefaults = $this->appdefaults;
		
        return $this->view('emails.orders.shipped.preview',compact('mail','appdefaults'));
    }
}
