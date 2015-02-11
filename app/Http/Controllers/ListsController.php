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
		$list = [];
		return view('lists.index')->withLists($list);
	}

	public function create()
	{
		return view('lists.create');
	}

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

	public function show($id)
	{

		$list = Todolist::find($id);
		return view('lists.show')->withList($list);
	}

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
