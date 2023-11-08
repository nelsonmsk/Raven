<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProjectsReport extends Model
{
    use HasFactory; 
	use Searchable;
	
	protected $fillable = ['title','subtitle','sdate','edate','status','subsquery','username'];

	public function saveProjectsReport($data)
	{
		$this->title = $data['title'];
		$this->subtitle = $data['subtitle'];
		$this->sdate = $data['sdate'];
		$this->edate = $data['edate'];
		$this->status = $data['status'];	
		$this->subsquery = $data['subsquery'];
		$this->username = auth()->user()->name;		
		$this->save();
			return 1;
	}

	public function updateProjectsReport($data)
	{
		$sr = $this::find($data['id']);
		$sr->title = $data['title'];
		$sr->subtitle = $data['subtitle'];
		$sr->sdate = $data['sdate'];
		$sr->edate = $data['edate'];
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
        return 'projectsReport_index';
    }	
}
