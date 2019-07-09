<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectReportRequest;
use App\Http\Requests\UpdateProjectReportRequest;
use App\ProjectReport;

class ProjectReportApiController extends Controller
{
    public function index()
    {
        $projectReports = ProjectReport::all();

        return $projectReports;
    }

    public function store(StoreProjectReportRequest $request)
    {
        return ProjectReport::create($request->all());
    }

    public function update(UpdateProjectReportRequest $request, ProjectReport $projectReport)
    {
        return $projectReport->update($request->all());
    }

    public function show(ProjectReport $projectReport)
    {
        return $projectReport;
    }

    public function destroy(ProjectReport $projectReport)
    {
        $projectReport->delete();

        return response("OK", 200);
    }
}
