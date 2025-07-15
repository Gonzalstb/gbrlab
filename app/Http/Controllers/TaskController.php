<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $users = User::all();
        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'assigned_to' => 'required|exists:users,id',
            'priority' => 'required',
            'estimated_time' => 'nullable|integer|min:0',
            'spent_time' => 'nullable|integer|min:0',
            // Puedes agregar más validaciones según tu modelo
        ]);
        $task = Task::findOrFail($id);
        $task->update($validated);
        return redirect()->route('tasks.index')->with('success', __('Tarea actualizada correctamente.'));
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', __('Tarea eliminada correctamente.'));
    }

    public function create()
    {
        return view('tasks.create');
    }
}
