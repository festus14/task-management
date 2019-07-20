<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Project;
use App\Task;
use App\TaskStatus;
use App\TastCategory;
use App\User;

class TaskController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('task_access'), 403);

        $tasks = Task::all();

        return view('theme.laravel.task.index', compact('tasks'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('task_create'), 403);

        $categories = TastCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assinged_tos = User::all()->pluck('name', 'id');

        $managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = TaskStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tasks.create', compact('categories', 'assinged_tos', 'managers', 'statuses', 'projects', 'clients'));
    }

    public function store(StoreTaskRequest $request)
    {
        abort_unless(\Gate::allows('task_create'), 403);

        $task = Task::create($request->all());
        $task->assinged_tos()->sync($request->input('assinged_tos', []));

        return redirect()->route('admin.tasks.index');
    }

    public function edit(Task $task)
    {
        abort_unless(\Gate::allows('task_edit'), 403);

        $categories = TastCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assinged_tos = User::all()->pluck('name', 'id');

        $managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = TaskStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $task->load('category', 'assinged_tos', 'manager', 'status', 'project', 'client');

        return view('admin.tasks.edit', compact('categories', 'assinged_tos', 'managers', 'statuses', 'projects', 'clients', 'task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        abort_unless(\Gate::allows('task_edit'), 403);

        $task->update($request->all());
        $task->assinged_tos()->sync($request->input('assinged_tos', []));

        return redirect()->route('admin.tasks.index');
    }

    public function show(Task $task)
    {
        abort_unless(\Gate::allows('task_show'), 403);

        $task->load('category', 'assinged_tos', 'manager', 'status', 'project', 'client');

        return view('admin.tasks.show', compact('task'));
    }

    public function destroy(Task $task)
    {
        abort_unless(\Gate::allows('task_delete'), 403);

        $task->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskRequest $request)
    {
        Task::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
