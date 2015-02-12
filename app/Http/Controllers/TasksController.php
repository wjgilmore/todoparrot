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
        $user = User::find(\Auth::id());
        if ($user->owns($listId))
        {
            $list = Todolist::findOrFail($listId);
            return view('tasks.create')->with('list', $list);
        } else {
            
        }
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

            $list = Todolist::findOrFail($listId);

            $task = new Task(array(
                'name' => $request->get('name'),
                'due' => $request->get('due'),
                'done' => true ? $request->get('done') == 'true' : false
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
    public function edit($listId, $taskId)
    {

        $user = \Auth::user();
        $task = Task::findOrFail($taskId);

        if ($user->owns($task->todolist->id))
        {
            return view('tasks.edit')->with('task', $task);
        } else {
            return \Redirect::route('lists.index')
                ->with('message', 'Permissions error!');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($listId, $taskId, TaskCreateFormRequest $request)
    {
        
        $user = \Auth::user();
        $task = Task::find($taskId);

        if ($user->owns($task->todolist->id))
        {

            $task->update([
                'name' => $request->get('name'), 
                'due' => $request->get('due'),
                'done' =>  true ? $request->get('done') == 'true' : false                
            ]);

            return \Redirect::route('lists.tasks.edit', 
                array($task->todolist->id, $task->id))->with('message', 'Your task has been updated!');

        } else {

            return \Redirect::route('lists.index')
                ->with('message', 'Permissions error!');
        
        }        

    }

    /**
     * Delete a task
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($listId, $taskId)
    {

        $user = \Auth::user();

        $task = Task::findOrFail($taskId);

        $list = Todolist::findOrFail($task->todolist->id);

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
        $list = Todolist::findOrFail($listId);

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
