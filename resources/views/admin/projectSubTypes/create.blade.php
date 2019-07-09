@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.projectSubType.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.project-sub-types.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('project_type_id') ? 'has-error' : '' }}">
                <label for="project_type">{{ trans('cruds.projectSubType.fields.project_type') }}*</label>
                <select name="project_type_id" id="project_type" class="form-control select2" required>
                    @foreach($project_types as $id => $project_type)
                        <option value="{{ $id }}" {{ (isset($projectSubType) && $projectSubType->project_type ? $projectSubType->project_type->id : old('project_type_id')) == $id ? 'selected' : '' }}>{{ $project_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_type_id'))
                    <p class="help-block">
                        {{ $errors->first('project_type_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.projectSubType.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($projectSubType) ? $projectSubType->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.projectSubType.fields.name_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection