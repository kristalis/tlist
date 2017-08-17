<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'diocese_id', 'branchName',
    ];

    public function centres()
    {
        return $this->belongsTo('App\Diocese','diocese_id');
    }
}
