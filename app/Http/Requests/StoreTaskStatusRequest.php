<?php

namespace App\Http\Requests;

use App\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskStatusRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('task_status_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'unique:task_statuses',
            ],
        ];
    }
}
