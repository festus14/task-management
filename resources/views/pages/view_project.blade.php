@extends('layouts.inner')
@section('title', 'Project')
@section('header', 'Project Management')
@section('sub_header', 'Projects')
@section('content')
@section('css')
<style>

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
                    <a class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" data-toggle="modal" data-target="#subDatatable">
                        <span>
                                <span>
                                    Project Subtype
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
                    <th>SN</th>
                    <th>Client</th>
                    <th>Name</th>
                    <th>Manager</th>
                    <th>Type</th>
                    <th>Subtype</th>
                    <th>Status</th>
                    <th>Members</th>
                    <th>Deadline</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                @php $counter = 1;
                @endphp
                @foreach($projects as $project)
                <tr data-entry-id="{{ $project->id }}">
                    <td></td>
                    <td>{{ $project->client->name ?? '' }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->manager->name ?? '' }}</td>
                    <td>{{ $project->project_type->name ?? '' }}</td>
                    <td>{{ $project->project_subtype->name ?? ''}}</td>
                    <td>{{ $project->status->name ?? '' }}</td>
                    <td>
                        @foreach ($project->team_members as $menber)
                        <span class="m-badge m-badge--success"> {{ $menber->email }} </span>
                        @endforeach
                    </td>
                    <td>{{ $project->deadline }}</td>
                    <td>
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="projToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{-- tools dropdown btn --}}
                          </button>
                        <div class="dropdown-menu" aria-labelledby="projToolsbtn" style="padding-left:8px; min-width: 100px; max-width: 15px;">
                            <a class="link" href="#"><i class="fas fa-eye" style="color:black;" data-toggle="modal" data-target="#moreInfoModal"> </i></a>
                             @can('project_sub_type_edit')
                            <a class="link" href="{{ route('admin.project-sub-types.edit', $project->id) }}">
                                <i class="fas fa-pencil-alt" style="color:black;"></i>
                            </a>
                            @endcan
                            @can('project_sub_type_edit')
                            <a class="link" href="#" id="project_subtype_{{  $project->id }}" data-project_type_id="{{  $project->id }}">
                                <i class="flaticon-graphic" style="color:black;"> </i>
                            </a>
                            @endcan
                            @can('project_sub_type_delete')
                            <form action="{{ route('admin.project-sub-types.destroy', $project->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="link" style="border: none; background-color: white;"><a class="link" href="#"> <i class="far fa-trash-alt" style="color:black;"></i></a></button>
                            </form>
                            @endcan
                        </div>

                    </td>
                </tr>

                @php $counter ++; @endphp @endforeach @php $counter = 1; @endphp

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
<!--Subtype Modal -->
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#subtypeModal').modal('hide');" data-target="#subtypeModal">Close</button>
                <button type="button" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add</button>
            </div>
        </div>
    </div>
</div>
<!--End Subtype Modal -->

<!--Project Type Modal -->
<div class="modal fade" id="PModal" role="dialog" aria-labelledby="PModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PModalLabel">Add Project Type</h5>
                <button type="button" class="close" onclick="$('#PModal').modal('hide');" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="create-project-subtype" placeholder="Input name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#PModal').modal('hide');">Close</button>
                <button type="button" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add</button>
            </div>
        </div>
    </div>
</div>
<!--End Project Type Modal -->

{{-- Project Subtype datatable modal --}}
<div class="modal fade" id="subDatatable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:70%; min-width:400px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Project Subtype table</h5>
                <button type="button" class="close" onclick="$('#subDatatable').modal('hide');" aria-label="Close">
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
                                    Project Subtype table
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" data-toggle="modal" data-target="#subtypeModalla">
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
                    <div class="m-portlet__body" style="overflow-x:auto;">
                        <table id="kt_table_project_subtype" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Project Type</th>
                                    <th>created</th>
                                    <th>Updated</th>
                                    <th>Tools</th>

                                </tr>
                            </thead>
                            <tbody>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td>
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="subtypeTool" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{-- tools dropdown btn --}}
                                          </button>
                                        <div class="dropdown-menu" aria-labelledby="subtypeTool" style="padding-left:8px; min-width: 50px;">
                                             @can('project_sub_type_edit')
                                            <a class="link" href="{{ route('admin.project-sub-types.edit', $project->id) }}">
                                                <i class="fas fa-pencil-alt" style="color:black;"></i>
                                            </a>
                                            @endcan
                                            {{-- @can('project_sub_type_edit')
                                            <a class="link" href="#" id="project_subtype_{{  $project->id }}" data-project_type_id="{{  $project->id }}">
                                                <i class="flaticon-graphic" style="color:black;"> </i>
                                            </a>
                                            @endcan  --}}
                                            @can('project_sub_type_delete')
                                            <form action="{{ route('admin.project-sub-types.destroy', $project->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="link" style="border: none; background-color: white;"><a class="link" href="#"> <i class="far fa-trash-alt" style="color:black;"></i></a></button>
                                            </form>
                                            @endcan
                                        </div>

                                    </td>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#subDatatable').modal('hide');">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- End Project Subtype datatable modal --}}

