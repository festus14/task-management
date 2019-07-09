@extends('layouts.admin')
@section('content')
@can('task_comment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.task-comments.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.taskComment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.taskComment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.taskComment.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.taskComment.fields.task') }}
                        </th>
                        <th>
                            {{ trans('cruds.taskComment.fields.client') }}
                        </th>
                        <th>
                            {{ trans('cruds.taskComment.fields.project') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($taskComments as $key => $taskComment)
                        <tr data-entry-id="{{ $taskComment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $taskComment->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $taskComment->task->name ?? '' }}
                            </td>
                            <td>
                                {{ $taskComment->client->name ?? '' }}
                            </td>
                            <td>
                                {{ $taskComment->project->name ?? '' }}
                            </td>
                            <td>
                                @can('task_comment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.task-comments.show', $taskComment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('task_comment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.task-comments.edit', $taskComment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('task_comment_delete')
                                    <form action="{{ route('admin.task-comments.destroy', $taskComment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.task-comments.massDestroy') }}",
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
@can('task_comment_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection