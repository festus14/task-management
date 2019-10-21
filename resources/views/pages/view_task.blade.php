@extends('layouts.inner')

@section('title', 'Task')

@section('header', 'Task Management')

@section('sub_header', 'Tasks')
@section('css')
<style>
    /* Style for task members table */
        #myInputNine {
            background-image: url('/css/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 14px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            }

            #myTableNine {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 14px;
            }

            #myTableNine th, #myTableNine td {
            text-align: left;
            padding: 12px;
            }

            #myTableNine tr {
            border-bottom: 1px solid #ddd;
            }

            #myTableNine tr.header, #myTableNine tr:hover {
            background-color: #f1f1f1;
            }

            /* loader */
            #loading {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            display: block;
            opacity: 0.7;
            background-color: #ffff;
            z-index: 99;
            text-align: center;
            }

            #loading-image {
            position: absolute;
            top: 40%;
            left: 45%;
            z-index: 100;
            }
              /* comment scrollbar */
            /* width */
            #mCSB_3::-webkit-scrollbar {
            width: 5px;
            }

            /* Track */
            #mCSB_3::-webkit-scrollbar-track {
            background: #f1f1f1;
            }

            /* Handle */
            #mCSB_3::-webkit-scrollbar-thumb {
            background: #888;
            }
</style>
@endsection

@section('content')
    <div id="loading">
       <img id="loading-image" src={{ url('/loader/loader.gif')}} alt="Loading..." />
    </div>
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="m-portlet " id="m_portlet" style="width:100%;">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <i class="flaticon-list-2"> </i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Tasks Table
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" id="addTaskId" style="background-color:#8a2a2b; color:white;" data-toggle="modal" onclick="reinitializeDate()" data-target="#createTaskModal">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>
                                            Add Task
                                        </span>
                                    </span>
                                </a>
                                <a onclick="getTaskCategoryAjaxDT()" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" id="taskCategoryId" data-toggle="modal" data-target="#taskcategoryDatatable">
                                        <span>
                                                <span>
                                                    Task Category
                                                </span>
                                        </span>
                                    </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body" style="overflow-x:auto;">
                    <table id="kt_table_task" class="table table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="text-align:center">#</th>
                                <th>Name</th>
                                <th>Client</th>
                                <th>Project</th>
                                <th>Manager</th>
                                <th>Status</th>
                                <th>Start_Date</th>
                                <th>Deadline</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Portlet-->
        </div>

    </div>

    <!-- Create task Modal -->
        <div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                        <button type="button" class="close" onclick="$('#createTaskModal').modal('hide');" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="createTaskBody" class="modal-body col-md-12">


                    </div>

                    </div>
                </div>
        </div>
    {{-- end Create task Model --}}

    <!-- Edit task Modal -->
    <div class="modal fade" id="editTaskModalMain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                        <button type="button" class="close" onclick="$('#editTaskModalMain').modal('hide');" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="editTaskBody" class="modal-body col-md-12">


                    </div>

                    </div>
                </div>
        </div>
    {{-- end Create task Model --}}

    {{-- Task category datatable modal --}}
        <div class="modal fade" id="taskcategoryDatatable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:70%; min-width:400px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Task Category</h5>
                        <button type="button" class="close" onclick="$('#taskcategoryDatatable').modal('hide');" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    </div>
                    <div class="modal-body">
                        <div class="m-portlet " id="m_portlet">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon">
                                            <i class="flaticon-list-2"> </i>
                                        </span>
                                        <h3 class="m-portlet__head-text">
                                            Task Category Table
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item">
                                            <a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" onclick="createTaskCategoryAjaxGet()" style="color:white; background-color: #8a2a2b;" data-toggle="modal" data-target="#addTaskCategory">
                                                <span>
                                                    <i class="la la-plus"></i>
                                                    <span>
                                                        Add Category
                                                    </span>
                                                </span>
                                            </a>
                                            <a class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" id="projectSubTypeId" data-toggle="modal" data-target="#taskstatusDatatable">
                                                    <span onclick="getTaskStatusAjaxDT();">
                                                            <span>
                                                                Task Status
                                                            </span>
                                                    </span>
                                                </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="m-portlet__body" style="overflow-x:auto;  width:100%">
                                <table id="kt_table_task_category" class="table table-striped table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">#</th>
                                            <th>Category Name</th>
                                            <th>Project Type</th>
                                            <th>Sub Category</th>
                                            <th>Weight</th>
                                            <th>Description</th>
                                            <th>Tools</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Portlet-->
                    </div>
                </div>
            </div>
        </div>
    {{-- End Task category datatable modal --}}


    <!-- More Info Modal -->
    <div id="moreInfo">

    </div>

    <!-- Add Document Modal -->
    <!-- End Add Document Modal -->

    {{-- Add Task Category Modal --}}
    <div class="modal fade" id="addTaskCategory" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 60%; min-width: 500px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="taskCategoryId">Create Task Category</h5>
                    <button type="button" class="close" onclick="$('#addTaskCategory').modal('hide');" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                </div>
                <div id="taskCategoryModalbody" class="modal-body">

                </div>
            </div>
        </div>
    </div>
    {{-- end Task Category Modal --}}

       {{-- edit Task Category Modal --}}
       <div class="modal fade" id="editTaskCategoryModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 60%; min-width: 500px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edittaskCategoryHead">Edit Task Category</h5>
                    <button type="button" class="close" onclick="$('#editTaskCategoryModal').modal('hide');" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                </div>
                <div id="editTaskCategoryModalBody" class="modal-body">

                </div>
            </div>
        </div>
    </div>
    {{-- end Task Category Modal --}}

    {{-- Task status datatable modal --}}
    <div class="modal fade" id="taskstatusDatatable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:60%; min-width:300px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Task Status</h5>
                        <button type="button" class="close" onclick="$('#taskstatusDatatable').modal('hide');" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                    </div>
                    <div class="modal-body">
                        <div class="m-portlet " id="m_portlet">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon">
                                            <i class="flaticon-list-2"> </i>
                                        </span>
                                        <h3 class="m-portlet__head-text">
                                            Task Status Table
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item">
                                            <a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" style="color:white; background-color: #8a2a2b;" data-toggle="modal" data-target="#AddStatus">
                                                <span>
                                                    <i class="la la-plus"></i>
                                                    <span>
                                                        Add Status
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="m-portlet__body" style="overflow-x:auto;  width:100%">
                                <table id="kt_table_task_status" class="table table-striped table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">#</th>
                                            <th>Status Name</th>
                                            <th>Tools</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Portlet-->
                    </div>
                    </div>
                </div>
            </div>
        {{-- End Task status datatable modal --}}


    <!--modalled Add Status Modal -->
        <div class="modal fade" id="AddStatus" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Status</h5>
                        <button type="button" class="close" onclick="$('#AddStatus').modal('hide');" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <form id="addStatusform"  enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" value="" class="form-control" id="statusInput" name="name" placeholder="">
                            <div class="error" id="taskStatusErr"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="$('#AddStatus').modal('hide');" >Close</button>
                        <button id="addStatusSubmit" onclick="validateStatus();" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    <!--End modalled projType Modal -->

    <!--Edit TaskStatus Modal -->
