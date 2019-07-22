<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Project;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Request;

class HomeController
{
    public function index(Request $request)
    {
        $projects = Project::with('tasks')
            ->with('team_members')
            ->with('team_members')
            ->get();

        $tasks = Task::all();

        $users = User::all();

        $clients = Client::all();

       $completed_task = $tasks->where('status_id', 4);

        return view('theme.laravel.dashboard', compact('tasks', 'projects', 'users', 'clients' ));
    }
}
