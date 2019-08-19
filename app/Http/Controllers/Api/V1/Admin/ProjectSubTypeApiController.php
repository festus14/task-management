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
        try {
            $projectSubTypes = ProjectSubType::with('project_type')->get();
            return response()->json(['data'=>$projectSubTypes], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }

    }

    public function store(StoreProjectSubTypeRequest $request)
    {
        return ProjectSubType::create($request->all());
    }

    public function update(UpdateProjectSubTypeRequest $request, ProjectSubType $projectSubType)
    {
        return $projectSubType->update($request->all());
    }

    public function show(ProjectSubType $projectSubType)
    {
        try {
            $projectSubTypes = ProjectSubType::with('project_type')->findOrFail($projectSubType);
            return response()->json(['data'=>$projectSubTypes], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function destroy(ProjectSubType $projectSubType)
    {
        $projectSubType->delete();

        return response("OK", 200);
    }
}
