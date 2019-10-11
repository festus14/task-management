<?php

namespace App\Http\Requests;

use App\ServicesFee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyServicesFeeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('services_fee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:services_fees,id',
        ];
    }
}
