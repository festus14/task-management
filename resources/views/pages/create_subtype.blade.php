@extends('layouts.inner')

@section('title', 'Project')
    
@section('header', 'Project Management')

@section('sub_header', 'Project Subtype')

@section('content')

<div class="container-fluid">
    <form action="" >
        <div class="row">
                <div class="col-md-6 col-sm-6 ">

                    <div class="form-group">
                        <label for="project-type">Select Project Type</label>
                        <select id="project-type" class="selectDesign form-control"></select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="create-task">Subtype Name</label>
                        <input type="text" class="form-control" id="subtype" placeholder="Enter Subtype Name">
                    </div>

                </div>

                <div class="row col-md-12">
                        <div class="col-md-2 form-group mt-3">
                          <button class="btn btn-block mt-2" style="background-color:#8a2a2b; color:white;">Save</button>
                        </div>
                    </div>
        </div>
    </form>
</div>
<section class="row">
    <div class="col-xl-12">
            <table id="kt_table_task_temple" class="table table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Project Type</th>
                        <th>Tools</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php  $counter = 1; @endphp
                    @foreach($projectSubTypes as $projectSubType)
                        <tr data-entry-id="{{ $projectSubType->id }}">
                            <td> </td>
                            <td>{{  $projectSubType->name }}</td>
                            <td>{{  $projectSubType->project_type->name }}</td>
                            <td>
                                 @can('project_sub_type_show')
                                    <a class="link" href="{{ route('admin.project-sub-types.show', $projectSubType->id) }}">
                                       <i class="flaticon-view"> </i>
                                    </a>
                                @endcan
                                @can('project_sub_type_edit')
                                    <a class="link" href="{{ route('admin.project-sub-types.edit', $projectSubType->id) }}">
                                            <i class="flaticon-edit"> </i>
                                    </a>
                                @endcan
                                @can('project_sub_type_delete')
                                    <form action="{{ route('admin.project-sub-types.destroy', $projectSubType->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                       <button type="submit" class="link"> <i class="flaticon-delete"> </i></button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                        @php  $counter ++; @endphp
                    @endforeach
                    @php  $counter = 1; @endphp
                    </tbody>
                </table>
    </div>
</section>

@endsection

@section('javascript')
<script>
     $(function () {

let copyButtonTrans = '{{ trans('global.datatables.copy') }}';
let csvButtonTrans = '{{ trans('global.datatables.csv') }}';
let excelButtonTrans = '{{ trans('global.datatables.excel') }}';
let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}';
let printButtonTrans = '{{ trans('global.datatables.print') }}';
let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}';
$.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' });
$.extend(true, $.fn.dataTable.defaults, {
    language: {
        url: languages.{{ app()->getLocale() }}
    },
    columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
    }, {
        orderable: false,
        searchable: false,
        targets: -1
    }],
    select: {
        style:    'multi+shift',
        selector: 'td:first-child'
    },
    order: [],
    pageLength: 10,
    dom: 'lBfrtip<"actions">',
    buttons: [
        {
            extend: 'excel',
            className: 'btn-default',
            text: excelButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'pdf',
            className: 'btn-default',
            text: pdfButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'csv',
            className: 'btn-default',
            text: csvButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
        }
    ]
});

$.fn.dataTable.ext.classes.sPageButton = '';
let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.project-sub-types.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
        var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
            return $(entry).data('entry-id')
        });

        if (ids.length === 0) {
            alert('{{ trans('global.datatables.zero_selected') }}');
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
let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
@can('task_delete')
dtButtons.push(deleteButton);
@endcan

$('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})


        let languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };
        var taskDataTable = $('#kt_table_task').DataTable({
            ajax: "{{ url('/api/v1/tasks') }}",
            columns: [
                { "data": "id" },
                { "data": "name" },
                { "data": "status.name" },
                { "data": "manager_id" },
                { "data": "manager.email" }
            ],
            dom: 'lBfrtip<"actions">',
            language: {
                url: languages.{{ app()->getLocale() }}
            },
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }, {
                orderable: false,
                searchable: false,
                targets: -1
            }],
        });

        new $.fn.dataTable.Buttons( taskDataTable, {
            buttons: [
                'copy', 'excel', 'pdf'
            ],
        } );

        $(function () {

            let copyButtonTrans = '{{ trans('global.datatables.copy') }}';
            let csvButtonTrans = '{{ trans('global.datatables.csv') }}';
            let excelButtonTrans = '{{ trans('global.datatables.excel') }}';
            let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}';
            let printButtonTrans = '{{ trans('global.datatables.print') }}';
            let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}';
            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' });
            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: languages.{{ app()->getLocale() }}
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                    style:    'multi+shift',
                    selector: 'td:first-child'
                },
                order: [],
                pageLength: 10,
                dom: 'lBfrtip<"actions">',
                buttons: [
                    {
                        extend: 'excel',
                        className: 'btn-primary',
                        text: excelButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-success',
                        text: pdfButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn-accent',
                        text: csvButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ]
            });

            $.fn.dataTable.ext.classes.sPageButton = '';
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.project-sub-types.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}');
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
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
            @can('task_delete')
            dtButtons.push(deleteButton);
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        })

    </script>

    
@endsection