<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Project;
use App\ProjectType;
use App\Task;
use Illuminate\Support\Facades\Validator;

class ClientApiController extends Controller
{
    public function index()
    {
        try{
            $client = Client::with('tasks')
                ->with('projects')
                ->with('task_comments')
                ->with('project_comments')
                ->with('documents')
                ->with('reports')->get();
            return response()->json(['data'=>$client], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function store(StoreClientRequest $request)
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
            $client = Client::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $client], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function update(UpdateClientRequest $request, Client $client)
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
            $updated_client = $client->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_client], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function show($client)
    {
        try{
            $client_data = Client::with('tasks')
                ->with('projects')
                ->with('task_comments')
                ->with('project_comments')
                ->with('documents')
                ->with('reports')->findOrFail($client);
            return response()->json(['data'=>$client_data], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function destroy(Client $client)
    {
        try {
            $client->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }
    public function projects($client){
        try{
            $projects = Project::with('client')
                ->with('project_type')
                ->with('documents')
                ->with('project_subtype')
                ->with('manager')
                ->with('team_members')
                ->with('tasks')
                ->with('status')
                ->where('client_id', $client)->get();
            return response()->json(['data'=>$projects], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function tasks($client){

        try{
            $clients = Task::where('client_id', $client)
                ->with('project_sub_type')
                ->with('project')
                ->with('status')
                ->with('manager')
                ->with('assinged_tos')
                ->with('category')
                ->with('documents')->get();
            return response()->json(['data'=>$clients], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }
}
