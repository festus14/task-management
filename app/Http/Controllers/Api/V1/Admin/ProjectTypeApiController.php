<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectTypeRequest;
use App\Http\Requests\UpdateProjectTypeRequest;
use App\ProjectType;

class ProjectTypeApiController extends Controller
{
    public function index()
    {
        $projectTypes = ProjectType::all();

        return $projectTypes;
    }

    public function store(StoreProjectTypeRequest $request)
    {
        return ProjectType::create($request->all());
    }

    public function update(UpdateProjectTypeRequest $request, ProjectType $projectType)
    {
        return $projectType->update($request->all());
    }

    public function show(ProjectType $projectType)
    {
        return $projectType;
    }

    public function destroy(ProjectType $projectType)
    {
        $projectType->delete();

        return response("OK", 200);
    }
}
