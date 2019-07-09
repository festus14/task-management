@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tastCategory.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tastCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $tastCategory->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tastCategory.fields.project_type') }}
                        </th>
                        <td>
                            {{ $tastCategory->project_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tastCategory.fields.sub_category') }}
                        </th>
                        <td>
                            {{ $tastCategory->sub_category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tastCategory.fields.weight') }}
                        </th>
                        <td>
                            {{ $tastCategory->weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tastCategory.fields.description') }}
                        </th>
                        <td>
                            {{ $tastCategory->description }}
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