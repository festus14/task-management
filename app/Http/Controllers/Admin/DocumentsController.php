<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentRequest;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Project;

class DocumentsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_unless(\Gate::allows('document_access'), 403);

        $documents = Document::all();

        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('document_create'), 403);

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.documents.create', compact('clients', 'projects'));
    }

    public function store(StoreDocumentRequest $request)
    {
        abort_unless(\Gate::allows('document_create'), 403);

        $document = Document::create($request->all());

        foreach ($request->input('file', []) as $file) {
            $document->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file');
        }

        return redirect()->back();
    }

    public function edit(Document $document)
    {
        abort_unless(\Gate::allows('document_edit'), 403);

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $document->load('client', 'project');

        return view('admin.documents.edit', compact('clients', 'projects', 'document'));
    }

    public function update(UpdateDocumentRequest $request, Document $document)
    {
        abort_unless(\Gate::allows('document_edit'), 403);

        $document->update($request->all());

        if (count($document->file) > 0) {
            foreach ($document->file as $media) {
                if (!in_array($media->file_name, $request->input('file', []))) {
                    $media->delete();
                }
            }
        }

        $media = $document->file->pluck('file_name')->toArray();

        foreach ($request->input('file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $document->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file');
            }
        }

        return redirect()->back();
    }

    public function show(Document $document)
    {
        abort_unless(\Gate::allows('document_show'), 403);

        $document->load('client', 'project');

        return view('admin.documents.show', compact('document'));
    }

    public function destroy(Document $document)
    {
        abort_unless(\Gate::allows('document_delete'), 403);

        $document->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentRequest $request)
    {
        Document::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
