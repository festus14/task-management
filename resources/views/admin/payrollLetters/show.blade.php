@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.payrollLetter.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.id') }}
                        </th>
                        <td>
                            {{ $payrollLetter->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.client') }}
                        </th>
                        <td>
                            {{ $payrollLetter->client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.project') }}
                        </th>
                        <td>
                            {{ $payrollLetter->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.date') }}
                        </th>
                        <td>
                            {{ $payrollLetter->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.contact_person') }}
                        </th>
                        <td>
                            {{ $payrollLetter->contact_person }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.company_short_name') }}
                        </th>
                        <td>
                            {{ $payrollLetter->company_short_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.staff_name') }}
                        </th>
                        <td>
                            {{ $payrollLetter->staff_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.client_summary') }}
                        </th>
                        <td>
                            {!! $payrollLetter->client_summary !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.fees_table') }}
                        </th>
                        <td>
                            {!! $payrollLetter->fees_table !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.fees_footer') }}
                        </th>
                        <td>
                            {!! $payrollLetter->fees_footer !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.other_services_charges') }}
                        </th>
                        <td>
                            {!! $payrollLetter->other_services_charges !!}
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