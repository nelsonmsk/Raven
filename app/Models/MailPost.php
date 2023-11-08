<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class MailPost extends Model
{
    use HasFactory; 
	use Searchable;	
	
	protected $fillable = ['to','cc','from','subject','message','image','imagePath','status','username'];

	public function saveMailPost($data)
	{
		$this->to = $data['to'];
		$this->cc = $data['cc'];	
		$this->from = auth()->user()->email;	
		$this->subject = $data['subject'];
		$this->message = $data['message'];
		$this->image = $data['image'];
		$this->imagePath = $data['imagePath'];
		$this->status = $data['status'];	
		$this->username = auth()->user()->name;		
		$this->save();
			return 1;
	}

	public function updateMailPost($data)
	{
		$mp = $this::find($data['id']);
		$mp->to = $data['to'];
		$mp->cc = $data['cc'];	
		$mp->from = auth()->user()->email;	
		$mp->subject = $data['subject'];
		$mp->message = $data['message'];
		$mp->image = $data['image'];
		$mp->imagePath = $data['imagePath'];
		$mp->status = $data['status'];	
		$mp->username = auth()->user()->name;	
		$mp->save();
			return 1;
	}
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'mailPost_index';
    }	
}
