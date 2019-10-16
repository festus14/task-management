<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectReportRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateProjectReportRequest;
use App\ProjectReport;
use Illuminate\Http\Request;

class ProjectReportApiController extends Controller
{
    use MediaUploadingTrait;
    public function index()
    {
        try {
            $projectReports = ProjectReport::with('getuploadsAttribute')->with('project')->with('client')->get();
            return response()->json(['data' => $projectReports], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function store(Request $request)
    {
        try {
            $project_report = ProjectReport::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $project_report], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }

    }

    public function update(Request $request, ProjectReport $projectReport)
    {
        try {
            $updated_project_report = $projectReport->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_project_report], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function show(ProjectReport $projectReport)
    {
        try {
            return response()->json(['data' => $projectReport], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function destroy(ProjectReport $projectReport)
    {
        try {
            $projectReport->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }
}
