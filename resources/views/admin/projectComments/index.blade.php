@extends('layouts.admin')
@section('content')
@can('project_comment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.project-comments.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.projectComment.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'ProjectComment', 'route' => 'admin.project-comments.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.projectComment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.projectComment.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.projectComment.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.projectComment.fields.client') }}
                        </th>
                        <th>
                            {{ trans('cruds.projectComment.fields.action_required') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projectComments as $key => $projectComment)
                        <tr data-entry-id="{{ $projectComment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $projectComment->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $projectComment->project->name ?? '' }}
                            </td>
                            <td>
                                {{ $projectComment->client->name ?? '' }}
                            </td>
                            <td>
                                {{ $projectComment->action_required ?? '' }}
                            </td>
                            <td>
                                @can('project_comment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.project-comments.show', $projectComment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('project_comment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.project-comments.edit', $projectComment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('project_comment_delete')
                                    <form action="{{ route('admin.project-comments.destroy', $projectComment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.project-comments.massDestroy') }}",
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
@can('project_comment_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection