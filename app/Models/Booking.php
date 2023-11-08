<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Booking extends Model
{
    use HasFactory; 
	use Searchable;	
	
	protected $fillable = ['dor','rtime','partySize','cName','cPhone','email','status','username'];

	public function saveBooking($data)
	{
		$this->dor = $data['dor'];
		$this->rtime = $data['rtime'];
		$this->partySize = $data['partySize'];
		$this->cName = $data['cName'];
		$this->cPhone = $data['cPhone'];
		$this->email = $data['email'];	
		$this->status = $data['status'];	
		$this->username = auth()->user()->name;
		$this->save();
			return 1;
	}

	public function updateBooking($data)
	{
		$rs = $this::find($data['id']);
		$rs->dor = $data['dor'];
		$rs->rtime = $data['rtime'];
		$rs->partySize = $data['partySize'];
		$rs->cName = $data['cName'];
		$rs->cPhone = $data['cPhone'];
		$rs->email = $data['email'];	
		$rs->status = $data['status'];	
		$rs->username = auth()->user()->name;
		$rs->save();
			return 1;
	}
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'booking_index';
    }	
}
