<?php

namespace App\Http\Requests;

use App\ProjectSubType;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectSubTypeRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('project_sub_type_create');
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
                'unique:project_sub_types',
            ],
        ];
    }
}
