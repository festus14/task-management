@extends('layouts.admin')
@section('content')
@can('tast_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.tast-categories.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.tastCategory.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TastCategory', 'route' => 'admin.tast-categories.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.tastCategory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.tastCategory.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.tastCategory.fields.project_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.tastCategory.fields.sub_category') }}
                        </th>
                        <th>
                            {{ trans('cruds.tastCategory.fields.weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.tastCategory.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tastCategories as $key => $tastCategory)
                        <tr data-entry-id="{{ $tastCategory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tastCategory->name ?? '' }}
                            </td>
                            <td>
                                {{ $tastCategory->project_type->name ?? '' }}
                            </td>
                            <td>
                                {{ $tastCategory->sub_category->name ?? '' }}
                            </td>
                            <td>
                                {{ $tastCategory->weight ?? '' }}
                            </td>
                            <td>
                                {{ $tastCategory->description ?? '' }}
                            </td>
                            <td>
                                @can('tast_category_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tast-categories.show', $tastCategory->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('tast_category_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tast-categories.edit', $tastCategory->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('tast_category_delete')
                                    <form action="{{ route('admin.tast-categories.destroy', $tastCategory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.tast-categories.massDestroy') }}",
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
@can('tast_category_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection