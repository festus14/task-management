<?php

namespace App\Http\Requests;

use App\ProjectReport;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectReportRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('project_report_edit');
    }

    public function rules()
    {
        return [
        ];
    }
}