<div class="modal fade" id="editTaskStatusModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Task Status Type</h5>
                <button type="button" class="close" onclick="$('#editTaskStatusModal').modal('hide');" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
            </div>
            <div id="editTaskStatusBody">

            </div>
        </div>
    </div>
</div>
<!--End Edit projType Modal -->

    {{-- The task comment --}}
    <div class="modal fade" id="taskCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="overflow-y:hidden; height:95vh; min-height: 70vh; max-width: 90vw; min-width: 70vw; overflow:hidden;">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Task comments</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="commentFiller">

                </div>
              </div>
            </div>
          </div>

    {{-- Make comment --}}
    <div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Make comment</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="makeCommentBodyId">

                </div>
              </div>
            </div>
          </div>

        {{-- Modal for adding task document --}}
    <div class="modal fade" id="addDocumentModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 60%; min-width: 500px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"><i class="la la-plus"></i> Add Document</h5>
                    <button type="button" class="close" onclick="$('#addDocumentModal').modal('hide');" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/task-documents') }}" onsubmit="addDocFunction()" id="taskDocumentForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="form-group col-sm-6 col-md-6">
                                <label for="document-name">Document Name</label>
                                <input name="name" type="text" class="form-control" id="document-name" placeholder="Enter Document Name" required>
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.taskDocument.fields.name_helper') }}
                                </p>
                            </div>

                            <div class="form-group col-sm-6 col-md-6">
                                <label for="document_type">Document Type</label>
                                <select id="document_type" name="document_type" class="form-control" required>
                                    <option value="" disabled="" selected="">Please select</option>
                                    <option value="1">Word</option>
                                    <option value="2">PDF</option>
                                    <option value="3">Excel</option>
                                    <option value="4">Text</option>
                                </select>
                                @if($errors->has('document_type'))
                                    <p class="help-block">
                                        {{ $errors->first('document_type') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group {{ $errors->has('document') ? 'has-error' : '' }} col-sm-12 col-md-12">
                                <label for="document">{{ trans('cruds.taskDocument.fields.document') }}*</label>
                                <div class="needsclick dropzone" id="document-dropzone">

                                </div>
                                @if($errors->has('document'))
                                    <p class="help-block">
                                        {{ $errors->first('document') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.taskDocument.fields.document_helper') }}
                                </p>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-3 form-group">
                                <input class="btn btn-block center-block" type="submit" value="{{ trans('global.save') }}" style="background-color:#8a2a2b; color:white;">
                            </div>

                            <div class="form-group col-md-2">
                                <input type="hidden" class="form-control" id="client-list" name="client_id" value="">
                            </div>

                            <div class="form-group col-md-2">
                                <input type="hidden" class="form-control" id="doc-task-id" name="task_id" value="">
                            </div>

                            <div class="form-group col-md-2">
                                <input type="hidden" class="form-control" id="project-list_doc" name="project_id" value="">
                            </div>

                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>


@endsection
@section('javascript')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@include('pages.js.validator.taskValidator_js')
@include('pages.js.task_scripts.view_task_js')
@include('pages.js.task_scripts.task_category_js')
@include('pages.js.task_scripts.task_status_js')
@include('pages.js.task_scripts.task_tools_js')
@include('pages.js.task_scripts.taskComment_js')


<script src="{{ asset('metro/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('metro/assets/vendors/custom/datatables/buttons.colVis.min.js') }}" type="text/javascript"></script>
<script>

    function addDocFunction(){
        swal({
            title: "Success!",
            text: "Document Added!",
            icon: "success",
            confirmButtonText: "OK",
        });
        window.setTimeout(function(){
            location.reload();
        }, 2500);
    }

    $(document).ready(function() {
            getTaskCategoryAjaxDT();
            getTaskStatusAjaxDT();
        });

    $(document).ajaxStop(function () {
            $('#loading').hide();
        });

        $(document).ajaxStart(function () {
            $('#loading').show();
        });

        $('#ooooh').on('shown.bs.modal', function () {
  $('#commentTrigger').trigger('focus')
})
            let languages = {
                    'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
                };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var taskDataTable =  $('#kt_table_task').DataTable({
                ajax: "{{ url('/api/v1/tasks') }}",
                columns: [
                    { defaultContent : "" },
                    { "data": "name" },
                    { "data": "client.name" },
                    { "data": "project.name" },
                    { "data": "manager.name" },
                    { "data": "status.name" },
                    { "data": "starting_date" },
                    { "data": "ending_date" }
                ],
                dom: 'lBfrtip<"actions">',
                language: {
                    url: languages.{{ app()->getLocale() }}
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0,

                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1,

                },
                {
                    targets: 8,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                    return '\<button onclick="displayTaskInfo('+full.id+'), editTaskMain('+full.id+')" class="btn btn-secondary dropdown-toggle" type="button" id="taskToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                <div class="dropdown-menu" aria-labelledby="taskToolsbtn" style="padding-left:8px; min-width: 75px; max-width: 15px;">\
                                <a class="link" href="#"><i class="fa fa-eye" style="color:black;" data-toggle="modal"   data-target="#moreTaskInfoModal"> <span style="font-weight:100;"> View </span></i>\
                                </a>\
                                <a class="link" href="#"><i class="fa fa-pencil" data-toggle="modal" data-target="#editTaskModalMain" style="color:black;"><span style="font-weight:100;"> Edit </span></i>\
                                </a>\
                            <button onclick="deleteSingleTask('+full.id+')" class="link" style="border: none; background-color: white;"><a class="link" href="#"><i class="fa fa-trash" style="color:black; margin-left: -5px;"> Delete</i></a></button>\
                            </div>\
                                        ';
                    }
                }],
                buttons: [
                        {
                            extend: 'excel',
                            className: 'btn-primary',
                            text: 'Excel',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }, {
                            extend: 'pdf',
                            className: 'btn-success',
                            text: 'PDF',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'csv',
                            className: 'btn-warning',
                            text: 'CSV',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            text: 'Reload',
                            className: 'btn-info',
                            action: function ( e, dt, node, config ) {
                                dt.ajax.reload();
                            }
                        },
                        {
                            text: 'Delete Selected',
                            className: 'btn-danger',
                            action: function (e, dt, node, config) {
                                //getting the full row data
                                let rData = [];
                                var ids = $.map(dt.rows('.selected').data(), function (item) {
                                    rData.push(item);
                                    return item.id
                                });

                                if (ids.length === 0) {
                                    swal({
                                        title: "No Item selected",
                                        text: "Please select at leaset one row!",
                                        icon: "error",
                                        confirmButtonColor: "#fc3",
                                        confirmButtonText: "OK",
                                    });
                                    return
                                }
                                swal({
                                    title: "Are you sure?",
                                    text: "This project type will be deleted!",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                }).then((willDelete) =>
                                {
                                    if (willDelete) {
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });

                                        $.ajax({
                                            method: 'POST',
                                            data: {
                                                ids: ids,
                                                _method: 'DELETE'
                                            },
                                            url: "{{ route('admin.projects.massDestroy') }}",
                                            success: function (data) {
                                                swal("Deleted!", "Project successfully deleted.", "success");
                                                window.setTimeout(function () {
                                                    dt.ajax.reload();
                                                }, 2500);
                                            },

                                            error: function (data) {
                                                swal("Delete failed", "Please try again", "error");
                                            }

                                        });
                                    } else {
                                        swal("Cancelled", "Delete cancelled", "error");
                                    }

                                });
                            }
                        }
                    ]
            });


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
                            text: 'Excel',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }, {
                            extend: 'pdf',
                            className: 'btn-success',
                            text: 'PDF',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'csv',
                            className: 'btn-info',
                            text: 'CSV',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                    ]
        });

                })


            $.ajax({
                type: "GET",
                url: '{{ url("/api/v1/tasks") }}',
                success: function (data) {

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

            //delete user login
            $('body').on('click', '.delete-user', function () {
                var user_id = $(this).data("id");
                confirm("Are You sure want to delete !");

                $.ajax({
                    type: "DELETE",
                    url: "{{ url('ajax-crud')}}" + '/' + user_id,
                    success: function (data) {
                        $("#user_id_" + user_id).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });




            function getTaskCategoryAjaxDT(){
                if ( $.fn.dataTable.isDataTable( '#kt_table_task_category') ) {
                    var kt_table_task_category = $('#kt_table_task_category').DataTable();
                }else {
                    var kt_table_task_category = $('#kt_table_task_category').DataTable({
                        ajax: "{{ url('/api/v1/tast-categories') }}",
                        columns: [
                            { defaultContent : "" },
                            { "data": "name" },
                            { "data": "project_type.name" },
                            { "data": "sub_category.name" },
                            { "data": "weight" },
                            { "data": "description" }
                        ],
                        dom: 'lBfrtip<"actions">',
                        language: {
                            url: languages.{{ app()->getLocale() }}
                        },
                        columnDefs: [{
                            orderable: false,
                            className: 'select-checkbox',
                            targets: 0,

                    }, {
                        orderable: false,
                        searchable: false,
                        targets: -1,

                        },
                        {
                            targets: 6,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, full, meta) {
                            return '\<button class="btn btn-secondary dropdown-toggle" onclick="editTaskCategory('+full.id+')" type="button" id="taskcategoryToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                        <div class="dropdown-menu" aria-labelledby="taskcategoryToolsbtn" style="padding-left:8px; min-width: 75px; max-width: 15px;">\
                                            <a class="link" data-toggle="modal" data-target="#editTaskCategoryModal" href="#">\
                                                <i class="fa fa-pencil" style="color:black;"><span style="font-weight:100;"> Edit </span></i>\
                                            </a>\
                                            <button onclick="deleteSingleTaskCategory('+full.id+')" class="link" style="border: none; background-color: white;"><a class="link" href="#"><i class="fa fa-trash" style="color:black; margin-left: -5px;"> Delete</i></a></button>\
                                        </div>\
                                                ';
                            }
                    }],
                    buttons: [
                        {
                            extend: 'excel',
                            className: 'btn-primary',
                            text: 'Excel',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }, {
                            extend: 'pdf',
                            className: 'btn-success',
                            text: 'PDF',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'csv',
                            className: 'btn-warning',
                            text: 'CSV',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            text: 'Delete Selected',
                            className: 'btn-danger',
                            action: function (e, dt, node, config) {
                                //getting the full row data
                                let rData = [];
                                var ids = $.map(dt.rows('.selected').data(), function (item) {
                                    rData.push(item);
                                    return item.id
                                });

                                if (ids.length === 0) {
                                    swal({
                                        title: "No Item selected",
                                        text: "Please select at leaset one row!",
                                        icon: "error",
                                        confirmButtonColor: "#fc3",
                                        confirmButtonText: "OK",
                                    });
                                    return
                                }
                                swal({
                                    title: "Are you sure?",
                                    text: "The selected will be deleted!",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                }).then((willDelete) =>
                                {
                                    if (willDelete) {
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });

                                        $.ajax({
                                            method: 'POST',
                                            data: {
                                                ids: ids,
                                                _method: 'DELETE'
                                            },
                                            url: "{{ route('admin.tast-categories.massDestroy') }}",
                                            success: function (data) {
                                                swal("Deleted!", "Task categories successfully deleted.", "success");
                                                window.setTimeout(function () {
                                                    dt.ajax.reload();
                                                }, 2500);
                                            },

                                            error: function (data) {
                                                swal("Delete failed", "Please try again", "error");
                                            }

                                        });
                                    } else {
                                        swal("Cancelled", "Delete cancelled", "error");
                                    }

                                });
                            }
                        }
                    ]

                    });
                }
            }

            //Task status
            function getTaskStatusAjaxDT(){
                if ( $.fn.dataTable.isDataTable( '#kt_table_task_status') ) {
                    var kt_table_project_type = $('#kt_table_task_status').DataTable();
                }else {
                    var kt_table_project_type = $('#kt_table_task_status').DataTable({
                        ajax: "{{ url('/api/v1/task-statuses') }}",
                        columns: [
                            { defaultContent : "" },
                            { "data": "name" },
                        ],
                        dom: 'lBfrtip<"actions">',
                        language: {
                            url: languages.{{ app()->getLocale() }}
                        },
                        columnDefs: [{
                            orderable: false,
                            className: 'select-checkbox',
                            targets: 0,

                        }, {
                            orderable: false,
                            searchable: false,
                            targets: -1,

                        },
                        {
                            targets: 2,
                            orderable: false,
                            searchable: false,
                            render: function (data, type, full, meta) {
                            return '\<button class="btn btn-secondary dropdown-toggle" onclick="editTaskStatusModal('+full.id+')" type="button" id="taskStatusbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                                    <div class="dropdown-menu" aria-labelledby="taskStatusbtn" style="padding-left:8px; min-width: 75px; max-width: 15px;">\
                                                    <a class="link" href="#">\
                                                        <i class="fa fa-pencil" data-toggle="modal" data-target="#editTaskStatusModal" style="color:black;"><span style="font-weight:100;"> Edit </span></i>\
                                                    </a>\
                                                    <button onclick="deleteSingleTaskStatus('+full.id+')" class="link" style="border: none; background-color: white;"><a class="link" href="#"><i class="fa fa-trash" style="color:black; margin-left: -5px;"> Delete</i></a></button>\
                                                </div>\
                                                ';
                            }
                    }],
                    buttons: [
                        {
                            extend: 'excel',
                            className: 'btn-primary',
                            text: 'Excel',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }, {
                            extend: 'pdf',
                            className: 'btn-success',
                            text: 'PDF',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'csv',
                            className: 'btn-warning',
                            text: 'CSV',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            text: 'Delete Selected',
                            className: 'btn-danger',
                            action: function (e, dt, node, config) {
                                //getting the full row data
                                let rData = [];
                                var ids = $.map(dt.rows('.selected').data(), function (item) {
                                    rData.push(item);
                                    return item.id
                                });

                                if (ids.length === 0) {
                                    swal({
                                        title: "No Item selected",
                                        text: "Please select at leaset one row!",
                                        icon: "error",
                                        confirmButtonColor: "#fc3",
                                        confirmButtonText: "OK",
                                    });
                                    return
                                }
                                swal({
                                    title: "Are you sure?",
                                    text: "The selected will be deleted!",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                }).then((willDelete) =>
                                {
                                    if (willDelete) {
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });

                                        $.ajax({
                                            method: 'POST',
                                            data: {
                                                ids: ids,
                                                _method: 'DELETE'
                                            },
                                            url: "{{ route('admin.task-statuses.massDestroy') }}",
                                            success: function (data) {
                                                swal("Deleted!", "Task status(es) successfully deleted.", "success");
                                                window.setTimeout(function () {
                                                    dt.ajax.reload();
                                                }, 2500);
                                            },

                                            error: function (data) {
                                                swal("Delete failed", "Please try again", "error");
                                            }

                                        });
                                    } else {
                                        swal("Cancelled", "Delete cancelled", "error");
                                    }

                                });
                            }
                        }
                    ]

                    });

                }
            }

                var editStatusData;
            function editTaskStatusModal(taskStatusId){
                $.ajax({
                        type: "GET",
                        url: "{{ url('/api/v1/task-statuses') }}" + "/" + taskStatusId,
                        success: function(data){
                            editStatusData = data.data;
                            $('#editStatusInput').val(editStatusData.name);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }

                    })
                let editTaskModalBody = document.getElementById('editTaskStatusBody');
                editTaskModalBody.innerHTML = `
                <form id="editTaskStatusform" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="create-task">Status name</label>
                            <input type="text" class="form-control" id="editStatusInput" name="name" placeholder="" value="" required>
                            <div class="error" id="editTaskStatusErr"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="$('#editTaskStatusModal').modal('hide');">Close</button>
                        <input class="btn btn-danger" type="button" style="background-color:#8a2a2b; color:white;" onclick="validateEditStatus(${taskStatusId})" value="Update">
                    </div>
                </form>
                `
            }


            var taskName;
            function displayTaskInfo(task_id) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/api/v1/tasks') }}" + "/" + task_id,
                    success: function (data) {
                         taskName = data.data.name;
                        let moreInfo = document.getElementById("moreInfo")
                        moreInfo.innerHTML = `<div class="modal fade" id="moreTaskInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 500px;" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" onclick="$('#moreTaskInfoModal').modal('hide');" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">

                                    <div class="col-md-12 m-portlet " id="m_portlet">
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-title">
                                                    <span class="m-portlet__head-icon">
                                                                <i class="flaticon-list-2"> </i>
                                                            </span>
                                                    <h3 class="m-portlet__head-text">
                                                        ${data.data.name}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div onclick="documentDTCall(${data.data.id})" class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h6 style="cursor: pointer" class="mb-0">
                                                    <span data-toggle="modal" data-target="#documentModal">
                                                        <i class="m-menu__link-icon flaticon-clipboard"></i>
                                                        Documents
                                                    </span>
                                                </h6>
                                            </div>
                                        </div>

                                        <div class="accordion" id="accordionExample5">
                                    <div class="card">
                                        <div class="card-header" id="headingnine">
                                            <h6 style="cursor: pointer" class="mb-0">
                                                <span class="collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                    <i class="m-menu__link-icon flaticon-users"></i>
                                                    Task Members
                                                </span>
                                            </h6>
                                        </div>
                                    <div id="collapseNine" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample5">
                                        <input type="textOne" id="myInputNine" onkeyup="searchTaskMembers()" placeholder="Search for task member.." title="Type in a member">
                                        <table id="myTableNine">
                                            <tr class="header">
                                                <th>Name</th>
                                                <th>Email</th>
                                            </tr>
                                            <tr class="">
                                            </tr>
                                            `+ data.data.assinged_tos.map(item =>
                                            `<tr>
                                                <td>${item.name}</td>
                                                <td>${item.email}</td>
                                            </tr>`
                                            )+`
                                        </table>
                                    </div>
                                </div>

                                        <div onclick="taskCommentTester(${data.data.id})" class="card">
                                            <div class="card-header" id="headingFour">
                                                <h6 style="cursor: pointer" class="mb-0">
                                                    <span class="" id="commentTrigger" data-toggle="modal" data-target="#taskCommentModal">
                                                        <i class="m-menu__link-icon flaticon-comment"></i>
                                                        Comments
                                                    </span>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



            <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 65%; min-width: 500px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="documentModalLongTitle">Task Documents</h5>
                            <button type="button" class="close" onclick="$('#documentModal').modal('hide');" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="m-portlet" id="m_portlet">
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
                                    <div class="m-portlet">
                                        <table id="kt_table_single_task_documents" class="table table-striped table-hover" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">#</th>
                                                    <th>Name</th>
                                                    <th>Document Type</th>
                                                    <th>File</th>
                                                    <th>Date Created</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                `+ data.data.documents.map(item =>
                                                    `<tr>
                                                        <td></td>
                                                        <td>${item.name}</td>
                                                        <td style="text-align: center;">${item.document_type}</td>
                                                        <td>
                                                            <a href="http://docs.google.com/gview?url=http://localhost/storage/${item.media_report[0].id}/${item.media_report[0].file_name}&embedded=true" target="_blank">
                                                            <!-- <iframe
                                                                src="http://docs.google.com/gview?url=http://localhost/storage/${item.media_report[0].id}/${item.media_report[0].file_name}&embedded=true"
                                                                style="width:600px; height:500px;" frameborder="0">
                                                            </iframe> -->

                                                                View file
                                                            </a>
                                                        </td>
                                                        <td>${item.created_at}</td>
                                                        <td>
                                                            <form id="deleteTaskDocForm" style="display: inline-block;">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="submit" class="btn btn-xs btn-danger" onclick="deleteTaskDoc(${item.id})" value="{{ trans('global.delete') }}">
                                                            </form>
                                                        </td>
                                                    </tr>`
                                                ) +`
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end::Portlet-->
                        </div>
                    </div>
                </div>
                </div>






            `
            document.getElementById('client-list').value = data.data.client_id;
            document.getElementById('doc-task-id').value = data.data.id;
            document.getElementById('project-list_doc').value = data.data.project_id;

                },

            error: function (data) {
                console.log('Error:', data);


            }

            })

    }

    function deleteTaskDoc(doc_id){
        swal({
        title: "Are you sure?",
        text: "This document will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "DELETE",
                    url: '/admin/task-documents' + '/' + doc_id,
                    success: function(data) {
                        swal("Deleted!", "Document successfully deleted.", "success");
                        window.setTimeout(function() {
                            $("#kt_table_single_task_documents").DataTable().ajax.reload();
                        }, 2400);
                    },

                    error: function(data) {
                        swal("Delete failed", "Please try again", "error");
                    }

                });
            } else {
                swal("Cancelled", "Delete cancelled", "error");
            }

        });
    }

        function documentDTCall(project_id){
            $(document).ready(function() {
                $('#kt_table_single_task_documents').DataTable();
            } );
        }

        function taskCommentTester(task_id){
            console.log("here")
            $.ajax({
                    type: "GET",
                    url: "{{ url('/api/v1/task-comments') }}",
                    success: function (data) {
                        let commentbody = document.getElementById('commentFiller');
                        // let probSubtypeBody = document.getElementById('subtypeModalBody');
                        commentbody.innerHTML = `
                        <div class="m-content">
                        <div class="row">
                    <div class="col-lg-6">

                        <div class="m-portlet__body">
                            <div class="m-card-profile">
                                <div class="m-card-profile__title m--hide">
                                    Comments
                                </div>
                                <div class="m-card-profile__pic">
                                    <div class="m-card-profile__pic-wrapper">
                                        <img alt="" src="{{ asset('metro/assets/app/media/img/users/user_comment.png') }}" class="mCS_img_loaded" />
                                    </div>
                                </div>
                                <div class="m-card-profile__details">
                                    <span class="m-card-profile__name">
                                        ${taskName}
                                                    </span>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-tools">
                                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">

                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                                            Comments
                                                        </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <!-- <div class="tab-content"> -->
                            <!-- <div class="tab-pane active" id="m_user_profile_tab_1"> -->
                                <div id="forTest" class=" m-scrollable" >
                                    <div class="tab-pane active m-scrollable" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
                                        <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
                                            <div class="m-messenger__messages mCS-autoHide" style="height: 400px; max-height: auto; position: relative; overflow: hidden;">
                                                <div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="padding-top:7px; max-height: 100%; width: 100%; position: absolute;
                                                overflow-y: scroll; scrollbar-width: 2px;">
                                                <div id="mCSB_3_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                                    <br>
                                                    <span id="filler"> </span>
                                                        ` +
                                                data.data.map(elem => `
                                                    <div class="m-messenger__wrapper commguy" style="padding-right: 10px; display:flex; flex-wrap: flex; padding-left: 10px;">
                                                        <div class="m-messenger__message m-messenger__message--in">
                                                            <div class="m-messenger__message-pic">
                                                                <img alt="" src="{{ asset('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded" />
                                                            </div>
                                                            <div class="m-messenger__message-body">
                                                                <div class="m-messenger__message-arrow"></div>
                                                                    <div class="m-messenger__message-content">
                                                                        <div class="m-messenger__message-username">
                                                                            <span class="secondary" style="margin-right:30px; color: #6f727d;"><strong>${elem.user.name}</strong></span>
                                                                            <span id="datee" style="float: right; color: #6f727d;">${elem.created_at}</span>
                                                                        </div>
                                                                        <div class="m-messenger__message-text" id="comContent" style="  max-width: 450px; min-height:20px; max-height: 4000px; display: flex; flex-direction: column;">
                                                                                        ${elem.comments}

                                                                            <div id="${elem.id}replydiv" class="replyCommentBody" style="width: 80%; flex-wrap: wrap; padding-bottom:5px; align-self: flex-end; text-align: right;">
                                                                                ${elem.commentreply.map(replies=>`
                                                                                    <div class="m-messenger__wrapper" style=" margin-top:9px; padding-right: 10px; padding-left: 10px;">
                        <div class="m-messenger__message m-messenger__message--out">

                            <div class="m-messenger__message-body">
                                <div class="m-messenger__message-arrow"></div>
                                <div class="m-messenger__message-content">
                                <div class="m-messenger__message-username">
                                <span style="float: left; color: #0c2a7a;"><strong>${replies.reply_by.name}</strong></span>
                                <span class="datee" style="float: right; color:#0c2a7a">${replies.created_at}</span>

                                    </div>

                                    <div class="m-messenger__message-text" style="min-width: 250px; word-wrap: break-word; max-width: 320px; text-align: left; max-height: 4000px;">  <p> </br>

                                        ${replies.task_comment_reply}
                                                </p>
                                    </div>
                                        </br>
                                    <i class="fa fa-trash" onclick="deleteReply(${elem.id})" style="display:flex; justify-content: flex-end; margin-bottom:5px; color:black;"></i>

                                </div>
                            </div>
                            <div class="m-messenger__message-pic">
                            <img alt="" src="{{ url('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
                        </div>
                        </div>
                    </div>`)}
                                                                            </div>
                                                                            <br>
                                                                        <i class="fa fa-trash" onclick="deleteComment(${elem.id})" style="display:flex; justify-content: flex-end; margin-bottom:5px;"></i>
                                                                        <i class="fa fa-reply" data-toggle="collapse" id="kkk" aria-hidden="true" data-target="#${elem.id}collapseReply" aria-expanded="false" aria-controls="collapseReply" style="display:flex; justify-content: flex-end;"></i>

                                                                        <div class="collapse" id="${elem.id}collapseReply">
                                                                            <br>
                                                                            <form id="replyForm" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" id="task_comment_id" name="task_comment_id" value="${data.data.id}">
                                                                                <textarea class="form-control" name="task_comment_reply" id="${elem.id}replyTextId" rows="1" style="width: 100%" required>{{ old('task_comment_reply', isset($taskCommentReply) ? $taskCommentReply->task_comment_reply : '') }}</textarea>
                                                                                <input type="hidden" id="reply_by_id" name="reply_by_id" value="${data.data.id}">
                                                                                <input type="button" class="m-btn--pill btn btn-primary" onclick="addReply(${elem.id})" data-toggle="collapse" data-target="#${elem.id}collapseReply" style="margin-top: 5px; float: right;" value="Reply">
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    `)
                                                    +`

                                                </div>
                                            </div>
                                            <div id=" mCSB_3_scrollbar_vertical " class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical " style="display: block;">
                                                <div class=" mCSB_draggerContainer ">
                                                    <div id="mCSB_3_dragger_vertical " class="mCSB_dragger " style="position: absolute; min-height: 50px; display: block; height: 114px; max-height: 319px; top: 0px; ">
                                                        <div class="mCSB_dragger_bar " style="line-height: 50px; "></div>
                                                    </div>
                                                    <div class="mCSB_draggerRail "></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-messenger__seperator "></div>
                                        <div class="m-messenger__form " style="width: 100%;">
                                            <div class="m-messenger__form-controls ">
                                                <button type="button" onclick="makeComment(${task_id})" class="m-btn--pill btn btn-primary pull-right" data-toggle="modal" data-target="#msgModal" style="margin-left: 72%; margin-bottom: 25px;">
                                                                Make Comment
                                                              </button>
                                                              <div class="modal fade" id="makecommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                              </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" tab-pane " id="m_user_profile_tab_2 "></div>
                            <div class="tab-pane " id="m_user_profile_tab_3 "></div>
                        </div>
                    </div>
                </div>
                </div>
                        `
                    }
                });
            }
       var userName = "{{ Auth::user()->name}}"
       var userId = {{ Auth::user()->id}}

       console.log(userName, userId)

        function makeComment(task_id) {
            $.ajax({
                type: "GET",
                url: '{{ url("/api/v1/tasks") }}'+ "/" + task_id,
                success: function(data) {
                    let makecommentModal = document.getElementById('makeCommentBodyId');
                    makecommentModal.innerHTML = `
                    <form id="makeCommentForm" enctype="multipart/form-data">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <textarea class="form-control goat" name="comments" id="commentText" rows="4 " required></textarea>
                                                                        <input type="hidden" id="user" name="user_id" value="${userId}">
                                                                        <input type="hidden" id="task" name="task_id" value="${data.data.id}">
                                                                        <input type="hidden" id="client" name="client_id" value="${data.data.client_id}">
                                                                        <input type="hidden" id="project" name="project_id" value="${data.data.project_id}">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="button" id="closeModal" class="m-btn--pill btn btn-secondary" onclick="$('#msgModal').modal('hide');" value="Close">
                                                                        <input type="button" class="m-btn--pill btn btn-primary" onclick="$('#msgModal').modal('hide'), postComment()" value="Comment">
                                                                    </div>
                                                                    </form>

            ` },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

        }

       //Ajax populate create task
            let createTask = document.getElementById('addTaskId');
            createTask.addEventListener("click", displayAddTask);

            function displayAddTask(){
            $("#createTaskModal").modal('show');
                $.ajax({
                    type: "GET",
                    url: "{{ url('/api/v1/create_task') }}",
                    success: function (data) {
                        let createTaskBody = document.getElementById('createTaskBody');
                        // let probSubtypeBody = document.getElementById('subtypeModalBody');
                        createTaskBody.innerHTML = `
                    <div class="modal-body">
                        <form class="form" id="addTaskform" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="client-list">Select Client</label>
                                            <select id="client-list" onchange="filterType()" name="client_id" class="form-control">
                                                <option value="" selected> </option>
                                                ${Object.keys(data.data.clients).map((key, index) => `<option value="${key}">${data.data.clients[key]}</option>`)}
                                            </select>
                                            <div class="error" id="clientErr"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="create-task">Task Name</label>
                                            <input type="text" name="name" class="form-control" id="create-task" placeholder="" required>
                                            <div class="error" id="nameErr"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Select Project</label>
                                            <select id="project-list" name="project_id" class="selectDesign form-control">

                                            </select>
                                            <div class="error" id="projListErr"></div>
                                        </div>

                                        <div class="form-group">
                                            <label>Task Category</label>
                                            <select id="task-category" name="category_id" class="selectDesign form-control">
                                                    <option value="" selected> </option>
                                                    ${Object.keys(data.data.categories).map((key, index) => `<option value="${key}">${data.data.categories[key]}</option>`)}
                                            </select>
                                            <div class="error" id="categoryErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Task Status</label>
                                            <select id="task-status" name="status_id" class="selectDesign form-control">
                                                    <option value="" selected> </option>
                                                    ${Object.keys(data.data.statuses).map((key, index) => `<option value="${key}" >${data.data.statuses[key]}</option>`)}
                                                </select>
                                                <div class="error" id="statusErr"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Select Manager</label>
                                            <select id="manager" name="manager_id" class="selectDesign form-control">
                                                    <option value="" selected> </option>
                                                    ${Object.keys(data.data.managers).map((key, index) => `<option value="${key}">${data.data.managers[key]}</option>`)}
                                            </select>
                                            <div class="error" id="managerErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="assign-task">Assign task to</label>
                                                <br>
                                            <select style="width: 100%" name="assinged_tos[]" id="assinged_tos" multiple="multiple" class="form-control select2" required>
                                                ${Object.keys(data.data.assinged_tos).map((key, index) => `<option value="${key}">${data.data.assinged_tos[key]}</option>`)}
                                            </select>
                                            <div class="error" id="assignErr"></div>
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="starting-date">Starting Date</label>
                                            <input type="text" name="starting_date" class="form-control datetime" id="starting-date" required>
                                            <div class="error" id="startErr"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="deadline">Deadline</label>
                                            <input type="text" name="ending_date" class="form-control datetime" id="deadline" required>
                                            <div class="error" id="endErr"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="validateCreateTaskForm();" value="{{ trans('global.create') }}">
                                </div>
                            </form>

                        </div>
                        `
                        window._token = $('meta[name="csrf-token"]').attr('content');

                        var allEditors = document.querySelectorAll('.ckeditor');
                        for (var i = 0; i < allEditors.length; ++i) {
                            ClassicEditor.create(allEditors[i]);
                        }

                        moment.updateLocale('en', {
                            week: {dow: 1} // Monday is the first day of the week
                        });

                        $('.date').datetimepicker({
                            format: 'DD-MM-YYYY',
                            locale: 'en'
                        });

                        $('.datetime').datetimepicker({
                            format: 'DD-MM-YYYY HH:mm:ss',
                            locale: 'en',
                            sideBySide: true
                        });

                        $('.timepicker').datetimepicker({
                            format: 'HH:mm:ss'
                        });

                        $('.select-all').click(function () {
                            let $select2 = $(this).parent().siblings('.select2')
                            $select2.find('option').prop('selected', 'selected')
                            $select2.trigger('change')
                        });
                        $('.deselect-all').click(function () {
                            let $select2 = $(this).parent().siblings('.select2');
                            $select2.find('option').prop('selected', '');
                            $select2.trigger('change')
                        });

                        $('.select2').select2();
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                    }
                                                });
                                            }

                    function filterType(){
                        let clientVal = document.getElementById("client-list").value;
                        console.log(clientVal);
                        $.ajax({
                            type: "GET",
                            url: "{{ url('/api/v1/clients')}}" + "/" + clientVal,
                            success: function (data) {
                                document.getElementById('project-list').innerHTML = `
                                <option value="" selected></option> ` +
                                data.data.projects.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                + `
                                `
                            },
                            error: function (data) {
                                document.getElementById('project-list').innerHTML =
                                `
                                <option value="" selected></option>
                                `
                                console.log('Error:', data);
                            }
                        });
                    }


                //Edit Task
                var editData;
            function editTaskMain(task_id) {

                    $.ajax({
                        type: "GET",
                        url: "{{ url('/api/v1/create_task') }}",
                        success: function(data){
                            var allData = data.data;
                        let editTaskBody = document.getElementById('editTaskBody');
                        editTaskBody.innerHTML = `
                            <div class="modal-body">
                            <form id="editTaskform" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="edit-client-list">Select Client</label>
                                            <select id="edit-client-list" onchange="editFilterType()" name="client_id" class="selectDesign form-control" selected="3">
                                                ${Object.keys(allData.clients).map((key, index) => `<option value="${key}">${allData.clients[key]}</option>`)}
                                            </select>
                                            <div class="error" id="editClientErr"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="edit-create-task">Task Name</label>
                                            <input type="text" name="name" class="form-control" id="edit-create-task" placeholder="Enter Task Name" required>
                                            <div class="error" id="editTaskNameErr"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="edit-project-list">Select Project</label>
                                            <select id="edit-project-list" name="project_id" class="selectDesign form-control">
                                                ${Object.keys(allData.projects).map((key, index) => `<option value="${key}">${allData.projects[key]}</option>`)}
                                            </select>
                                            <div class="error" id="editProjectErr"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="edit-task-category">Task Category</label>
                                            <select id="edit-task-category" name="category_id" class="selectDesign form-control">
                                                ${Object.keys(allData.categories).map((key, index) => `<option value="${key}">${allData.categories[key]}</option>`)}
                                            </select>
                                            <div class="error" id="editTaskCatErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="edit-task-status">Task Status</label>
                                            <select id="edit-task-status" name="status_id" class="selectDesign form-control">
                                                ${Object.keys(allData.statuses).map((key, index) => `<option value="${key}" >${allData.statuses[key]}</option>`)}
                                            </select>
                                            <div class="error" id="editTaskStatusErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="edit-manager">Select Manager</label>
                                            <select id="edit-manager" name="manager_id" class="selectDesign form-control">
                                                ${Object.keys(allData.managers).map((key, index) => `<option value="${key}">${allData.managers[key]}</option>`)}
                                            </select>
                                            <div class="error" id="editManagerErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="edit-edit_assinged_tos">Assign task to</label>
                                                <br>
                                            <select style="width: 100%" name="assinged_tos[]" id="edit-edit_assinged_tos" multiple="multiple" required class="form-control select2">
                                                ${Object.keys(allData.assinged_tos).map((key, index) => `<option value="${key}">${allData.assinged_tos[key]}</option>`)}
                                            </select>
                                            <div class="error" id="editAssignedTosErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="edit-starting-date">Starting Date</label>
                                            <input type="text" name="starting_date" class="form-control datetime" id="edit-starting-date" required>
                                            <div class="error" id="editStartErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="edit-deadline">Deadline</label>
                                            <input type="text" name="ending_date" class="form-control datetime" id="edit-deadline" required>
                                            <div class="error" id="editEndErr"></div>
                                        </div>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="validateEditCreateTaskForm(${task_id});" value="Update">
                                </div>
                            </form>

                        </div>
                        `

                        $.ajax({
                        type: "GET",
                        url: "{{ url('/api/v1/tasks/') }}" + "/" + task_id,
                        success: function(data){
                            editData = data.data;
                            $('#edit-create-task').val(editData.name);
                            $('#edit-client-list').val(editData.client_id + "");
                            $('#edit-project-list').val(editData.project_id + "");
                            $('#edit-task-status').val(editData.status_id + "");
                            $('#edit-manager').val(editData.manager_id + "");
                            $('#edit-task-category').val(editData.category_id + "");
                            $('#edit_assinged_tos').val(editData.assinged_tos + "");
                            $('#edit-starting-date').val(editData.starting_date);
                            $('#edit-deadline').val(editData.ending_date);
                        },

                        error: function (data) {
                            console.log('Error:', data);
                        }

                    })

                        window._token = $('meta[name="csrf-token"]').attr('content');

                            var allEditors = document.querySelectorAll('.ckeditor');
                            for (var i = 0; i < allEditors.length; ++i) {
                                ClassicEditor.create(allEditors[i]);
                            }

                            moment.updateLocale('en', {
                                week: {dow: 1} // Monday is the first day of the week
                            });

                            $('.date').datetimepicker({
                                format: 'DD-MM-YYYY',
                                locale: 'en'
                            });

                            $('.datetime').datetimepicker({
                                format: 'DD-MM-YYYY HH:mm:ss',
                                locale: 'en',
                                sideBySide: true
                            });

                            $('.timepicker').datetimepicker({
                                format: 'HH:mm:ss'
                            });

                            $('.select-all').click(function () {
                                let $select2 = $(this).parent().siblings('.select2')
                                $select2.find('option').prop('selected', 'selected')
                                $select2.trigger('change')
                            });
                            $('.deselect-all').click(function () {
                                let $select2 = $(this).parent().siblings('.select2');
                                $select2.find('option').prop('selected', '');
                                $select2.trigger('change')
                            });

                            $('.select2').select2();
                        },

                        error: function (data) {
                            console.log('Error:', data);
                        }

                    })

                    }

            //Ajax populate create task category
            function createTaskCategoryAjaxGet(){
                $.ajax({
                    type: "GET",
                    url: '{{ url("/api/v1/create_task_categories") }}',
                    success: function (data) {
                        let createTaskCategory = document.getElementById('taskCategoryModalbody');
                        createTaskCategory.innerHTML =
                        `
                        <form  id="addTaskCategoryForm" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 row">
                            <div class="col-md-6 form-group mt-3">
                                <label for="category-name">Name</label>
                                <input type="text" class="form-control" name="name" id="category-name" placeholder="">
                                <div class="error" id="categoryNameErr"></div>
                            </div>

                            <div class="col-md-6 form-group mt-3">
                                <label>Project Type</label>
                                <select onchange="filterCategorySub()" id="createProjectTypeList"  name="project_type_id" class="selectDesign form-control">
                                        <option value=""> </option>
                                        ${Object.keys(data.data.project_types).map((key, index) => `<option value="${key}">${data.data.project_types[key]}</option>`)}
                                </select>
                                <div class="error" id="projectTypeeErr"></div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                                <div class="col-md-6 form-group mt-3">
                                    <label>Project Subtype</label>
                                    <select id="createSubCategory" name="sub_category_id" class="selectDesign form-control">

                                    </select>
                                    <div class="error" id="subtypeeErr"></div>
                                </div>

                                <div class="col-md-6 form-group mt-3">
                                    <label>Weight</label>
                                    <input type="number"  name="weight" value="" class="form-control" id="weightId" placeholder="">
                                    <div class="error" id="weightErr"></div>
                                </div>
                        </div>
                        <div class=" row col-md-12">
                            <div class="col-md-12 form-group mt-3">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="description" id="descriptionID" rows="3"></textarea>
                                <div class="error" id="descriptionErr"></div>
                            </div>
                        </div>
                        <div class="col-md-3 form-group mt-2">
                            <input type=button class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="validateTaskCategory();" value="{{ trans('global.create') }}">
                        </div>
                    </form>
                        `
                    }
                });
            }


        //  Edit TaskCategory
         var editTaskCategoryData;
            function editTaskCategory(task_id){
                $.ajax({
                type: "GET",
                url: "{{ url('/api/v1/tast-categories') }}" + "/" + task_id,
                success: function(data){
                    editTaskCategoryData = data.data;
                    $('#editCategoryName').val(editTaskCategoryData.name);
                    $('#editProjectTypeListt').val(editTaskCategoryData.project_type_id + "");
                    $('#editSubCategory').val(editTaskCategoryData.sub_category_id + "");
                    $('#editWeightId').val(editTaskCategoryData.weight);
                    $('#editDescriptionID').val(editTaskCategoryData.description);
                },

                error: function (data) {
                    console.log('Error:', data);
                }

            })

            $.ajax({
                type: "GET",
                url: "{{ url('/api/v1/create_task_categories') }}",
                success: function(data){
                var editTaskCatData = data.data;
                let editTaskCatBody = document.getElementById('editTaskCategoryModalBody');
                editTaskCatBody.innerHTML = `
                <form id="editTaskCategoryForm" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 row">
                            <div class="col-md-6 form-group mt-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="editCategoryName" placeholder="">
                                <div class="error" id="editCategoryNameErr"></div>
                            </div>

                            <div class="col-md-6 form-group mt-3">
                                <label>Project Type</label>
                                <select id="editProjectTypeListt" onchange="editFilterCategorySub()" name="project_type_id" class="selectDesign form-control">
                                    ${Object.keys(editTaskCatData.project_types).map((key, index) => `<option value="${key}">${editTaskCatData.project_types[key]}</option>`)}
                                </select>
                                <div class="error" id="editProjectTypeeErr"></div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                                <div class="col-md-6 form-group mt-3">
                                    <label>Sub Category</label>
                                    <select id="editSubCategory" name="sub_category_id" class="selectDesign form-control">
                                        ${Object.keys(editTaskCatData.projects_sub_types).map((key, index) => `<option value="${key}">${editTaskCatData.projects_sub_types[key]}</option>`)}
                                    </select>
                                    <div class="error" id="editSubtypeeErr"></div>
                                </div>

                                <div class="col-md-6 form-group mt-3">
                                    <label>Weight</label>
                                    <input type="number"  name="weight" value="" class="form-control" id="editWeightId" placeholder="">
                                    <div class="error" id="editWeightErr"></div>
                                </div>
                        </div>
                        <div class=" row col-md-12">
                            <div class="col-md-12 form-group mt-3">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="description" id="editDescriptionID" rows="3"></textarea>
                                <div class="error" id="editDescriptionErr"></div>
                            </div>
                        </div>
                        <div class="col-md-3 form-group mt-2">
                            <input type=button class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="validateEditTaskCategory(${task_id});" value="{{ trans('global.update') }}">
                        </div>
                    </form>

                        `
                }
            })
            $.ajax({
                type: "GET",
                url: "{{ url('/api/v1/tast-categories') }}" + "/" + task_id,
                success: function(data){
                    editTaskCategoryData = data.data;
                    $('#editCategoryName').val(editTaskCategoryData.name);
                    $('#editProjectTypeListt').val(editTaskCategoryData.project_type_id + "");
                    $('#editSubCategory').val(editTaskCategoryData.sub_category_id + "");
                    $('#editWeightId').val(editTaskCategoryData.weight);
                    $('#editDescriptionID').val(editTaskCategoryData.description);
                },

                error: function (data) {
                    console.log('Error:', data);
                }

            })


        }


function filterCategorySub() {
    let typeVal = document.getElementById("createProjectTypeList").value;
    $.ajax({
        type: "GET",
        url: "{{ url('/api/v1/project-types')}}" + "/" + typeVal,
        success: function(data) {
            document.getElementById('createSubCategory').innerHTML = `
            <option value="" selected></option> ` +
                data.data.project_sub_type.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
            `
        },
        error: function(data) {
            document.getElementById('createSubCategory').innerHTML = `
            <option value="" selected></option>
            `
        }
    });
}

function editFilterCategorySub() {
    let typeVal = document.getElementById("editProjectTypeListt").value;
    $.ajax({
        type: "GET",
        url: "{{ url('/api/v1/project-types')}}" + "/" + typeVal,
        success: function(data) {
            document.getElementById('editSubCategory').innerHTML = `
                <option value="" selected></option> ` +
                data.data.project_sub_type.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                `
        },
        error: function(data) {
            document.getElementById('editSubCategory').innerHTML = `
                <option value="" selected></option>
                `
        }
    });
}

            function printError(elemId, hintMsg) {
                document.getElementById(elemId).innerHTML = hintMsg;
        }


    </script>

    <script>
        Dropzone.options.documentDropzone = {
        url: '{{ route('admin.task-documents.storeMedia') }}',
        maxFilesize: 20, // MB
        maxFiles: 1,
        addRemoveLinks: true,
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        params: {
        size: 20
        },
        success: function (file, response) {
        $('form').find('input[name="document"]').remove()
        $('form').append('<input type="hidden" name="document" value="' + response.name + '">')
        },
        removedfile: function (file) {
        file.previewElement.remove()
        $('form').find('input[name="document"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
        },
        init: function () {
            @if(isset($taskDocument) && $taskDocument->document)
            var file = {!! json_encode($taskDocument->document) !!}
                this.options.addedfile.call(this, file)
            file.previewElement.classList.add('dz-complete')
            $('form').append('<input type="hidden" name="document" value="' + file.file_name + '">')
            this.options.maxFiles = this.options.maxFiles - 1

                @endif
            },
            error: function (file, response) {
            if ($.type(response) === 'string') {
                var message = response //dropzone sends it's own error messages in string
            } else {
                var message = response.errors.file
            }
            file.previewElement.classList.add('dz-error')
            _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
            _results = []
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i]
                _results.push(node.textContent = message)
            }

            return _results
        }
        }
    </script>

@endsection
