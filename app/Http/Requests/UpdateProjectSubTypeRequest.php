<?php

namespace App\Http\Requests;

use App\ProjectSubType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectSubTypeRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('project_sub_type_edit');
    }

    public function rules()
    {
        return [
            'project_type_id' => [
                'required',
                'integer',
            ],
            'name'            => [
                'min:3',
                'max:60',
                'required',
                'unique:project_sub_types,name,' . request()->route('project_sub_type')->id,
            ],
        ];
    }
}
