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

            // if (\Input::get('done') == 'true')
            // {
            //     $done = 1;
            // } else {
            //     $done = 0;
            // }

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
    * Toggle task completion
    *
    */
    public function complete($listId, $taskId)
    {

        $user = User::find(\Auth::id());
        $list = Todolist::find($listId);

        if ($user->owns($listId)) {

            $task = $list->tasks()->where('id', '=', $taskId)->first();

            if ($task->done == true)
            {
            $task->done = false;
            } else {
            $task->done = true;
            }

            $task->save();

            return \Redirect::route('lists.show', [$list->id])
            ->with('message', 'Task updated!');

        } else {

          return \Redirect::route('home')
            ->with('message', 'Authorization error: you do not own this list.');
        
        }

    }

}
