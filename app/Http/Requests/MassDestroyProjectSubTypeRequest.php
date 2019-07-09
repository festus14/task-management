<?php

namespace App\Http\Requests;

use App\ProjectSubType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyProjectSubTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('project_sub_type_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:project_sub_types,id',
        ];
    }
}
