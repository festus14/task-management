@extends('layouts.inner')

@section('title', 'Clients')
    
@section('header', 'Clients Portal')

@section('sub_header', 'Clients Dashboard')

@section('css')
<style>
    
        
    </style>
@endsection

{{-- <div class="m-portlet ">
    
    <div id="rows" class="m-portlet__body  m-portlet__body--no-padding">
        <div style="margin-bottom: 15px;" class="row m-row--no-padding m-row--col-separator-xl">
                    <div  id="client-card" class="col-md-12 col-lg-12 col-xl-12">
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h1 style="font-size: 30px;" class="m-widget24__title">
                                    Stransact
                                </h1>
                                
                                <br>

                                <span class="m-widget24__stats m--font-brand">
                                    <div class="m-widget4__img m-widget4__img--pic">
                                        <img src="assets/app/media/img/users/100_4.jpg" class="far fa-building" alt width="100px" height="100px" style="border-radius: 1000px">
                                    </div>
                                </span>

                                <div class="m--space-10"></div>

                                
                                <p style="margin-top: 10px">
                                        <a style="margin-top: -15px; margin-left: 25px" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            View Projects
                                        </a>
                                    </p>
                                    <div style="box-sizing: border-box;" class="collapse" id="collapseExample">
                                        <ul style="list-style: none;" >
                                            <li>
                                                <p style="font-size: 15px; font-weight: bold;">Tax</p>
                                                <p>
                                                    <a style="margin-top: -15px;" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#collapseExampleIn" role="button" aria-expanded="false" aria-controls="collapseExample" style="background: white">
                                                        View Tasks Progress
                                                    </a>
                                                </p>
                                                <div class="collapse" id="collapseExampleIn">
                                                    
                                                    <div class="k-portlet__body" style="background: white; box-sizing: border-box; padding: 20px 20px 20px; margin: 0 20px 20px 0;">
                                                  
                                                        <div class="k-portlet__body k-portlet__body--fit">
                                                        <!--begin: Datatable -->
                                                        <table id="kt_table_task" class="table table-striped table-hover" style="width: 100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Status ID</th>
                                                                        <th>manager_id</th>
                                                                        <th>manager</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>            
                                                            <!--end: Datatable -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                </div>
                                
                            
                        </div>
                    </div>
            </div>
        </div>
        </div>				
    </div>
    </div>
</div> --}}

@section('content')

<div class="m-content">
    <div class="m-portlet__body  m-portlet__body--no-padding">
        <div class="row m-row--no-padding m-row--col-separator-xl">

                <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 20px;">
                        <!--begin::Total Profit-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <div class="body-header" style="">
                                    <div class="" style=" float: left">
                                        <img src="{{ asset('metro/assets/app/media/img/users/100_4.jpg') }}" alt width="80px" height="80px" style="border-radius: 1000px">
                                    </div>
                                    <h1 class="m-widget24__title" style=" font-size: 20px; position: relative; top: -10px;">
                                        Stransact Partners
                                    </h1>
                                    <br>
                                </div>

                                <div class="m--space-10"></div>

                                <div id="client-details" style="">
                                    <p>Plot 126 Adejobi Cresent, Anthony Vilage, Lagos</p>
                                    <p>stransact@gmail.com</p>
                                    <p>08156401454</p>
                                </div>

                                <button class="btn btn-sm" data-toggle="modal" data-target="#view_client_project">
                                    View Projects
                                </button>
                                <button class="btn btn-sm" data-toggle="modal" data-target="#view_client_task">
                                    View Tasks
                                </button>
                            </div>
                        </div>
                        <!--end::Total Profit-->
                </div>

                <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 20px;">
                        <!--begin::Total Profit-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <div class="body-header" style="">
                                    <div class="" style=" float: left">
                                        <img src="{{ asset('metro/assets/app/media/img/users/100_4.jpg') }}" alt width="80px" height="80px" style="border-radius: 1000px">
                                    </div>
                                    <h1 class="m-widget24__title" style=" font-size: 20px; position: relative; top: -10px;">
                                        Oil and Gas
                                    </h1>
                                    <br>
                                </div>

                                <div class="m--space-10"></div>

                                <div id="client-details" style="">
                                    <p>Plot 126 Adejobi Cresent, Anthony Vilage, Lagos</p>
                                    <p>stransact@gmail.com</p>
                                    <p>090564054625</p>
                                </div>

                                <button class="btn btn-sm" data-toggle="modal" data-target="#view_client_project">
                                    View Projects
                                </button>
                                <button class="btn btn-sm" data-toggle="modal" data-target="#view_client_task">
                                    View Tasks
                                </button>
                            </div>
                        </div>
                        <!--end::Total Profit-->
                </div>

                <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 20px;">
                        <!--begin::Total Profit-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <div class="body-header" style="">
                                    <div class="" style=" float: left">
                                        <img src="{{ asset('metro/assets/app/media/img/users/100_4.jpg') }}" alt width="80px" height="80px" style="border-radius: 1000px">
                                    </div>
                                    <h1 class="m-widget24__title" style=" font-size: 20px; position: relative; top: -10px;">
                                        Oil and Gas
                                    </h1>
                                    <br>
                                </div>

                                <div class="m--space-10"></div>

                                <div id="client-details" style="">
                                    <p>Plot 126 Adejobi Cresent, Anthony Vilage, Lagos</p>
                                    <p>stransact@gmail.com</p>
                                    <p>090564054625</p>
                                </div>

                                <button class="btn btn-sm" data-toggle="modal" data-target="#view_client_project">
                                    View Projects
                                </button>
                                <button class="btn btn-sm" data-toggle="modal" data-target="#createTaskModal">
                                    View Tasks
                                </button>
                            </div>
                        </div>
                        <!--end::Total Profit-->
                </div>

                <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 20px;">
                        <!--begin::Total Profit-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <div class="body-header" style="">
                                    <div class="" style=" float: left">
                                        <img src="{{ asset('metro/assets/app/media/img/users/100_4.jpg') }}" alt width="80px" height="80px" style="border-radius: 1000px">
                                    </div>
                                    <h1 class="m-widget24__title" style=" font-size: 20px; position: relative; top: -10px;">
                                        Oil and Gas
                                    </h1>
                                    <br>
                                </div>

                                <div class="m--space-10"></div>

                                <div id="client-details" style="">
                                    <p>Plot 126 Adejobi Cresent, Anthony Vilage, Lagos</p>
                                    <p>stransact@gmail.com</p>
                                    <p>090564054625</p>
                                </div>

                                <button class="btn btn-sm" data-toggle="modal" data-target="#view_client_project">
                                    View Projects
                                </button>
                                <button class="btn btn-sm" data-toggle="modal" data-target="#createTaskModal">
                                    View Tasks
                                </button>
                            </div>
                        </div>
                        <!--end::Total Profit-->
                </div>

        </div>
    </div>
