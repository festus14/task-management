<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Task;

class TaskApiController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return $tasks;
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
        return $task;
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response("OK", 200);
    }
}
