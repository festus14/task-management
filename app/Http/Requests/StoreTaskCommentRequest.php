<?php

namespace App\Http\Requests;

use App\TaskComment;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskCommentRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('task_comment_create');
    }

    public function rules()
    {
        return [
            'comments'  => [
                'required',
            ],
            'user_id'   => [
                'required',
                'integer',
            ],
            'client_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
