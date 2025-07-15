<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class KanbanController extends Controller
{
    public function index()
    {
        $tasks = Task::with('assignedTo')->get();
        return view('welcome', [
            'kanbanTasks' => $tasks,
        ]);
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'status' => 'required|string',
        ]);
        $task = Task::findOrFail($request->task_id);
        $task->status = $request->status;
        $task->save();
        return response()->json(['success' => true]);
    }
} 