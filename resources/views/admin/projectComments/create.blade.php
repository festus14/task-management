@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.projectComment.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.project-comments.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                <label for="user">{{ trans('cruds.projectComment.fields.user') }}*</label>
                <select name="user_id" id="user" class="form-control select2" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (isset($projectComment) && $projectComment->user ? $projectComment->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_id'))
                    <p class="help-block">
                        {{ $errors->first('user_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
                <label for="project">{{ trans('cruds.projectComment.fields.project') }}*</label>
                <select name="project_id" id="project" class="form-control select2" required>
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (isset($projectComment) && $projectComment->project ? $projectComment->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_id'))
                    <p class="help-block">
                        {{ $errors->first('project_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                <label for="client">{{ trans('cruds.projectComment.fields.client') }}*</label>
                <select name="client_id" id="client" class="form-control select2" required>
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ (isset($projectComment) && $projectComment->client ? $projectComment->client->id : old('client_id')) == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client_id'))
                    <p class="help-block">
                        {{ $errors->first('client_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
                <label for="comments">{{ trans('cruds.projectComment.fields.comments') }}</label>
                <textarea id="comments" name="comments" class="form-control ckeditor">{{ old('comments', isset($projectComment) ? $projectComment->comments : '') }}</textarea>
                @if($errors->has('comments'))
                    <p class="help-block">
                        {{ $errors->first('comments') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.projectComment.fields.comments_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('action_required') ? 'has-error' : '' }}">
                <label for="action_required">{{ trans('cruds.projectComment.fields.action_required') }}</label>
                <input type="text" id="action_required" name="action_required" class="form-control" value="{{ old('action_required', isset($projectComment) ? $projectComment->action_required : '') }}">
                @if($errors->has('action_required'))
                    <p class="help-block">
                        {{ $errors->first('action_required') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.projectComment.fields.action_required_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection