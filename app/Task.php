<?php namespace Todoparrot;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	//

	public function Todolist()
	{
	  return $this->belongsTo('Todoparrot\Todolist');
	}

}
