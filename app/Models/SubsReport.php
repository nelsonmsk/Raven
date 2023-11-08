<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class SubsReport extends Model
{
    use HasFactory; 
	use Searchable;
	
	protected $fillable = ['title','subtitle','fromdate','todate','status','subsquery','username'];

	public function saveSubsReport($data)
	{
		$this->title = $data['title'];
		$this->subtitle = $data['subtitle'];
		$this->fromdate = $data['fromdate'];
		$this->todate = $data['todate'];
		$this->status = $data['status'];	
		$this->subsquery = $data['subsquery'];
		$this->username = auth()->user()->name;		
		$this->save();
			return 1;
	}

	public function updateSubsReport($data)
	{
		$sr = $this::find($data['id']);
		$sr->title = $data['title'];
		$sr->subtitle = $data['subtitle'];
		$sr->fromdate = $data['fromdate'];
		$sr->todate = $data['todate'];
		$sr->status = $data['status'];	
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
        return 'subsReport_index';
    }	
}
