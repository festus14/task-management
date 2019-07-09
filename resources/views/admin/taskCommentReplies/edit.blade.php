@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.taskCommentReply.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.task-comment-replies.update", [$taskCommentReply->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('task_comment_id') ? 'has-error' : '' }}">
                <label for="task_comment">{{ trans('cruds.taskCommentReply.fields.task_comment') }}*</label>
                <select name="task_comment_id" id="task_comment" class="form-control select2" required>
                    @foreach($task_comments as $id => $task_comment)
                        <option value="{{ $id }}" {{ (isset($taskCommentReply) && $taskCommentReply->task_comment ? $taskCommentReply->task_comment->id : old('task_comment_id')) == $id ? 'selected' : '' }}>{{ $task_comment }}</option>
                    @endforeach
                </select>
                @if($errors->has('task_comment_id'))
                    <p class="help-block">
                        {{ $errors->first('task_comment_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('task_comment_reply') ? 'has-error' : '' }}">
                <label for="task_comment_reply">{{ trans('cruds.taskCommentReply.fields.task_comment_reply') }}*</label>
                <textarea id="task_comment_reply" name="task_comment_reply" class="form-control ckeditor">{{ old('task_comment_reply', isset($taskCommentReply) ? $taskCommentReply->task_comment_reply : '') }}</textarea>
                @if($errors->has('task_comment_reply'))
                    <p class="help-block">
                        {{ $errors->first('task_comment_reply') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.taskCommentReply.fields.task_comment_reply_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('reply_by_id') ? 'has-error' : '' }}">
                <label for="reply_by">{{ trans('cruds.taskCommentReply.fields.reply_by') }}*</label>
                <select name="reply_by_id" id="reply_by" class="form-control select2" required>
                    @foreach($reply_bies as $id => $reply_by)
                        <option value="{{ $id }}" {{ (isset($taskCommentReply) && $taskCommentReply->reply_by ? $taskCommentReply->reply_by->id : old('reply_by_id')) == $id ? 'selected' : '' }}>{{ $reply_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('reply_by_id'))
                    <p class="help-block">
                        {{ $errors->first('reply_by_id') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection