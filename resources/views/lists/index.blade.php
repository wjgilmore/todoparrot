@extends('layouts.master')

@section('content')

<div class="col-md-12">
<h1>Your Lists</h1>
  <p>
    <a href="/lists/create">Create a list</a>
  </p>

  @if (count($lists) > 0)
      @foreach ($lists as $list)
      <h3><a href="{{ URL::to('lists/' . $list->id) }}">{{ $list->name }}</a></h3>
      <p>
        {{ $list->description }}<br />
        {{ date("F d, Y", strtotime($list->created_at)) }}<br />
        {{ $list->remainingTasks() }} / {{ $list->tasks()->count() }} tasks remaining
       </p>
      @endforeach

    {!! $lists->links() !!}

    @else
     <p>
      You haven't created any lists. No time like now! <a href="/lists/create">Create a list</a>
    </p>
    @endif

</div>

@endsection