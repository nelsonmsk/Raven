<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Message extends Model
{
    use HasFactory; 
	use Searchable;	
    
	protected $fillable = ['name','email','subject','message','username'];

	public function saveMessage($data)
	{
		$this->name = $data['name'];
		$this->email = $data['email'];
		$this->subject = $data['subject'];	
		$this->message = $data['message'];		
		$this->username = auth()->user()->name;
		$this->save();
			return 1;
	}

	public function updateMessage($data)
	{
		$ms = $this::find($data['id']);
		$ms->name = $data['name'];
		$ms->email = $data['email'];
		$ms->subject = $data['subject'];	
		$ms->message = $data['message'];	
		$rs->username = auth()->user()->name;
		$rs->save();
			return 1;
	}
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'message_index';
    }	
}
