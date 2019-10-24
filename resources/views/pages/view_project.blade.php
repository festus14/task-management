@extends('layouts.inner')
@section('title', 'Project')
@section('header', 'Project Management')
@section('active_arrow_two')
    <span class="m-menu__item-here"></span>
@endsection
@section('sub_header', 'Projects')

@section('css')
    <style>
        /* Style for project members table */
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

        /* Handle on hover */
        #mCSB_3::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .bootstrap-select .bs-ok-default::after {
            width: 0.3em;
            height: 0.6em;
            border-width: 0 0.1em 0.1em 0;
            transform: rotate(45deg) translateY(0.5rem);
        }

        .btn.dropdown-toggle:focus {
            outline: none !important;
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
    </style>
@endsection
@section('content')
    <div id="loading">
        <img id="loading-image" src={{ url('/loader/loader.gif')}} alt="Loading..."/>
    </div>
    <div class="m-portlet " id="m_portlet" style="width: 100%;">
        <div class="col-lg-12 col-md-12 col-sm-12 m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                        <i class="flaticon-list-2"> </i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        Project Table
                    </h3>
                </div>
            </div>
            <div class=" m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a style="color:white; background-color: #8a2a2b;" id="addProjId"
                           class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" data-toggle="modal">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>
                                        Add Project
                                    </span>
                                </span>
                        </a>
                        <a class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"
                           id="projectTypeId" data-toggle="modal" data-target="#ProjTypeDatatable">
                                <span onclick="getProjetTypeDT();">
                                    <span>
                                        Project Type
                                    </span>
                                </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body" style="overflow-x:auto;">
            <table id="kt_table_projects" class="table table-striped table-hover" style="width: 100%">
                <thead>
                <tr>
                    <th style="text-align:center">#</th>
                    <th>Client</th>
                    <th>Name</th>
                    <th>Manager</th>
                    <th>Type</th>
                    <th>Subtype</th>
                    <th>Start date</th>
                    <th>Deadline</th>
                    <th>Tools</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    <!--end::Portlet-->
    <!-- Create Project Modal -->
    <div class="modal fade" id="createProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Project</h5>
                    <button type="button" class="close" onclick="$('#createProjectModal').modal('hide');"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="createProjectBody" class="modal-body col-md-12">


                </div>

            </div>
        </div>
    </div>


    <!-- Edit Project Modal -->
    <div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                    <button type="button" class="close" onclick="$('#editProjectModal').modal('hide');"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="editProjectBody" class="modal-body col-md-12">


                </div>

            </div>
        </div>
    </div>




    <!--AddSubtype Modal, note:this is found in create project modal -->
    <div class="modal fade" id="subtypeModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Subtype</h5>
                    <button type="button" class="close" onclick="$('#subtypeModal').modal('hide');" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="subtypeModalBody" class="modal-body">
                    {{-- body content --}}
                </div>
            </div>

        </div>
    </div>
    <!--End AddSubtype Modal -->

    <!--Project Type Modal found in create project-->
    <div class="modal fade" id="projectModalIn" role="dialog" aria-labelledby="PModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="PModalLabel">Add Project Type</h5>
                    <button type="button" class="close" onclick="$('#projectModalIn').modal('hide');"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addProjTypeFormIn" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="subtypeNameIn">Project Type Name</label>
                            <input type="text" class="form-control" id="subtypeNameIn" name="name" placeholder=""
                                   value="{{ old('name', isset($projectType) ? $projectType->name : '') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="$('#projectModalIn').modal('hide');">
                            Close
                        </button>
                        <input type="button" onclick="ProjectTypeSubmitIn()" class="btn btn-primary"
                               style="background-color:#8a2a2b; color:white;" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--End Project Type Modal -->

    {{-- Project Type datatable modal --}}
    <div class="modal fade" id="ProjTypeDatatable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true" style="max-height:95%;">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:70%; min-width:400px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Project Type table</h5>
                    <button type="button" class="close" onclick="$('#ProjTypeDatatable').modal('hide');"
                            aria-label="Close">
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
                                        Project Type table
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"
                                           style="color:white; background-color: #8a2a2b;" data-toggle="modal"
                                           data-target="#AddProjecModalla">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>
                                                Add Type
                                            </span>
                                        </span>
                                        </a>
                                        <a class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"
                                           onclick="getProjectSubTypeDT();" id="projectSubTypeId" data-toggle="modal"
                                           data-target="#ProjSubTypeDatatable">
                                            <span>
                                                    <span>
                                                        Project Sub-Type
                                                    </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="m-portlet__body" style="overflow-x:auto;  width:100%">
                            <table id="kt_table_project_type" class="table table-striped table-hover"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th style="text-align:center">#</th>
                                    <th>Project Type Name</th>
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
    {{-- End Project Type datatable modal --}}

    <!--modalled AddprojType Modal -->
    <div class="modal fade" id="AddProjecModalla" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Project Type</h5>
                    <button type="button" class="close" onclick="$('#AddProjecModalla').modal('hide');"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addprojTtypeform2" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="create-task">Project Type Name</label>
                            <input type="text" class="form-control" id="projTypeId" name="name" placeholder=""
                                   value="{{ old('name', isset($projectType) ? $projectType->name : '') }}" required>
                            <div class="error" id="projectTypeErr"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="$('#AddProjecModalla').modal('hide');">
                            Close
                        </button>
                        <input class="btn btn-danger" type="button" style="background-color:#8a2a2b; color:white;"
                               onclick="validateProjectType()" value="{{ trans('global.create') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End modalled projType Modal -->

    <!--Edit AddprojType Modal -->
    <div class="modal fade" id="EditProjectTypeModal" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Project Type</h5>
                    <button type="button" class="close" onclick="$('#EditProjectTypeModal').modal('hide');"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="editProjectTypeBody">

                </div>
            </div>
        </div>
    </div>
    <!--End Edit projType Modal -->

    {{-- Project SubType datatable modal --}}
    <div class="modal fade" id="ProjSubTypeDatatable" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:70%; min-width:400px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Project Sub-type</h5>
                    <button type="button" class="close" onclick="$('#ProjSubTypeDatatable').modal('hide');"
                            aria-label="Close">
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
                                        Project Sub-type table
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"
                                           id="addProjSubTypeId" style="color:white; background-color: #8a2a2b;"
                                           data-toggle="modal" data-target="#subtypemainModal">
                                            <span>
                                                <i class="la la-plus"></i>
                                                <span>
                                                    Add Sub-type
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="m-portlet__body" style="overflow-x:auto;  width:100%">
                            <table id="kt_table_project_subtype" class="table table-striped table-hover"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th style="text-align:center">#</th>
                                    <th>Project Sub-type</th>
                                    <th>Project Type</th>
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
    {{-- End Project subType datatable modal --}}

    <!--AddSubtype main Modal-->
    <div class="modal fade" id="subtypemainModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Subtype</h5>
                    <button type="button" class="close" onclick="$('#subtypemainModal').modal('hide');"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="subtypemainModalBody">

                </div>

            </div>
        </div>
    </div>
    <!--End AddSubtype main Modal -->


    <!-- Edit Project SubType Modal -->
    <div class="modal fade" id="editProjectSubTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 50%; min-width: 350px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Project Subtype</h5>
                    <button type="button" class="close" onclick="$('#editProjectSubTypeModal').modal('hide');"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="editProjectSubTypeModalBody" class="modal-body col-md-12">


                </div>

            </div>
        </div>
    </div>
    {{--End edit project Subtype--}}

    <div id="moreInfo">

    </div>

        {{-- The task comment --}}
        <div class="modal fade" id="projectCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="overflow-y:hidden; height:95vh; min-height: 70vh; max-width: 90vw; min-width: 70vw; overflow:hidden;">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Project comments</h5>
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

    {{-- Modal for adding project report --}}
    <div class="modal fade" id="addReportModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 60%; min-width: 500px;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="documentModalLongTitle">Add Report</h5>
                        <button type="button" class="close" onclick="closeReportModal()" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                            <form id="addProjectReportForm" onsubmit="addDocFunction()" action="{{ url('admin/project-reports') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group {{ $errors->has('project_report') ? 'has-error' : '' }} col-md-12">
                                        <label for="project_report">{{ trans('cruds.projectReport.fields.project_report') }}</label>
                                        <textarea id="project_report" name="project_report" class="form-control" required>{{ old('project_report', isset($projectReport) ? $projectReport->project_report : '') }}</textarea>
                                        @if($errors->has('project_report'))
                                            <p class="help-block">
                                                {{ $errors->first('project_report') }}
                                            </p>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.projectReport.fields.project_report_helper') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group {{ $errors->has('uploads') ? 'has-error' : '' }} col-md-12">
                                        <label for="uploads">{{ trans('cruds.projectReport.fields.uploads') }}</label>
                                        <div class="needsclick dropzone" id="uploads-dropzone">

                                        </div>
                                        @if($errors->has('uploads'))
                                            <p class="help-block">
                                                {{ $errors->first('uploads') }}
                                            </p>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.projectReport.fields.uploads_helper') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="hidden" value="" name="client_id" id="client" class="form-control">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="hidden" value="" name="project_id" id="project" class="form-control">
                                    </div>
                                </div>
                                <div>
                                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal for adding project document --}}
        <div class="modal fade" id="addDocumentModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 60%; min-width: 500px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="documentModalLongTitle">Add Document</h5>
                            <button type="button" class="close" onclick="$('#addDocumentModal').modal('hide');" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                                <form action="{{ url('admin/documents') }}" onsubmit="addDocFunction()" id="createDocForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="form-group col-sm-6 col-md-6">
                                            <label for="document-name">Document Name</label>
                                            <input type="text" class="form-control" id="document-name" name="name">
                                            @if($errors->has('name'))
                                                <p class="help-block">
                                                    {{ $errors->first('name') }}
                                                </p>
                                            @endif
                                            <p class="helper-block">
                                                {{ trans('cruds.document.fields.name_helper') }}
                                            </p>
                                        </div>

                                        <div class="form-group col-sm-6 col-md-6">
                                            <label for="version">Version</label>
                                            <input type="text" class="form-control" id="version" placeholder="Enter Version" name="version">
                                            @if($errors->has('version'))
                                                <p class="help-block">
                                                    {{ $errors->first('version') }}
                                                </p>
                                            @endif
                                            <p class="helper-block">
                                                {{ trans('cruds.document.fields.version_helper') }}
                                            </p>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }} col-sm-12 col-md-12">
                                            <label for="file">{{ trans('cruds.document.fields.file') }}</label>
                                            <div class="needsclick dropzone" id="file-dropzone">

                                            </div>
                                            @if($errors->has('file'))
                                                <p class="help-block">
                                                    {{ $errors->first('file') }}
                                                </p>
                                            @endif
                                            <p class="helper-block">
                                                {{ trans('cruds.document.fields.file_helper') }}
                                            </p>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <input class="btn btn-block center-block" type="submit" id="pro_doc_submit" value="{{ trans('global.save') }}" style="background-color:#8a2a2b; color:white;">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input id="project-list" name="project_id" value="" type="hidden">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <input id="client-list" name="client_id" value="" type="hidden">
                                        </div>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>
            </div>

        @endsection
        @section('javascript')
        @include('pages.js.project_scripts.projecttype_subtype_js')
        @include('pages.js.validator.projectValidator_js')
        @include('pages.js.validator.projectTypeValidator_js')
        @include('pages.js.project_scripts.view_project_js')
        @include('pages.js.project_scripts.project_tools_js')
        @include('pages.js.project_scripts.projectComment_js')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                // Function for implementing dropezone for project report
                    Dropzone.options.uploadsDropzone = {
                    url: '{{ route('admin.project-reports.storeMedia') }}',
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
                    $('#addProjectReportForm').find('input[name="uploads"]').remove()
                    $('#addProjectReportForm').append('<input type="hidden" name="uploads" value="' + response.name + '">')
                    },
                    removedfile: function (file) {
                    file.previewElement.remove()
                    $('#addProjectReportForm').find('input[name="uploads"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                    },
                    init: function () {
                @if(isset($projectReport) && $projectReport->uploads)
                    var file = {!! json_encode($projectReport->uploads) !!}
                        this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('#addProjectReportForm').append('<input type="hidden" name="uploads" value="' + file.file_name + '">')
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

                // Function for implementing dropezone for create document
                var uploadedFileMap = {}
                Dropzone.options.fileDropzone = {
                    url: '{{ route('admin.documents.storeMedia') }}',
                    maxFilesize: 10, // MB
                    addRemoveLinks: true,
                    headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    params: {
                    size: 10
                    },
                    success: function (file, response) {
                    $('#createDocForm').append('<input type="hidden" name="file[]" value="' + response.name + '">')
                    uploadedFileMap[file.name] = response.name
                    },
                    removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedFileMap[file.name]
                    }
                    $('#createDocForm').find('input[name="file[]"][value="' + name + '"]').remove()
                    },
                    init: function () {
                @if(isset($document) && $document->file)
                        var files = {!! json_encode($document->file) !!}
                            for (var i in files) {
                            var file = files[i]
                            this.options.addedfile.call(this, file)
                            file.previewElement.classList.add('dz-complete')
                            $('#createDocForm').append('<input type="hidden" name="file[]" value="' + file.file_name + '">')
                            }
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

                function closeReportModal(){
                    document.getElementById('project_report').value = "";
                    $('#addReportModal').modal('hide');
                }
            </script>

            <script>

        var userName = "{{ Auth::user()->name}}"
        var userId = {{ Auth::user()->id}}
                $(document).ready(function () {
                    getProjetTypeDT();
                    getProjectSubTypeDT();
                });

                $(document).ajaxStop(function () {
                    $('#loading').hide();
                });

                $(document).ajaxStart(function () {
                    $('#loading').show();
                });


                let addProjSubTypeId = document.getElementById('addProjSubTypeId');
                    addProjSubTypeId.addEventListener("click", displayAddPsubtypeOut);


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

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let languages = {
                    'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
                };

                var projectDataTable = $('#kt_table_projects').DataTable({
                    ajax: "{{ url('/api/v1/projects') }}",
                    columns: [
                        {defaultContent: ""},
                        {"data": "client.name"},
                        {"data": "name"},
                        {"data": "manager.name"},
                        {"data": "project_type.name"},
                        {"data": "project_subtype.name"},
                        {"data": "starting_date"},
                        {"data": "deadline"}
                    ],
                    dom: 'lBfrtip<"actions">',
                    select: {
                        style: 'multi+shift',
                        selector: 'td:first-child'
                    },
                    language: {
                        url: languages.{{ app()->getLocale() }}
                    },
                    columnDefs: [
                        {
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
                                return '\<button onclick="displayProjectInfo(' + full.id + '), editProject(' + full.id + ')" class="btn btn-secondary dropdown-toggle" type="button" id="projectToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                            <div class="dropdown-menu" aria-labelledby="projectToolsbtn" style="padding-left:8px; min-width: 80px; max-width: 15px;">\
                            <a class="link" href="#"><i class="fa fa-eye" style="color:black;" data-toggle="modal" data-target="#moreInfoModal"><span style="font-weight:100;"> View </span></i>\
                            </a><br>\
                            <a class="link" href="#">\
                                <i class="fa fa-pencil" style="color:black;" data-toggle="modal" data-target="#editProjectModal"><span style="font-weight:100;"> Edit</span></i>\
                            </a><br>\
                            <button onclick="deleteSingleProject(' + full.id + ')" class="link" style="border: none; background-color: white;"><a class="link" href="#"> <i class="fa fa-trash" style="color:black; margin-left: -5px;"> Delete</i></a></button>\
                            </div>\
                                    ';
                            }
                        },
                    ],
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
                                        text: "Please select at least one row!",
                                        icon: "error",
                                        confirmButtonColor: "#fc3",
                                        confirmButtonText: "OK",
                                    });
                                    return
                                }
                                swal({
                                    title: "Are you sure?",
                                    text: "This project will be deleted!",
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

                function taskDTCall(project_id) {
                    path_url = "/api/v1/projects_tasks/" + project_id;

                    // Simple Project Tasks DT
                    if ($.fn.dataTable.isDataTable('#kt_table_single_project_task')) {
                        let kt_table_single_project_task = $('#kt_table_single_project_task').DataTable();
                    } else {
                        let kt_table_single_project_task = $('#kt_table_single_project_task').DataTable({
                            dom: 'lBfrtip<"actions">',
                            language: {
                                url: languages. {{ app()->getLocale() }}
                            },

                            ajax: path_url,

                            columns: [
                                {"data": "name"},
                                {"data": "starting_date"},
                                {"data": "ending_date"},
                                {"data": "category.name"},
                                {"data": "status.name"},
                            ],
                            columnDefs: [{
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
                        }
                    ]
                        });
                    }

                }

              function getProjetTypeDT() {
                    if ($.fn.dataTable.isDataTable('#kt_table_project_type')) {
                        var kt_table_project_type = $('#kt_table_project_type').DataTable();
                    } else {
                        var kt_table_project_type = $('#kt_table_project_type').DataTable({

                            language: {
                                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                            },


                            ajax: "{{ url('/api/v1/project-types') }}",
                            columns: [
                                {defaultContent: ""},
                                {"data": "name"}
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
                                        return '\<button class="btn btn-secondary dropdown-toggle" onclick="editProjectType(' + full.id + ')" type="button" id="taskToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                <div class="dropdown-menu" aria-labelledby="taskToolsbtn" style="padding-left:8px; min-width: 80px; max-width: 15px;">\
                                <a class="link" href="#">\
                                    <i class="fa fa-pencil" data-toggle="modal" data-target="#EditProjectTypeModal" style="color:black;"><span style="font-weight:100;"> Edit</span></i>\
                                </a>\
                                <button onclick="deleteProjectType(' + full.id + ')" class="link" style="border: none; background-color: white;"><a class="link" href="#"> <i class="fa fa-trash" style="color:black; margin-left: -5px;"> Delete</i></a></button>\
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
                                        text: "Please select at least one row!",
                                        icon: "error",
                                        confirmButtonColor: "#fc3",
                                        confirmButtonText: "OK",
                                    });
                                    return
                                }
                                swal({
                                    title: "Are you sure?",
                                    text: "This project will be deleted!",
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
                                            url: "{{ route('admin.project-types.massDestroy') }}",
                                            success: function (data) {
                                                swal("Deleted!", "Project type successfully deleted.", "success");
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
                };


                function getProjectSubTypeDT() {

                    if ($.fn.dataTable.isDataTable('#kt_table_project_subtype')) {
                        var kt_table_project_subtype = $('#kt_table_project_subtype').DataTable();
                    } else {
                        var kt_table_project_subtype = $('#kt_table_project_subtype').DataTable({
                            ajax: "{{ url('/api/v1/project-sub-types') }}",
                            columns: [
                                {defaultContent: ""},
                                {"data": "name"},
                                {"data": "project_type.name"}
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
                                    targets: 3,
                                    orderable: false,
                                    searchable: false,
                                    render: function (data, type, full, meta) {
                                        return '\<button class="btn btn-secondary dropdown-toggle" onclick="editProjectSubtype(' + full.id + ')" type="button" id="subTaskToolsBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                            <div class="dropdown-menu" aria-labelledby="subTaskToolsBtn" style="padding-left:8px; min-width: 80px; max-width: 15px;">\
                            <a class="link" href="#">\
                                <i class="fa fa-pencil" data-toggle="modal" data-target="#editProjectSubTypeModal" style="color:black;"><span style="font-weight:100;"> Edit</span></i>\
                            </a>\
                            <button onclick="deleteProjectSubType(' + full.id + ')" class="link" style="border: none; background-color: white;"><a class="link" href="#"> <i class="fa fa-trash" style="color:black; margin-left: -5px;"> Delete</i></a></button>\
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
                                        text: "Please select at least one row!",
                                        icon: "error",
                                        confirmButtonColor: "#fc3",
                                        confirmButtonText: "OK",
                                    });
                                    return
                                }
                                swal({
                                    title: "Are you sure?",
                                    text: "This project will be deleted!",
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
                                            url: "{{ route('admin.project-sub-types.massDestroy') }}",
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
                    }
                };


                // Add project type Post
                function addProjectType() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: '{{ url("/api/v1/project-types") }}',
                        data: $('#addprojTtypeform2').serialize(),
                        success: function (data) {

                            swal({
                                title: "Success!",
                                text: "Project-type created!",
                                icon: "success",
                                confirmButtonColor: "#DD6B55",
                                // confirmButtonText: "OK",
                            });
                            $('#AddProjecModalla').modal('hide');
                            document.getElementById('projTypeId').value = "";
                                window.setTimeout(function() {
                                    $("#kt_table_project_type").DataTable().ajax.reload();
                                }, 2300)

                        },
                        error: function (error) {
                            swal({
                                title: "Project-type creation failed!",
                                icon: "error",
                                confirmButtonColor: "#fc3",
                                confirmButtonText: "OK",
                            });
                        }

                    });
                }

                $(function () {
                    let csvButtonTrans = 'csv';
                    let excelButtonTrans = 'excel';
                    let pdfButtonTrans = 'pdf';
                    $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
                        className: 'btn'
                    });
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
                            style: 'multi+shift',
                            selector: 'td:first-child'
                        },
                        scrollX: true,
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
                        }, {
                            extend: 'pdf',
                            className: 'btn-success',
                            text: pdfButtonTrans,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                            {
                            extend: 'csv',
                            className: 'btn-warning',
                            text: csvButtonTrans,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },]
                    });




                })

                function printError(elemId, hintMsg) {
                    document.getElementById(elemId).innerHTML = hintMsg;
                }
            </script>
    </div>

@endsection
