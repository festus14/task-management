@extends('layouts.inner')
@section('title', 'Project')
@section('header', 'Project Management')
@section('sub_header', 'Projects')
@section('content')
@section('css')
<style>

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
</style>
@endsection
<div class="m-portlet " id="m_portlet" style="width:97%;">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                        <i class="flaticon-list-2"> </i>
                    </span>
                <h3 class="m-portlet__head-text">
                    Project table
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a style="color:white; background-color: #8a2a2b;" id="addProjId" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" data-toggle="modal" >
                        <span>
                                <i class="la la-plus"></i>
                                <span>
                                    Add Project
                                </span>
                        </span>
                    </a>
                    <a class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" id="projectTypeId" data-toggle="modal" data-target="#ProjTypeDatatable">
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
    <div class="m-portlet__body" style="overflow-x:auto; table-responsive">
        <table id="kt_table_projects" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Name</th>
                    <th>Manager</th>
                    <th>Type</th>
                    <th>Subtype</th>
                    <th>Status</th>
                    <th>Members</th>
                    <th>Start Date</th>
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
<!-- Create Project Modal -->
<div class="modal fade" id="createProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Project</h5>
                <button type="button" class="close" onclick="$('#createProjectModal').modal('hide');" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div id="createProjectBody" class="modal-body col-md-12">



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
            <form id="addprojSubtypeform1" action="{{ url('/api/v1/project-sub-types') }}"  method="POST" enctype="multipart/form-data">
                @csrf
            <div id="subtypeModalBody" class="modal-body">
                {{-- body content --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#subtypeModal').modal('hide');" data-target="#subtypeModal">Close</button>
                <button type="submit" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--End AddSubtype Modal -->

<!--Project Type Modal found in create project-->
<div class="modal fade" id="PModal" role="dialog" aria-labelledby="PModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PModalLabel">Add Project Type</h5>
                <button type="button" class="close" onclick="$('#PModal').modal('hide');" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
            </div>
            <form id="addprojtypeform1" action="{{ url('/api/v1/project-types') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="create-task">Project Type Name</label>
                        <input type="text" class="form-control" id="subtype" name="name" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#PModal').modal('hide');">Close</button>
                    <button type="submit" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Project Type Modal -->

{{-- Project Type datatable modal --}}
<div class="modal fade" id="ProjTypeDatatable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="max-height:95%;">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:70%; min-width:400px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Project Type table</h5>
                <button type="button" class="close" onclick="$('#ProjTypeDatatable').modal('hide');" aria-label="Close">
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
                                    <a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" style="color:white; background-color: #8a2a2b;" data-toggle="modal" data-target="#AddProjecModalla">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>
                                                Add Type
                                            </span>
                                        </span>
                                    </a>
                                    <a class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air"  onclick="getProjectSubTypeDT();" id="projectSubTypeId" data-toggle="modal" data-target="#ProjSubTypeDatatable">
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
                        <table id="kt_table_project_type" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#ProjTypeDatatable').modal('hide');">Close</button>
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
                <button type="button" class="close" onclick="$('#AddProjecModalla').modal('hide');" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
            </div>
                {{-- <form id="addprojTtypeform" action="{{ url('/api/v1/project-types') }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="create-task">{{ trans('cruds.projectType.fields.name') }}*</label>
                            <input type="text" class="form-control" id="subtype" name="name" placeholder="" value="{{ old('name', isset($projectType) ? $projectType->name : '') }}" required>
                        </div>
                                @if($errors->has('name'))
                            <p class="help-block">
                                {{ $errors->first('name') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.projectType.fields.name_helper') }}
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="$('#AddProjecModalla').modal('hide');" data-target="#AddProjecModalla">Close</button>
                        <button type="submit" class="btn btn-primary" value="{{ trans('global.save') }}" style="background-color:#8a2a2b; color:white;">Add</button>
                    </div>
                </form> --}}
                    
                    <form id="addprojTtypeform2" action="{{ url('/api/v1/project-types') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="create-task">Project Type Name</label>
                                <input type="text" class="form-control" id="projTypeId" name="name" placeholder="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="$('#AddProjecModalla').modal('hide');">Close</button>
                            <button type="submit" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add</button>
                        </div>
                    </form>
        </div>
    </div>
</div>


<!--End modalled projType Modal -->

{{-- Project SubType datatable modal --}}
<div class="modal fade" id="ProjSubTypeDatatable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:70%; min-width:400px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Project Sub-type</h5>
                    <button type="button" class="close" onclick="$('#ProjSubTypeDatatable').modal('hide');" aria-label="Close">
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
                                        <a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" id="addProjSubTypeId" style="color:white; background-color: #8a2a2b;" data-toggle="modal" data-target="#subtypemainModal">
                                            <span>
                                                <i class="la la-plus"></i>
                                                <span >
                                                    Add Sub-type
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="m-portlet__body" style="overflow-x:auto;  width:100%">
                            <table id="kt_table_project_subtype" class="table table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Project Type</th>
                                        <th>Project Sub-type</th>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#ProjSubTypeDatatable').modal('hide');">Close</button>
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
                    <button type="button" class="close" onclick="$('#subtypemainModal').modal('hide');" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                </div>
                <form id="addprojtypeform2" action="{{ url('/api/v1/project-sub-types') }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                <div id="subtypemainModalBody">
                    {{-- body content --}}

                </div>
            </form>
            </div>
        </div>
    </div>
<!--End AddSubtype main Modal -->

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
                                                <li class="list-group-item">Shell Audit</li>
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
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Name</th>
                                    <th>Manager</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

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
                                    <th>#</th>
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
{{-- Add report Modal --}}
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
                <form>
                    <div class="col-md-12 row">
                        <div class="col-md-6 form-group mt-3">
                            <label>Client</label>
                            <select id="client-list" class="selectDesign form-control"></select>
                        </div>

                        <div class="col-md-6 form-group mt-3">
                            <label>Project</label>
                            <select id="client-list" class="selectDesign form-control"></select>
                        </div>
                    </div>
                    <div class=" row col-md-12">
                        <div class="col-md-12 form-group mt-3">
                            <label for="exampleFormControlTextarea1">Project Report</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class=" row col-md-12">
                        <form id="upload" action="upload.php" method="POST" enctype="multipart/form-data">
                            <fieldset class="col-md-12 form-group mt-3">
                                <legend>Upload File</legend>

                                <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

                                <div>
                                    <label for="fileselect">Files to upload:</label>
                                    <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" /> {{--
                                    <div id="filedrag">or drop files here</div> --}}
                                </div>
                                {{--
                                <div id="submitbutton">
                                    <button type="submit">Upload Files</button>
                                </div> --}}
                                <div id="messages">

                                </div>
                            </fieldset>
                            <div class="row col-md-12">
                                <div class="col-md-3 form-group mt-3">
                                    <button class="btn btn-block" style="background-color:#8a2a2b; color:white;">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end Addreport Modal --}}

