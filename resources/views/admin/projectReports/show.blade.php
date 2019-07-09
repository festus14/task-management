@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.projectReport.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.projectReport.fields.project_report') }}
                        </th>
                        <td>
                            {!! $projectReport->project_report !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectReport.fields.uploads') }}
                        </th>
                        <td>
                            {{ $projectReport->uploads }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectReport.fields.project') }}
                        </th>
                        <td>
                            {{ $projectReport->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectReport.fields.client') }}
                        </th>
                        <td>
                            {{ $projectReport->client->name ?? '' }}
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