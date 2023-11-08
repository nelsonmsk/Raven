<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Support extends Model
{
    use HasFactory;
	use Searchable;
	
	protected $fillable = ['type','title','question','answer','video','username'];

	public function saveSupport($data)
	{
		$this->type = $data['type'];
		$this->title = $data['title'];
		$this->question = $data['question'];		
		$this->answer = $data['answer'];
		$this->video = $data['video'];		
		$this->username = auth()->user()->name;	
		$this->save();
			return 1;
	}

	public function updateSupport($data)
	{
		$sp = $this::find($data['id']);
		$sp->type = $data['type'];
		$sp->title = $data['title'];
		$sp->question = $data['question'];		
		$sp->answer = $data['answer'];
		$sp->video = $data['video'];	
		$sp->username = auth()->user()->name;	
		$sp->save();
			return 1;
	}
	
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'support_index';
    }	
}
