<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model
{
  	protected $guarded = [];
	protected $fillable = ['id', 'owner_id', 'title', 'description', 'completed'];

	public function owner()
	{
		return $this->belongsTo('App\User','owner_id');
	}

    public function getTotalTask()
    {
       $totaltasklist= $this::get()->count();
       return $totaltasklist;
    }

     public function getCompletedTask()
    {
      $completedtasklist= $this::get()->where('completed', 1);
      return $completedtasklist;
    }
}
