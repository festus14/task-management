<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectSubTypeRequest;
use App\Http\Requests\UpdateProjectSubTypeRequest;
use App\ProjectSubType;

class ProjectSubTypeApiController extends Controller
{
    public function index()
    {
        $projectSubTypes = ProjectSubType::all();

        return $projectSubTypes;
    }

    public function store(StoreProjectSubTypeRequest $request)
    {
        return ProjectSubType::create($request->all());
    }

    public function update(UpdateProjectSubTypeRequest $request, ProjectSubType $projectSubType)
    {
        return $projectSubType->update($request->all());
    }

    public function show(ProjectSusbType $projectSubType)
    {
        return $projectSubType;
    }

    public function destroy(ProjectSubType $projectSubType)
    {
        $projectSubType->delete();

        return response("OK", 200);
    }
}
