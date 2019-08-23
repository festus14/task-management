<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyProjectTypeRequest;
use App\Http\Requests\StoreProjectTypeRequest;
use App\Http\Requests\UpdateProjectTypeRequest;
use App\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        // return redirect()->route('admin.project-types.index');
    }
    public function storeAjax(Request $request)
    {
        if(!\Gate::allows('project_type_create')){
            return response()->json(['authorization'=> 'you are not authorized'], 403);
        }
        $validator = Validator::make(
            $request->all(),
            [   'name' => 'required|unique:project_types|min:3|max:70'],
            $messages = [
                'name.required' => 'Project Type name is required',
                'name.unique' => 'name must be unique',
                'name.min' => 'name must be more than 3 letters',
                'name.max' => 'name must not be more than 70 letters',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $projectTypes = ProjectType::create($request->all());
            return response()->json(['success' => 'record created successfully'], 201);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
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
