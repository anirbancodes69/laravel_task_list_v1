@extends('layouts.app')

@section('heading', $task->title)

@section('content')
<p>{{$task->description}}</p>
@isset($task->long_description)
<p>{{$task->long_description}}</p>
@endisset
<p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>
<div>
    <form action="{{route('tasks.destroy', ['task' => $task])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
@endsection