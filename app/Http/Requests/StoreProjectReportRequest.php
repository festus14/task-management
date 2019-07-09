<?php

namespace App\Http\Requests;

use App\ProjectReport;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectReportRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('project_report_create');
    }

    public function rules()
    {
        return [
        ];
    }
}
