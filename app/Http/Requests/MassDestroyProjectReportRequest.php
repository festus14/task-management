<?php

namespace App\Http\Requests;

use App\ProjectReport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyProjectReportRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('project_report_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:project_reports,id',
        ];
    }
}
