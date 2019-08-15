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
use App\ProjectType;
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
        
        $projects =  Project::with('status')
            ->with('client')
            ->with('manager')
            ->with('project_type')
            ->with('project_subtype')
            ->with('team_members')
            ->with('tasks')
            ->with('status')            
            ->get();
        $users = User::all();
        $clients = Client::all();
        $projectTypes = ProjectType::all();
        $projectSubTypes = ProjectSubType::all();

        return view('pages.view_project', compact('projects', 'users', 'clients','projectTypes','projectSubTypes'));
    }
   public function projectTypeAPI(Request $request, $project_id) {
    $projectSubTypes = ProjectSubType::with('project_type')
    ->where('project_type_id', $project_id)
    ->get();
    return response()->json(['data' => $projectSubTypes], 200);
   }

   public function store(StoreProjectRequest $request)
    {
        // abort_unless(\Gate::allows('project_create'), 403);

        // $project = Project::create($request->all());
        // $project->team_members()->sync($request->input('team_members', []));

        // return redirect()->route('admin.projects.index');
        $projects = new Project;

        $projects->name = $request->input('name');
        $projects->client_id= $request->input('client');
        $projects->deadline = $request->input('deadline');
        $projects->manager_id = $request->input('manager');
        $projects->starting_date = $request->input('start_date');
        $projects->project_type_id = $request->input('proj_type');
        $projects->project_subtype_id = $request->input('proj_subtype');
        $projects->team_members()->sync($request->input('team_members', []));

        $projects->save();
        
    }

   public function projectComment(){
    return view('pages.project_comment');
}

}
