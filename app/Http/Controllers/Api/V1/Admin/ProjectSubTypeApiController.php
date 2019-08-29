<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectSubTypeRequest;
use App\Http\Requests\UpdateProjectSubTypeRequest;
use App\ProjectSubType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'project_type_id' => 'required|integer',
                'name' => 'required|min:3|max:60|unique:project_sub_types,name,',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $project = ProjectSubType::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $project], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function update(Request $request, ProjectSubType $projectSubType)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'project_type_id' => 'required|integer',
                'name' => 'required|min:3|max:60|unique:project_sub_types,name,' . request()->route('project_sub_type')->id
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $updated_project = $projectSubType->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_project], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
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
        try {
            $projectSubType->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }
}
