@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.servicesFee.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.services-fees.update", [$servicesFee->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.servicesFee.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($servicesFee) ? $servicesFee->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.servicesFee.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                <label for="amount">{{ trans('cruds.servicesFee.fields.amount') }}*</label>
                <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($servicesFee) ? $servicesFee->amount : '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <p class="help-block">
                        {{ $errors->first('amount') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.servicesFee.fields.amount_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('currency') ? 'has-error' : '' }}">
                <label for="currency">{{ trans('cruds.servicesFee.fields.currency') }}</label>
                <input type="text" id="currency" name="currency" class="form-control" value="{{ old('currency', isset($servicesFee) ? $servicesFee->currency : '') }}">
                @if($errors->has('currency'))
                    <p class="help-block">
                        {{ $errors->first('currency') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.servicesFee.fields.currency_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('currency_rate') ? 'has-error' : '' }}">
                <label for="currency_rate">{{ trans('cruds.servicesFee.fields.currency_rate') }}</label>
                <input type="number" id="currency_rate" name="currency_rate" class="form-control" value="{{ old('currency_rate', isset($servicesFee) ? $servicesFee->currency_rate : '') }}" step="0.01">
                @if($errors->has('currency_rate'))
                    <p class="help-block">
                        {{ $errors->first('currency_rate') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.servicesFee.fields.currency_rate_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('details') ? 'has-error' : '' }}">
                <label for="details">{{ trans('cruds.servicesFee.fields.details') }}</label>
                <textarea id="details" name="details" class="form-control ckeditor">{{ old('details', isset($servicesFee) ? $servicesFee->details : '') }}</textarea>
                @if($errors->has('details'))
                    <p class="help-block">
                        {{ $errors->first('details') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.servicesFee.fields.details_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection