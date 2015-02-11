@extends('layouts.master')

@section('content')
<div class="col-md-6">
{!! Form::open(array('route' => 'lists.store', 'class' => 'form')) !!}
    
<h2>Create a TODO List</h2>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
 
<div class="form-group">
    {!! Form::label('Your List Name') !!}
    {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'List Name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your List Description') !!}
    {!! Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Enter a short description')) !!}
</div>
 
<div class="form-group">
    {!! Form::submit('Create List!', array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
</div>

@endsection
