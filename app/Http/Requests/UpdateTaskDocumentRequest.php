<?php

namespace App\Http\Requests;

use App\TaskDocument;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('task_document_edit');
    }

    public function rules()
    {
        return [
            'project_id'    => [
                'required',
                'integer',
            ],
            'task_id'       => [
                'required',
                'integer',
            ],
            'client_id'     => [
                'required',
                'integer',
            ],
            'name'          => [
                'min:4',
                'max:100',
                'required',
            ],
            'document_type' => [
                'required',
            ],
        ];
    }
}
