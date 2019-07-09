@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.task.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.name') }}
                        </th>
                        <td>
                            {{ $task->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.category') }}
                        </th>
                        <td>
                            {{ $task->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.starting_date') }}
                        </th>
                        <td>
                            {{ $task->starting_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.ending_date') }}
                        </th>
                        <td>
                            {{ $task->ending_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Assinged To
                        </th>
                        <td>
                            @foreach($task->assinged_tos as $id => $assinged_to)
                                <span class="label label-info label-many">{{ $assinged_to->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.manager') }}
                        </th>
                        <td>
                            {{ $task->manager->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.status') }}
                        </th>
                        <td>
                            {{ $task->status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.project') }}
                        </th>
                        <td>
                            {{ $task->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.client') }}
                        </th>
                        <td>
                            {{ $task->client->name ?? '' }}
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