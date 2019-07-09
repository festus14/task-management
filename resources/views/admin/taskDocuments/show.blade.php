@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.taskDocument.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.taskDocument.fields.project') }}
                        </th>
                        <td>
                            {{ $taskDocument->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskDocument.fields.task') }}
                        </th>
                        <td>
                            {{ $taskDocument->task->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskDocument.fields.client') }}
                        </th>
                        <td>
                            {{ $taskDocument->client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskDocument.fields.name') }}
                        </th>
                        <td>
                            {{ $taskDocument->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskDocument.fields.document_type') }}
                        </th>
                        <td>
                            {{ App\TaskDocument::DOCUMENT_TYPE_SELECT[$taskDocument->document_type] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskDocument.fields.document') }}
                        </th>
                        <td>
                            {{ $taskDocument->document }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.taskDocument.fields.comment') }}
                        </th>
                        <td>
                            {!! $taskDocument->comment !!}
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