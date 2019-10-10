<?php

namespace App\Http\Requests;

use App\PayrollLetter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePayrollLetterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('payroll_letter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'client_id'          => [
                'required',
                'integer',
            ],
            'project_id'         => [
                'required',
                'integer',
            ],
            'date'               => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'contact_person'     => [
                'required',
            ],
            'company_short_name' => [
                'required',
            ],
            'staff_name'         => [
                'required',
            ],
        ];
    }
}
