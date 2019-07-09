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

    public function show(Project $project)
    {
        return $project;
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response("OK", 200);
    }
}
