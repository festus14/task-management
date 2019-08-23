@extends('layouts.inner')

@section('title', 'Clients')

@section('header', 'Clients Portal')

@section('sub_header', 'Clients Dashboard')

@section('css')
    <style>
    </style>
@endsection

@section('content')
    <!-- Begin: List Client -->
    <div class="m-content">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl" id="client-cards">

            </div>
        </div>
    </div>
    <!-- end: List Client -->

    <!-- View Project Modal Begin-->
    <div id="client-project-modal">

    </div>
    <!-- End: View Project Modal-->

    <!-- View Task Modal Begin-->
    <div id="client-task-modal">

    </div>

    <!-- End: View Task Modal-->

    <!-- More Info Modal -->
<div class="modal fade" id="moreInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 500px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#moreInfoModal').modal('hide');" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <!-- More-info content -->
                <div class="col-md-12 m-portlet " id="m_portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                                <i class="flaticon-info"> </i>
                                            </span>
                                <h3 class="m-portlet__head-text">
                                    More info
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingone">
                                    <h6 class="mb-0">
                                        <span class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        <i class="m-menu__link-icon flaticon-list"></i>
                                                        Project tasks
                                                </span>
                                    </h6>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ul class="list-group">
                                                <li class="list-group-item">name of task</li>
                                                <li class="list-group-item">name of task</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h6 class="mb-0">
                                        <span data-toggle="modal" data-target="#documentModal">
                                                            <i class="m-menu__link-icon flaticon-clipboard"></i>
                                                            Documents
                                                    </span>
                                    </h6>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h6 class="mb-0">
                                        <span data-toggle="modal" data-target="#projectreportModal">
                                                                <i class="m-menu__link-icon flaticon-file"></i>
                                                                Report
                                                        </span>
                                    </h6>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h6 class="mb-0">
                                        <span class="" data-toggle="modal" data-target="#commentModal">
                                                                <i class="m-menu__link-icon flaticon-comment"></i>
                                                                Comments
                                                        </span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Portlet-->



                    <!-- End main Content of More-info -->

                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End More Info Modal -->

{{-- documentDTModal --}}
<div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 65%; min-width: 500px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="documentModalLongTitle">Project Documents</h5>
                <button type="button" class="close" onclick="$('#documentModal').modal('hide');" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
            </div>
            <div class="modal-body">
                <div class="m-portlet " id="m_portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                                                        <i class="flaticon-list-1"> </i>
                                                                    </span>
                                <h3 class="m-portlet__head-text">
                                    Documents
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a style="color:white; background-color: #8a2a2b;" data-toggle="modal" data-target="#addDocumentModal" class="btn m-btn--icon m-btn--pill">
                                        <span>
                                                                                        <i class="la la-plus"></i>
                                                                                        <span>
                                                                                            Add Document
                                                                                        </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <table id="kt_table_projects" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Client</th>
                                    <th>Name</th>
                                    <th>Manager</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#documentModal').modal('hide');">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- endDocumentDTModal --}} 

{{-- report DT Modal --}}
<div class="modal fade" id="projectreportModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="documentModalLongTitle">Project reports</h5>
                <button type="button" class="close" onclick="$('#projectreportModal').modal('hide');" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
            </div>
            <div class="modal-body">
                <div class="m-portlet " id="m_portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                                                        <i class="flaticon-list-1"> </i>
                                                                    </span>
                                <h3 class="m-portlet__head-text">
                                    Reports
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a style="color:white; background-color: #8a2a2b;" class="btn m-btn--icon m-btn--pill">
                                        <span data-toggle="modal" data-target="#addReportModal" aria-expanded="false" aria-controls="">
                                                                                        <i class="la la-plus"></i>
                                                                                        <span>
                                                                                            Add Report
                                                                                        </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <table id="kt_table_projects" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Client</th>
                                    <th>Name</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#projectreportModal').modal('hide');">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- endreport DT tModal --}}



@endsection

