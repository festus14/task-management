<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskStatusRequest;
use App\Http\Requests\UpdateTaskStatusRequest;
use App\TaskStatus;

class TaskStatusApiController extends Controller
{
    public function index()
    {
        $taskStatuses = TaskStatus::all();

        return $taskStatuses;
    }

    public function store(StoreTaskStatusRequest $request)
    {
        return TaskStatus::create($request->all());
    }

    public function update(UpdateTaskStatusRequest $request, TaskStatus $taskStatus)
    {
        return $taskStatus->update($request->all());
    }

    public function show(TaskStatus $taskStatus)
    {
        return $taskStatus;
    }

    public function destroy(TaskStatus $taskStatus)
    {
        $taskStatus->delete();

        return response("OK", 200);
    }
}
