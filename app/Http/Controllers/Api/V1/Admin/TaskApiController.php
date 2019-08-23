<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Project;
use App\ProjectSubType;
use App\Task;
use App\TaskDocument;
use App\TaskStatus;
use App\TastCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
                ->with('comments')
                ->with('reports')
                ->get();
            return response()->json(['data' => $tasks], 200);
        } catch (\Exception $e) {
            return response()->json(['data'=>[]], 401);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'min:5|max:60|required',
                'assinged_tos' => 'required|array',
                'status_id' => 'required|integer',
                'assinged_tos.*' => 'integer',
                'category_id' => 'required|integer',
                'starting_date' => 'required|date_format:'. config('panel.date_format') . ' ' . config('panel.time_format'),
                'ending_date' => 'required|date_format:'. config('panel.date_format') . ' ' . config('panel.time_format'),
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $task = Task::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $task], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function update(Request $request, Task $task)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'min:5|max:60|required',
                'assinged_tos' => 'required|array',
                'status_id' => 'required|integer',
                'assinged_tos.*' => 'integer',
                'category_id' => 'required|integer',
                'starting_date' => 'required|date_format:'. config('panel.date_format') . ' ' . config('panel.time_format'),
                'ending_date' => 'required|date_format:'. config('panel.date_format') . ' ' . config('panel.time_format'),
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $updated_task = $task->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_task], 200);
        }
        catch(\Exception $e) {
            return response()->json(['error' => 'failed to create record'], 401);
        }
    }

    public function show($task)
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
                ->with('comments')
                ->with('reports')
                ->findOrFail($task);
            return response()->json(['data' => $tasks], 200);
        } catch (\Exception $e) {
            return response()->json(['data'=>[]], 401);
        }
    }
    public function createTask(Request $request)
    {
        try {
            $categories = TastCategory::all()->pluck('name', 'id');

            $assinged_tos = User::all()->pluck('name', 'id');

            $managers = User::all()->pluck('name', 'id');

            $statuses = TaskStatus::all()->pluck('name', 'id');

            $projects = Project::all()->pluck('name', 'id');

            $projects_sub_type = ProjectSubType::all()->pluck('name', 'id');

            $clients = Client::all()->pluck('name', 'id');
            return response()->json(['data' => compact('categories', 'assinged_tos', 'managers', 'statuses', 'projects', 'projects_sub_type', 'clients')], 200);
        } catch (\Exception $e) {
            return response()->json(['data'=>[]], 401);
        }
    }
    public function documents($task){
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
        try {
            $task->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }


}
