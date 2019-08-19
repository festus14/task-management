<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Task;
use App\TaskDocument;

class TaskApiController extends Controller
{
    public function index()
    {

        try {
            $tasks = Task::with('client')
                ->with('project_sub_type')
                ->with('project')
                ->with('status')
                ->with('manager')
                ->with('assinged_tos')
                ->with('category')
                ->with('documents')
                ->get();
            return response()->json(['data' => $tasks], 200);
        } catch (\Exception $e) {
            return response()->json(['data'=>[]], 401);
        }
    }

    public function store(StoreTaskRequest $request)
    {
        return Task::create($request->all());
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        return $task->update($request->all());
    }

    public function show(Task $task)
    {
        try {
            $tasks = Task::with('client')
                ->with('project_sub_type')
                ->with('project')
                ->with('status')
                ->with('manager')
                ->with('assinged_tos')
                ->with('category')
                ->with('documents')
                ->findOrFail($task);
            return response()->json(['data' => $tasks], 200);
        } catch (\Exception $e) {
            return response()->json(['data'=>[]], 401);
        }
    }
    public function documents(Task $task){
        try{

            $projects = Task::with('documents')
                ->with('status')->findOrFail($task);
            return response()->json(['data'=>$projects], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }
    public function destroy(Task $task)
    {
        $task->delete();

        return response("OK", 200);
    }
}
