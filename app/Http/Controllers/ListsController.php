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
	 * @param  integer $id The list ID
	 * @return Response
	 */
	public function show($id)
	{

		$list = Todolist::find($id);
		return view('lists.show')->withList($list);
	}

	/**
	 * Presents the list edit form
	 * @param  integer $id The list ID
	 * @return Response
	 */
	public function edit($id)
	{
        $list = Todolist::find($id);
        return view('lists.edit')->with('list', $list);
	}

	/**
	 * Update a list
	 * @param  integer $id The list ID
	 * @param  ListCreateFormRequest $request The form request object
	 * @return Response
	 */
	public function update($id, ListCreateFormRequest $request)
	{

        $user = \Auth::user();

        $list = Todolist::find($id);

        if ($user->owns($list->id))
        {

            $list->update([
                'name' => $request->get('name'), 
                'description' => $request->get('description')
            ]);

            return \Redirect::route('lists.edit', 
                array($task->todolist->id))->with('message', 'Your list has been updated!');

        } else {

            return \Redirect::route('lists.index')
                ->with('message', 'Permissions error!');
        
        }  

	}

	/**
	 * Delete a list
	 * @param  integer $id The list ID
	 * @return Response
	 */
	public function destroy($id)
	{

        $user = \Auth::user();

        $list = Todolist::find($id);

        if ($user->owns($list->id)) {

            $list->delete();

            return \Redirect::route('lists.index')
                ->with('message', 'Task deleted!');

        }

	}

}
