@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.task.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tasks.update", [$task->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.task.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($task) ? $task->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.task.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <label for="category">{{ trans('cruds.task.fields.category') }}*</label>
                <select name="category_id" id="category" class="form-control select2" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (isset($task) && $task->category ? $task->category->id : old('category_id')) == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <p class="help-block">
                        {{ $errors->first('category_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('starting_date') ? 'has-error' : '' }}">
                <label for="starting_date">{{ trans('cruds.task.fields.starting_date') }}*</label>
                <input type="text" id="starting_date" name="starting_date" class="form-control datetime" value="{{ old('starting_date', isset($task) ? $task->starting_date : '') }}" required>
                @if($errors->has('starting_date'))
                    <p class="help-block">
                        {{ $errors->first('starting_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.task.fields.starting_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ending_date') ? 'has-error' : '' }}">
                <label for="ending_date">{{ trans('cruds.task.fields.ending_date') }}*</label>
                <input type="text" id="ending_date" name="ending_date" class="form-control datetime" value="{{ old('ending_date', isset($task) ? $task->ending_date : '') }}" required>
                @if($errors->has('ending_date'))
                    <p class="help-block">
                        {{ $errors->first('ending_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.task.fields.ending_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('assinged_tos') ? 'has-error' : '' }}">
                <label for="assinged_to">{{ trans('cruds.task.fields.assinged_to') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="assinged_tos[]" id="assinged_tos" class="form-control select2" multiple="multiple" required>
                    @foreach($assinged_tos as $id => $assinged_to)
                        <option value="{{ $id }}" {{ (in_array($id, old('assinged_tos', [])) || isset($task) && $task->assinged_tos->contains($id)) ? 'selected' : '' }}>{{ $assinged_to }}</option>
                    @endforeach
                </select>
                @if($errors->has('assinged_tos'))
                    <p class="help-block">
                        {{ $errors->first('assinged_tos') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.task.fields.assinged_to_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('manager_id') ? 'has-error' : '' }}">
                <label for="manager">{{ trans('cruds.task.fields.manager') }}</label>
                <select name="manager_id" id="manager" class="form-control select2">
                    @foreach($managers as $id => $manager)
                        <option value="{{ $id }}" {{ (isset($task) && $task->manager ? $task->manager->id : old('manager_id')) == $id ? 'selected' : '' }}>{{ $manager }}</option>
                    @endforeach
                </select>
                @if($errors->has('manager_id'))
                    <p class="help-block">
                        {{ $errors->first('manager_id') }}
                    </p>
                @endif
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
            <div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
                <label for="project">{{ trans('cruds.task.fields.project') }}</label>
                <select name="project_id" id="project" class="form-control select2">
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (isset($task) && $task->project ? $task->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_id'))
                    <p class="help-block">
                        {{ $errors->first('project_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                <label for="client">{{ trans('cruds.task.fields.client') }}</label>
                <select name="client_id" id="client" class="form-control select2">
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ (isset($task) && $task->client ? $task->client->id : old('client_id')) == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client_id'))
                    <p class="help-block">
                        {{ $errors->first('client_id') }}
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