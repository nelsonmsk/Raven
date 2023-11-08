<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class UsersReport extends Model
{
    use HasFactory; 
	use Searchable;	
	
	protected $fillable = ['title','subtitle','fromdate','todate','type','subsquery','username'];

	public function saveUsersReport($data)
	{
		$this->title = $data['title'];
		$this->subtitle = $data['subtitle'];
		$this->fromdate = $data['fromdate'];
		$this->todate = $data['todate'];
		$this->type = $data['type'];	
		$this->subsquery = $data['subsquery'];
		$this->username = auth()->user()->name;		
		$this->save();
			return 1;
	}

	public function updateUsersReport($data)
	{
		$sr = $this::find($data['id']);
		$sr->title = $data['title'];
		$sr->subtitle = $data['subtitle'];
		$sr->fromdate = $data['fromdate'];
		$sr->todate = $data['todate'];
		$sr->type = $data['type'];	
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
        return 'usersReport_index';
    }	
}
