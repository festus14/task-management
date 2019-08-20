<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;

use App\ProjectType;
use App\Task;
use App\User;
use App\ProjectSubType;
use App\Client;

class ProjectApiController extends Controller
{
    public function index()
    {

        try {
            $projects = Project::with('client')
                ->with('documents')
                ->with('project_type')
                ->with('project_subtype')
                ->with('manager')
                ->with('team_members')
                ->with('tasks')
                ->with('status')
                ->get();
            return response()->json(['data' => $projects], 200);
        } catch (\Exception $e) {
            return response()->json(['data' => []], 401);
        }
    }

    public function store(StoreProjectRequest $request)
    {
        return Project::create($request->all());
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        return $project->update($request->all());
    }

    public function show(Project $project)
    {
       try{
        $projects = Project::with('client')
               ->with('project_type')
               ->with('documents')
               ->with('project_subtype')
               ->with('manager')
               ->with('team_members')
               ->with('tasks')
               ->with('status')->findOrFail($project);
        return response()->json(['data'=>$projects], 200);
       }
       catch(\Exception $e){
           return response()->json(['data'=>[]], 401);
       }
    }

    public function tasks(Project $project){

        try{
            $projects = Task::where('project_id', $project->id)->with('client')
                ->with('project_sub_type')
                ->with('project')
                ->with('status')
                ->with('manager')
                ->with('assinged_tos')
                ->with('category')
                ->with('documents')->get();
            return response()->json(['data'=>$projects], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }
    public function documents(Project $project){
        try{
            $documents = Document::where('project_id', $project->id)->get();
            return response()->json(['data'=>$documents], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[], 'error' => $e->getMessage()], 401);
        }
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response("OK", 200);
    }

    public function createProject(){
        //abort_unless(\Gate::allows('project_create'), 403);

        $clients = Client::select('name', 'id')->get();
        $project_types = ProjectType::select('name', 'id')->get();
        $project_subtypes = ProjectSubType::select('name', 'id')->get();
        $managers = User::select('name', 'id')->get();
        $team_members = $managers;

        return response()->json(compact('clients', 'project_types', 'project_subtypes', 'managers', 'team_members'), 200);

    }
}
