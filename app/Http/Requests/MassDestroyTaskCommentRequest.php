<?php

namespace App\Http\Requests;

use App\TaskComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTaskCommentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('task_comment_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:task_comments,id',
        ];
    }
}
