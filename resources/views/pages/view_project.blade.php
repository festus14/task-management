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
        @include('pages.js.validator.projectValidator_js')
        @include('pages.js.validator.projectTypeValidator_js')
        @include('pages.js.project_scripts.view_project_js')
        @include('pages.js.project_scripts.project_tools_js')
        @include('pages.js.project_scripts.projectComment_js')
        @include('pages.js.project_scripts.projecttype_subtype_js')
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

function displayAddPsubtype() {
    $("#subtypemainModal").modal('show');
    $.ajax({
        type: "GET",
        url: '{{ url("/api/v1/project-types") }}',
        success: function (data) {
            let subtypemainModalBody = document.getElementById('subtypemainModalBody');
            subtypemainModalBody.innerHTML = `
        <form id="addprojsubtypeform2" enctype="multipart/form-data">
            @csrf
                <div  class="modal-body">

                    <div class="form-group">
                        <label for="project-type">Select Project Type</label>
                        <select id="project-type" name="project_type_id" class="selectDesign form-control">
                            <option value="" selected></option>
                                ${data.data.map(elem => `<option value="${elem.id}">${elem.name}</option>`)}
                    </select>
                    <div class="error" id="projectTTTypeErr"></div>
                </div>

                <div class="form-group">
                    <label for="create-task">Subtype Name</label>
                    <input type="text" class="form-control" name="name" id="sub-type" placeholder="">
                    <div class="error" id="projectSubTypeErr"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#subtypemainModal').modal('hide');" data-target="#subtypemainModal">Close</button>
                <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="validateProjectSubType();" value="{{ trans('global.create') }}">
            </div>
        </form>

                        `
        },

        error: function (data) {
            console.log('Error:', data);
        }
    });
}

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

