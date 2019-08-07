<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests\MassDestroyTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Project;
use App\ProjectSubType;
use App\Task;
use App\TaskStatus;
use App\TastCategory;
use App\User;
use App\TaskComment;

class ClientDashboardPagesController extends Controller
{
    public function clientDashboard(){
        $projects =  Project::with('status')
        ->with('client')
        ->with('manager')
        ->with('project_type')
        ->with('team_members')
        ->with('tasks')
        ->with('status')            
        ->get();

        return view('pages.client_dashboard', compact('projects'));
    }

    public function createClient(){
        return view('pages.create_client');
    }
    
}
