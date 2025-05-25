@extends('layouts.app')

@section('heading', 'Edit Task')

@section('content')
<form method="POST" action="{{route('tasks.update', ['task' => $task])}}">
    @csrf
    @method('PUT')
    <div>
        <label for="title">
            Title
        </label>
        <input text="text" name="title" id="title" value="{{$task->title}}" />
        @error('title')
        <div id="error-message">{{$message}}</div>
        @enderror
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5">{{$task->description}}</textarea>
        @error('description')
        <div id="error-message">{{$message}}</div>
        @enderror
    </div>

    <div>
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" rows="10">{{$task->long_description}}</textarea>
        @error('long_description')
        <div id="error-message">{{$message}}</div>
        @enderror
    </div>

    <div>
        <button type="submit">Update Task</button>
    </div>
</form>
@endsection