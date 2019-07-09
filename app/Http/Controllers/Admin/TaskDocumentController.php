<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTaskDocumentRequest;
use App\Http\Requests\StoreTaskDocumentRequest;
use App\Http\Requests\UpdateTaskDocumentRequest;
use App\Project;
use App\Task;
use App\TaskDocument;

class TaskDocumentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('task_document_access'), 403);

        $taskDocuments = TaskDocument::all();

        return view('admin.taskDocuments.index', compact('taskDocuments'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('task_document_create'), 403);

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tasks = Task::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.taskDocuments.create', compact('projects', 'tasks', 'clients'));
    }

    public function store(StoreTaskDocumentRequest $request)
    {
        abort_unless(\Gate::allows('task_document_create'), 403);

        $taskDocument = TaskDocument::create($request->all());

        if ($request->input('document', false)) {
            $taskDocument->addMedia(storage_path('tmp/uploads/' . $request->input('document')))->toMediaCollection('document');
        }

        return redirect()->route('admin.task-documents.index');
    }

    public function edit(TaskDocument $taskDocument)
    {
        abort_unless(\Gate::allows('task_document_edit'), 403);

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tasks = Task::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $taskDocument->load('project', 'task', 'client');

        return view('admin.taskDocuments.edit', compact('projects', 'tasks', 'clients', 'taskDocument'));
    }

    public function update(UpdateTaskDocumentRequest $request, TaskDocument $taskDocument)
    {
        abort_unless(\Gate::allows('task_document_edit'), 403);

        $taskDocument->update($request->all());

        if ($request->input('document', false)) {
            if (!$taskDocument->document || $request->input('document') !== $taskDocument->document->file_name) {
                $taskDocument->addMedia(storage_path('tmp/uploads/' . $request->input('document')))->toMediaCollection('document');
            }
        } elseif ($taskDocument->document) {
            $taskDocument->document->delete();
        }

        return redirect()->route('admin.task-documents.index');
    }

    public function show(TaskDocument $taskDocument)
    {
        abort_unless(\Gate::allows('task_document_show'), 403);

        $taskDocument->load('project', 'task', 'client');

        return view('admin.taskDocuments.show', compact('taskDocument'));
    }

    public function destroy(TaskDocument $taskDocument)
    {
        abort_unless(\Gate::allows('task_document_delete'), 403);

        $taskDocument->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskDocumentRequest $request)
    {
        TaskDocument::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
