@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clientPortal.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>

                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection