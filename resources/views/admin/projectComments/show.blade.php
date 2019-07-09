@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.projectComment.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.projectComment.fields.user') }}
                        </th>
                        <td>
                            {{ $projectComment->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectComment.fields.project') }}
                        </th>
                        <td>
                            {{ $projectComment->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectComment.fields.client') }}
                        </th>
                        <td>
                            {{ $projectComment->client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectComment.fields.comments') }}
                        </th>
                        <td>
                            {!! $projectComment->comments !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectComment.fields.action_required') }}
                        </th>
                        <td>
                            {{ $projectComment->action_required }}
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