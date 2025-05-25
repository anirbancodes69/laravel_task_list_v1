@extends('layouts.app')

@section('heading', $task->title)

@section('content')
<p>{{$task->description}}</p>
@isset($task->long_description)
<p>{{$task->long_description}}</p>
@endisset
<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>
<p>
    @if ($task->completed)
    Completed
    @else
    Not Completed
    @endif
</p>
<div>
    <a href="{{route('tasks.edit', ['task' => $task])}}">Edit</a>
</div>
<div>
    <form action="{{route('tasks.toogle', ['task' => $task])}}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit">Mark as {{ $task->completed ? 'not completed' : 'completed' }}</button>
    </form>
</div>
<div>
    <form action="{{route('tasks.destroy', ['task' => $task])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
@endsection