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

    public function show($id)
    {
       $projects = Project::with('manager')->with('task')
       ->with('project_type')
       ->with('team_members')
       ->with('status')
       ->with('project_subtype')->findOrFail($id);
       
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

        return response()->json(compact('clients', 'project_subtypes', 'managers', 'team_members'), 200);

    }
}
