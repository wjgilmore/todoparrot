@extends('layouts.master')

@section('content')
<div class="col-md-6">
{!! Form::open(array('route' => array('lists.tasks.store', $list->id), 'class' => 'form')) !!}

<h2>Create a Task ({{ $list->name }})</h2>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

<div class="form-group">
    {!! Form::label('Task Name') !!}
    {!! Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Task Name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Due Date') !!}
    {!! Form::input('date', 'due', null, array('class'=>'form-control', 'placeholder' => date('Y-m-d'))) !!}
</div>

<div class="checkbox">
    {!! Form::label('Completed?') !!}
    {!! Form::checkbox('done', 'true') !!}
</div>
<div class="form-group">
    {!! Form::submit('Create Task!', array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
</div>
@stop