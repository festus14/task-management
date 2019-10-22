<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;
use App\ProjectSubType;
use App\ProjectType;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_types = ProjectType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $project_subtypes = ProjectSubType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $team_members = User::all()->pluck('name', 'id');

        return view('admin.projects.create', compact('clients', 'project_types', 'managers', 'team_members', 'project_subtypes'));
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());
        $project->team_members()->sync($request->input('team_members', []));

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_types = ProjectType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $team_members = Document::all()->pluck('name', 'id');

        $project_subtypes = ProjectSubType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $project->load('client', 'project_type', 'manager', 'team_members');

        return view('admin.projects.edit', compact('clients', 'project_types', 'managers', 'team_members', 'project', 'project_subtypes'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        $project->team_members()->sync($request->input('team_members', []));

        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('client', 'project_type', 'manager', 'team_members');

        return view('admin.projects.show', compact('project'));
    }
    public function myProjects(Request $request)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $project = Project::findOrFail(1);
        $project->load('client', 'project_type', 'manager', 'team_members');

        return view('admin.projects.show', compact('project'));
    }


    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
