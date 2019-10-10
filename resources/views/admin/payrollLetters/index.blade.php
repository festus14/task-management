@extends('layouts.admin')
@section('content')
@can('payroll_letter_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.payroll-letters.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.payrollLetter.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.payrollLetter.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PayrollLetter">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.client') }}
                        </th>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.contact_person') }}
                        </th>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.company_short_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.payrollLetter.fields.staff_name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payrollLetters as $key => $payrollLetter)
                        <tr data-entry-id="{{ $payrollLetter->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $payrollLetter->id ?? '' }}
                            </td>
                            <td>
                                {{ $payrollLetter->client->name ?? '' }}
                            </td>
                            <td>
                                {{ $payrollLetter->project->name ?? '' }}
                            </td>
                            <td>
                                {{ $payrollLetter->date ?? '' }}
                            </td>
                            <td>
                                {{ $payrollLetter->contact_person ?? '' }}
                            </td>
                            <td>
                                {{ $payrollLetter->company_short_name ?? '' }}
                            </td>
                            <td>
                                {{ $payrollLetter->staff_name ?? '' }}
                            </td>
                            <td>
                                @can('payroll_letter_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.payroll-letters.show', $payrollLetter->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('payroll_letter_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.payroll-letters.edit', $payrollLetter->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('payroll_letter_delete')
                                    <form action="{{ route('admin.payroll-letters.destroy', $payrollLetter->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('payroll_letter_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.payroll-letters.massDestroy') }}",
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
    order: [[ 2, 'desc' ]],
    pageLength: 25,
  });
  $('.datatable-PayrollLetter:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection