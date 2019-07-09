@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.taskComment.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.taskComment.fields.comments') }}
                        </th>
                        <td>
                            {!! $taskComment->comments !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskComment.fields.user') }}
                        </th>
                        <td>
                            {{ $taskComment->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskComment.fields.task') }}
                        </th>
                        <td>
                            {{ $taskComment->task->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskComment.fields.client') }}
                        </th>
                        <td>
                            {{ $taskComment->client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskComment.fields.project') }}
                        </th>
                        <td>
                            {{ $taskComment->project->name ?? '' }}
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