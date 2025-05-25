@extends('layouts.app')

@section('heading', 'Task List')

@section('content')
<div>
    <a href="{{route('tasks.create')}}">Add Task</a>
</div>
@forelse ($tasks as $task)
<div> <a href="{{route('tasks.show', ['task' => $task])}}">{{$task->title}}</a></div>
@empty
<div>No Tasks</div>
@endforelse

@if ($task->count())
<nav>
    {{$tasks->links()}}
</nav>
@endif

@endsection