@section('javascript')

{{--Body Scripts--}}
    <script>

        var csvButtonTrans = '{{ trans('global.datatables.csv') }}';
        var excelButtonTrans = '{{ trans('global.datatables.excel') }}';
        var pdfButtonTrans = '{{ trans('global.datatables.pdf') }}';
        var printButtonTrans = '{{ trans('global.datatables.print') }}';
        var colvisButtonTrans = '{{ trans('global.datatables.colvis') }}';
        var languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };

        // Ajax call for the clients view
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '{{ url("/api/v1/clients") }}',
            success: function (data) {

                let card = document.getElementById('client-cards');
                let projectCard = document.getElementById('client-project-modal');
                let taskCard = document.getElementById('client-task-modal');
                
                    data.data.map((datum, i) => {
                    card.innerHTML = card.innerHTML + `<div class="col-md-6 col-lg-6 col-xl-6" style="padding: 20px;">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <div class="body-header" style="">
                                <div class="" style=" float: left">
                                    <img src="{{ asset('metro/assets/app/media/img/users/100_4.jpg') }}" alt
                                        width="80px" height="80px" style="border-radius: 1000px">
                                </div>
                                <h1 class="m-widget24__title" style=" font-size: 20px; position: relative; top: -10px;">
                                    ${datum.name}
                                </h1>
                                <br>
                            </div>

                            <div class="m--space-10"></div>

                            <div id="client-details" style="">
                                <p>${datum.address}</p>
                                <p>${datum.email}</p>
                                <p>${datum.phone}</p>
                            </div>

                            <button onclick ="getClientProjects(${datum.id})"  class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                    data-toggle="modal" data-target="#view_client_project${datum.id}">
                                View Projects
                            </button>
                            <button onclick ="getClientTasks(${datum.id})" class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                    data-toggle="modal" data-target="#view_client_task${datum.id}">
                                View Tasks
                            </button>
                        </div>
                    </div>
                   </div>`

                   
        projectCard.innerHTML = projectCard.innerHTML + `<div class="modal fade" id="view_client_project${datum.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
            <div class="modal-dialog" style="max-width: 100%; min-width: 400px; max-height: 100%;"
                    role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Client Projects</h5>
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
                                        <table id="kt_table_client_projects${datum.id}" class="table table-striped table-hover"
                                                style="width: 100%">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Manager</th>
                                                <th>Type</th>
                                                <th>Subtypes</th>
                                                <th>Status</th>
                                                <th>Members Email</th>
                                                <th>Starting Date</th>
                                                <th>Deadline</th>
                                                <th>Tools</th>
                                            </tr>
                                            </thead>
                                            

                                        </table>
                                    </div>
                                </div>
                                <!--end::Portlet-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>`

        taskCard.innerHTML = taskCard.innerHTML + `<div class="modal fade" id="view_client_task${datum.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" style="max-width: 90%; min-width: 400px;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Client Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <!--begin::Portlet-->
                <div class="m-portlet"; id="m_portlet">
                    <div class="m-portlet__body">
                    <table id="kt_table_tasks${datum.id}" class="table table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Manager</th>
                                <th>Task Owner</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Starting Date</th>
                                <th>Deadline</th>
                                <th>Tools</th>
                            </tr>
                        </thead>

                    </table>
                </div>
             </div>
                <!--end::Portlet-->
            </div>

         </div>
            </div>
            </div>
            </div>
        </div>`


            })

        },

            error: function (data) {
                console.log('Error:', data);
            }
        });


        

        //   Function for calling Client Projects on the DT
        function getClientProjects(client_id) {
             path_url = "/api/v1/clients_projects/" + client_id;
             if ( $.fn.dataTable.isDataTable( '#kt_table_client_projects' + client_id ) ) {
                var kt_table_client_projects = $('#kt_table_client_projects' + client_id).DataTable();
             }else {
                var kt_table_client_projects = $('#kt_table_client_projects' + client_id).DataTable({
                dom: 'lBfrtip<"actions">',
                language: {
                    url: languages. {{ app()->getLocale() }}
                },

                ajax: path_url,
                        
                columns: [
                    {"defaultContent": ""},
                    {"data": "name"},
                    {"data": "manager.name"},
                    {"data": "project_type.name"},
                    {"data": "project_subtype.name"},
                    {"data": "status.name"},
                    {"data": "team_members[, ].name"},
                    {"data": "starting_date"},
                    {"data": "deadline"},
                ],
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                },
                {
                targets: 9,
                orderable: false,
                searchable: false,
                render: function (data, type, full, meta) {
                  return '\<button class="btn btn-secondary dropdown-toggle" type="button" onclick='+displayProjectInfo(full.id)+' id="taskToolsbtn'+full.id+'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                        <div class="dropdown-menu" aria-labelledby="taskToolsbtn" style="padding-left:8px; min-width: 100px; max-width: 15px;">\
                                        <a class="link" href="#"><i class="fas fa-eye" style="color:black;" data-toggle="modal" data-target="#moreInfoModal"> </i>\
                                        </a>\
                                        <a class="link" href="">\
                                            <i class="fas fa-pencil-alt" style="color:black;"></i>\
                                        </a>\
                                        <a class="link" href="#" id="" >\
                                            <i class="flaticon-graphic" style="color:black;"> </i>\
                                        </a>\
                                        <form action="" method="POST" onsubmit="" style="display: inline-block;">\
                                            <input type="hidden" name="_method" value="DELETE">\
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">\
                                            <button type="submit" class="link" style="border: none; background-color: white;"><a class="link" href="#"> <i class="far fa-trash-alt" style="color:black;"></i></a></button>\
                                        </form>\
                                    </div>\
                                    ';
                }
            },],
                select: {
                    style: 'multi+shift',
                    selector: 'td:first-child'
                },
                scrollX: true,
                order: [],
                pageLength: 10,
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
            }
            

        }

        // Function for calling Projects tasks
        function displayProjectInfo(proID) {
            console.log("ProjectId", proID)

        }

        //   Function for calling Client Tasks on the DT
        function getClientTasks(client_id) {
            path_url = "/api/v1/clients_tasks/" + client_id;
            if ( $.fn.dataTable.isDataTable( '#kt_table_tasks' + client_id ) ) {
                var kt_table_tasks = $('#kt_table_tasks' + client_id).DataTable();
            }else {
                var kt_table_tasks = $('#kt_table_tasks' + client_id).DataTable({
                    dom: 'lBfrtip<"actions">',
                    language: {
                        url: languages. {{ app()->getLocale() }}
                    },
                    ajax: path_url,
                    columns: [
                        {"defaultContent": ""},
                        {"data": "name"},
                        {"data": "manager.name"},
                        {"data": "assigned_tos[, ].email"},
                        {"data": "status.name"},
                        {"data": "category.name"},
                        {"data": "starting_date"},
                        {"data": "ending_date"},
                    ],
                    columnDefs: [{
                        orderable: false,
                        className: 'select-checkbox',
                        targets: 0
                    }, {
                        orderable: false,
                        searchable: false,
                        targets: -1
                    },
                    ],
                    select: {
                        style: 'multi+shift',
                        selector: 'td:first-child'
                    },
                    scrollX: true,
                    order: [],
                    pageLength: 10,
                    buttons: [
                        'excel', 'pdf', 'print'
                    ]
                });
            }


        }

        $.fn.dataTable.ext.classes.sPageButton = '';
        var deleteButtonTrans = 'Delete Selected';
        var deleteProjectButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.project-sub-types.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function (entry) {
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
                        .done(function () {
                            location.reload()
                        })
                }
            }
        };
        var dtProjectButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
        @can('project_delete')
        dtProjectButtons.push(deleteProjectButton);
        @endcan

        $('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtProjectButtons
        })
        
    </script>

@endsection
