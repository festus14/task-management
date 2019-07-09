<?php

namespace App\Http\Requests;

use App\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskStatusRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('task_status_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'unique:task_statuses,name,' . request()->route('task_status')->id,
            ],
        ];
    }
}
