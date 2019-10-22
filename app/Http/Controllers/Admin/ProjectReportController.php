<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProjectReportRequest;
use App\Http\Requests\StoreProjectReportRequest;
use App\Http\Requests\UpdateProjectReportRequest;
use App\Project;
use App\ProjectReport;
use http\Env\Request;

class ProjectReportController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('project_report_access'), 403);

        $projectReports = ProjectReport::all();

        return view('admin.projectReports.index', compact('projectReports'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('project_report_create'), 403);

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.projectReports.create', compact('projects', 'clients'));
    }

    public function store(StoreProjectReportRequest $request)
    {
        abort_unless(\Gate::allows('project_report_create'), 403);

        $projectReport = ProjectReport::create($request->all());

        if ($request->input('uploads', false)) {
            $projectReport->addMedia(storage_path('tmp/uploads/' . $request->input('uploads')))->toMediaCollection('uploads');
        }

        return redirect()->back();
    }

    public function edit(ProjectReport $projectReport)
    {
        abort_unless(\Gate::allows('project_report_edit'), 403);

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projectReport->load('project', 'client');

        return view('admin.projectReports.edit', compact('projects', 'clients', 'projectReport'));
    }

    public function update(UpdateProjectReportRequest $request, ProjectReport $projectReport)
    {
        abort_unless(\Gate::allows('project_report_edit'), 403);

        $projectReport->update($request->all());

        if ($request->input('uploads', false)) {
            if (!$projectReport->uploads || $request->input('uploads') !== $projectReport->uploads->file_name) {
                $projectReport->addMedia(storage_path('tmp/uploads/' . $request->input('uploads')))->toMediaCollection('uploads');
            }
        } elseif ($projectReport->uploads) {
            $projectReport->uploads->delete();
        }

        return redirect()->back();
    }

    public function show(ProjectReport $projectReport)
    {
        abort_unless(\Gate::allows('project_report_show'), 403);

        $projectReport->load('project', 'client');

        return view('admin.projectReports.show', compact('projectReport'));
    }

    public function myReports(Request $request)
    {
        abort_unless(\Gate::allows('project_report_show'), 403);
        return redirect()->back();
    }


    public function destroy(ProjectReport $projectReport)
    {
        abort_unless(\Gate::allows('project_report_delete'), 403);

        $projectReport->delete();

        return redirect()->back();
    }

    public function massDestroy(MassDestroyProjectReportRequest $request)
    {
        ProjectReport::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
