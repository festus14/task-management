<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskStatusRequest;
use App\Http\Requests\UpdateTaskStatusRequest;
use App\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskStatusApiController extends Controller
{
    public function index()
    {
        try {
            $taskStatuses = TaskStatus::all();
            return response()->json(['data' => $taskStatuses], 200);
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
                'name' => 'required|unique:task_statuses,name,',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $task_category = TaskStatus::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $task_category], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function update(Request $request, TaskStatus $taskStatus)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:task_statuses,name,' . request()->route('task_status')->id,
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $updated_task_status = $taskStatus->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_task_status], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function show(TaskStatus $taskStatus)
    {
        try {
            return response()->json(['data'=>$taskStatus], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function destroy(TaskStatus $taskStatus)
    {
        try {
            $taskStatus->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }
}
