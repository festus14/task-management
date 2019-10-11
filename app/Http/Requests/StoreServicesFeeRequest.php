<?php

namespace App\Http\Requests;

use App\ServicesFee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreServicesFeeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('services_fee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'   => [
                'required',
                'unique:services_fees',
            ],
            'amount' => [
                'required',
            ],
        ];
    }
}
