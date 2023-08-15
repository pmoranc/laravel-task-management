<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all()->sortBy('priority');
        $projects = Task::distinct('project')->pluck('project')->sortBy('project');
        return view('index', compact('tasks', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'priority' => 'required|integer',
            'project' => 'required',
        ]);

        $task = Task::create($request->all());

        if ($task) {
            session()->flash('success', 'Task ' . $request->name . ' saved successfully!');
            return redirect()->route('tasks.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        // return view('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if (empty($task)) {
            session()->flash('error', 'Task not found!');
            return redirect()->route('tasks.index');
        }

        return view('edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'name' => 'required',
            'priority' => 'required|integer',
        ]);

        $task = $task->update($request->all());

        if ($task) {
            session()->flash('success', 'Task ' . $request->name . ' updated successfully!');
            return redirect()->route('tasks.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if (empty($task)) {
            session()->flash('error', 'Task not found!');
            return redirect()->route('tasks.index');
        }

        if ($task->delete()) {
            session()->flash('success', 'Task deleted successfully!');
        } else {
            session()->flash('error', 'Error!');
        }

        return redirect()->route('tasks.index');
    }
}
