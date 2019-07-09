<?php

namespace App\Http\Requests;

use App\ProjectComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyProjectCommentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('project_comment_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:project_comments,id',
        ];
    }
}
