<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class MessagesReport extends Model
{
    use HasFactory;   
	use Searchable;
	
	protected $fillable = ['title','subtitle','fromdate','todate','subject','subsquery','username'];

	public function saveMessagesReport($data)
	{
		$this->title = $data['title'];
		$this->subtitle = $data['subtitle'];
		$this->fromdate = $data['fromdate'];
		$this->todate = $data['todate'];
		$this->subject = $data['subject'];	
		$this->subsquery = $data['subsquery'];
		$this->username = auth()->user()->name;		
		$this->save();
			return 1;
	}

	public function updateMessagesReport($data)
	{
		$sr = $this::find($data['id']);
		$sr->title = $data['title'];
		$sr->subtitle = $data['subtitle'];
		$sr->fromdate = $data['fromdate'];
		$sr->todate = $data['todate'];
		$sr->subject = $data['subject'];	
		$sr->subsquery = $data['subsquery'];	
		$sr->username = auth()->user()->name;	
		$sr->save();
			return 1;
	}
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'messageReport_index';
    }	
}
