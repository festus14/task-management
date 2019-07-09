<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskDocumentRequest;
use App\Http\Requests\UpdateTaskDocumentRequest;
use App\TaskDocument;

class TaskDocumentApiController extends Controller
{
    public function index()
    {
        $taskDocuments = TaskDocument::all();

        return $taskDocuments;
    }

    public function store(StoreTaskDocumentRequest $request)
    {
        return TaskDocument::create($request->all());
    }

    public function update(UpdateTaskDocumentRequest $request, TaskDocument $taskDocument)
    {
        return $taskDocument->update($request->all());
    }

    public function show(TaskDocument $taskDocument)
    {
        return $taskDocument;
    }

    public function destroy(TaskDocument $taskDocument)
    {
        $taskDocument->delete();

        return response("OK", 200);
    }
}
