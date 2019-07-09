<?php

namespace App\Http\Requests;

use App\Client;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('client_create');
    }

    public function rules()
    {
        return [
            'name'               => [
                'required',
                'unique:clients',
            ],
            'date_of_engagement' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'expiry_date'        => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
