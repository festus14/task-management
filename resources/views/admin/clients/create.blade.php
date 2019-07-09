@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.clients.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.client.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($client) ? $client->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.client.fields.address') }}</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($client) ? $client->address : '') }}">
                @if($errors->has('address'))
                    <p class="help-block">
                        {{ $errors->first('address') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('date_of_engagement') ? 'has-error' : '' }}">
                <label for="date_of_engagement">{{ trans('cruds.client.fields.date_of_engagement') }}</label>
                <input type="text" id="date_of_engagement" name="date_of_engagement" class="form-control date" value="{{ old('date_of_engagement', isset($client) ? $client->date_of_engagement : '') }}">
                @if($errors->has('date_of_engagement'))
                    <p class="help-block">
                        {{ $errors->first('date_of_engagement') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.date_of_engagement_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.client.fields.status') }}</label>
                <select id="status" name="status" class="form-control">
                    <option value="" disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Client::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <p class="help-block">
                        {{ $errors->first('status') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('expiry_date') ? 'has-error' : '' }}">
                <label for="expiry_date">{{ trans('cruds.client.fields.expiry_date') }}</label>
                <input type="text" id="expiry_date" name="expiry_date" class="form-control date" value="{{ old('expiry_date', isset($client) ? $client->expiry_date : '') }}">
                @if($errors->has('expiry_date'))
                    <p class="help-block">
                        {{ $errors->first('expiry_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.expiry_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.client.fields.email') }}</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($client) ? $client->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($client) ? $client->phone : '') }}">
                @if($errors->has('phone'))
                    <p class="help-block">
                        {{ $errors->first('phone') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.client.fields.phone_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection