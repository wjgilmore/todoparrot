<?php namespace Todoparrot;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Todoparrot\Todolist;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/*
	* Each user can have one or more lists
	*
	*/
	public function lists()
	{
		return $this->hasMany('Todoparrot\Todolist');
	}

	/**
	 * Determines if the user owns a particular list
	 * @param  integer $listId
	 * @return Boolean
	 */
	public function owns($listId)
	{

		$list = Todolist::find($listId);

		if ($list->user_id == $this->id)
		{
			return true;
		} else {
			return false;
		}

	}

}
