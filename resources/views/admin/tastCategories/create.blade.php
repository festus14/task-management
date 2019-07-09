@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tastCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tast-categories.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.tastCategory.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($tastCategory) ? $tastCategory->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.tastCategory.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('project_type_id') ? 'has-error' : '' }}">
                <label for="project_type">{{ trans('cruds.tastCategory.fields.project_type') }}*</label>
                <select name="project_type_id" id="project_type" class="form-control select2" required>
                    @foreach($project_types as $id => $project_type)
                        <option value="{{ $id }}" {{ (isset($tastCategory) && $tastCategory->project_type ? $tastCategory->project_type->id : old('project_type_id')) == $id ? 'selected' : '' }}>{{ $project_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_type_id'))
                    <p class="help-block">
                        {{ $errors->first('project_type_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('sub_category_id') ? 'has-error' : '' }}">
                <label for="sub_category">{{ trans('cruds.tastCategory.fields.sub_category') }}</label>
                <select name="sub_category_id" id="sub_category" class="form-control select2">
                    @foreach($sub_categories as $id => $sub_category)
                        <option value="{{ $id }}" {{ (isset($tastCategory) && $tastCategory->sub_category ? $tastCategory->sub_category->id : old('sub_category_id')) == $id ? 'selected' : '' }}>{{ $sub_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_category_id'))
                    <p class="help-block">
                        {{ $errors->first('sub_category_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('weight') ? 'has-error' : '' }}">
                <label for="weight">{{ trans('cruds.tastCategory.fields.weight') }}*</label>
                <input type="text" id="weight" name="weight" class="form-control" value="{{ old('weight', isset($tastCategory) ? $tastCategory->weight : '') }}" required>
                @if($errors->has('weight'))
                    <p class="help-block">
                        {{ $errors->first('weight') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.tastCategory.fields.weight_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.tastCategory.fields.description') }}</label>
                <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($tastCategory) ? $tastCategory->description : '') }}">
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.tastCategory.fields.description_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection