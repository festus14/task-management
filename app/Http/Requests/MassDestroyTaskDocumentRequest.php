<?php

namespace App\Http\Requests;

use App\TaskDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTaskDocumentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('task_document_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:task_documents,id',
        ];
    }
}
