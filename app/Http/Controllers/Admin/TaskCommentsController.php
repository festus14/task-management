<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTaskCommentRequest;
use App\Http\Requests\StoreTaskCommentRequest;
use App\Http\Requests\UpdateTaskCommentRequest;
use App\Project;
use App\Task;
use App\TaskComment;
use App\User;

class TaskCommentsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('task_comment_access'), 403);

        $taskComments = TaskComment::all();

        return view('admin.taskComments.index', compact('taskComments'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('task_comment_create'), 403);

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tasks = Task::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.taskComments.create', compact('users', 'tasks', 'clients', 'projects'));
    }

    public function store(StoreTaskCommentRequest $request)
    {
        abort_unless(\Gate::allows('task_comment_create'), 403);

        $taskComment = TaskComment::create($request->all());

        return redirect()->route('admin.task-comments.index');
    }

    public function edit(TaskComment $taskComment)
    {
        abort_unless(\Gate::allows('task_comment_edit'), 403);

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tasks = Task::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $taskComment->load('user', 'task', 'client', 'project');

        return view('admin.taskComments.edit', compact('users', 'tasks', 'clients', 'projects', 'taskComment'));
    }

    public function update(UpdateTaskCommentRequest $request, TaskComment $taskComment)
    {
        abort_unless(\Gate::allows('task_comment_edit'), 403);

        $taskComment->update($request->all());

        return redirect()->route('admin.task-comments.index');
    }

    public function show(TaskComment $taskComment)
    {
        abort_unless(\Gate::allows('task_comment_show'), 403);

        $taskComment->load('user', 'task', 'client', 'project');

        return view('admin.taskComments.show', compact('taskComment'));
    }

    public function destroy(TaskComment $taskComment)
    {
        abort_unless(\Gate::allows('task_comment_delete'), 403);

        $taskComment->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskCommentRequest $request)
    {
        TaskComment::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
