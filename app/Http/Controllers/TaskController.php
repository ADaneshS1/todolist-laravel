<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('user')->orderBy('created_at','asc')->get();
        return view('task.index', compact('tasks'));
    }

    public function done()
    {
        $tasks = Task::where('is_completed', true)->get();
        return view('task.done', compact('tasks'));
    }

    public function undone()
    {
        $tasks = Task::where('is_completed', false)->get();
        return view('task.undone', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('task.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $new_task = new Task();
        $new_task->user_id = $request->user_id;
        $new_task->task = $request->task;
        $new_task->is_completed = $request->is_completed;
        $new_task->save();
        return redirect('/tasks')->with('success', 'Data added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tasks = Task::with('user')->findOrFail($id);
        return view('task.show', compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $users = User::all();
        return view('task.edit', compact('task', 'users'));
    }

    public function update(UpdateTaskRequest $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->user_id = $request->user_id;
        $task->task = $request->task;
        $task->is_completed = $request->is_completed;
        $task->save();
        return redirect('/tasks')->with('success', 'Data changed successfully!');

    }

     public function delete(string $id)
    {
        $tasks = Task::findOrFail($id);
        return view('task.delete', compact('tasks'));
    }

    public function destroy(string $id)
{
    $task = Task::findOrFail($id);
    $task->delete();

    return redirect('/tasks')->with('success', 'Data deleted successfully!');
}

}
