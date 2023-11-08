<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Project extends Model 
{
    use HasFactory; 
 	use Searchable;
	
	protected $fillable = ['name','type','sdate','edate','status','description','client_id','username'];

	public function saveProject($data)
	{
		$this->name = $data['name'];
		$this->type = $data['type'];		
		$this->sdate = $data['sdate'];	
		$this->edate = $data['edate'];
		$this->status = $data['status'];
		$this->description = $data['description'];
		$this->client_id = $data['client_id'];		
		$this->username = auth()->user()->name;	
		$this->save();
			return 1;
	}

	public function updateProject($data)
	{
		$pj = $this::find($data['id']);
		$pj->name = $data['name'];	
		$pj->type = $data['type'];		
		$pj->sdate = $data['sdate'];	
		$pj->edate = $data['edate'];
		$pj->status = $data['status'];
		$pj->description = $data['description'];
		$pj->client_id = $data['client_id'];	
		$pj->username = auth()->user()->name;	
		$pj->save();
			return 1;
	}
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'project_index';
    }
     /**
     * Get the client that owns the project.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    } 
	 	
}
