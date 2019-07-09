<?php

namespace App\Http\Requests;

use App\Task;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('task_edit');
    }

    public function rules()
    {
        return [
            'name'           => [
                'min:5',
                'max:60',
                'required',
            ],
            'category_id'    => [
                'required',
                'integer',
            ],
            'starting_date'  => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'ending_date'    => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'assinged_tos.*' => [
                'integer',
            ],
            'assinged_tos'   => [
                'required',
                'array',
            ],
            'status_id'      => [
                'required',
                'integer',
            ],
        ];
    }
}
