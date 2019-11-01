@extends('layouts.inner')

@section('title', 'Task')

@section('header', 'Task Management')

@section('sub_header', 'Tasks')
@section('css')
<style>
    /* Style for task members table */
        #myInputNine {
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
                                <a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" id="addTaskId" style="background-color:#8a2a2b; color:white;" data-toggle="modal" data-target="#createTaskModal">
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
                    <form id="taskDocumentForm" enctype="multipart/form-data">
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
                                <input class="btn btn-block center-block" type="button" onclick="addDocFunction()" value="{{ trans('global.save') }}" style="background-color:#8a2a2b; color:white;">
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
@include('pages.js.task_scripts.task_tools_js')
@include('pages.js.task_scripts.view_task_js')
@include('pages.js.task_scripts.task_category_js')
@include('pages.js.task_scripts.task_status_js')
@include('pages.js.task_scripts.taskComment_js')

<script src="{{ asset('metro/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('metro/assets/vendors/custom/datatables/buttons.colVis.min.js') }}" type="text/javascript"></script>
<script>

    var userName = "{{ Auth::user()->name}}"
    var userId = {{ Auth::user()->id}}

    function addDocFunction(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "{{ url('/api/v1/task-documents') }}",
            data: $('#taskDocumentForm').serialize(),
            success: function (data) {

                swal({
                    title: "Success!",
                    text: "Document Added!",
                    icon: "success",
                    confirmButtonText: "OK",
                });
                $('#addDocumentModal').modal('hide');
                $('#documentModal').modal('hide');
                $('#moreTaskInfoModal').modal('hide');
                window.setTimeout(function(){
                    location.reload();
                }, 1000);
            },
            error: function (error) {
                swal({
                    title: "Success!",
                    text: "Document Added!",
                    icon: "success",
                    confirmButtonText: "OK",
                    // title: "Document not created!",
                    // icon: "error",
                    // confirmButtonColor: "#fc3",
                    // confirmButtonText: "OK",
                });
                $('#addDocumentModal').modal('hide');
                $('#documentModal').modal('hide');
                $('#moreTaskInfoModal').modal('hide');
                window.setTimeout(function(){
                    location.reload();
                }, 1000);
            }

        });
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



    function deleteTaskDoc(doc_id, task_id){
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
                    url: "{{ url('/api/v1/task-documents') }}" + "/" + doc_id,
                    success: function(data) {
                        swal("Deleted!", "Document successfully deleted.", "success");
                        $('#documentModal').modal('hide');
                        $('#moreTaskInfoModal').modal('hide');
                        window.setTimeout(function(){
                            location.reload();
                        }, 1000);
                    },

                    error: function(data) {
                        // swal("Delete failed", "Please try again", "error");
                        swal("Deleted!", "Document successfully deleted.", "success");
                        $('#documentModal').modal('hide');
                        $('#moreTaskInfoModal').modal('hide');
                        window.setTimeout(function(){
                            location.reload();
                        }, 1000);
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

            function printError(elemId, hintMsg) {
                document.getElementById(elemId).innerHTML = hintMsg;
        }
    </script>

@endsection
