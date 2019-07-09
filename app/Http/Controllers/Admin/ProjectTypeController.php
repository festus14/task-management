<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyProjectTypeRequest;
use App\Http\Requests\StoreProjectTypeRequest;
use App\Http\Requests\UpdateProjectTypeRequest;
use App\ProjectType;

class ProjectTypeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_unless(\Gate::allows('project_type_access'), 403);

        $projectTypes = ProjectType::all();

        return view('admin.projectTypes.index', compact('projectTypes'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('project_type_create'), 403);

        return view('admin.projectTypes.create');
    }

    public function store(StoreProjectTypeRequest $request)
    {
        abort_unless(\Gate::allows('project_type_create'), 403);

        $projectType = ProjectType::create($request->all());

        return redirect()->route('admin.project-types.index');
    }

    public function edit(ProjectType $projectType)
    {
        abort_unless(\Gate::allows('project_type_edit'), 403);

        return view('admin.projectTypes.edit', compact('projectType'));
    }

    public function update(UpdateProjectTypeRequest $request, ProjectType $projectType)
    {
        abort_unless(\Gate::allows('project_type_edit'), 403);

        $projectType->update($request->all());

        return redirect()->route('admin.project-types.index');
    }

    public function show(ProjectType $projectType)
    {
        abort_unless(\Gate::allows('project_type_show'), 403);

        return view('admin.projectTypes.show', compact('projectType'));
    }

    public function destroy(ProjectType $projectType)
    {
        abort_unless(\Gate::allows('project_type_delete'), 403);

        $projectType->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectTypeRequest $request)
    {
        ProjectType::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
