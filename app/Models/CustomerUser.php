<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CustomerUser extends Pivot
{
    use HasFactory;

	protected $fillable = ['customer_id','user_id'];
	
}
