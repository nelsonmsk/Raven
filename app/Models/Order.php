<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use HasFactory; 
 	use Searchable;
	
	protected $fillable = ['items','subTotal','sRequest','cName','cPhone','cAddress','CEmail','username'];

	public function saveOrder($data)
	{
		$this->items = $data['items'];
		$this->subTotal = $data['subTotal'];
		$this->sRequest = $data['sRequest'];
		$this->cName = $data['cName'];
		$this->cPhone = $data['cPhone'];
		$this->cAddress = $data['cAddress'];
		$this->cEmail = $data['cEmail'];	
		$this->username = auth()->user()->name;;
		$this->save();
			return 1;
	}

	public function updateOrder($data)
	{
		$od = $this::find($data['id']);
		$od->items = $data['items'];
		$od->subTotal = $data['subTotal'];
		$od->sRequest = $data['sRequest'];
		$od->cName = $data['cName'];
		$od->cPhone = $data['cPhone'];
		$od->cAddress = $data['cAddress'];
		$od->cEmail = $data['cEmail'];	
		$od->username = auth()->user()->name;
		$od->save();
			return 1;
	}
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'order_index';
    }	
}
