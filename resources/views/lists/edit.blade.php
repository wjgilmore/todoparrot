@extends('layouts.master')

@section('content')
<div class="col-md-6">
{!! Form::model($list, array('method' => 'put', 'route' => ['lists.update', $list->id], 'class' => 'form')) !!}
    
<h2>Update a TODO List</h2>

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
 
<div class="form-group">
    {!! Form::label('Your List Name') !!}
    {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'List Name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your List Description') !!}
    {!! Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Enter a short description')) !!}
</div>
 
<div class="form-group">
    {!! Form::submit('Update List!', array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
</div>

@endsection

