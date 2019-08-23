<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use App\Project;

use App\ProjectType;
use App\Task;
use App\User;
use App\ProjectSubType;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectApiController extends Controller
{
    public function index()
    {

        try {
            $projects = Project::with('client')
                ->with('documents')
                ->with('project_type')
                ->with('project_subtype')
                ->with('manager')
                ->with('team_members')
                ->with('tasks')
                ->with('status')
                ->get();
            return response()->json(['data' => $projects], 200);
        } catch (\Exception $e) {
            return response()->json(['data' => []], 401);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:clients',
                'date_of_engagement' => 'nullable|date_format:' . config('panel.date_format'),
                'expiry_date' => 'nullable|date_format:' . config('panel.date_format'),
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $project = Project::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $project], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function update(Request $request, Project $project)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'client_id' => 'required|integer',
                'project_type_id' => 'required|integer',
                'name' => 'required',
                'team_members.*' => 'integer',
                'team_members' => 'array',
                'starting_date' => 'nullable|date_format:' . config('panel.date_format'),
                'deadline' => 'nullable|date_format:' . config('panel.date_format'). ' ' . config('panel.time_format'),
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $updated_project = $project->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_project], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function show($project)
    {
       try{
        $projects = Project::with('client')
               ->with('project_type')
               ->with('documents')
               ->with('project_subtype')
               ->with('manager')
               ->with('team_members')
               ->with('tasks')
               ->with('status')->findOrFail($project);
        return response()->json(['data'=>$projects], 200);
       }
       catch(\Exception $e){
           return response()->json(['data'=>[]], 401);
       }
    }

    public function tasks($project){

        try{
            $projects = Task::where('project_id', $project)->with('client')
                ->with('project_sub_type')
                ->with('project')
                ->with('status')
                ->with('manager')
                ->with('assinged_tos')
                ->with('category')
                ->with('documents')->get();
            return response()->json(['data'=>$projects], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }
    public function documents($project){
        try{
            $documents = Document::where('project_id', $project->id)->get();
            return response()->json(['data'=>$documents], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[], 'error' => $e->getMessage()], 401);
        }
    }

    public function destroy(Project $project)
    {
        try {
            $project->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }

    public function createProject(){
        //abort_unless(\Gate::allows('project_create'), 403);

        $clients = Client::select('name', 'id')->get();
        $project_types = ProjectType::select('name', 'id')->get();
        $project_subtypes = ProjectSubType::select('name', 'id')->get();
        $managers = User::select('name', 'id')->get();
        $team_members = $managers;

        return response()->json(compact('clients', 'project_types', 'project_subtypes', 'managers', 'team_members'), 200);

    }
}
