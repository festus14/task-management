<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskCommentReplyRequest;
use App\Http\Requests\UpdateTaskCommentReplyRequest;
use App\TaskCommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskCommentReplyApiController extends Controller
{
    public function index()
    {
        try {
            $taskCommentReplies = TaskCommentReply::all();
        } catch (\Exception $e) {
        }

    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'task_comment_reply' => 'required',
                'reply_by_id' => 'required|integer',
                'task_comment_id' => 'required|integer',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $task_comment_reply = TaskCommentReply::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $task_comment_reply], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function update(Request $request, TaskCommentReply $taskCommentReply)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'task_comment_reply' => 'required',
                'reply_by_id' => 'required|integer',
                'task_comment_id' => 'required|integer',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $updated_comment_reply = $taskCommentReply->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_comment_reply], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function show(TaskCommentReply $taskCommentReply)
    {
        try {
            return response()->json(['data'=>$taskCommentReply], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function destroy(TaskCommentReply $taskCommentReply)
    {
        try {
            $taskCommentReply->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }
}