<!-- Add Document Modal -->
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
                <form action="" method="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="client-list">Select Client</label>
                                <select id="client-list" class="selectDesign form-control"></select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="document-name">Document Name</label>
                                <input type="text" class="form-control" id="document-name" placeholder="Enter Document Name">
                            </div>

                            <div class="form-group mt-4">
                                <input style="background: #f1f1f1" type="file" name="files[]" multiple />
                            </div>

                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="project-list">Project Name</label>
                                <select id="project-list" class="selectDesign form-control"></select>
                            </div>

                            <div class="form-group">
                                <label for="task-list">Version</label>
                                <input type="text" class="form-control" id="version" placeholder="Enter Version">
                            </div>

                        </div>

                        <div class="col-md-3 form-group mt-2">
                            <button type="submit" class="btn btn-block center-block" style="background-color:#8a2a2b; color:white;">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- End Add Document Modal -->

<!-- Comment Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" style="overflow:hidden;" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="overflow-y:hidden; height:99vh; min-height: 70vh; max-width: 98vw; min-width: 70vw; overflow:hidden;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Project Comments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                            <img alt="" src="{{ asset('metro/assets/app/media/img/users/user4.jpg') }}" class="mCS_img_loaded" />
                                        </div>
                                    </div>
                                    <div class="m-card-profile__details">
                                        <span class="m-card-profile__name">
                                                        Project Name
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
                                <div class=" m-scrollable" >
                                    <div class="tab-pane active m-scrollable" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
                                        <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
                                            <div class="m-messenger__messages mCS-autoHide" style="height: 400px; max-height: auto; position: relative; overflow: hidden;">
                                                <div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="padding-top:7px; max-height: 100%; width: 100%; position: absolute;
                                                overflow-y: scroll; scrollbar-width: 2px;">
                                                    <div id="mCSB_3_container" class="mCSB_container" style="top:0; left:0;" dir="ltr">
                                                        <br>
                                                        <span id="filler"> </span>

                                                        <div class="m-messenger__wrapper commguy" style="padding-right: 10px; display:flex; flex-wrap: flex; padding-left: 10px;">
                                                            <div class="m-messenger__message m-messenger__message--in">
                                                                <div class="m-messenger__message-pic">
                                                                    <img alt="" src="{{ asset('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded" />
                                                                </div>
                                                                <div class="m-messenger__message-body">
                                                                    <div class="m-messenger__message-arrow"></div>
                                                                    <div class="m-messenger__message-content">
                                                                        <div class="m-messenger__message-username">
                                                                            <span class="secondary"><strong>Tomiwa wrote</strong></span>
                                                                            <span id="datee" style="float: right;"></span>
                                                                        </div>
                                                                        <div class="m-messenger__message-text" id="comContent" style="  max-width: 440px; word-wrap: break-word; max-height: 4000px; display: flex; flex-direction: column;">
                                                                            Hi Ayo. What time will be the meeting ? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel a ratione unde veritatis hic quidem totam quas, minima officiis ab sapiente necessitatibus doloribus vitae nesciunt atque deserunt.
                                                                            <br/>
                                                                            <div id="replydiv" style="width: 80%; flex-wrap: wrap; padding-bottom:5px; align-self: flex-end; text-align: right;">
                                                                            </div>
                                                                            <br>
                                                                            <i class="fa fa-reply" data-toggle="collapse" id="kkk" aria-hidden="true" data-target="#collapseReply" aria-expanded="false" aria-controls="collapseReply" style="display:flex; justify-content: flex-end;"></i>

                                                                            <div class="collapse" id="collapseReply">
                                                                                <br>
                                                                                <textarea class="form-control" name="replytext" id="replyTextId" rows="1" style="width: 100%" required></textarea>
                                                                                <button class="m-btn--pill btn btn-primary" type="submit" onclick="addReply()" style="margin-top: 5px; float: right;">Reply</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div id=" mCSB_3_scrollbar_vertical " class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical " style="display: block;">
                                                    <div class=" mCSB_draggerContainer ">
                                                        <div id="mCSB_3_dragger_vertical " class="mCSB_dragger " style="position: absolute; min-height: 50px; display: block; height: 114px; max-height: 319px; top: 0px; ">
                                                            <div class="mCSB_dragger_bar " style="line-height: auto; "></div>
                                                        </div>
                                                        <div class="mCSB_draggerRail "></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-messenger__seperator "></div>
                                            <div class="m-messenger__form " style="width: 100%; ">
                                                <div class="m-messenger__form-controls ">
                                                    <button type="button" class="m-btn--pill btn btn-primary pull-right" data-toggle="modal" data-target="#makecommentModal" style="margin-right: 3%; margin-bottom: 25px;">
                                                                Make Comment
                                                              </button>
                                                    <!-- Make new Commment Modal -->
                                                    <div class="modal fade" id="makecommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Make Comment</h5>
                                                                    <button type="button" class="close" onclick="$('#makecommentModal').modal('hide');" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                      </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <textarea class="form-control " id="Textarea2" rows="4 " required></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" id="closeModal" class="m-btn--pill btn btn-secondary" onclick="$('#makecommentModal').modal('hide');">Close</button>
                                                                    <button type="button" class="m-btn--pill btn btn-primary" class="" onclick="addComment(), $('#makecommentModal').modal('hide');">Comment</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Make new Commment Modal -->
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
                </form>

            </div>
        </div>
    </div>
