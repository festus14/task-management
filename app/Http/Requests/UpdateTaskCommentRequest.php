<?php

namespace App\Http\Requests;

use App\TaskComment;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskCommentRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('task_comment_edit');
    }

    public function rules()
    {
        return [
            'comments'  => [
                'required',
            ],
            'client_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
