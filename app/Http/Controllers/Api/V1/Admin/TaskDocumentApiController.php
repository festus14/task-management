<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskDocumentRequest;
use App\Http\Requests\UpdateTaskDocumentRequest;
use App\TaskDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskDocumentApiController extends Controller
{
    public function index()
    {
        try {
            $taskDocuments = TaskDocument::all();
            return response()->json(['data' => $taskDocuments], 200);
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
                'name' => 'required|min:4|max:100',
                'document' => 'required',
                'document_type' => 'required',
                'project_id' => 'required|integer',
                'task_id' => 'required|integer',
                'client_id' => 'required|integer',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $task_document = TaskDocument::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $task_document], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function update(Request $request, TaskDocument $taskDocument)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:4|max:100',
                'document' => 'required',
                'document_type' => 'required',
                'project_id' => 'required|integer',
                'task_id' => 'required|integer',
                'client_id' => 'required|integer',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $updated_document = $taskDocument->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_document], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function show(TaskDocument $taskDocument)
    {
        try {
            return response()->json(['data'=>$taskDocument], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function destroy(TaskDocument $taskDocument)
    {
        try {
            $taskDocument->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }
}
