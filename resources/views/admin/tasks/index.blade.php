@extends('layouts.admin')
@section('content')
@can('task_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.tasks.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.task.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.task.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.task.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.starting_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.ending_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.assinged_to') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.manager') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.task.fields.client') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $key => $task)
                        <tr data-entry-id="{{ $task->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $task->name ?? '' }}
                            </td>
                            <td>
                                {{ $task->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $task->starting_date ?? '' }}
                            </td>
                            <td>
                                {{ $task->ending_date ?? '' }}
                            </td>
                            <td>
                                @foreach($task->assinged_tos as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $task->manager->name ?? '' }}
                            </td>
                            <td>
                                {{ $task->status->name ?? '' }}
                            </td>
                            <td>
                                {{ $task->project->name ?? '' }}
                            </td>
                            <td>
                                {{ $task->client->name ?? '' }}
                            </td>
                            <td>
                                @can('task_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tasks.show', $task->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('task_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tasks.edit', $task->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('task_delete')
                                    <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.tasks.massDestroy') }}",
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
@can('task_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection