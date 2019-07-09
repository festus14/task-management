<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;
use App\ProjectType;
use App\User;

class ProjectController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('project_access'), 403);

        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('project_create'), 403);

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_types = ProjectType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $team_members = Document::all()->pluck('name', 'id');

        return view('admin.projects.create', compact('clients', 'project_types', 'managers', 'team_members'));
    }

    public function store(StoreProjectRequest $request)
    {
        abort_unless(\Gate::allows('project_create'), 403);

        $project = Project::create($request->all());
        $project->team_members()->sync($request->input('team_members', []));

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_unless(\Gate::allows('project_edit'), 403);

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_types = ProjectType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $team_members = Document::all()->pluck('name', 'id');

        $project->load('client', 'project_type', 'manager', 'team_members');

        return view('admin.projects.edit', compact('clients', 'project_types', 'managers', 'team_members', 'project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        abort_unless(\Gate::allows('project_edit'), 403);

        $project->update($request->all());
        $project->team_members()->sync($request->input('team_members', []));

        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        abort_unless(\Gate::allows('project_show'), 403);

        $project->load('client', 'project_type', 'manager', 'team_members');

        return view('admin.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_unless(\Gate::allows('project_delete'), 403);

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        Project::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
