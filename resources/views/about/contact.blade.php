@extends('layouts.master')

@section('content')

<h1>Contact TODOParrot</h1>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

{!! Form::open(['route' => 'contact_store', 'class' => 'form']) !!}

<div class="form-group">
    {!! Form::label('Your Name') !!}
    {!! Form::text('name', null, 
        ['class'=>'form-control', 
              'placeholder'=>'Your name']) !!}
</div>

<div class="form-group">
    {!! Form::label('Your E-mail Address') !!}
    {!! Form::text('email', null, 
        ['class'=>'form-control', 
              'placeholder'=>'Your e-mail address']) !!}
</div>

<div class="form-group">
    {!! Form::label('Your Message') !!}
    {!! Form::textarea('message', null, 
        ['class'=>'form-control', 
              'placeholder'=>'Your message']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Contact Us!', 
      ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}

@endsection