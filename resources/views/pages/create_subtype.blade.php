@extends('layouts.inner')

@section('title', 'Project')
    
@section('header', 'Project Management')

@section('sub_header', 'Project Subtype')

@section('content')
@section('css')
<style>
.deletebtn:hover{
    background-color:red;
    color:white;
    
}
#kt_table_task_temple_wrapper > div.dt-buttons.btn-group{
    width: 700px;
}
</style>
@endsection
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right">
        Add Subtype
      </button> --}}

      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Subtype</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <form action="" >
            
                                <div class="form-group">
                                    <label for="project-type">Select Project Type</label>
                                    <select id="project-type" class="selectDesign form-control"></select>
                                </div>

                                <div class="form-group">
                                    <label for="create-task">Subtype Name</label>
                                    <input type="text" class="form-control" id="subtype" placeholder="Enter Subtype Name">
                                </div>
                            
                        </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Save</button>
            </div>
          </div>
        </div>
      </div>

{{-- <section class="row">
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
</section> --}}






<div class="m-portlet " id="m_portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-list-2"> </i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Project Subtypes Datatable
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" data-toggle="modal" data-target="#exampleModal">
                            <span>
                                <i class="la la-plus"></i>
                                <span>
                                    Add Subtype
                                </span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
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
    </div>
    <!--end::Portlet-->

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
                className: 'deletebtn',
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

    <script>

    </script>


    
@endsection