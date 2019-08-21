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
        try {
            $documents = Document::all();
            return response()->json(['data' => $documents], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
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

        try {
            return response()->json(['data' => $document], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[]], 401);
        }
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return response("OK", 200);
    }
}
