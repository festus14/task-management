<?php

namespace App\Http\Requests;

use App\Document;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyDocumentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('document_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:documents,id',
        ];
    }
}
