<?php

namespace App\Http\Requests;

use App\ServicesFee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateServicesFeeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('services_fee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'   => [
                'required',
                'unique:services_fees,name,' . request()->route('services_fee')->id,
            ],
            'amount' => [
                'required',
            ],
        ];
    }
}
