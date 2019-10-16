<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use Illuminate\Support\Facades\Validator;

class DocumentsApiController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;
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
            foreach ($request->input('file', []) as $file) {
                $document->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file');
            }
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
            return response()->json(['success' => 'record updated successfully', 'data' => $updated_document], 200);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'failed to create record', 'message' => $e->getMessage()], 401);
        }
    }

    public function show($id)
    {

        try {
            $document = Document::with('project')->with('task')->with('client')->with('media_report')->findOrFail($id);
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
