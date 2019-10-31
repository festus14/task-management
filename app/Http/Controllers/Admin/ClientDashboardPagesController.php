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
    public function clientDashboard(Request $request){
        $projects =  Project::where('client_id', 1)
        ->with('status')
        ->with('client')
        ->with('manager')
        ->with('project_type')
        ->with('team_members')
        ->with('tasks')
        ->with('status')
        ->with('project_subtype')
        ->get();

        $tasks = Task::where('client_id', 1)->with('client')
        ->with('status')
        ->with('manager')
        ->with('assinged_tos')
        ->with('category')
        ->get();


        return view('pages.client_dashboard', compact('projects', 'tasks'));
    }

    public function viewSingleClient(Request $request, $client_id){

        $client = Client::findOrFail($client_id);
        $projects =  Project::where('client_id', $client_id)
        ->with('status')
        ->with('client')
        ->with('manager')
        ->with('project_type')
        ->with('team_members')
        ->with('tasks')
        ->with('status')
        ->with('project_subtype')
        ->get();

        $tasks = Task::where('client_id', $client_id)->with('client')
        ->with('status')
        ->with('manager')
        ->with('assinged_tos')
        ->with('category')
        ->get();

        return view('pages.view_single_client', compact('projects', 'tasks', 'client'));
    }

}
