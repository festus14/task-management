<?php

namespace App\Http\Requests;

use App\ProjectType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyProjectTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('project_type_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:project_types,id',
        ];
    }
}
