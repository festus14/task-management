@extends('layouts.admin')
@section('content')
@can('project_report_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.project-reports.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.projectReport.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.projectReport.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.projectReport.fields.uploads') }}
                        </th>
                        <th>
                            {{ trans('cruds.projectReport.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.projectReport.fields.client') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projectReports as $key => $projectReport)
                        <tr data-entry-id="{{ $projectReport->id }}">
                            <td>

                            </td>
                            <td>
                                @if($projectReport->uploads)
                                    <a href="{{ $projectReport->uploads->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $projectReport->project->name ?? '' }}
                            </td>
                            <td>
                                {{ $projectReport->client->name ?? '' }}
                            </td>
                            <td>
                                @can('project_report_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.project-reports.show', $projectReport->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('project_report_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.project-reports.edit', $projectReport->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('project_report_delete')
                                    <form action="{{ route('admin.project-reports.destroy', $projectReport->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.project-reports.massDestroy') }}",
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
@can('project_report_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection