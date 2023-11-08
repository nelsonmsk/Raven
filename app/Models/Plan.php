<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Plan extends Model
{
    use HasFactory; 
	use Searchable;
    
	protected $fillable = ['name','description','price','duration','pageId','username'];

	public function savePlan($data)
	{
		$this->name = $data['name'];
		$this->description = $data['description'];
		$this->price = $data['price'];
		$this->duration = $data['duration'];		
		$this->pageId = $data['pageId'];	
		$this->username = auth()->user()->name;	
		$this->save();
			return 1;
	}

	public function updatePlan($data)
	{
		$pn = $this::find($data['id']);
		$pn->name = $data['name'];
		$pn->description = $data['description'];
		$pn->price = $data['price'];
		$pn->duration = $data['duration'];		
		$pn->pageId = $data['pageId'];	
		$pn->username = auth()->user()->name;	
		$pn->save();
			return 1;
	}
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'plan_index';
    }	
}
