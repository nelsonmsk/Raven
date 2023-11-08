<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class GalleryImage extends Model
{
    use HasFactory;  
	use Searchable;	
	
	protected $fillable = ['ref_class','ref_id','title','description','image','imagePath','username'];

	public function saveGalleryImage($data)
	{
		$this->ref_class = $data['ref_class'];
		$this->ref_id = $data['ref_id'];
		$this->title = $data['title'];
		$this->description = $data['description'];	
		$this->image = $data['image'];
		$this->imagePath = $data['imagePath'];	
		$this->username = auth()->user()->name;		
		$this->save();
			return 1;
	}

	public function updateGalleryImage($data)
	{
		$gi = $this::find($data['id']);
		$gi->ref_class = $data['ref_class'];
		$gi->ref_id = $data['ref_id'];
		$gi->title = $data['title'];
		$gi->description = $data['description'];	
		$gi->image = $data['image'];
		$gi->imagePath = $data['imagePath'];
		$gi->username = auth()->user()->name;	
		$gi->save();
			return 1;
	}
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'galleryImage_index';
    }	
}
