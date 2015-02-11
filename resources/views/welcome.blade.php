@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-md-12" style="text-align: center; padding-top: 30%; color: #fff;">
    <h1>Welcome to TODOParrot</h1>
    <p>
    Yes we're another TODO list startup, but with tropical theming!
    </p>

    @if (! Auth::check())
      <a href="/auth/register" class="btn btn-primary">Create an account</a>
    @else
      <a href="{{ URL::route('lists.index') }}" class="btn btn-primary">View Your Lists</a>
    @endif
  </div>
</div>

@stop