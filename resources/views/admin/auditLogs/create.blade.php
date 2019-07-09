@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.auditLog.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.audit-logs.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection