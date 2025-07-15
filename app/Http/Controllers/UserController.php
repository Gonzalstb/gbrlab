<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load(['tasks', 'assignedTasks']);
        return view('users.show', compact('user'));
    }
}
