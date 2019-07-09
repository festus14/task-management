<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;

class DocumentsApiController extends Controller
{
    public function index()
    {
        $documents = Document::all();

        return $documents;
    }

    public function store(StoreDocumentRequest $request)
    {
        return Document::create($request->all());
    }

    public function update(UpdateDocumentRequest $request, Document $document)
    {
        return $document->update($request->all());
    }

    public function show(Document $document)
    {
        return $document;
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return response("OK", 200);
    }
}