function displayAddPsubtypeOut() {
    $("#subtypemainModal").modal('show');
    $.ajax({
        type: "GET",
        url: '{{ url("/api/v1/project-types") }}',
        success: function (data) {
            let subtypemainModalBody = document.getElementById('subtypemainModalBody');
            subtypemainModalBody.innerHTML = `
        <form id="addprojsubtypeform2" enctype="multipart/form-data">
            @csrf
                <div  class="modal-body">

                    <div class="form-group">
                        <label for="project-type">Select Project Type</label>
                        <select id="project-type" name="project_type_id" class="selectDesign form-control">
                            <option value="" selected></option>
                                ${data.data.map(elem => `<option value="${elem.id}">${elem.name}</option>`)}
                    </select>
                    <div class="error" id="projectTTTypeErr"></div>
                </div>

                <div class="form-group">
                    <label for="create-task">Subtype Name</label>
                    <input type="text" class="form-control" name="name" id="sub-type" placeholder="">
                    <div class="error" id="projectSubTypeErr"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#subtypemainModal').modal('hide');" data-target="#subtypemainModal">Close</button>
                <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="validateProjectSubTypeOut();" value="{{ trans('global.create') }}">
            </div>
        </form>

                        `
        },

        error: function (data) {
            console.log('Error:', data);
        }
    });
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

            let popAddProj = document.getElementById('addProjId');
                popAddProj.addEventListener("click", displayAddProject);

        function displayAddProject() {
            $("#createProjectModal").modal('show');
            $.ajax({
                type: "GET",
                url: '{{ url("/api/v1/project_create") }}',
                success: function(data) {
                    let createProjectBody = document.getElementById('createProjectBody');
                    let probSubtypeBody = document.getElementById('subtypeModalBody');
                    createProjectBody.innerHTML = `
            <div class="col-md-12 ">
                <form id="addProjectForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-md-12">
                        <div class="col-md-6 form-group mt-3">
                            <label>Select Client</label>
                            <select id="client-list" name="client_id" class="form-control required">
                                <option value="" selected></option>
        ` +
                        data.clients.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                        `
                            </select>
                            <div class="error" id="clientErr"></div>
                        </div>

                        <div class="col-md-6 form-group mt-3">
                                <label for="create-project">Project Name</label>
                            <input type="text" name="name" class="form-control" id="create-project" placeholder="" required>
                            <div class="error" id="nameErr"></div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-4 form-group mt-3">
                            <label for="manager_id">Manager</label><br>
                            <select id="manager_id" name="manager_id" class="form-control" style="width:100%;" required>
                                <option value="" selected></option>
                                ` +
                        data.managers.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                        `
                            </select>
                            <div class="error" id="managerErr"></div>
                        </div>
                        <div class="col-md-4 form-group mt-3">
                            <label for="create-project-type">Project Type</label>
                            <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#projectModalIn" style="float:right;"></i>
                            <select class="form-control" id="projTypeBody1" onchange="filterSubtype()" name="project_type_id" required>
                                <option value="" selected></option>
                                ` +
                        data.project_types.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                        `
                            </select>
                            <div class="error" id="projTypeErr"></div>
                        </div>


                        <div class="col-md-4 form-group mt-3">
                            <label for="exampleFormControlSelect1">Project Sub-type</label>
                            <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#subtypemainModal" onclick="displayAddPsubtype()" style="float:right;"></i>
                            <select class="form-control" id="projectSubtypeId1"  name="project_subtype_id" required>

                            </select>
                            <div class="error" id="projSubErr"></div>
                        </div>
                    </div>
                    <div class="row col-md-12 ">

                        <div class="col-md-3 form-group mt-3">
                            <label for="starting-date">Start Date</label>
                            <input type="text" class="form-control date" name="starting_date" id="starting-date" required>
                            <div class="error" id="startErr"></div>
                        </div>

                        <div class="col-md-3 form-group mt-3">
                            <label for="Deadline">Deadline</label>
                            <input type="text" class="form-control datetime" name="deadline" id="Deadline" required>
                            <div class="error" id="endErr"></div>
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            <label>Team members</label><br>
                            <select multiple class="form-control select2" id="teammembers" name="team_members[]" style="width:100%;"required>

                                ` +
                        data.team_members.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                        `
                            </select>
                            <div class="error" id="membersErr"></div>
                        </div>


                        <div class="col-md-2 form-group mt-3">
                            <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="validateCreateProjectForm();" value="Create">
                        </div>
                    </div>
                </form>
            </div>  `

                    probSubtypeBody.innerHTML = `
            <form id="addprojSubtypeform1"  enctype="multipart/form-data">
                @csrf
                            <div class="form-group">
                                    <label for="project-type">Select Project Type</label>
                                    <select id="project-type" class="selectDesign form-control">
                                        <option value="" selected ></option>
                                        <option value="" selected></option>
                    ` +
                        data.project_types.map((elem) => `<option name="project_type_id" value="${elem.id}">${elem.name}</option>`) +
                        `
                    </select>
                </div>

                <div class="form-group">
                    <label for="create-subType">Subtype Name</label>
                    <input type="text" class="form-control" name="name" id="subtypeId" placeholder="" required>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#subtypeModal').modal('hide');" data-target="#subtypeModal">Close</button>
                <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="addProjectSubtype();" value="Create">
            </div>
            </form>
        `
                    window._token = $('meta[name="csrf-token"]').attr('content');

                    var allEditors = document.querySelectorAll('.ckeditor');
                    for (var i = 0; i < allEditors.length; ++i) {
                        ClassicEditor.create(allEditors[i]);
                    }

                    moment.updateLocale('en', {
                        week: { dow: 1 } // Monday is the first day of the week
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

                    $('.select-all').click(function() {
                        let $select2 = $(this).parent().siblings('.select2')
                        $select2.find('option').prop('selected', 'selected')
                        $select2.trigger('change')
                    });
                    $('.deselect-all').click(function() {
                        let $select2 = $(this).parent().siblings('.select2');
                        $select2.find('option').prop('selected', '');
                        $select2.trigger('change')
                    });

                    $('.select2').select2();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

        }

        //  Edit Project form
var editProjectData;

function editProject(project_id) {
    $.ajax({
        type: "GET",
        url: "{{ url('/api/v1/project_create') }}",
        success: function(data) {
            var projData = data;
            let editProjectBody = document.getElementById('editProjectBody');
            editProjectBody.innerHTML = `
                        <div class="col-md-12 ">
                            <form id="editProjectform" enctype="multipart/form-data">
                                @csrf
                                    <div class="row col-md-12">
                                        <div class="col-md-6 form-group mt-3">
                                            <label for="edit-client_list">Select Client</label>
                                            <select id="edit-client_list" name="client_id" class="selectDesign form-control required">
` +
                projData.clients.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group mt-3">
                                            <label for="edit-project_name">Project Name</label>
                                        <input type="text" name="name" class="form-control" id="edit-project_name" placeholder="" required>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-4 form-group mt-3">
                                        <label for="edit-manager_id">Manager</label><br>
                                        <select id ="edit-manager_id" name="manager_id" class="form-control" style="width:100%;" required>
                                            ` +
                projData.managers.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group mt-3">
                                        <label for="edit-projtypeboy">Project Type</label>
                                        <select class="form-control" id="edit-projtypeboy" onchange="editFilterSubtype()" onclick="editFilterSubtype()" name="project_type_id" required>
                                            ` +
                projData.project_types.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                        </select>
                                    </div>

                                    <div class="col-md-4 form-group mt-3">
                                        <label for="edit-project_subtype_id">Project Sub-type</label>
                                        <select class="form-control" id="edit-project_subtype_id" name="project_subtype_id" required>
                                            ` +
                projData.project_subtypes.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                        </select>
                                    </div>
                                </div>
                                <div class="row col-md-12 ">
                                    <div class="col-md-3 form-group">
                                        <label for="edit-starting-date">Start Date</label>
                                        <input type="text" class="form-control date" name="starting_date" id="edit-starting-date" required>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="edit-Deadline">Deadline</label>
                                        <input type="text" class="form-control datetime" name="deadline" id="edit-Deadline" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="edit-teammembers">Team members</label><br>
                                        <select onchange="loggingData()" multiple="multiple" class="form-control select2" id="edit-teammembers" name="team_members[]" style="width:100%;" required>
                                            ` +
                projData.team_members.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                        </select>
                                    </div>


                                    <div class="col-md-2 form-group mt-3">
                                        <input class="btn btn-danger" type="button" style="background-color:#8a2a2b; color:white;" onclick="submitEditProjectForm(${project_id});" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                        `


            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(allEditors[i]);
            }

            moment.updateLocale('en', {
                week: { dow: 1 } // Monday is the first day of the week
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

            $('.select-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            });
            $('.deselect-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2');
                $select2.find('option').prop('selected', '');
                $select2.trigger('change')
            });

            $('.select2').select2();
        },

        error: function(data) {
            console.log('Error:', data);
        }

    })


    // Given the fields in the edit form defult values
    $.ajax({
        type: "GET",
        url: "{{ url('/api/v1/projects') }}" + "/" + project_id,
        success: function(data) {
            editProjectData = data.data;
            let team_members = editProjectData.team_members;
            console.log(team_members)
            $('#edit-client_list').val(editProjectData.client_id + "");
            $('#edit-project_name').val(editProjectData.name);
            $('#edit-manager_id').val(editProjectData.manager_id + "");
            $('#edit-projtypeboy').val(editProjectData.project_type_id + "");
            $('#edit-project_subtype_id').val(editProjectData.project_subtype_id + "");
            $('#edit-starting-date').val(editProjectData.starting_date);
            $('#edit-Deadline').val(editProjectData.deadline);
            for(let i = 0; i<team_members.length; i++){
                option = document.createElement('option');
                option.value = team_members[i].id;
                option.setAttribute('value', team_members[i].id);
                option.innerHTML = team_members[i].name
                option.setAttribute('selected', true);
                document.getElementById('edit-teammembers').appendChild(option);
            }
        },

        error: function(data) {
            console.log('Error:', data);
        }

    })
}

function loggingData(){
        console.log($('#edit-teammembers').val())
        console.log('It changed')
    }

        // Function for rendering the more info modal
        var projectName;
    function displayProjectInfo(proID) {
        $.ajax({
            type: "GET",
            url: '{{ url("/api/v1/projects/") }}' + "/" + proID,
            success: function (data) {
                projectName = data.data.name;
                let moreInfo = document.getElementById("moreInfo")
                moreInfo.innerHTML = `<div class="modal fade" id="moreInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="box-sizing: border-box;">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 80%; min-width: 500px;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" onclick="$('#moreInfoModal').modal('hide');" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 m-portlet " id="m_portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon">
                                                    <i class="flaticon-info"> </i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    ${data.data.name}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div class="accordion" id="accordionExample">
                                            <div onclick="taskDTCall(${data.data.id})" class="card">
                                                <div class="card-header" id="headingone">
                                                    <h6 style="cursor: pointer" class="mb-0">
                                                        <span class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    <i class="m-menu__link-icon flaticon-list"></i>
                                                    Project tasks
                                                </span>
                                                    </h6>
                                                </div>
                                                <div id="collapseOne" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="m-portlet">
                                                        <table class="table table-striped table-hover" style="width: 100%;" id="kt_table_single_project_task">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Starting Date</th>
                                                                    <th>Deadline</th>
                                                                    <th>Category</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
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

                                            <div onclick="reportDTCall(${data.data.id})" class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h6 style="cursor: pointer" class="mb-0">
                                                        <span data-toggle="modal" data-target="#projectreportModal">
                                                    <i class="m-menu__link-icon flaticon-file"></i>
                                                    Report
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
                                                        Project Members
                                                    </span>
                                                        </h6>
                                                    </div>
                                                    <div id="collapseNine" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample5" style="box-sizing: border-box;">
                                                        <input type="textOne" id="myInputNine" onkeyup="searchProjectMembers()" placeholder="Search for project member.." title="Type in a member">
                                                        <table id="myTableNine">
                                                            <tr class="header">
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                            </tr>
                                                            <tr class="">
                                                            </tr>
                                                            ` + data.data.team_members.map(item => `
                                                            <tr>
                                                                <td>${item.name}</td>
                                                                <td>${item.email}</td>
                                                            </tr>` ) + `
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div onclick="projectTComment(${data.data.id})" class="card-header" id="headingFour">
                                                        <h6 style="cursor: pointer" class="mb-0">
                                                            <span class="" data-toggle="modal" data-target="#projectCommentModal">
                                                <i class="m-menu__link-icon flaticon-comment"></i>
                                                Comments
                                            </span>
                                                        </h6>
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
                </div>

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
                                            <table id="kt_table_single_project_documents" class="table table-striped table-hover" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Version</th>
                                                        <th>Date Created</th>
                                                        <th>File</th>
                                                        <th>Tools</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    ` + data.data.documents.map(item => `
                                                    <tr>
                                                        <td></td>
                                                        <td>${item.name}</td>
                                                        <td>${item.version}</td>
                                                        <td>${item.created_at}</td>
                                                        <td>


                                                                View file
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form action="{{ url('/admin/documents/${item.id}') }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                            </form>
                                                        </td>
                                                    </tr>` ) + `
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="projectreportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 65%; min-width: 500px;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Project Reports</h5>
                                <button type="button" class="close" onclick="$('#projectreportModal').modal('hide');" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="m-portlet">
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
                                                    <a style="color:white; background-color: #8a2a2b;" data-toggle="modal" data-target="#addReportModal" class="btn m-btn--icon m-btn--pill">
                                                        <span>
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
                                        <div class="m-portlet">
                                            <table id="kt_table_single_project_reports" class="table table-striped table-hover" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">#</th>
                                                        <th>Report</th>
                                                        <th>Date Created</th>
                                                        <th>File</th>
                                                        <th>Tools</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    ` + data.data.reports.map(item => `
                                                    <tr>
                                                        <td></td>
                                                        <td>${item.project_report}</td>
                                                        <td>${item.created_at}</td>
                                                        <td>
                                                            <a href="http://docs.google.com/gview?url=http://localhost/storage/${item.media_report[0].id}/${item.media_report[0].file_name}&embedded=true" target="_blank">
                                                            <!-- <iframe
                                                                src="http://docs.google.com/gview?url=http://localhost/storage/${item.media_report[0].id}/${item.media_report[0].file_name}&embedded=true"
                                                                style="width:600px; height:500px;" frameborder="0">
                                                            </iframe> -->

                                                                View file
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form action="{{ url('admin/project-reports/${item.id}') }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                            </form>
                                                        </td>
                                                    </tr>` ) + `
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                    `
                    document.getElementById('project-list').value = data.data.id;
                    document.getElementById('client-list').value = data.data.client_id;
                    document.getElementById('project').value = data.data.id;
                    document.getElementById('client').value = data.data.client_id;
            },

            error: function (data) {
                console.log('Error:', data);
            }

        })


    }

    var userName = "{{ Auth::user()->name}}"
    var userId = {{ Auth::user()->id}}

    function projectTComment(proj_id){
            console.log("here")
            $.ajax({
                    type: "GET",
                    url: "{{ url('/api/v1/projects') }}" +"/"+proj_id,
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
                                            ${projectName}
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
                                                data.data.comments.map(elem => `
                                                    <div class="m-messenger__wrapper commguy" style="padding-right: 10px; display:flex; flex-wrap: flex; padding-left: 10px;">
                                                        <div class="m-messenger__message m-messenger__message--in">
                                                            <div class="m-messenger__message-pic">
                                                                <img alt="" src="{{ asset('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded" />
                                                            </div>
                                                            <div class="m-messenger__message-body">
                                                                <div class="m-messenger__message-arrow"></div>
                                                                    <div class="m-messenger__message-content">
                                                                        <div class="m-messenger__message-username">
                                                                            <span class="secondary" style="margin-right:30px; color: #6f727d;"><strong>Dont forget</strong></span>
                                                                            <span id="datee" style="float: right; color: #6f727d;">${elem.created_at}</span>
                                                                        </div>
                                                                        <div class="m-messenger__message-text" id="comContent" style="  max-width: 450px; min-height:20px; max-height: 4000px; display: flex; flex-direction: column;">
                                                                                        ${elem.comments}

                                                                            <div id="actionTaken" class="actionTaken" style="flex-wrap: wrap; border-radius: 10px;align-self: flex-end; text-align: right;">
                                                                                        <span class="pull-right" style="margin-bottom:2px; font-weight: 600; ">Action required</span> <br/>
                                                                                    <div style=" padding: 7px; border-radius: 7px; color: white; background-color: #b8bab9;">


                                                                                        <span>${elem.action_required}</span>

                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                            <br>

                                                                    <i class="fa fa-trash" onclick="deleteComment(${elem.id})" style="display:flex; justify-content: flex-end; margin-bottom:2px;"></i>
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
                                                <button type="button" onclick="makeComment(${proj_id})" class="m-btn--pill btn pull-right" data-toggle="modal" data-target="#msgModal" style="margin-left: 72%; background-color: #312b8e; color: white; margin-bottom: 25px;">
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
                        `
                    }
                });
            }

                    var commentUser;
        function makeComment(proj_id) {
            $.ajax({
                type: "GET",
                url: '{{ url("/api/v1/tasks") }}'+ "/" + proj_id,
                success: function(data) {
                    commentUser = data.data.manager.name;
                    let makecommentModal = document.getElementById('makeCommentBodyId');
                    makecommentModal.innerHTML = `
                                            <form id="makeCommentForm" enctype="multipart/form-data">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <input type="hidden" id="user" name="user_id" value="${userId}">
                                                                        <input type="hidden" id="project" name="project_id" value="${proj_id}">
                                                                        <input type="hidden" id="client" name="client_id" value="${data.data.client_id}">
                                                                        Comment
                                                                        <textarea class="form-control goat" name="comments" id="commentText" rows="4 " required></textarea><br>
                                                                        Action required
                                                                        <textarea  class="form-control" id="action_required" name="action_required"rows="1" required"></textarea>
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

            //  Edit Project Sub form
            var editSubData

            function editProjectSubtype(sub_id) {

                $.ajax({
                            type: "GET",
                            url: "/api/v1/project-sub-types",
                            success: function(data) {
                                    let editProjectSubTypeModalBody = document.getElementById('editProjectSubTypeModalBody');
                                    editProjectSubTypeModalBody.innerHTML = `
            <form id="editProjectSubtypeForm" enctype="multipart/form-data">
                @csrf
                            <div  class="modal-body">

                                    <div class="form-group">
                                        <label for="project-type">Select Project Type</label>
                                        <select id="projecTttype" name="project_type_id" class="form-control" required>
                                        ${data.data.map(elem => `<option value="${elem.project_type.id}">${elem.project_type.name}</option>`)}
                                        </select>
                                        <div class="error" id="editProjectTTTypeErr"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="create-task">Subtype Name</label>
                                        <input type="text" class="form-control" name="name" id="subTtype">
                                        <div class="error" id="editProjectSubTypeErr"></div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="$('#editProjectSubTypeModal').modal('hide');" data-target="#subtypemainModal">Close</button>
                                <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="ValidateEditProjectSubType(${sub_id});" value="Update">
                            </div>
                            </form>
                    `
                    },

                    error: function (data) {
                        console.log('Error:', data);
                    }

                })

                $.ajax({
                    type: "GET",
                    url: "/api/v1/project-sub-types/" + sub_id,
                    success: function (data) {
                        editSubData = data.data;
                        $('#projecTttype').val(editSubData[0].project_type_id + "");
                        $('#subTtype').val(editSubData[0].name);
                    },

                    error: function (data) {
                        console.log('Error:', data);
                    }

                })

            }

            //Edit Project Type
            var editProjectTypeData;

            function editProjectType(type_id) {
                $.ajax({
                    type: "GET",
                    url: "/api/v1/project-types" + "/" + type_id,
                    success: function (data) {
                        editProjectTypeData = data.data;
                        $('#editprojTypeInput').val(editProjectTypeData.name);
                    },

                    error: function (data) {
                        console.log('Error:', data);
                    }


                })


                let editProjectTypeBody = document.getElementById('editProjectTypeBody');
                editProjectTypeBody.innerHTML = `
            <form id="editProtypeform" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="create-task">Project type name</label>
                            <input type="text" class="form-control" id="editprojTypeInput" name="name" placeholder="" value="" required>
                            <div class="error" id="editProjectTypeErr"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="$('#EditProjectTypeModal').modal('hide');">Close</button>
                        <input class="btn btn-danger" type="button" style="background-color:#8a2a2b; color:white;" onclick="validateEditProjectType(${type_id})" value="Update">
                </div>
            </form>
            `
            }

            function submitEditProjectType(typeId) {
                $.ajax({
                    type: "PUT",
                    data: $('#editProtypeform').serialize(),
                    url: '/api/v1/project-types' + '/' + typeId,
                    success: function (data) {
                        swal({
                            title: "Success!",
                            text: "Project type edited!",
                            icon: "success",
                            confirmButtonColor: "#DD6B55",
                        });
                        $('#EditProjectTypeModal').modal('hide');
                        window.setTimeout(function () {
                            $("#kt_table_project_type").DataTable().ajax.reload();
                        }, 2300)

                    },
                    error: function (error) {
                        swal({
                            title: "Project type editing failed!",
                            icon: "error",
                            confirmButtonColor: "#fc3",
                            confirmButtonText: "OK",
                        });
                    }
                });
            }

                function documentDTCall(project_id) {
                    $(document).ready(function () {
                        $('#kt_table_single_project_documents').DataTable();
                    });
                }


                function reportDTCall(project_id) {
                    $(document).ready(function () {
                        $('#kt_table_single_project_reports').DataTable();
                    });
                }


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
