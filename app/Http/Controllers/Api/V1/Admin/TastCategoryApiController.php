<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTastCategoryRequest;
use App\Http\Requests\UpdateTastCategoryRequest;
use App\Project;
use App\ProjectSubType;
use App\ProjectType;
use App\TaskStatus;
use App\TastCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TastCategoryApiController extends Controller
{
    public function index()
    {
        try {
            $tastCategories = TastCategory::with('project_type')->with('sub_category')->get();
            return response()->json(['data' => $tastCategories], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[], 'message' => $e->getMessage()], 401);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'weight' => 'required|integer|max:100|min:1|',
                'name' => 'required|unique:tast_categories',
                'project_type_id' => 'required|integer'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $task_category = TastCategory::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $task_category], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function update(Request $request, TastCategory $tastCategory)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'weight' => 'required|integer|max:100|min:1|',
                'name' => 'required',
                'project_type_id' => 'required|integer'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $updated_task_category = $tastCategory->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_task_category], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function show(TastCategory $tastCategory)
    {
        try {
            return response()->json(['data'=>$tastCategory], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function destroy(TastCategory $tastCategory)
    {
        try {
            $tastCategory->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }
    public function createTaskCategory(Request $request)
    {
        try {
            $project_types = ProjectType::all()->pluck('name', 'id');
            $projects_sub_types = ProjectSubType::all()->pluck('name', 'id');
            return response()->json(['data' => compact('projects_sub_types', 'project_types')], 200);
        } catch (\Exception $e) {
            return response()->json(['data'=>[]], 401);
        }
    }
}
