<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Newsletter extends Model
{
    use HasFactory;
	use Searchable;
	
	protected $fillable = ['title','type','summary','created_by','status','published_date','image','imagePath','username'];

	public function saveNewsletter($data)
	{
		$this->title = $data['title'];
		$this->type = $data['type'];		
		$this->summary = $data['summary'];
		$this->created_by = $data['created_by'];	
		$this->status = $data['status'];	
		$this->published_date = $data['published_date'];
		$this->image = $data['image'];
		$this->imagePath = $data['imagePath'];
		$this->username = auth()->user()->name;		
		$this->save();
			return 1;
	}

	public function updateNewsletter($data)
	{
		$mp = $this::find($data['id']);
		$mp->title = $data['title'];
		$mp->type = $data['type'];		
		$mp->summary = $data['summary'];
		$mp->created_by = $data['created_by'];
		$mp->status = $data['status'];			
		$mp->published_date = $data['published_date'];
		$mp->image = $data['image'];
		$mp->imagePath = $data['imagePath'];
		$mp->username = auth()->user()->name;	
		$mp->save();
			return 1;
	}
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'newletter_index';
    }	
}
