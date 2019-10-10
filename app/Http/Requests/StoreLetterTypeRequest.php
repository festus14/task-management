<?php

namespace App\Http\Requests;

use App\LetterType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreLetterTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('letter_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'unique:letter_types',
            ],
        ];
    }
}
