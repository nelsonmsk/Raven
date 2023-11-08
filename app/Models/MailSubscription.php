<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class MailSubscription extends Model
{
  use HasFactory,Notifiable,Searchable;
  
	protected $fillable = ['email','status','username'];

	public function saveMailSubscription($data)
	{
		$this->email = $data['email'];	
		$this->status = $data['status'];	
		$this->username = auth()->user()->name;	
		$this->save();
			return 1;
	}

	public function updateMailSubscription($data)
	{
		$sb = $this::find($data['id']);
		$sb->email = $data['email'];	
		$sb->status = $data['status'];	
		$sb->username = auth()->user()->name;	
		$sb->save();
			return 1;
	}
	
   /**
     *Route notification to the subscriber.
     */	
	public function routeNotificationForMail($notification)
	{
	   // Return email address only
		return $this->email;

	}	
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'mailSubscription_index';
    }	
}
