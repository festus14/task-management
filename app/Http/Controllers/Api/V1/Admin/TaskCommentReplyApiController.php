<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskCommentReplyRequest;
use App\Http\Requests\UpdateTaskCommentReplyRequest;
use App\TaskCommentReply;

class TaskCommentReplyApiController extends Controller
{
    public function index()
    {
        $taskCommentReplies = TaskCommentReply::all();

        return $taskCommentReplies;
    }

    public function store(StoreTaskCommentReplyRequest $request)
    {
        return TaskCommentReply::create($request->all());
    }

    public function update(UpdateTaskCommentReplyRequest $request, TaskCommentReply $taskCommentReply)
    {
        return $taskCommentReply->update($request->all());
    }

    public function show(TaskCommentReply $taskCommentReply)
    {
        return $taskCommentReply;
    }

    public function destroy(TaskCommentReply $taskCommentReply)
    {
        $taskCommentReply->delete();

        return response("OK", 200);
    }
}
