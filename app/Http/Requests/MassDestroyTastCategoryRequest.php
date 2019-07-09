<?php

namespace App\Http\Requests;

use App\TastCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTastCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tast_category_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tast_categories,id',
        ];
    }
}
