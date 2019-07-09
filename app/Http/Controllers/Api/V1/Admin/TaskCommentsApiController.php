<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskCommentRequest;
use App\Http\Requests\UpdateTaskCommentRequest;
use App\TaskComment;

class TaskCommentsApiController extends Controller
{
    public function index()
    {
        $taskComments = TaskComment::all();

        return $taskComments;
    }

    public function store(StoreTaskCommentRequest $request)
    {
        return TaskComment::create($request->all());
    }

    public function update(UpdateTaskCommentRequest $request, TaskComment $taskComment)
    {
        return $taskComment->update($request->all());
    }

    public function show(TaskComment $taskComment)
    {
        return $taskComment;
    }

    public function destroy(TaskComment $taskComment)
    {
        $taskComment->delete();

        return response("OK", 200);
    }
}
