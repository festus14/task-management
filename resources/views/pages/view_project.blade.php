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

        @endsection

        {{-- projectcomment js --}}
        @section('javascript')
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script type="text/javascript" src="{{ asset('js/validator/projectValidator.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/validator/projectTypeValidator.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/project_scripts/projectType_subtype.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/project_scripts/view_project.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/project_scripts/project_tools.js') }}"></script>

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
                function addComment() {
                    var commentMade;
                    commentMade = document.getElementsByClassName("Textarea2").value;
                    let Commenthtml = `<div class="m-messenger__wrapper commguy" style="padding-right: 10px; padding-left: 10px;">
                                <div class="m-messenger__message m-messenger__message--out">

                                    <div class="m-messenger__message-body">
                                        <div class="m-messenger__message-arrow"></div>
                                        <div class="m-messenger__message-content">
                                        <div class="m-messenger__message-username">
                                        <span style="color: #0c2a7a"><strong>Temi</strong></span>
                                        <span class="datee" style="float: right; color: #d0d3db;">2nd febrary</span>
                                    </div>
                                    <div class="m-messenger__message-text" style="  min-width: 250px; max-width: 440px; max-height: 4000px;">
                                        ${commentMade}
                                    </div>
                                </div>
                            </div>
                            <div class="m-messenger__message-pic">
                            <img src="{{ asset('metro/assets/app/media/img/users/user3.jpg') }}" alt="" class="mCS_img_loaded">
                        </div>
                        </div>
                    </div>`
                    document.getElementById("mCSB_3_container").innerHTML = document.getElementById("mCSB_3_container").innerHTML + Commenthtml

                }


                function addReply(id) {
                    parentComment = document.getElementById(`${id}replydiv`);
                    childComment = `<div class="m-messenger__wrapper" style=" margin-top:9px; padding-right: 10px; padding-left: 10px;">
           <div class="m-messenger__message m-messenger__message--out">

               <div class="m-messenger__message-body">
                   <div class="m-messenger__message-arrow"></div>
                   <div class="m-messenger__message-content">
                   <div class="m-messenger__message-username">
                   <span style="float: left; color: #24262b;"><strong>Dammy</strong></span>
                   <span class="datee" style="float: right; color: #0c2a7a">2019-08-25 16:58:51+</span>

                       </div>

                       <div class="m-messenger__message-text" style="min-width: 250px; word-wrap: break-word; max-width: 320px; text-align: left; max-height: 4000px;">  <p> </br>
                        ${document.getElementById(`${id}replyTextId`).value}
                                 </p>
                       </div>
                       </br>
                   </div>
               </div>
               <div class="m-messenger__message-pic">
               <img alt="" src="{{ url('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
           </div>
           </div>
       </div>`;
                    parentComment.innerHTML = parentComment.innerHTML + childComment;
                    document.getElementById(`${id}replyTextId`).value = "";
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

                   // Function for rendering the more info modal
                   function displayProjectInfo(proID) {
                    $.ajax({
                        type: "GET",
                        url: '{{ url("/api/v1/projects/") }}' + "/" + proID,
                        success: function (data) {
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
                                    More info
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
                                    <div onclick="projectComments(${data.data.id})" class="card-header" id="headingFour">
                                        <h6 style="cursor: pointer" class="mb-0">
                                            <span class="" data-toggle="modal" data-target="#commentModal">
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
                                        <td></td>
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

<div class="modal fade" id="commentModal" tabindex="-1" style="overflow:hidden;" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

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
                                    </tr>
                                </thead>
                                <tbody>
                                    ` + data.data.reports.map(item => `
                                    <tr>
                                        <td></td>
                                        <td>${item.project_report}</td>
                                        <td>${item.created_at}</td>
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


<div class="modal fade" id="addReportModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 60%; min-width: 500px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="documentModalLongTitle">Add Report</h5>
                <button type="button" class="close" onclick="$('#addReportModal').modal('hide');" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form id="addProjectReportForm" enctype="multipart/form-data">
                    @csrf
                    <div class=" row col-md-12">
                        <div class="col-md-12 form-group mt-3">
                            <label for="exampleFormControlTextarea1">Project Report</label>
                            <textarea class="form-control" id="project_report" name="project_report" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 row">
                        <div class="col-md-6 form-group mt-3">
                            <input type="hidden" value="${data.data.client_id}" name="client_id" id="client" class="form-control">
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            <input type="hidden" value="${data.data.id}" name="project_id" id="project" class="form-control">
                        </div>
                    </div>

                    <div class=" row col-md-12">
                        <fieldset class="col-md-12 form-group mt-3">

                            <div>
                                <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
                            </div>
                            <div id="messages">

                            </div>
                        </fieldset>
                        <div class="row col-md-12">
                            <div class="col-md-3 form-group mt-3">
                                <input type="button" onclick="submitProjectReport()" class="btn btn-block" value="Submit" style="background-color:#8a2a2b; color:white;">

                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


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
                <form id="submitDoc" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <input id="client-list" name="client_id" value="${data.data.client_id}" type="hidden">
                            </div>

                            <div class="form-group mt-3">
                                <label for="document-name">Document Name</label>
                                <input type="text" class="form-control" id="document-name" name="name">
                            </div>

                            <div class="form-group mt-4">
                                <input style="background: #f1f1f1" type="file" name="document" multiple />
                            </div>

                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <input id="project-list" name="project_id" value="${data.data.id}" type="hidden">
                            </div>

                            <div class="form-group">
                                <label for="version">Version</label>
                                <input type="text" class="form-control" id="version" placeholder="Enter Version" name="version">
                            </div>

                        </div>

                        <div class="col-md-3 form-group mt-2">
                            <input type="button" onclick="submitProjectDoc()" class="btn btn-block center-block" style="background-color:#8a2a2b; color:white;" value="Submit">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
                `
                        },

                        error: function (data) {
                            console.log('Error:', data);


                        }

                    })

                }

                function projectComments(project_id) {
                    $.ajax({
                        type: "GET",
                        //url: "{{ url('/api/v1/projects') }}"+ '/'+project_id,
                        url: '/api/v1/projects/' + project_id,
                        success: function (data) {
                            let commentbody = document.getElementById('commentModal');
                            // let probSubtypeBody = document.getElementById('subtypeModalBody');
                            commentbody.innerHTML = `
        <div class="modal-dialog modal-dialog-centered" id="commentPage" style="overflow-y:hidden; height:95vh; min-height: 70vh; max-width: 94vw; min-width: 70vw; overflow:hidden;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Project Comments</h5>
                    <button type="button" class="close" onclick="$('#commentModal').modal('hide');" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
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
                                                                ${data.data.name}
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
                                                                                    <span class="secondary"><strong>Tomiwa</strong></span>
                                                                                    <span id="datee" style="float: right;">${elem.created_at}</span>
                                                                                </div>
                                                                                <div class="m-messenger__message-text" id="comContent" style="  max-width: 440px; min-height:50px; max-height: 4000px; display: flex; flex-direction: column;">
                                                                                                ${elem.comments}
                                                                                    <br/>
                                                                                    <div id="${elem.id}replydiv" style="width: 80%; flex-wrap: wrap; padding-bottom:5px; align-self: flex-end; text-align: right;">
                                                                                    </div>
                                                                                    <br>
                                                                                <i class="fa fa-reply" data-toggle="collapse" id="kkk" aria-hidden="true" data-target="#${elem.id}collapseReply" aria-expanded="false" aria-controls="collapseReply" style="display:flex; justify-content: flex-end;"></i>

                                                                                <div class="collapse" id="${elem.id}collapseReply">
                                                                                    <br>
                                                                                    <textarea class="form-control" name="replytext" id="${elem.id}replyTextId" rows="1" style="width: 100%" required></textarea>
                                                                                    <button type="submit" class="m-btn--pill btn btn-primary" onclick="addReply(${elem.id})" data-toggle="collapse" data-target="#${elem.id}collapseReply" style="margin-top: 5px; float: right;">Reply</button>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>`)
                                + `

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
                                                <div class="m-messenger__form " style="width: 100%; ">
                                                    <div class="m-messenger__form-controls ">
                                                        <button type="button" class="m-btn--pill btn btn-primary pull-right" data-toggle="modal" data-target="#makecommentModal" style="margin-left: 72%; margin-bottom: 25px;">
                                                                        Make Comment
                                                                      </button>

                                                        <div class="modal fade" id="makecommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Make Comment</h5>
                                                                        <button type="button" class="close" onclick="$('#makecommentModal').modal('hide');" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form id="makeCommentForm" enctype="multipart/form-data">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <textarea class="form-control " id="Textarea2" rows="4 " required></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" id="closeModal" class="m-btn--pill btn btn-secondary" onclick="$('#makecommentModal').modal('hide');">Close</button>
                                                                        <button type="button" class="m-btn--pill btn btn-primary" class="" onclick="addComment(), $('#makecommentModal').modal('hide')">Comment</button>
                                                                    </div>
                                                                    </form>
                                                                </div>

                                                            </div>

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

                </div>
            </div>
        </div>
        `
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

@endsection
