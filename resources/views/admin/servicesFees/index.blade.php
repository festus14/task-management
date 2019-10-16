@extends('layouts.admin')
@section('content')
@can('services_fee_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.services-fees.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.servicesFee.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.servicesFee.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ServicesFee">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.servicesFee.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.servicesFee.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.servicesFee.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.servicesFee.fields.currency') }}
                        </th>
                        <th>
                            {{ trans('cruds.servicesFee.fields.currency_rate') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicesFees as $key => $servicesFee)
                        <tr data-entry-id="{{ $servicesFee->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $servicesFee->id ?? '' }}
                            </td>
                            <td>
                                {{ $servicesFee->name ?? '' }}
                            </td>
                            <td>
                                {{ $servicesFee->amount ?? '' }}
                            </td>
                            <td>
                                {{ $servicesFee->currency ?? '' }}
                            </td>
                            <td>
                                {{ $servicesFee->currency_rate ?? '' }}
                            </td>
                            <td>
                                @can('services_fee_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.services-fees.show', $servicesFee->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('services_fee_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.services-fees.edit', $servicesFee->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('services_fee_delete')
                                    <form action="{{ route('admin.services-fees.destroy', $servicesFee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('services_fee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.services-fees.massDestroy') }}",
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
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-ServicesFee:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection