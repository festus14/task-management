@extends('layouts.admin')
@section('content')
@can('task_comment_reply_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.task-comment-replies.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.taskCommentReply.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.taskCommentReply.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.taskCommentReply.fields.task_comment') }}
                        </th>
                        <th>
                            {{ trans('cruds.taskCommentReply.fields.reply_by') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($taskCommentReplies as $key => $taskCommentReply)
                        <tr data-entry-id="{{ $taskCommentReply->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $taskCommentReply->task_comment->comments ?? '' }}
                            </td>
                            <td>
                                {{ $taskCommentReply->reply_by->name ?? '' }}
                            </td>
                            <td>
                                @can('task_comment_reply_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.task-comment-replies.show', $taskCommentReply->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('task_comment_reply_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.task-comment-replies.edit', $taskCommentReply->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('task_comment_reply_delete')
                                    <form action="{{ route('admin.task-comment-replies.destroy', $taskCommentReply->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.task-comment-replies.massDestroy') }}",
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
@can('task_comment_reply_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection