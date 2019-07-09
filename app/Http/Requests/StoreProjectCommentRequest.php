<?php

namespace App\Http\Requests;

use App\ProjectComment;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectCommentRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('project_comment_create');
    }

    public function rules()
    {
        return [
            'user_id'    => [
                'required',
                'integer',
            ],
            'project_id' => [
                'required',
                'integer',
            ],
            'client_id'  => [
                'required',
                'integer',
            ],
        ];
    }
}
