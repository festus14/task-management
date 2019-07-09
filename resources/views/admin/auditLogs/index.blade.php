@extends('layouts.admin')
@section('content')
@can('audit_log_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.audit-logs.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.auditLog.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.auditLog.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.subject_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.subject_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.user_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.host') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($auditLogs as $key => $auditLog)
                        <tr data-entry-id="{{ $auditLog->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $auditLog->description ?? '' }}
                            </td>
                            <td>
                                {{ $auditLog->subject_id ?? '' }}
                            </td>
                            <td>
                                {{ $auditLog->subject_type ?? '' }}
                            </td>
                            <td>
                                {{ $auditLog->user_id ?? '' }}
                            </td>
                            <td>
                                {{ $auditLog->host ?? '' }}
                            </td>
                            <td>
                                @can('audit_log_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.audit-logs.show', $auditLog->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('audit_log_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.audit-logs.edit', $auditLog->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('audit_log_delete')
                                    <form action="{{ route('admin.audit-logs.destroy', $auditLog->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.audit-logs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('audit_log_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection