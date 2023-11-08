<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Profile extends Model
{   
    use HasFactory; 
	use Searchable;
	
	protected $fillable = ['name','email','phone','title','bio','address','facebook','twitter','instagram','linkedin'];

	public function saveProfile($data)
	{
		$this->name = $data['name'];
		$this->email = $data['email'];
		$this->phone = $data['phone'];
		$this->title = $data['title'];
		$this->bio = $data['bio'];
		$this->address = $data['address'];
		$this->facebook = $data['facebook'];
		$this->twitter = $data['twitter'];
		$this->instagram = $data['instagram'];
		$this->linkedin = $data['linkedin'];
		$this->user_id = $data['user_id'];
		$this->save();
			return 1;
	}

	public function updateProfile($data)
	{
		$pf = $this::find($data['id']);
		$pf->name = $data['name'];
		$pf->email = $data['email'];
		$pf->phone = $data['phone'];
		$pf->title = $data['title'];
		$pf->bio = $data['bio'];
		$pf->address = $data['address'];
		$pf->facebook = $data['facebook'];
		$pf->twitter = $data['twitter'];
		$pf->instagram = $data['instagram'];
		$pf->linkedin = $data['linkedin'];
		$pf->user_id = $data['user_id'];		
		$pf->save();
			return 1;
	}
    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'profile_index';
    }	
}