</div>

     <!-- View Project Modal Begin-->
    <div class="modal fade" id="view_client_project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                        <div class="row">
                                <div class="col-xl-12">
                                    <!--begin::Portlet-->
                                    <div class="m-portlet " id="m_portlet">
                                        
                                        <div class="m-portlet__body">
                                            <table id="kt_table_projects" class="table table-striped table-hover" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Manager</th>
                                                        <th>Type</th>
                                                        <th>Subtypes</th>
                                                        <th>Status</th>
                                                        <th>Members</th>
                                                        <th>Deadline</th>
                                                        <th>Tools</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $counter = 1; @endphp @foreach($projects as $project)
                                                    <tr data-entry-id="{{ $project->id }}">
                                                        <td> </td>
                                                        <td>{{ $project->name }}</td> 
                                                        <td>{{ $project->manager->email ?? '' }}</td>
                                                        <td>{{ $project->project_type->name ?? '' }}</td>                                        
                                                        <td>{{ $project->subtype->name ?? '' }}</td>
                                                        <td>{{ $project->status->name ?? '' }}</td>
                                                        <td>
                                                            @foreach ($project->team_members as $menber)
                                                                <span class="m-badge m-badge--success"> {{ $menber->email }} </span>
                                                            @endforeach  
                                                        </td>           
                                                        <td>{{ $project->deadline }}</td>                
                                                        <td>
                                                            @can('project_sub_type_show')
                                                            <a class="link" href="{{ route('admin.project-sub-types.show', $project->id) }}">
                                                                <i class="flaticon-eye"> </i>
                                                            </a>
                                                            @endcan
                                                            
                                                            @can('project_sub_type_edit')
                                                            <a class="link" href="{{ route('admin.project-sub-types.edit', $project->id) }}">
                                                                <i class="flaticon-edit"> </i>
                                                            </a>
                                                            @endcan 
                                                        
                                                            
                                                            @can('project_sub_type_edit')
                                                            <a class="link" href="#" id="project_subtype_{{  $project->id }}" data-project_type_id="{{  $project->id }}">
                                                                <i class="flaticon-graphic"> </i>
                                                            </a>
                                                            @endcan 
                                    
                                                            @can('project_sub_type_delete')
                                                            <form action="{{ route('admin.project-sub-types.destroy', $project->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <button type="submit" class="link"> <i class="flaticon-delete"> </i></button>
                                                            </form>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                    
                                                    @php $counter ++; @endphp @endforeach @php $counter = 1; @endphp 
                                                      
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--end::Portlet-->
                                </div>
                        
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <!-- View Project Modal End-->

    <!-- View Task Modal Begin-->
    <div class="modal fade" id="view_client_task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <!--begin::Portlet-->
                            <div class="m-portlet " id="m_portlet">
                                
                                <div class="m-portlet__body">
                                    <table id="kt_table_tasks" class="table table-striped table-hover" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Manager</th>
                                                <th>Type</th>
                                                <th>Subtypes</th>
                                                <th>Status</th>
                                                <th>Members</th>
                                                <th>Deadline</th>
                                                <th>Tools</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $counter = 1; @endphp @foreach($projects as $project)
                                            <tr data-entry-id="{{ $project->id }}">
                                                <td> </td>
                                                <td>{{ $project->name }}</td> 
                                                <td>{{ $project->manager->email ?? '' }}</td>
                                                <td>{{ $project->project_type->name ?? '' }}</td>                                        
                                                <td>{{ $project->subtype->name ?? '' }}</td>
                                                <td>{{ $project->status->name ?? '' }}</td>
                                                <td>
                                                    @foreach ($project->team_members as $menber)
                                                        <span class="m-badge m-badge--success"> {{ $menber->email }} </span>
                                                    @endforeach  
                                                </td>           
                                                <td>{{ $project->deadline }}</td>                
                                                <td>
                                                    @can('project_sub_type_show')
                                                    <a class="link" href="{{ route('admin.project-sub-types.show', $project->id) }}">
                                                        <i class="flaticon-eye"> </i>
                                                    </a>
                                                    @endcan
                                                    
                                                    @can('project_sub_type_edit')
                                                    <a class="link" href="{{ route('admin.project-sub-types.edit', $project->id) }}">
                                                        <i class="flaticon-edit"> </i>
                                                    </a>
                                                    @endcan 
                                                
                                                    
                                                    @can('project_sub_type_edit')
                                                    <a class="link" href="#" id="project_subtype_{{  $project->id }}" data-project_type_id="{{  $project->id }}">
                                                        <i class="flaticon-graphic"> </i>
                                                    </a>
                                                    @endcan 
                            
                                                    @can('project_sub_type_delete')
                                                    <form action="{{ route('admin.project-sub-types.destroy', $project->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="link"> <i class="flaticon-delete"> </i></button>
                                                    </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                            
                                            @php $counter ++; @endphp @endforeach @php $counter = 1; @endphp 
                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                    <!--end::Portlet-->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- View Task Modal End-->

