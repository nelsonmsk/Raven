<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Testimonial extends Model
{
    use HasFactory;
 	use Searchable;
	
	protected $fillable = ['name','title','comment','pageId','username'];

	public function saveTestimonial($data)
	{
		$this->name = $data['name'];
		$this->title = $data['title'];	
		$this->comment = $data['comment'];
		$this->pageId = $data['pageId'];	
		$this->username = auth()->user()->name;	
		$this->save();
			return 1;
	}

	public function updateTestimonial($data)
	{
		$ts = $this::find($data['id']);
		$ts->name = $data['name'];	
		$ts->title = $data['title'];	
		$ts->comment = $data['comment'];
		$ts->pageId = $data['pageId'];	
		$ts->username = auth()->user()->name;	
		$ts->save();
			return 1;
	}
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'testimonial_index';
    }	
}
