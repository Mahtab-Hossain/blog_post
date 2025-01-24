<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    // Method to create a new task
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Create a new task with the validated data
        $task = Task::create($request->all());

        // Return the created task as JSON with a 201 status code
        return response()->json($task, 201);
    }

    // Method to update a task's completion status
    public function update(Request $request, $id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);

        // Update the task with the request data
        $task->update($request->all());

        // Return the updated task as JSON
        return response()->json($task);
    }

    // Method to get all pending tasks
    public function pending()
    {
        // Return all tasks where is_completed is false as JSON
        return response()->json(Task::where('is_completed', false)->get());
    }
}
