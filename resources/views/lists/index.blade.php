@extends('layouts.master')

@section('content')

<div class="col-md-12">

  <p>
    <a href="/lists/create" class="btn btn-success">Create a New List</a>
  </p>

<h1>Your Lists</h1>

  @if (count($lists) > 0)

      <table class="table table-striped">
      <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Created On</th>
        <th>Remaining Tasks</th>
        <th></th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      @foreach ($lists as $list)

        <tr>
          <td>
            <a href="{{ URL::route('lists.show', $list->id) }}">{{ $list->name }}</a>
          </td>
          <td>
            {{ $list->description }}
          </td>
          <td>
            {{ date("F d, Y", strtotime($list->created_at)) }}
          </td>
          <td>
            {{ $list->remainingTasks() }} / {{ $list->tasks()->count() }}
          </td>
          <td>
            <a class="btn btn-success" href="{{ URL::route('lists.edit', $list->id) }}">Edit</a>
          </td>
          <td>
            {!! Form::open(array('route' => array('lists.destroy', $list->id), 'method' => 'delete')) !!}
              <button type="submit" class="btn btn-success" href="{{ URL::route('lists.destroy', $list->id) }}" title="Delete list">
              Delete
              </button>
            {!! Form::close() !!}
          </td>
        </tr>

      @endforeach
      </tbody>
      </table>

    {!! $lists->render() !!}

    @else
     <p>
      You haven't created any lists. No time like now! <a href="/lists/create">Create a list</a>
    </p>
    @endif

</div>

@endsection