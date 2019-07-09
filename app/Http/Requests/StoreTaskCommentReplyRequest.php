<?php

namespace App\Http\Requests;

use App\TaskCommentReply;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskCommentReplyRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('task_comment_reply_create');
    }

    public function rules()
    {
        return [
            'task_comment_id'    => [
                'required',
                'integer',
            ],
            'task_comment_reply' => [
                'required',
            ],
            'reply_by_id'        => [
                'required',
                'integer',
            ],
        ];
    }
}
