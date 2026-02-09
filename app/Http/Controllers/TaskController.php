<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Display all tasks for the authenticated user
    public function index()
    {
        $tasks = Auth::user()->tasks; // Only user's tasks
        return view('tasks.index', compact('tasks'));
    }

    // Show create form
    public function create()
    {
        return view('tasks.create');
    }

    // Store new task (validation moved here)
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:Pending,In Progress,Completed',
            'due_date'    => 'nullable|date|after:today',
        ]);

        $data['user_id'] = Auth::id();

        Task::create($data);

        return redirect('/tasks')->with('success', 'Task created successfully.');
    }

    // Show edit form (with ownership check via middleware)
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update task (validation moved here, with ownership check via middleware)
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:Pending,In Progress,Completed',
            'due_date'    => 'nullable|date|after:today',
        ]);

        $task->update($data);

        return redirect('/tasks')->with('success', 'Task updated successfully.');
    }

    // Delete task (with ownership check via middleware)
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks')->with('success', 'Task deleted successfully.');
    }
}
