@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.payrollLetter.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.payroll-letters.update", [$payrollLetter->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                <label for="client">{{ trans('cruds.payrollLetter.fields.client') }}*</label>
                <select name="client_id" id="client" class="form-control select2" required>
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ (isset($payrollLetter) && $payrollLetter->client ? $payrollLetter->client->id : old('client_id')) == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client_id'))
                    <p class="help-block">
                        {{ $errors->first('client_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
                <label for="project">{{ trans('cruds.payrollLetter.fields.project') }}*</label>
                <select name="project_id" id="project" class="form-control select2" required>
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ (isset($payrollLetter) && $payrollLetter->project ? $payrollLetter->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_id'))
                    <p class="help-block">
                        {{ $errors->first('project_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                <label for="date">{{ trans('cruds.payrollLetter.fields.date') }}*</label>
                <input type="text" id="date" name="date" class="form-control date" value="{{ old('date', isset($payrollLetter) ? $payrollLetter->date : '') }}" required>
                @if($errors->has('date'))
                    <p class="help-block">
                        {{ $errors->first('date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.payrollLetter.fields.date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('contact_person') ? 'has-error' : '' }}">
                <label for="contact_person">{{ trans('cruds.payrollLetter.fields.contact_person') }}*</label>
                <input type="text" id="contact_person" name="contact_person" class="form-control" value="{{ old('contact_person', isset($payrollLetter) ? $payrollLetter->contact_person : '') }}" required>
                @if($errors->has('contact_person'))
                    <p class="help-block">
                        {{ $errors->first('contact_person') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.payrollLetter.fields.contact_person_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('company_short_name') ? 'has-error' : '' }}">
                <label for="company_short_name">{{ trans('cruds.payrollLetter.fields.company_short_name') }}*</label>
                <input type="text" id="company_short_name" name="company_short_name" class="form-control" value="{{ old('company_short_name', isset($payrollLetter) ? $payrollLetter->company_short_name : '') }}" required>
                @if($errors->has('company_short_name'))
                    <p class="help-block">
                        {{ $errors->first('company_short_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.payrollLetter.fields.company_short_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('staff_name') ? 'has-error' : '' }}">
                <label for="staff_name">{{ trans('cruds.payrollLetter.fields.staff_name') }}*</label>
                <input type="text" id="staff_name" name="staff_name" class="form-control" value="{{ old('staff_name', isset($payrollLetter) ? $payrollLetter->staff_name : '') }}" required>
                @if($errors->has('staff_name'))
                    <p class="help-block">
                        {{ $errors->first('staff_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.payrollLetter.fields.staff_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('client_summary') ? 'has-error' : '' }}">
                <label for="client_summary">{{ trans('cruds.payrollLetter.fields.client_summary') }}</label>
                <textarea id="client_summary" name="client_summary" class="form-control ckeditor">{{ old('client_summary', isset($payrollLetter) ? $payrollLetter->client_summary : '') }}</textarea>
                @if($errors->has('client_summary'))
                    <p class="help-block">
                        {{ $errors->first('client_summary') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.payrollLetter.fields.client_summary_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fees_table') ? 'has-error' : '' }}">
                <label for="fees_table">{{ trans('cruds.payrollLetter.fields.fees_table') }}</label>
                <textarea id="fees_table" name="fees_table" class="form-control ckeditor">{{ old('fees_table', isset($payrollLetter) ? $payrollLetter->fees_table : '') }}</textarea>
                @if($errors->has('fees_table'))
                    <p class="help-block">
                        {{ $errors->first('fees_table') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.payrollLetter.fields.fees_table_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fees_footer') ? 'has-error' : '' }}">
                <label for="fees_footer">{{ trans('cruds.payrollLetter.fields.fees_footer') }}</label>
                <textarea id="fees_footer" name="fees_footer" class="form-control ckeditor">{{ old('fees_footer', isset($payrollLetter) ? $payrollLetter->fees_footer : '') }}</textarea>
                @if($errors->has('fees_footer'))
                    <p class="help-block">
                        {{ $errors->first('fees_footer') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.payrollLetter.fields.fees_footer_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('other_services_charges') ? 'has-error' : '' }}">
                <label for="other_services_charges">{{ trans('cruds.payrollLetter.fields.other_services_charges') }}</label>
                <textarea id="other_services_charges" name="other_services_charges" class="form-control ckeditor">{{ old('other_services_charges', isset($payrollLetter) ? $payrollLetter->other_services_charges : '') }}</textarea>
                @if($errors->has('other_services_charges'))
                    <p class="help-block">
                        {{ $errors->first('other_services_charges') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.payrollLetter.fields.other_services_charges_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection