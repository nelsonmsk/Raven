<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ClientsReport extends Model
{
    use HasFactory; 
	use Searchable;	
	
	protected $fillable = ['title','subtitle','fromdate','todate','city','country','subsquery','username'];

	public function saveClientsReport($data)
	{
		$this->title = $data['title'];
		$this->subtitle = $data['subtitle'];
		$this->fromdate = $data['fromdate'];
		$this->todate = $data['todate'];
		$this->city = $data['city'];
		$this->country = $data['country'];
		$this->subsquery = $data['subsquery'];
		$this->username = auth()->user()->name;		
		$this->save();
			return 1;
	}

	public function updateClientsReport($data)
	{
		$cr = $this::find($data['id']);
		$cr->title = $data['title'];
		$cr->subtitle = $data['subtitle'];
		$cr->fromdate = $data['fromdate'];
		$cr->todate = $data['todate'];
		$cr->city = $data['city'];
		$cr->country = $data['country'];	
		$cr->subsquery = $data['subsquery'];	
		$cr->username = auth()->user()->name;	
		$cr->save();
			return 1;
	}
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'clientsReport_index';
    }	
}
