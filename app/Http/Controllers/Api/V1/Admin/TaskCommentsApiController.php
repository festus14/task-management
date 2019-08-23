<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskCommentRequest;
use App\Http\Requests\UpdateTaskCommentRequest;
use App\TaskComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskCommentsApiController extends Controller
{
    public function index()
    {
        try {
            $taskComments = TaskComment::with('commentreply')->with('client')->get();
            return response()->json(['data' => $taskComments], 200);
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
                'comments' => 'required',
                'user_id' => 'required|integer',
                'client_id' => 'required|integer',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $task_comment = TaskComment::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $task_comment], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }

    }

    public function update(Request $request, TaskComment $taskComment)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'comments' => 'required',
                'user_id' => 'required|integer',
                'client_id' => 'required|integer',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $updated_comment = $taskComment->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_comment], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function show($taskComment)
    {
        try {
            $comments = TaskComment::with('commentreply')->with('client')->findOrFail($taskComment);
            return response()->json(['data'=>$comments], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function destroy(TaskComment $taskComment)
    {
        try {
            $taskComment->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }
}
