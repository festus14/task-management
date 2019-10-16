@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.servicesFee.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.servicesFee.fields.id') }}
                        </th>
                        <td>
                            {{ $servicesFee->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servicesFee.fields.name') }}
                        </th>
                        <td>
                            {{ $servicesFee->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servicesFee.fields.amount') }}
                        </th>
                        <td>
                            ${{ $servicesFee->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servicesFee.fields.currency') }}
                        </th>
                        <td>
                            {{ $servicesFee->currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servicesFee.fields.currency_rate') }}
                        </th>
                        <td>
                            {{ $servicesFee->currency_rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.servicesFee.fields.details') }}
                        </th>
                        <td>
                            {!! $servicesFee->details !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection