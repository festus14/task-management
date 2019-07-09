<?php

namespace App\Http\Requests;

use App\Project;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('project_edit');
    }

    public function rules()
    {
        return [
            'client_id'       => [
                'required',
                'integer',
            ],
            'name'            => [
                'required',
            ],
            'project_type_id' => [
                'required',
                'integer',
            ],
            'starting_date'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'deadline'        => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'team_members.*'  => [
                'integer',
            ],
            'team_members'    => [
                'array',
            ],
        ];
    }
}
