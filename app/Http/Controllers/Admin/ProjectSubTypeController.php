<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyProjectSubTypeRequest;
use App\Http\Requests\StoreProjectSubTypeRequest;
use App\Http\Requests\UpdateProjectSubTypeRequest;
use App\ProjectSubType;
use App\ProjectType;

class ProjectSubTypeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_unless(\Gate::allows('project_sub_type_access'), 403);

        $projectSubTypes = ProjectSubType::all();

        return view('admin.projectSubTypes.index', compact('projectSubTypes'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('project_sub_type_create'), 403);

        $project_types = ProjectType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.projectSubTypes.create', compact('project_types'));
    }

    public function store(StoreProjectSubTypeRequest $request)
    {
        abort_unless(\Gate::allows('project_sub_type_create'), 403);

        $projectSubType = ProjectSubType::create($request->all());

        return redirect()->route('admin.project-sub-types.index');
    }

    public function edit(ProjectSubType $projectSubType)
    {
        abort_unless(\Gate::allows('project_sub_type_edit'), 403);

        $project_types = ProjectType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projectSubType->load('project_type');

        return view('admin.projectSubTypes.edit', compact('project_types', 'projectSubType'));
    }

    public function update(UpdateProjectSubTypeRequest $request, ProjectSubType $projectSubType)
    {
        abort_unless(\Gate::allows('project_sub_type_edit'), 403);

        $projectSubType->update($request->all());

        return redirect()->route('admin.project-sub-types.index');
    }

    public function show(ProjectSubType $projectSubType)
    {
        abort_unless(\Gate::allows('project_sub_type_show'), 403);

        $projectSubType->load('project_type');

        return view('admin.projectSubTypes.show', compact('projectSubType'));
    }

    public function destroy(ProjectSubType $projectSubType)
    {
        abort_unless(\Gate::allows('project_sub_type_delete'), 403);

        $projectSubType->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectSubTypeRequest $request)
    {
        ProjectSubType::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
