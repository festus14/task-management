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

class ProjectPagesController extends Controller
{
    //create Project

    public function createProject(){
        return view('pages.create_project');
    }


    //upload document

    public function uploadDocument(){
        return view('pages.upload_documents');
    }
    
    // project report
    public function projectReport(){
        return view('pages.project_report');
    }

    // project subtype
    public function projectSubtype(){
        $projectSubTypes = ProjectSubType::with('project_type')->get();
        return view('pages.create_subtype', compact('projectSubTypes'));
    }

    // project report
    public function viewProject(){
        // 'name',
        // 'deadline',
        // 'status_id',
        // 'client_id',
        // 'manager_id',
        // 'created_at',
        // 'updated_at',
        // 'deleted_at',
        // 'starting_date',
        // 'project_type_id',
        $projects =  Project::with('status')
            ->with('client')
            ->with('manager')
            ->with('project_type')
            ->with('team_members')
            ->with('tasks')
            ->with('status')            
            ->get();
        
        return view('pages.view_project', compact('projects'));
    }
   public function projectTypeAPI(Request $request, $project_id) {
    $projectSubTypes = ProjectSubType::with('project_type')
    ->where('project_type_id', $project_id)
    ->get();
    return response()->json(['data' => $projectSubTypes], 200);
   }
}
