@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.taskComment.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.task-comments.update", [$taskComment->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
                <label for="comments">{{ trans('cruds.taskComment.fields.comments') }}*</label>
                <textarea id="comments" name="comments" class="form-control ckeditor">{{ old('comments', isset($taskComment) ? $taskComment->comments : '') }}</textarea>
                @if($errors->has('comments'))
                    <p class="help-block">
                        {{ $errors->first('comments') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.taskComment.fields.comments_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('task_id') ? 'has-error' : '' }}">
                <label for="task">{{ trans('cruds.taskComment.fields.task') }}</label>
                <select name="task_id" id="task" class="form-control select2">
                    @foreach($tasks as $id => $task)
                        <option value="{{ $id }}" {{ (isset($taskComment) && $taskComment->task ? $taskComment->task->id : old('task_id')) == $id ? 'selected' : '' }}>{{ $task }}</option>
                    @endforeach
                </select>
                @if($errors->has('task_id'))
                    <p class="help-block">
                        {{ $errors->first('task_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                <label for="client">{{ trans('cruds.taskComment.fields.client') }}*</label>
                <select name="client_id" id="client" class="form-control select2" required>
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ (isset($taskComment) && $taskComment->client ? $taskComment->client->id : old('client_id')) == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client_id'))
                    <p class="help-block">
                        {{ $errors->first('client_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
                <label for="project">{{ trans('cruds.taskComment.fields.project') }}</label>
                <select name="project_id" id="project" class="form-control select2">
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (isset($taskComment) && $taskComment->project ? $taskComment->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_id'))
                    <p class="help-block">
                        {{ $errors->first('project_id') }}
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