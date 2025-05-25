@extends('layouts.app')

@section('heading', 'Add Task')

@section('content')
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <div>
        <label for="title">
            Title
        </label>
        <input text="text" name="title" id="title" value="{{old('title')}}" />
        @error('title')
        <div id="error-message">{{$message}}</div>
        @enderror
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5">{{old('description')}}</textarea>
        @error('description')
        <div id="error-message">{{$message}}</div>
        @enderror
    </div>

    <div>
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" rows="10">{{old('long_description')}}</textarea>
        @error('long_description')
        <div id="error-message">{{$message}}</div>
        @enderror
    </div>

    <div>
        <button type="submit">Add Task</button>
    </div>
</form>
@endsection