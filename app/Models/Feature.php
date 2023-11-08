<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Feature extends Model
{
	use HasFactory;
	use Searchable;
	
	protected $fillable = ['title','body','icon','pageId','username'];

	public function saveFeature($data)
	{
		$this->title = $data['title'];
		$this->body = $data['body'];
		$this->icon = $data['icon'];		
		$this->pageId = $data['pageId'];	
		$this->username = auth()->user()->name;	
		$this->save();
			return 1;
	}

	public function updateFeature($data)
	{
		$ft = $this::find($data['id']);
		$ft->title = $data['title'];
		$ft->body = $data['body'];
		$ft->icon = $data['icon'];		
		$ft->pageId = $data['pageId'];	
		$ft->username = auth()->user()->name;	
		$ft->save();
			return 1;
	}
	
    /**
     * Get the index title for the model.
    */
    public function searchableAs()
    {
        return 'feature_index';
    }
}
