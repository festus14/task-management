@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.taskCommentReply.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.taskCommentReply.fields.task_comment') }}
                        </th>
                        <td>
                            {{ $taskCommentReply->task_comment->comments ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskCommentReply.fields.task_comment_reply') }}
                        </th>
                        <td>
                            {!! $taskCommentReply->task_comment_reply !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskCommentReply.fields.reply_by') }}
                        </th>
                        <td>
                            {{ $taskCommentReply->reply_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection