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
        try {
            $projectTypes = ProjectType::all();
            return response()->json(['data' => $projectTypes], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function store(StoreProjectTypeRequest $request)
    {
        try {
            $projectTypes = ProjectType::create($request->all());
            return response()->json(['success' => 'record saved successfully'], 200);
        }
        catch(\Exception $e){

            return response()->json(['failed'=>'please try again'], 401);
        }

    }

    public function update(UpdateProjectTypeRequest $request, ProjectType $projectType)
    {
        try {
            $projectTypes = $projectType->update($request->all());
            return response()->json(['success' => 'record updated successfully'], 200);
        }
        catch(\Exception $e){

            return response()->json(['failed'=>'cannot update, please try again'], 401);
        }

    }

    public function show(ProjectType $projectType)
    {
        try {
            return response()->json(['data' => $projectType], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function destroy(ProjectType $projectType)
    {
        try {
            $projectType->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){

            return response()->json(['failed'=>'cannot delete record, please try again'], 401);
        }
    }
}
