<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProjectTypeRequest;
use App\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [   'name' => 'required|unique:project_types|min:3|max:70'],
            $messages = [
                'name.required' => 'Project Type name is required',
                'name.unique' => 'name must be unique',
                'name.min' => 'name must be more than 3 letters',
                'name.max' => 'name must not be more than 70 letters',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 405);
        }
        try {
            $projectTypes = ProjectType::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $projectTypes], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function update(Request $request, ProjectType $projectType)
    {
        $validator = Validator::make(
            $request->all(),
            [   'name' => 'required|unique:project_types|min:3|max:70'],
            $messages = [
                'name.required' => 'Project Type name is required',
                'name.unique' => 'name must be unique',
                'name.min' => 'name must be more than 3 letters',
                'name.max' => 'name must not be more than 70 letters',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $projectTypes = $projectType->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $projectTypes], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
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
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }
}
