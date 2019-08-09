@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.projects.update", [$project->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                <label for="client">{{ trans('cruds.project.fields.client') }}*</label>
                <select name="client_id" id="client" class="form-control select2" required>
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ (isset($project) && $project->client ? $project->client->id : old('client_id')) == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client_id'))
                    <p class="help-block">
                        {{ $errors->first('client_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.project.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($project) ? $project->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('project_type_id') ? 'has-error' : '' }}">
                <label for="project_type">{{ trans('cruds.project.fields.project_type') }}*</label>
                <select name="project_type_id" id="project_type" class="form-control select2" required>
                    @foreach($project_types as $id => $project_type)
                        <option value="{{ $id }}" {{ (isset($project) && $project->project_type ? $project->project_type->id : old('project_type_id')) == $id ? 'selected' : '' }}>{{ $project_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_type_id'))
                    <p class="help-block">
                        {{ $errors->first('project_type_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('project_subtype_id') ? 'has-error' : '' }}">
                <label for="project_subtype">Project Subtype*</label>
                <select name="project_subtype_id" id="project_subtype" class="form-control select2" required>
                        @foreach($project_subtypes as $id => $project_subtype)
                            <option value="{{ $id }}" {{ (isset($project) && $project->project_subtype ? $project->project_subtype->id : old('project_type_id')) == $id ? 'selected' : '' }}>{{ $project_subtype }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('project_subtype_id'))
                        <p class="help-block">
                            {{ $errors->first('project_subtype_id') }}
                        </p>
                    @endif
                </div>
            <div class="form-group {{ $errors->has('starting_date') ? 'has-error' : '' }}">
                <label for="starting_date">{{ trans('cruds.project.fields.starting_date') }}*</label>
                <input type="text" id="starting_date" name="starting_date" class="form-control date" value="{{ old('starting_date', isset($project) ? $project->starting_date : '') }}" required>
                @if($errors->has('starting_date'))
                    <p class="help-block">
                        {{ $errors->first('starting_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.starting_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('deadline') ? 'has-error' : '' }}">
                <label for="deadline">{{ trans('cruds.project.fields.deadline') }}*</label>
                <input type="text" id="deadline" name="deadline" class="form-control datetime" value="{{ old('deadline', isset($project) ? $project->deadline : '') }}" required>
                @if($errors->has('deadline'))
                    <p class="help-block">
                        {{ $errors->first('deadline') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.deadline_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('manager_id') ? 'has-error' : '' }}">
                <label for="manager">{{ trans('cruds.project.fields.manager') }}</label>
                <select name="manager_id" id="manager" class="form-control select2">
                    @foreach($managers as $id => $manager)
                        <option value="{{ $id }}" {{ (isset($project) && $project->manager ? $project->manager->id : old('manager_id')) == $id ? 'selected' : '' }}>{{ $manager }}</option>
                    @endforeach
                </select>
                @if($errors->has('manager_id'))
                    <p class="help-block">
                        {{ $errors->first('manager_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('team_members') ? 'has-error' : '' }}">
                <label for="team_members">{{ trans('cruds.project.fields.team_members') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="team_members[]" id="team_members" class="form-control select2" multiple="multiple">
                    @foreach($team_members as $id => $team_members)
                        <option value="{{ $id }}" {{ (in_array($id, old('team_members', [])) || isset($project) && $project->team_members->contains($id)) ? 'selected' : '' }}>{{ $team_members }}</option>
                    @endforeach
                </select>
                @if($errors->has('team_members'))
                    <p class="help-block">
                        {{ $errors->first('team_members') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.project.fields.team_members_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.task.fields.status') }}*</label>
                <select name="status_id" id="status" class="form-control select2" required>
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ (isset($task) && $task->status ? $task->status->id : old('status_id')) == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_id'))
                    <p class="help-block">
                        {{ $errors->first('status_id') }}
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
