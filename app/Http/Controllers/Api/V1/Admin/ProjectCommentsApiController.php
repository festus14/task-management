<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectCommentRequest;
use App\Http\Requests\UpdateProjectCommentRequest;
use App\ProjectComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectCommentsApiController extends Controller
{
    public function index()
    {
        try {
            $projectComments = ProjectComment::all();
            return response()->json(['data' => $projectComments], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function store(Request $request)
    {
         $validator = Validator::make(
             $request->all(),
             [
                 'user_id' => 'required|integer',
                 'project_id' => 'required|integer',
                 'client_id' => 'required|integer'
             ]
         );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $project_comment = ProjectComment::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $project_comment], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function update(Request $request, ProjectComment $projectComment)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required|integer',
                'project_id' => 'required|integer',
                'client_id' => 'required|integer'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $updated_project_comment = $projectComment->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_project_comment], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function show(ProjectComment $projectComment)
    {
        try {
            return response()->json(['data' => $projectComment], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function destroy(ProjectComment $projectComment)
    {
        try {
            $projectComment->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }
}
