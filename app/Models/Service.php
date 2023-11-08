<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Service extends Model
{
    use HasFactory;
	use Searchable;
	
	protected $fillable = ['name','description','icon','pageId','username'];

	public function saveService($data)
	{
		$this->name = $data['name'];
		$this->description = $data['description'];
		$this->icon = $data['icon'];		
		$this->pageId = $data['pageId'];	
		$this->username = auth()->user()->name;	
		$this->save();
			return 1;
	}

	public function updateService($data)
	{
		$sv = $this::find($data['id']);
		$sv->name = $data['name'];
		$sv->description = $data['description'];
		$sv->icon = $data['icon'];		
		$sv->pageId = $data['pageId'];	
		$sv->username = auth()->user()->name;	
		$sv->save();
			return 1;
	}
	
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'service_index';
    }	
}
