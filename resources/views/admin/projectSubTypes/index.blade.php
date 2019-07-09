@extends('layouts.admin')
@section('content')
@can('project_sub_type_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.project-sub-types.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.projectSubType.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'ProjectSubType', 'route' => 'admin.project-sub-types.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.projectSubType.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.projectSubType.fields.project_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.projectSubType.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projectSubTypes as $key => $projectSubType)
                        <tr data-entry-id="{{ $projectSubType->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $projectSubType->project_type->name ?? '' }}
                            </td>
                            <td>
                                {{ $projectSubType->name ?? '' }}
                            </td>
                            <td>
                                @can('project_sub_type_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.project-sub-types.show', $projectSubType->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('project_sub_type_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.project-sub-types.edit', $projectSubType->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('project_sub_type_delete')
                                    <form action="{{ route('admin.project-sub-types.destroy', $projectSubType->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.project-sub-types.massDestroy') }}",
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
@can('project_sub_type_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection