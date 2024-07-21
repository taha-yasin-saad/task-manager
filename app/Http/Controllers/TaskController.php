<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $tasks = Task::orderBy('priority')->get();
        return view('tasks.index', compact('tasks', 'projects'));
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'project_id' => 'required|exists:projects,id',
        ]);

        $priority = Task::max('priority') + 1;
        Task::create([
            'name' => $request->name,
            'priority' => $priority,
            'project_id' => $request->project_id,
        ]);

        return redirect('/tasks')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'project_id' => 'required|exists:projects,id',
        ]);

        $task->update($request->only('name', 'project_id'));

        return redirect('/tasks')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks')->with('success', 'Task deleted successfully.');
    }

    public function reorder(Request $request)
    {
        $tasks = $request->tasks;

        foreach ($tasks as $index => $taskId) {
            Task::where('id', $taskId)->update(['priority' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }
}
