<?php namespace Todoparrot;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $fillable = ['name', 'due', 'done'];

	/**
	 * Every task belongs to a Todolist
	 * 
	 */
	public function Todolist()
	{
	  return $this->belongsTo('Todoparrot\Todolist');
	}

}
