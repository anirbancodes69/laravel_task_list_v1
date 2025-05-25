<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Redirect to task.index route
Route::get('/', function () {
    return redirect()->route('tasks.index');
})->name('home');

Route::prefix('tasks')->group(function () {
    // Task list
    Route::get('/', function () {
        $tasks = \App\Models\Task::latest()->get();
        return view('index', ['tasks' => $tasks]);
    })->name('tasks.index');

    // Create Task
    Route::view('/create', 'create')->name('tasks.create');

    // Single Task
    Route::get('/{task}', function (Task $task) {
        return view("show", ['task' => $task]);
    })->name('tasks.show');

    // Store Task
    Route::post('/', function (TaskRequest $request) {
        $task = Task::create($request->validated());
        return redirect()->route('tasks.show', ['task' => $task])->with('success', 'Task created successfully!');
    })->name('tasks.store');

    //Edit Task
    Route::get('/{task}/edit', function (Task $task) {
        return view('edit', ['task' => $task]);
    });

    // Update Task
    Route::put('/{task}', function (TaskRequest $request, Task $task) {
        $task->update($request->validated());
        return redirect()->route('tasks.show', ['task' => $task])->with('success', 'Task updated successfully!');
    })->name('tasks.update');
});



// -*- This is a fallback
Route::fallback(function () {
    return "Page not found!";
});
