<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Banner extends Model
{
	use HasFactory;
	use Searchable;
	
	protected $fillable = ['heading','subheading','body','pageId','username'];

	public function saveBanner($data)
	{
		$this->heading = $data['heading'];
		$this->subheading = $data['subheading'];		
		$this->body = $data['body'];	
		$this->pageId = $data['pageId'];	
		$this->username = auth()->user()->name;	
		$this->save();
			return 1;
	}

	public function updateBanner($data)
	{
		$bn = $this::find($data['id']);
		$bn->heading = $data['heading'];
		$bn->subheading = $data['subheading'];		
		$bn->body = $data['body'];		
		$bn->pageId = $data['pageId'];	
		$bn->username = auth()->user()->name;	
		$bn->save();
			return 1;
	}
	
    /**
     * Get the index headinger for the model.
    */
    public function searchableAs()
    {
        return 'banner_index';
    }
}