</div>
<!-- endComment Modal -->

@endsection

{{-- projectcomment js --}}
@section('javascript')
<script>
        var date = new Date();
       var formattedDate = (date.toString().slice(0, 25));
       document.getElementById("datee").innerHTML = formattedDate;


       var data = [{
               "id": 2,
               name: "Yeha",
               "comment": "laudantium enim ladugbo mi ncicna jnsjkd cfjaka"
           },
           {
               "id": 1,
               name: "Ya",
               "comment": "est natus enim nihil"
           },
       ]
       mapComment();


       function mapComment() {
           data.map((elem, i) => {
               var html = elem.id === 1 ?
                   `<div class="m-messenger__wrapper commguy" style="padding-right: 10px; padding-left: 10px;">
           <div class="m-messenger__message m-messenger__message--out">

               <div class="m-messenger__message-body">
                   <div class="m-messenger__message-arrow"></div>
                   <div class="m-messenger__message-content">
                   <div class="m-messenger__message-username">
                   <span style="color: #0c2a7a"><strong>${elem.name}</strong></span>
                   <span class="datee" style="float: right; color: #d0d3db;">${formattedDate}</span>

                       </div>
                       <div class="m-messenger__message-text" style="min-width: 250px; word-wrap: break-word; max-width: 440px; max-height: 4000px;">
                           ${elem.comment}
                       </div>
                   </div>
               </div>
               <div class="m-messenger__message-pic">
               <img alt="" src="{{ url('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
           </div>
           </div>
       </div>` :
                   `<div class="m-messenger__wrapper commguy" style="padding-right: 10px; padding-left: 10px;">
           <div class="m-messenger__message m-messenger__message--out">

               <div class="m-messenger__message-body">
                   <div class="m-messenger__message-arrow"></div>
                   <div class="m-messenger__message-content">
                   <div class="m-messenger__message-username">
                   <span style="color: #0c2a7a"><strong>${elem.name}</strong></span>
                   <span class="datee" style="float: right; color: #d0d3db;">${formattedDate}</span>

                       </div>
                       <div class="m-messenger__message-text" style=" min-width: 250px; word-wrap: break-word; max-width: 440px; max-height: 4000px;">
                           ${elem.comment}
                       </div>
                   </div>
               </div>
               <div class="m-messenger__message-pic">
                   <img alt="" src="{{ url('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
           </div>
           </div>
       </div>`
                   document.getElementById("mCSB_3_container").innerHTML = document.getElementById("mCSB_3_container").innerHTML + html
                // document.getElementById("mCSB_3_container").appendChild(html);
            // $( "<p>Test</p>" ).appendTo( ".inner" );

           })
       }

       function addComment() {
           var newObj = {
               name: "Chiamaka",
               comment: document.getElementById("Textarea2").value,
               id: 5
           }
           console.log(newObj);
           data.push(newObj);
           mapComment();
           document.getElementById("Textarea2").value = "";
       }

       function addReply() {
           parentComment = document.getElementById("replydiv");
           childComment = `<div class="m-messenger__wrapper" style=" margin-top:9px; padding-right: 10px; padding-left: 10px;">
           <div class="m-messenger__message m-messenger__message--out">

               <div class="m-messenger__message-body">
                   <div class="m-messenger__message-arrow"></div>
                   <div class="m-messenger__message-content">
                   <div class="m-messenger__message-username">
                   <span style="float: left; color: #24262b;"><strong>Dammy</strong></span>
                   <span class="datee" style="float: right; color: #0c2a7a">${formattedDate}</span>

                       </div>

                       <div class="m-messenger__message-text" style="min-width: 250px; word-wrap: break-word; max-width: 320px; text-align: left; max-height: 4000px;">  <p> </br>
                         ${document.getElementById("replyTextId").value}
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
           document.getElementById("replyTextId").value = "";
       }
       </script>

<script>
    let languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };
    $(function() {

        let copyButtonTrans = 'copy';
        let csvButtonTrans = 'csv';
        let excelButtonTrans = 'excel';
        let pdfButtonTrans = 'pdf';
        let printButtonTrans = 'print';
        let colvisButtonTrans = 'col vis';
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
            buttons: [{
                extend: 'excel',
                className: 'btn-default',
                text: excelButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            }, {
                extend: 'pdf',
                className: 'btn-default',
                text: pdfButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            }, {
                extend: 'csv',
                className: 'btn-default',
                text: csvButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            }]
        });

        $.fn.dataTable.ext.classes.sPageButton = '';
        let deleteButtonTrans = 'Delete Selected';
        let deleteButton = {
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
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
        @can('task_delete')
        dtButtons.push(deleteButton);
        @endcan

        $('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })

    })

</script>

{{-- <script>
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

</script> --}}

{{-- <script>
   $('#kt_table_project_subtype').DataTable({
            ajax: "{{ url('/admin/get_project_subtype/1') }}",
            columns: [
                { "data": "id" },
                { "data": "name" },
                { "data": "project_type.name" },
                { "data": "created_at" },
                { "data": "updated_at" },
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
    function getSomething(ID){
        var taskDataTable = $('#kt_table_project_subtype').DataTable({
            ajax: "{{ url('/get_project_subtype/1') }}",
            columns: [
                { "data": "id" },
                { "data": "name" },
                { "data": "project_type.name" },
                { "data": "created_at" },
                { "data": "updated_at" },
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
    }
</script> --}}

{{-- <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){

            $('#addprojectform').on('submit', function(e){
            e.preventDefault();

        $.ajax({
            type: "POST",
            url: '{{ url("admin/projects") }}',
            data: $('#addprojectform').serialize(),
            success: function (response) {
                console.log(response)
                $('#createProjectModal').modal('hide');
                alert("Project Created");
                location.reload();
            },
            error: function (error) {
                console.log(error);
                alert("Project creation failed");
            }
        });
    });
});
    </script> --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

     let popAddProj = document.getElementById('addProjId');
     popAddProj.addEventListener("click", displayAddProject);

     function displayAddProject(){
      $("#createProjectModal").modal('show');
        $.ajax({
            type: "GET",
            url: '{{ url("/api/v1/project_create") }}',
            success: function (data) {
                let createProjectBody = document.getElementById('createProjectBody');
                let probSubtypeBody = document.getElementById('subtypeModalBody');
                    createProjectBody.innerHTML = `
                    <div class="col-md-12 ">
    <form action="{{ route("admin.projects.store") }}" method="POST" id="addprojectform" enctype="multipart/form-data">
        @csrf
        <div class="row col-md-12">
            <div class="col-md-6 form-group mt-3">
                <label>Select Client</label>
                <select id="client-list" name="client_id" class="selectDesign form-control required">
                ` +
                    data.clients.map(elem => `<option value="">${elem.name}</option>`)
                + `
                </select>
            </div>

            <div class="col-md-6 form-group mt-3">
                    <label for="create-project">Project Name</label>
                <input type="text" name="name" class="form-control" id="create-project" placeholder="" required>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-4 form-group mt-3">
                <label for="create-project">Manager</label><br>
                <select name="manager_id" class="form-control select2" style="width:100%;" required>
                    ` +
                    data.managers.map(elem => `<option value="">${elem.name}</option>`)
                + `
                </select>
            </div>
            <div class="col-md-4 form-group mt-3">
                <label for="create-project-type">Project Type</label>
                <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#PModal" style="float:right;"></i>
                <select class="form-control" id="projtypeboy" name="project_type_id" required>
                    ` +
                    data.project_types.map(elem => `<option value="">${elem.name}</option>`)
                + `
                </select>
            </div>


            <div class="col-md-4 form-group mt-3">
                <label for="exampleFormControlSelect1">Project Sub-type</label>
                <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#subtypeModal" style="float:right;"></i>
                <select class="form-control" id="exampleFormControlSelect1" name="project_subtype_id" required>
                    ` +
                    data.project_subtypes.map(elem => `<option value="">${elem.name}</option>`)
                + `
                </select>
            </div>
        </div>
        <div class="row col-md-12 ">

            <div class="col-md-4 form-group mt-3">
                <label for="starting-date">Start Date</label>
                <input type="text" class="form-control date" name="starting_date" id="starting-date" required>
            </div>

            <div class="col-md-4 form-group mt-3">
                <label for="Deadline">Deadline</label>
                <input type="text" class="form-control date" name="deadline" id="Deadline" required>
            </div>
            <div class="col-md-4 form-group mt-3">
                <label>Team members</label><br>
                <select multiple class="form-control select2" name="team_members[]" style="width:100%;"required>
                    ` +
                    data.team_members.map(elem => `<option value="">${elem.name}</option>`)
                + `
                </select>
            </div>


            <div class="col-md-2 form-group mt-3">
                <button type="submit" class="btn btn-block center-block" style="background-color:#8a2a2b; color:white;">Add Project</button>
            </div>
        </div>
    </form>
</div>  `

            probSubtypeBody.innerHTML = `
            <div class="form-group">
                    <label for="project-type">Select Project Type</label>
                    <select id="project-type" class="selectDesign form-control">
                        ` +
                            data.project_types.map(elem => `<option name="project_type_id" value="">${elem.name}</option>`)
                        + `
                </select>
                </div>

                <div class="form-group">
                    <label for="create-task">Subtype Name</label>
                    <input type="text" class="form-control" name="name" id="subtypeId" placeholder="">
                </div>
                     `
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });

    }

         // Add project Sub type Post 
                 $('#addprojSubtypeform1').on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                    type: "POST",
                    url: '{{ url("/api/v1/project-sub-types") }}',
                    data: $('#addprojSubtypeform1').serialize(),
                    success: function (response, data) {
                        alert("Project sub-type created");
                        getProjetTypeDT();
                        document.getElementById('subtypeId').value = "";
                        $('#subtypeModal').modal('hide');
                        console.log(data);
                        console.log(response);
                        return(data);
                    },
                    error: function (error) {
                        console.log(error);
                        alert("Project sub-type creation failed");
                    }

                    });
                    });

        // Add 2nd project Sub type Post 
        $('#addprojSubtypeform2').on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                    type: "POST",
                    url: '{{ url("/api/v1/project-sub-types") }}',
                    data: $('#addprojSubtypeform1').serialize(),
                    success: function (response, data) {
                        alert("Project sub-type created");
                        getProjecSubTypeDT();
                        document.getElementById('sub-type').value = "";
                        $('#subtypemainModal').modal('hide');
                        console.log(data);
                        console.log(response);
                        return(data);
                    },
                    error: function (error) {
                        console.log(error);
                        alert("Project sub-type creation failed");
                    }

                    });
                    });


    // post to the create proj table
    $(document).ready(function(){

        $('#addprojectform').on('submit', function(e){
        e.preventDefault();

        $.ajax({
        type: "POST",
        url: '{{ url("admin/projects") }}',
        data: $('#addprojectform').serialize(),
        success: function (response) {
            console.log(response)
            $('#createProjectModal').modal('hide');
            alert("Project Created");
            location.reload();
        },
        error: function (error) {
            console.log(error);
            alert("Project creation failed");
        }
        });
        });
        });
    </script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#kt_table_projects').DataTable({
            ajax: "{{ url('/api/v1/projects') }}",
            columns: [
                { defaultContent : "" },
                { "data": "client.name" },
                { "data": "name" },
                { "data": "manager.name" },
                { "data": "project_type.name" },
                { "data": "project_subtype.name" },
                { "data": "status.name" },
                { "data": "team_members[, ].name" },
                { "data": "starting_date" },
                { "data": "deadline" }
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
                targets: 10,
                orderable: false,
                searchable: false,
                render: function () {
                  return '\<button class="btn btn-secondary dropdown-toggle" type="button" id="projectToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                        <div class="dropdown-menu" aria-labelledby="projectToolsbtn" style="padding-left:8px; min-width: 100px; max-width: 15px;">\
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
    },
        ],
        });



    function getProjetTypeDT(){
            if ( $.fn.dataTable.isDataTable( '#kt_table_project_type') ) {
                var kt_table_project_type = $('#kt_table_project_type').DataTable();
             }else {
                var kt_table_project_type = $('#kt_table_project_type').DataTable({
                    ajax: "{{ url('/api/v1/project-types') }}",
                    columns: [
                        { defaultContent : ""  },
                        { "data": "name"}
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
                targets:2,
                orderable: false,
                searchable: false,
                render: function () {
                  return '\<button class="btn btn-secondary dropdown-toggle" type="button" id="taskToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                        <div class="dropdown-menu" aria-labelledby="taskToolsbtn" style="padding-left:8px; min-width: 60px; max-width: 15px;">\
                                        <a class="link" href="">\
                                            <i class="fas fa-pencil-alt" style="color:black;"></i>\
                                        </a>\
                                        <form action="" method="POST" onsubmit="" style="display: inline-block;">\
                                            <input type="hidden" name="_method" value="DELETE">\
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">\
                                            <button type="submit" class="link" style="border: none; background-color: white;"><a class="link" href="#"> <i class="far fa-trash-alt" style="color:black;"></i></a></button>\
                                        </form>\
                                    </div>\
                                    ';
                }
    }],
                });
                    }
            };


    function getProjectSubTypeDT(){

            if ( $.fn.dataTable.isDataTable( '#kt_table_project_subtype') ) {
                var kt_table_project_subtype = $('#kt_table_project_subtype').DataTable();
             }else {
                var kt_table_project_subtype = $('#kt_table_project_subtype').DataTable({
                    ajax: "{{ url('/api/v1/project-sub-types') }}",
                    columns: [
                        { defaultContent : ""  },
                        { "data": "project_type.name"},
                        { "data": "name" }
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
                render: function () {
                  return '\<button class="btn btn-secondary dropdown-toggle" type="button" id="taskToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                        <div class="dropdown-menu" aria-labelledby="taskToolsbtn" style="padding-left:8px; min-width: 60px; max-width: 15px;">\
                                        <a class="link" href="">\
                                            <i class="fas fa-pencil-alt" style="color:black;"></i>\
                                        </a>\
                                        <form action="" method="POST" onsubmit="" style="display: inline-block;">\
                                            <input type="hidden" name="_method" value="DELETE">\
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">\
                                            <button type="submit" class="link" style="border: none; background-color: white;"><a class="link" href="#"> <i class="far fa-trash-alt" style="color:black;"></i></a></button>\
                                        </form>\
                                    </div>\
                                    ';
                }
    }],
                });
                    }
            };

            let addProjSubTypeId = document.getElementById('addProjSubTypeId');
            addProjSubTypeId.addEventListener("click", displayAddPsubtype);

            function displayAddPsubtype(){
                $("#subtypemainModal").modal('show');
                    $.ajax({
                        type: "GET",
                        url: '{{ url("/api/v1/project-types") }}',
                        success: function (data) {
                            let subtypemainModalBody = document.getElementById('subtypemainModalBody');
                                subtypemainModalBody.innerHTML =  `
                                
                <div  class="modal-body">

                        <div class="form-group">
                            <label for="project-type">Select Project Type</label>
                            <select id="projecttype" name="project_type_id" class="selectDesign form-control">

                                        ${data.data.map(elem => `<option value="">${elem.name}</option>`)}

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="create-task">Subtype Name</label>
                            <input type="text" class="form-control" name=name id="sub-type" placeholder="">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#subtypemainModal').modal('hide');" data-target="#subtypemainModal">Close</button>
                    <button type="button" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add</button>
                </div>

                                            `
                                    },

                                    error: function (data) {
                                        console.log('Error:', data);
                        }});
                                }


                // function addTypeToProject(){
                // Add to the proj type....one in create project
                        $(document).ready(function(){

                    $('#addprojtypeform1').on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                    type: "POST",
                    url: '{{ url("/api/v1/project-types") }}',
                    data: $('#addprojtypeform1').serialize(),
                    success: function (response, data) {
                        alert("Project-type created");
                        displayAddProject();
                        $('#PModal').modal('hide');
                        console.log(data);
                        console.log(response);
                        return(data);



                    },
                    error: function (error) {
                        console.log(error);
                        alert("Project-type creation failed");
                    }

                    });
                    });
                    });
                    // end of project type ajax call
                
                    // Add project type Post 
                    $('#addprojTtypeform2').on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                    type: "POST",
                    url: '{{ url("/api/v1/project-types") }}',
                    data: $('#addprojTtypeform2').serialize(),
                    success: function (response, data) {
                        alert("Project-type created");
                        getProjetTypeDT();
                        document.getElementById('projTypeId').value = "";
                        $('#AddProjecModalla').modal('hide');
                        console.log(data);
                        console.log(response);
                        return(data);
                    },
                    error: function (error) {
                        console.log(error);
                        alert("Project-type creation failed");
                    }

                    });
                    });

            // }
    </script>

       @endsection
