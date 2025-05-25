@extends('layouts.app')

@section('heading', 'Task List')

@section('content')
@forelse ($tasks as $task)
<div> <a href="{{route('tasks.show', ['task' => $task])}}">{{$task->title}}</a></div>
@empty
<div>No Tasks</div>
@endforelse
@endsection