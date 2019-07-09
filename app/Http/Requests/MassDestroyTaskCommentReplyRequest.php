<?php

namespace App\Http\Requests;

use App\TaskCommentReply;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTaskCommentReplyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('task_comment_reply_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:task_comment_replies,id',
        ];
    }
}
