<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

class ClientDashboardPagesAPIController extends Controller
{
    /**
     * @param Request $request
     * @param $client_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientProject(Request $request, $client_id){
        try {
            $projects = Project::where('client_id', $client_id)
                ->with('status')
                ->with('client')
                ->with('manager')
                ->with('project_type')
                ->with('team_members')
                ->with('tasks')
                ->with('status')
                ->with('project_subtype')
                ->get();
            return response()->json(['data' => $projects], 200);
        } catch (\Exception $e) {
            return response()->json([], 401);
        }

    }

    /**
     * @param $client_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientTask($client_id)
    {
        try {
            $tasks = Task::where('client_id', $client_id)->with('client')
                ->with('status')
                ->with('manager')
                ->with('assinged_tos')
                ->with('category')
                ->get();
            return response()->json(['data' => $tasks], 200);
        } catch (\Exception $e) {
            return response()->json([], 401);
        }
}

}
