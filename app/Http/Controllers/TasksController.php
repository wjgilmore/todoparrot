<?php namespace Todoparrot\Http\Controllers;

use Todoparrot\Http\Requests;
use Todoparrot\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Todoparrot\Todolist;
use Todoparrot\User;
use Todoparrot\Task;
use Todoparrot\Http\Requests\TaskCreateFormRequest;

class TasksController extends Controller {

    /**
     * Make sure the user is authenticated.
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Present the form used to create a new task
     * 
     * @param integer $listId The candidate task's parent list ID
     * @return Response
     */
    public function create($listId)
    {
        $list = Todolist::find($listId);
        return view('tasks.create')->with('list', $list);
    }

    /**
     * Save a newly created task
     * @param  integer $listId The new task's parent list ID
     * @param  TaskCreateFormRequest
     * @return Response
     */
    public function store($listId, TaskCreateFormRequest $request)
    {

        $user = User::find(\Auth::id());

        if ($user->owns($listId)) {

            $list = Todolist::find($listId);

            $task = new Task(array(
                'name' => \Input::get('name'),
                'due' => \Input::get('due'),
                'done' => true ? \Input::get('done') == 'true' : false
            ));

            $task = $list->tasks()->save($task);

            return \Redirect::route('lists.show', array($list->id))
                ->with('message', 'Your task has been created!');

        } else {

            return \Redirect::route('home')
                ->with('message', 'Authorization error: you do not own this list.');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Delete a task
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        $user = \Auth::user();

        $task = Task::find($id);

        $list = Todolist::find($task->todolist_id);

        if ($user->owns($list->id)) {

            $task->delete();

            return \Redirect::route('lists.show', [$list->id])
                ->with('message', 'Task deleted!');

        }

    }

    /**
    * Toggle task completion
    *
    * @param  integer $listId The list ID
    * @param  integer $taskId The task ID
    * @return  Response
    *
    */
    public function complete($listId, $taskId)
    {

        $user = User::find(\Auth::id());
        $list = Todolist::find($listId);

        if ($user->owns($listId)) {

            $task = $list->tasks()->where('id', '=', $taskId)->first();

            $task->done = true ? $task->done == true : false

            $task->save();

            return \Redirect::route('lists.show', [$list->id])
            ->with('message', 'Task updated!');

        } else {

          return \Redirect::route('home')
            ->with('message', 'Authorization error: you do not own this list.');
        
        }

    }



}
