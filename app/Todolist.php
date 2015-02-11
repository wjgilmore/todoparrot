<?php namespace Todoparrot;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model {

	protected $fillable = ['name', 'description'];

	/**
	* Each list is owned by a registered user.
	*
	*/
	public function user()
	{
	  return $this->belongsTo('Todoparrot\User');
	}


}
