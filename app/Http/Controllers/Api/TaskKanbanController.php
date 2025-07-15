<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskKanbanController extends Controller
{
    public function index()
    {
        $tasks = Task::with('assignedTo')->get();
        return response()->json($tasks);
    }
} 