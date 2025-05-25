<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

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
    Route::post('/', function (Request $request) {
        $task = Task::create($request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'required',
        ]));

        return redirect()->route('tasks.show', ['task' => $task]);
    })->name('tasks.store');
});



// -*- This is a fallback
Route::fallback(function () {
    return "Page not found!";
});
