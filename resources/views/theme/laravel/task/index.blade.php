
@extends('layouts.ken')
@section('title')
    <title>Task</title>
@endsection
@section('drawer')
    <ul class="k-menu__nav ">

        <li class="k-menu__item " aria-haspopup="true"><a href="builder.html" class="k-menu__link ">
                <i class="k-menu__link-icon fa fa-dashboard"></i><span
                    class="k-menu__link-text">Dashboard</span></a>
        </li>
        <li class="k-menu__item  k-menu__item--submenu k-menu__item--open k-menu__item--here"
            aria-haspopup="true" data-kmenu-submenu-toggle="hover">
            <a href="javascript:;" class="k-menu__link k-menu__toggle">
                <i class="k-menu__link-icon fa fa-users"></i>
                <span class="k-menu__link-text">User management</span>
                <i class="k-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="k-menu__submenu ">
                <span class="k-menu__arrow"></span>
                <ul class="k-menu__subnav">
                    <li class="k-menu__item  k-menu__item--parent" aria-haspopup="true"><span
                            class="k-menu__link"><span class="k-menu__link-text">Dashboards</span></span>
                    </li>
                    <li class="k-menu__item  k-menu__item--active" aria-haspopup="true">
                        <a href="index-2.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot">
                                <span></span>
                            </i><span class="k-menu__link-text">Permissions</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/brand-aside.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span
                                class="k-menu__link-text">Roles</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/navy-header.html" class="k-menu__link "><i
                                class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i>
                            <span class="k-menu__link-text">Users</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/light-aside.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i>
                            <span class="k-menu__link-text">Audit Logs</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="k-menu__item  k-menu__item--submenu k-menu__item--open k-menu__item--here"
            aria-haspopup="true" data-kmenu-submenu-toggle="hover">
            <a href="javascript:;" class="k-menu__link k-menu__toggle">
                <i class="k-menu__link-icon fa fa-user"></i>
                <span class="k-menu__link-text">Client management</span>
                <i class="k-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="k-menu__submenu ">
                <span class="k-menu__arrow"></span>
                <ul class="k-menu__subnav">
                    <li class="k-menu__item  k-menu__item--parent" aria-haspopup="true"><span
                            class="k-menu__link"><span class="k-menu__link-text">Dashboards</span></span>
                    </li>
                    <li class="k-menu__item  k-menu__item--active" aria-haspopup="true">
                        <a href="index-2.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot">
                                <span></span>
                            </i><span class="k-menu__link-text">Client</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/brand-aside.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span
                                class="k-menu__link-text">Client Portal</span>
                        </a>
                    </li>


                </ul>
            </div>
        </li>
        <li class="k-menu__item  k-menu__item--submenu k-menu__item--open k-menu__item--here"
            aria-haspopup="true" data-kmenu-submenu-toggle="hover">
            <a href="javascript:;" class="k-menu__link k-menu__toggle">
                <i class="k-menu__link-icon  fa fa-tasks"> </i>
                <span class="k-menu__link-text">Project management</span>
                <i class="k-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="k-menu__submenu ">
                <span class="k-menu__arrow"></span>
                <ul class="k-menu__subnav">
                    <li class="k-menu__item  k-menu__item--parent" aria-haspopup="true"><span
                            class="k-menu__link"><span class="k-menu__link-text">Dashboards</span></span>
                    </li>
                    <li class="k-menu__item  k-menu__item--active" aria-haspopup="true">
                        <a href="index-2.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot">
                                <span></span>
                            </i><span class="k-menu__link-text">Project Type</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/brand-aside.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span
                                class="k-menu__link-text">Project Sub-type</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/brand-aside.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span
                                class="k-menu__link-text">Documents</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/brand-aside.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span
                                class="k-menu__link-text">Project</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/brand-aside.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span
                                class="k-menu__link-text">Project Comments</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/brand-aside.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span
                                class="k-menu__link-text">Project Report</span>
                        </a>
                    </li>


                </ul>
            </div>
        </li>
        <li class="k-menu__item  k-menu__item--submenu k-menu__item--open k-menu__item--here"
            aria-haspopup="true" data-kmenu-submenu-toggle="hover">
            <a href="javascript:;" class="k-menu__link k-menu__toggle">
                <i class="k-menu__link-icon flaticon2-graphic"></i>
                <span class="k-menu__link-text">Task management</span>
                <i class="k-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="k-menu__submenu ">
                <span class="k-menu__arrow"></span>
                <ul class="k-menu__subnav">
                    <li class="k-menu__item  k-menu__item--parent" aria-haspopup="true"><span
                            class="k-menu__link"><span class="k-menu__link-text">Dashboards</span></span>
                    </li>
                    <li class="k-menu__item  k-menu__item--active" aria-haspopup="true">
                        <a href="index-2.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot">
                                <span></span>
                            </i><span class="k-menu__link-text">Task Portal</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/brand-aside.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span
                                class="k-menu__link-text">Task Category</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/brand-aside.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span
                                class="k-menu__link-text">Task</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/brand-aside.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span
                                class="k-menu__link-text">Task Status</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/brand-aside.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span
                                class="k-menu__link-text">Comments</span>
                        </a>
                    </li>
                    <li class="k-menu__item " aria-haspopup="true">
                        <a href="taskmgtKeen/dashboards/brand-aside.html" class="k-menu__link ">
                            <i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span
                                class="k-menu__link-text">Comment Reply</span>
                        </a>
                    </li>


                </ul>
            </div>
        </li>
        <li class="k-menu__item " aria-haspopup="true"><a href="builder.html" class="k-menu__link ">
                <i class="k-menu__link-icon fa fa-calendar"></i><span
                    class="k-menu__link-text">Calendar</span></a>
        </li>
        <li class="k-menu__item " aria-haspopup="true"><a href="builder.html" class="k-menu__link ">
                <i class="k-menu__link-icon fa fa-sign-out"></i><span
                    class="k-menu__link-text">Logout</span></a>
        </li>
    </ul>
@endsection
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
