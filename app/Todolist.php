<?php namespace Todoparrot;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model {

    protected $fillable = ['name', 'description'];

    private $rules = [
        'name' => 'required',
        'description' => 'required'
    ];

    public function validate() 
    {

        $v = \Validator::make($this->attributes, $this->rules);
        if ($v->passes()) return true;
        $this->errors = $v->messages();
        return false;

    }

    /**
    * Each list is owned by a registered user.
    *
    */
    public function user()
    {
      return $this->belongsTo('Todoparrot\User');
    }

    /**
    * Each list can be associated with one or more tasks.
    *
    */
    public function tasks()
    {
    return $this->hasMany('Todoparrot\Task');
    }

    /**
     * Every list belongs to a Category
     * 
     */
    public function Category()
    {
      return $this->belongsTo('Todoparrot\Category');
    }

    /**
    * Calculate the number of incomplete tasks
    *
    */
    public function remainingTasks()
    {

        $completed = $this->tasks()->where('done', '=', 1)->count();
        $total = $this->tasks()->count();

        return $total - $completed;

    }

}
