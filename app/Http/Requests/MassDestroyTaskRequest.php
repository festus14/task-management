<?php

namespace App\Http\Requests;

use App\Task;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTaskRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('task_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tasks,id',
        ];
    }
}