<!--modalled projSubtype Modal -->
<div class="modal fade" id="subtypeModalla" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Subtype</h5>
                <button type="button" class="close" onclick="$('#subtypeModalla').modal('hide');" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="project-type">Select Project Type</label>
                    <select id="project-type" class="selectDesign form-control"></select>
                </div>

                <div class="form-group">
                    <label for="create-task">Subtype Name</label>
                    <input type="text" class="form-control" id="subtype" placeholder="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#subtypeModalla').modal('hide');" data-target="#subtypeModal">Close</button>
                <button type="button" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add</button>
            </div>
        </div>
    </div>
</div>
<!--End modalled projSubtype Modal -->

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
{{-- endDocumentDTModal --}} {{-- report DT Modal --}}
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
{{-- endreport DT tModal --}} {{-- Add report Modal --}}
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
    <div class="modal-dialog modal-dialog-centered" style="overflow-y:hidden; height:100vh; min-height: 100px; max-width: 100%; min-width: 100px; overflow:hidden;" role="document">
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
                                <div class=" m-scrollable">
                                    <div class="tab-pane active m-scrollable" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
                                        <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
                                            <div class="m-messenger__messages mCS-autoHide" style="height: 356px; max-height: auto; position: relative; overflow: hidden;">
                                                <div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: auto; position: absolute;

                                                overflow-y: scroll; scrollbar-width: thin;">
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
                                                    <button type="button" class="m-btn--pill btn btn-primary" data-toggle="modal" data-target="#makecommentModal" style="margin-left: 72%; margin-bottom: 25px;">
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
                                                                    <button type="button" class="m-btn--pill btn btn-primary" class="" onclick="addComment(), $('#exampleModal').modal('toggle');">Comment</button>
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
               console.log(elem.comment)
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
                    createProjectBody.innerHTML = createProjectBody.innerHTML + `
                    <div class="col-md-12 ">
    <form action="" method="POST" id="addprojectform" enctype="multipart/form-data">
        @csrf
        <div class="row col-md-12">
            <div class="col-md-6 form-group mt-3">
                <label>Select Client</label>
                <select id="client-list" name="client" class="selectDesign form-control">
                ` +
                    data.clients.map(elem => `<option value="">${elem.name}</option>`)
                + `
                </select>
            </div>

            <div class="col-md-6 form-group mt-3">
                    <label for="create-project">Project Name</label>
                <input type="text" name="name" class="form-control" id="create-project" placeholder="">
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-4 form-group mt-3">
                <label for="create-project">Manager</label><br>
                <select name="manager" class="form-control select2" style="width:100%;">
                    ` +
                    data.managers.map(elem => `<option value="">${elem.name}</option>`)
                + `
                </select>
            </div>
            <div class="col-md-4 form-group mt-3">
                <label for="create-project-type">Project Type</label>
                <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#PModal" style="float:right;"></i>
                <select class="form-control" id="projtypeboy" name="proj_type">
                    ` +
                    data.project_types.map(elem => `<option value="">${elem.name}</option>`)
                + `
                </select>
            </div>

            
            <div class="col-md-4 form-group mt-3">
                <label for="exampleFormControlSelect1">Project Sub-type</label>
                <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#subtypeModal" style="float:right;"></i>
                <select class="form-control" id="exampleFormControlSelect1" name="proj_subtype">
                    ` +
                    data.project_subtypes.map(elem => `<option value="">${elem.name}</option>`)
                + `
                </select>
            </div>
        </div>
        <div class="row col-md-12 ">

            <div class="col-md-4 form-group mt-3">
                <label for="starting-date">Start Date</label>
                <input type="text" class="form-control date" name="start_date" id="starting-date">
            </div>

            <div class="col-md-4 form-group mt-3">
                <label for="Deadline">Deadline</label>
                <input type="text" class="form-control date" name="deadline" id="Deadline">
            </div>
            <div class="col-md-4 form-group mt-3">
                <label>Team members</label><br>
                <select multiple class="form-control select2" name="team_members[]" style="width:100%;">
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

            probSubtypeBody.innerHTML = probSubtypeBody + `
            <div class="form-group">
                    <label for="project-type">Select Project Type</label>
                    <select id="project-type" class="selectDesign form-control">
                        ` +
                            data.project_types.map(elem => `<option value="">${elem.name}</option>`)
                        + `
                </select>
                </div>

                <div class="form-group">
                    <label for="create-task">Subtype Name</label>
                    <input type="text" class="form-control" id="subtype" placeholder="">
                </div>
                     `
            },
            error: function (data) {
                console.log('Error:', data);
            }
        }); 
        
    }
                
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

       @endsection
