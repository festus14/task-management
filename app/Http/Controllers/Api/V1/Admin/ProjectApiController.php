<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;

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
}
