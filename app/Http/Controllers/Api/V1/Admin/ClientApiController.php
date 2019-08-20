<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Project;
use App\Task;

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
        return Client::create($request->all());
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        return $client->update($request->all());
    }

    public function show(Client $client)
    {
        try{
            $client_data = Client::with('tasks')
                ->with('projects')
                ->with('task_comments')
                ->with('project_comments')
                ->with('documents')
                ->with('reports')->findOrFail($client->id);
            return response()->json(['data'=>$client_data], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return response("OK", 200);
    }
    public function projects(Client $client){
        try{
            $projects = Project::with('client')
                ->with('project_type')
                ->with('documents')
                ->with('project_subtype')
                ->with('manager')
                ->with('team_members')
                ->with('tasks')
                ->with('status')
                ->where('client_id', $client->id)->get();
            return response()->json(['data'=>$projects], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function tasks(Client $client){

        try{
            $clients = Task::where('client_id', $client->id)
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
