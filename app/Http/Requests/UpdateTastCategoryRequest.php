<?php

namespace App\Http\Requests;

use App\TastCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTastCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('tast_category_edit');
    }

    public function rules()
    {
        return [
            'name'            => [
                'required',
                'unique:tast_categories,name,' . request()->route('tast_category')->id,
            ],
            'project_type_id' => [
                'required',
                'integer',
            ],
            'weight'          => [
                'min:1',
                'max:100',
                'required',
            ],
        ];
    }
}
