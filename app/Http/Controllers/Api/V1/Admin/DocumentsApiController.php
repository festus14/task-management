<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $document = Document::create($request->all());
            return response()->json(['success' => 'record created successfully', 'data' => $document], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record'], 401);
        }
    }

    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error'=> 'failed to create record'], 401);
        }
        try {
            $updated_document = $document->update($request->all());
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_document], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record', 'message' => $e->getMessage()], 401);
        }
    }

    public function show(Document $document)
    {

        try {
            return response()->json(['data' => $document], 200);
        }
        catch(\Exception $e){
            return response()->json(['data'=>[], 'message'=> $e->getMessage()], 401);
        }
    }

    public function destroy(Document $document)
    {
        try {
            $document->delete();
            return response()->json(['success' => 'record deleted successfully'], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to delete record'], 401);
        }
    }
}
