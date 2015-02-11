<?php namespace Todoparrot\Http\Controllers;

use Todoparrot\Http\Requests;
use Todoparrot\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Todoparrot\Todolist;
use Todoparrot\User;
use Todoparrot\Http\Requests\ListCreateFormRequest;

class ListsController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$lists = User::find(\Auth::id())->lists()->orderBy('created_at', 'desc')->paginate(10);
		return view('lists.index')->withLists($lists);
	}

	/**
	* Presents the list creation form
	*
	*
	*/
	public function create()
	{
		return view('lists.create');
	}

	/**
	 * Creates a new list
	 * @param  ListCreateFormRequest
	 * @return [type]
	 */
	public function store(ListCreateFormRequest $request)
	{

	    $list = new Todolist(array(
	      'name' => \Input::get('name'),
	      'description' => \Input::get('description')
	    ));

	    $user = User::find(\Auth::id());

	    $list = $user->lists()->save($list);

	    return \Redirect::route('lists.show', 
	    	array($list->id))->with('message', 'Your list has been created!');
	
	}

	/**
	 * Displays a specific list
	 * @param  integer
	 * @return [type]
	 */
	public function show($id)
	{

		$list = Todolist::find($id);
		return view('lists.show')->withList($list);
	}

	/**
	 * Presents the list edit form
	 * @param  integer
	 * @return [type]
	 */
	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}
