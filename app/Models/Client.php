<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Client extends Model
{
    use HasFactory;	
	use Searchable;	
	
	protected $fillable = ['name','email','phone','address','city','country','username'];

	public function saveClient($data)
	{	
		$this->name = $data['name'];
		$this->email = $data['email'];
		$this->phone = $data['phone'];
		$this->address = $data['address'];
		$this->city = $data['city'];
		$this->country = $data['country'];	
		$this->username = auth()->user()->name;	
		$this->save();
			return 1;
	}

	public function updateClient($data)
	{
		$cs = $this::find($data['id']);
		$cs->name = $data['name'];
		$cs->email = $data['email'];
		$cs->phone = $data['phone'];
		$cs->address = $data['address'];
		$cs->city = $data['city'];
		$cs->country = $data['country'];	
		$cs->username = auth()->user()->name;	
		$cs->save();
			return 1;
	}
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'client_index';
    }	
  /**
     * Get the projects for the client.
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
