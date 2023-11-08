<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Laravel\Scout\Searchable;

class Task extends Pivot
{
    use HasFactory;
 	use Searchable;

	protected $fillable = ['name','description','project_id','user_id'];
	
    /**
     * Get the index name for the model.
    */
    public function searchableAs()
    {
        return 'task_index';
    }
	
}
