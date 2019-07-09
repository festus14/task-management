<?php

namespace App\Http\Requests;

use App\ProjectType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectTypeRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('project_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'min:3',
                'max:70',
                'required',
                'unique:project_types,name,' . request()->route('project_type')->id,
            ],
        ];
    }
}
