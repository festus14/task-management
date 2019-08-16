<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;

use App\ProjectType;
use App\User;
use App\ProjectSubType;
use App\Client;

class ProjectApiController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return $projects;
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
        $projects = Project::with('manager')->with('tasks')
        ->with('project_type')
        ->with('team_members')
        ->with('status')
        ->with('project_subtype')->findOrFail($project);
        return response()->json($projects, 200);
       }
       catch(\Exception $e){
           return response()->json([], 401);
       }
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response("OK", 200);
    }

    public function createProject(){
        //abort_unless(\Gate::allows('project_create'), 403);

        $clients = Client::all()->pluck('name', 'id');

        $project_types = ProjectType::all()->pluck('name', 'id');
        $project_subtypes = ProjectSubType::all()->pluck('name', 'id');
        $managers = User::all()->pluck('name', 'id');
        $team_members = $managers;

        return response()->json([compact('clients', 'project_subtypes', 'managers', 'team_members')], 200);

    }
}