@endsection

@section('javascript')

{{-- <script>
        let languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };
        var clientDataTable = $('#kt_client_dashboard').DataTable({
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
                url: "{{ route('admin.tasks.massDestroy') }}",
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

    
</script> --}}


{{-- Script for Project View Begin--}}
<script>

    var kt_table_projectsDataTable = $('#kt_table_projects').DataTable({
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
            select: {
                style: 'multi+shift',
                selector: 'td:first-child'
            },
            scrollX: true,
            order: [],
            pageLength: 10,
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        });

        $.fn.dataTable.ext.classes.sPageButton = '';
        let deleteButtonTrans = 'Delete Selected';
        let deleteProjectButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.project-sub-types.massDestroy') }}",
            className: 'btn-danger',
            action: function(e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function(entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert('{{ trans('global.datatables.zero_selected ') }}');
                    return
                }

                if (confirm('{{ trans('global.areYouSure ') }}')) {
                    $.ajax({
                            headers: {
                                'x-csrf-token': _token
                            },
                            method: 'POST',
                            url: config.url,
                            data: {
                                ids: ids,
                                _method: 'DELETE'
                            }
                        })
                        .done(function() {
                            location.reload()
                        })
                }
            }
        }
        let dtProjectButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
        @can('project_delete')
        dtProjectButtons.push(deleteProjectButton);
        @endcan

        $('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtProjectButtons
        })

</script>
{{-- Script for Project View End--}}


{{-- Script for Task View Begin--}}
<script>

    var kt_table_projectsDataTable = $('#kt_table_tasks').DataTable({
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
    select: {
        style: 'multi+shift',
        selector: 'td:first-child'
    },
    scrollX: true,
    order: [],
    pageLength: 10,
    buttons: [
        'copy', 'excel', 'pdf'
    ]
});

$.fn.dataTable.ext.classes.sPageButton = '';
let deleteButtonTrans = 'Delete Selected';
let deleteProjectButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.project-sub-types.massDestroy') }}",
    className: 'btn-danger',
    action: function(e, dt, node, config) {
        var ids = $.map(dt.rows({
            selected: true
        }).nodes(), function(entry) {
            return $(entry).data('entry-id')
        });

        if (ids.length === 0) {
            alert('{{ trans('global.datatables.zero_selected ') }}');
            return
        }

        if (confirm('{{ trans('global.areYouSure ') }}')) {
            $.ajax({
                    headers: {
                        'x-csrf-token': _token
                    },
                    method: 'POST',
                    url: config.url,
                    data: {
                        ids: ids,
                        _method: 'DELETE'
                    }
                })
                .done(function() {
                    location.reload()
                })
        }
    }
}
let dtProjectButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
@can('project_delete')
dtProjectButtons.push(deleteProjectButton);
@endcan

$('.datatable:not(.ajaxTable)').DataTable({
    buttons: dtProjectButtons
})
    
</script>
    {{-- Script for Project View End--}}

@endsection