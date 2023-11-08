<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
		'type',		
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	protected $salt = '&ty$(';
	protected $spice ='^#fx$';

	public function saveUser($data)
	{
		$this->name = $data['name'];
		$this->email = $data['email'];
		$this->type = $data['type'];		
		$this->password = bcrypt($data['password']);
		$this->save();
			return 1;
	}

	public function updateUser($data)
	{
		$ur = $this::find($data['id']);
		$ur->name = $data['name'];
		$ur->email = $data['email'];
		$ur->type = $data['type'];
		$ur->password = bcrypt($data['password']);
		$ur->save();
			return 1;
	}
	
    public function isAdmin() 
    {
        if($this->type == 'admin')
        {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determines if user is IT-Support or not (true or false)
     *
     * @return boolean
     */
    public function isIT_Support() 
    {
        if($this->type == 'it_support')
        {
            return true;
        } else {
            return false;
        }
    }
	
    /**
     * Determines if user is Sales-Support or not (true or false)
     *
     * @return boolean
     */
    public function isSales_Support() 
    {
        if($this->type == 'sales_support')
        {
            return true;
        } else {
            return false;
        }
    }	
	
    /**
     * Determines if user is Billing-Support or not (true or false)
     *
     * @return boolean
     */
    public function isBilling_Support() 
    {
        if($this->type == 'billing_support')
        {
            return true;
        } else {
            return false;
        }
    }	
	
	
   /**
     *Route notification to the user.
     */	
	public function routeNotificationForMail($notification)
	{
		{   // Return email address only
		return $this->email;
	  }
	  {   // Return both name and email address
			return [$this->email => $this->name];
		}
	}
    /**
     * Get the profile associated with the user.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }	
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'user_index';
    }

}
	

