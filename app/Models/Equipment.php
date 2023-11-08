<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Equipment extends Model
{
    use HasFactory;
	use Searchable;	
	
	protected $fillable = ['name','description','pageId','image','imagePath','username'];

	public function saveEquipment($data)
	{
		$this->name = $data['name'];
		$this->description = $data['description'];
		$this->pageId = $data['pageId'];
		$this->image = $data['image'];
		$this->imagePath = $data['imagePath'];	
		$this->username = auth()->user()->name;	
		$this->save();
			return 1;
	}

	public function updateEquipment($data)
	{
		$sv = $this::find($data['id']);
		$sv->name = $data['name'];
		$sv->description = $data['description'];
		$sv->pageId = $data['pageId'];
		$sv->image = $data['image'];
		$sv->imagePath = $data['imagePath'];	
		$sv->username = auth()->user()->name;	
		$sv->save();
			return 1;
	}
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'equipment_index';
    }	
}
