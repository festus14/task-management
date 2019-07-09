<?php

namespace App\Http\Requests;

use App\TastCategory;
use Illuminate\Foundation\Http\FormRequest;

class StoreTastCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('tast_category_create');
    }

    public function rules()
    {
        return [
            'name'            => [
                'required',
                'unique:tast_categories',
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
