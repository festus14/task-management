<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyProjectCommentRequest;
use App\Http\Requests\StoreProjectCommentRequest;
use App\Http\Requests\UpdateProjectCommentRequest;
use App\Project;
use App\ProjectComment;
use App\User;

class ProjectCommentsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_unless(\Gate::allows('project_comment_access'), 403);

        $projectComments = ProjectComment::all();

        return view('admin.projectComments.index', compact('projectComments'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('project_comment_create'), 403);

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.projectComments.create', compact('users', 'projects', 'clients'));
    }

    public function store(StoreProjectCommentRequest $request)
    {
        abort_unless(\Gate::allows('project_comment_create'), 403);

        $projectComment = ProjectComment::create($request->all());

        return redirect()->route('admin.project-comments.index');
    }

    public function edit(ProjectComment $projectComment)
    {
        abort_unless(\Gate::allows('project_comment_edit'), 403);

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projectComment->load('user', 'project', 'client');

        return view('admin.projectComments.edit', compact('users', 'projects', 'clients', 'projectComment'));
    }

    public function update(UpdateProjectCommentRequest $request, ProjectComment $projectComment)
    {
        abort_unless(\Gate::allows('project_comment_edit'), 403);

        $projectComment->update($request->all());

        return redirect()->route('admin.project-comments.index');
    }

    public function show(ProjectComment $projectComment)
    {
        abort_unless(\Gate::allows('project_comment_show'), 403);

        $projectComment->load('user', 'project', 'client');

        return view('admin.projectComments.show', compact('projectComment'));
    }

    public function destroy(ProjectComment $projectComment)
    {
        abort_unless(\Gate::allows('project_comment_delete'), 403);

        $projectComment->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectCommentRequest $request)
    {
        ProjectComment::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
