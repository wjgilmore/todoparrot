@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-md-12">

        <div class="row" id="tasks">

            <div class="col-md-6" id="task-form">
            {!! Form::open(
                [
                 'route' => ['lists.tasks.store', $list->id], 
                 'class' => 'form',
                 'id'    => 'task-creation-form',
                 'v-on:submit.prevent'  => 'submitTask',
                 'data-id' => $list->id
                ]) 
            !!}

            <h2>Create a Task ({{ $list->name }})</h2>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    There were some problems with your input.<br />
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <span id="ajax-response" v-if="ajaxRequest">Please Wait ...</span>

            <div class="form-group">
                {!! Form::label('Task Name') !!}
                {!! Form::text('name', null, ['v-model' => 'taskInfo.name', 'class' => 'form-control', 'placeholder' => 'Task Name']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Due Date') !!}
                {!! Form::input('date', 'due', null, ['v-model' => 'taskInfo.due', 'class' => 'form-control', 'placeholder' => date('Y-m-d')]) !!}
            </div>

            <div class="checkbox">
                {!! Form::label('Completed?') !!}
                {!! Form::checkbox('done', 'true', null, ['v-model' => 'taskInfo.done']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create Task!', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
            </div>

            <div class="col-md-6">
            <h2>Your Tasks</h2>

                <div id="task-list">

                  <p v-for="task in tasks" track-by="$index">
                    <a href="/lists/@{{ listId }}/tasks/@{{ task.id }}/edit">@{{ task.name }}</a>
                  </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection