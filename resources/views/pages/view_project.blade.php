@extends('layouts.inner')
@section('title', 'Project')
@section('header', 'Project Management')
@section('active_arrow_two')
    <span class="m-menu__item-here"></span>
@endsection
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
<div class="m-portlet " id="m_portlet" style="width:90%; box-sizing:border-box; padding-right: 50px;">
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
    <div class="m-portlet__body table-responsive" style="overflow-x:auto;">
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


<!-- Edit Project Modal -->
<div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                <button type="button" class="close" onclick="$('#editProjectModal').modal('hide');" aria-label="Close">
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
<div class="modal fade" id="PModal" role="dialog" aria-labelledby="PModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PModalLabel">Add Project Type</h5>
                <button type="button" class="close" onclick="$('#PModal').modal('hide');" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
            </div>
            <form id="addprojtypeform1" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="create-task">Project Type Name</label>
                        <input type="text" class="form-control" id="subtype" name="name" placeholder="" value="{{ old('name', isset($projectType) ? $projectType->name : '') }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#PModal').modal('hide');">Close</button>
                    <input type="button" id="submitProType" onsubmit="ProjectTypeSubmit()" class="btn btn-primary" style="background-color:#8a2a2b; color:white;" value="Add">
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
                    <form id="addprojTtypeform2" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="create-task">Project Type Name</label>
                                <input type="text" class="form-control" id="projTypeId" name="name" placeholder="" value="{{ old('name', isset($projectType) ? $projectType->name : '') }}" required>
                                <div class="error" id="projectTypeErr"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="$('#AddProjecModalla').modal('hide');">Close</button>
                            <input class="btn btn-danger" type="button" style="background-color:#8a2a2b; color:white;" onclick="validateProjectType()" value="{{ trans('global.create') }}">
                        </div>
                    </form>
        </div>
    </div>
</div>
<!--End modalled projType Modal -->

<!--Edit AddprojType Modal -->
<div class="modal fade" id="EditProjectTypeModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Project Type</h5>
                    <button type="button" class="close" onclick="$('#EditProjectTypeModal').modal('hide');" aria-label="Close">
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
                <div id="subtypemainModalBody">

                </div>

            </div>
        </div>
    </div>
<!--End AddSubtype main Modal -->


    <!-- Edit Project SubType Modal -->
    <div class="modal fade" id="editProjectSubTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 50%; min-width: 350px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Project Subtype</h5>
                    <button type="button" class="close" onclick="$('#editProjectSubTypeModal').modal('hide');" aria-label="Close">
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


        <!-- Comment Modal -->
        {{-- <div class="modal fade" id="commentModal" tabindex="-1" style="overflow:hidden;" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                    <div class="m-messenger__messages mCS-autoHide" style="height: 400px; position: relative; overflow: hidden;">
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
        </div> --}}
        <!-- endComment Modal -->
        <!-- Add Document Modal -->

        {{-- <div class="modal fade" id="addDocumentModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 60%; min-width: 500px;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="documentModalLongTitle">Add Report</h5>
                        <button type="button" class="close" onclick="$('#addReportModal').modal('hide');" aria-label="Close">
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
        </div> --}}
        <!-- End Add Document Modal -->
    </div>


@endsection

{{-- projectcomment js --}}
@section('javascript')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ asset('js/validator/projectValidator.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validator/projectTypeValidator.js') }}"></script>

<script>
    function ProjectTypeSubmit(){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                type: "POST",
                url: "{{ url('/api/v1/project-types') }}",
                data: $('#addprojtypeform1').serialize(),
                success: function (data) {

                    swal({
                        title: "Success!",
                        text: "Project Type Created!",
                        icon: "success",
                        confirmButtonColor: "#DD6B55",
                        // confirmButtonText: "OK",
                    });
                    window.setTimeout(function(){
                        //getProjecSubTypeDT();
                        //document.getElementById('sub-type').value = "";
                        $('#subtypemainModal').modal('hide');
                        location.reload();
                    }, 3000)

                    },
                    error: function (error) {
                    swal({
                        title: "Project type creation failed",
                        text: "Please check the missing fields!",
                        icon: "error",
                        confirmButtonColor: "#fc3",
                        confirmButtonText: "OK",
                    });
                    }

                });
    }


    function addComment() {
    // data.map((elem, i) => {
    //     console.log(elem.comment)
        var commentMade;
        commentMade = document.getElementById("Textarea2").value;
             console.log(commentMade);
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
        document.getElementById("mCSB_3_container").innerHTML = document.getElementById("mCSB_3_container").innerHTML + Commenthtml;
        document.getElementById("Textarea2").value = "";

    }

    //     var date = new Date();
    //    var formattedDate = (date.toString().slice(0, 25));
    //    document.getElementById("datee").innerHTML = formattedDate;


    //    var data = [{
    //            "id": 2,
    //            name: "Yeha",
    //            "comment": "laudantium enim ladugbo mi ncicna jnsjkd cfjaka"
    //        },
    //        {
    //            "id": 1,
    //            name: "Ya",
    //            "comment": "est natus enim nihil"
    //        },
    //    ]
    //    mapComment();


    //    function mapComment() {
    //        data.map((elem, i) => {
    //            var html = elem.id === 1 ?
    //                `<div class="m-messenger__wrapper commguy" style="padding-right: 10px; padding-left: 10px;">
    //        <div class="m-messenger__message m-messenger__message--out">

    //            <div class="m-messenger__message-body">
    //                <div class="m-messenger__message-arrow"></div>
    //                <div class="m-messenger__message-content">
    //                <div class="m-messenger__message-username">
    //                <span style="color: #0c2a7a"><strong>${elem.name}</strong></span>
    //                <span class="datee" style="float: right; color: #d0d3db;">${formattedDate}</span>

    //                    </div>
    //                    <div class="m-messenger__message-text" style="min-width: 250px; word-wrap: break-word; max-width: 440px; max-height: 4000px;">
    //                        ${elem.comment}
    //                    </div>
    //                </div>
    //            </div>
    //            <div class="m-messenger__message-pic">
    //            <img alt="" src="{{ url('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
    //        </div>
    //        </div>
    //    </div>` :
    //                `<div class="m-messenger__wrapper commguy" style="padding-right: 10px; padding-left: 10px;">
    //        <div class="m-messenger__message m-messenger__message--out">

    //            <div class="m-messenger__message-body">
    //                <div class="m-messenger__message-arrow"></div>
    //                <div class="m-messenger__message-content">
    //                <div class="m-messenger__message-username">
    //                <span style="color: #0c2a7a"><strong>${elem.name}</strong></span>
    //                <span class="datee" style="float: right; color: #d0d3db;">${formattedDate}</span>

    //                    </div>
    //                    <div class="m-messenger__message-text" style=" min-width: 250px; word-wrap: break-word; max-width: 440px; max-height: 4000px;">
    //                        ${elem.comment}
    //                    </div>
    //                </div>
    //            </div>
    //            <div class="m-messenger__message-pic">
    //                <img alt="" src="{{ url('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
    //        </div>
    //        </div>
    //    </div>`
    //                document.getElementById("mCSB_3_container").innerHTML = document.getElementById("mCSB_3_container").innerHTML + html
    //             // document.getElementById("mCSB_3_container").appendChild(html);
    //         // $( "<p>Test</p>" ).appendTo( ".inner" );

    //        })
    //    }

    //    function addComment() {
    //        var newObj = {
    //            name: "Chiamaka",
    //            comment: document.getElementById("Textarea2").value,
    //            id: 5
    //        }
    //        console.log(newObj);
    //        data.push(newObj);
    //        mapComment();
    //        document.getElementById("Textarea2").value = "";
    //    }

       function addReply(id) {
           parentComment = document.getElementById(`${id}replydiv`);
           childComment = `<div class="m-messenger__wrapper" style=" margin-top:9px; padding-right: 10px; padding-left: 10px;">
           <div class="m-messenger__message m-messenger__message--out">

               <div class="m-messenger__message-body">
                   <div class="m-messenger__message-arrow"></div>
                   <div class="m-messenger__message-content">
                   <div class="m-messenger__message-username">
                   <span style="float: left; color: #24262b;"><strong>Dammy</strong></span>
                   <span class="datee" style="float: right; color: #0c2a7a">2019-08-25 16:58:51</span>

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
                        <form id="addprojectform" enctype="multipart/form-data">
                            @csrf
                            <div class="row col-md-12">
                                <div class="col-md-6 form-group mt-3">
                                    <label>Select Client</label>
                                    <select id="client-list" name="client_id" class="form-control required">
                                        <option value="" selected></option>
                                    ` +
                                        data.clients.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                    + `
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
                                    <label for="create-project">Manager</label><br>
                                    <select id="manager_id" name="manager_id" class="form-control" style="width:100%;" required>
                                        <option value="" selected></option>
                                        ` +
                                        data.managers.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                    + `
                                    </select>
                                    <div class="error" id="managerErr"></div>
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="create-project-type">Project Type</label>
                                    <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#PModal" style="float:right;"></i>
                                    <select class="form-control" id="projtypeboy1" onchange="filterSubtype()" name="project_type_id" required>
                                        <option value="" selected></option>
                                        ` +
                                        data.project_types.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                    + `
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
                                        data.team_members.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                    + `
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
                                                data.project_types.map((elem) => `<option name="project_type_id" value="${elem.id}">${elem.name}</option>`)
                                            + `
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


                    function filterSubtype(){
                        let typeVal = document.getElementById("projtypeboy1").value;
                        $.ajax({
                            type: "GET",
                            url: "{{ url('/api/v1/project-types')}}" + '/' + typeVal,
                            success: function (data) {
                                document.getElementById('projectSubtypeId1').innerHTML = `
                                <option value="" selected></option>
                                <option value="${data.data.id}">${data.data.name}</option>

                                `
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }


                    function submitEditProjectForm(proID){
                    let formdata = $('#editProjectform').serialize();
                    console.log(formdata);
                    $.ajax({
                        type: "PUT",
                        url: '{{ url("/api/v1/projects") }}'+ '/'+ proID,
                        data: formdata,
                        success: function (data) {
                            swal({
                                title: "Success!",
                                text: "Project Edited!",
                                icon: "success",
                                confirmButtonColor: "#DD6B55",
                            });
                            window.setTimeout(function(){
                                location.reload();
                            }, 3000)

                            },
                            error: function (error) {
                            swal({
                                title: "Project Editing Failed!",
                                text: "Please check the missing fields!",
                                icon: "error",
                                confirmButtonColor: "#fc3",
                                confirmButtonText: "OK",
                            });
                            }


                    })
                }




            //  Edit Project Sub form
            var editSubData
        function editProjectSubtype(sub_id){

            $.ajax({
                        type: "GET",
                        url: "/api/v1/project-sub-types/" + sub_id,
                        success: function(data){
                            editSubData = data.data;
                            $('#projecTttype').val(editSubData.project_type_id + "");
                            $('#subTtype').val(editSubData[0].name);
                            console.log(editSubData);
                        },

                        error: function (data) {
                            console.log('Error:', data);
                        }

                    })

            $.ajax({
                type: "GET",
                url: "/api/v1/project-sub-types",
                success: function (data) {
                let editProjectSubTypeModalBody = document.getElementById('editProjectSubTypeModalBody');
                editProjectSubTypeModalBody.innerHTML = `
                <form id="editProjectSubtypeForm" enctype="multipart/form-data">
                    @csrf
                <div  class="modal-body">

                        <div class="form-group">
                            <label for="project-type">Select Project Type</label>
                            <select id="projecTttype" name="project_type_id" class="selectDesign form-control">
                                <option value = "" selected></option>
                                ${data.data.map(elem => `<option value="${elem.id}">${elem.name}</option>`)}
                            </select>
                            <div class="error" id="editProjectTTTypeErr"></div>
                        </div>

                        <div class="form-group">
                            <label for="create-task">Subtype Name</label>
                            <input type="text" class="form-control" name="name" id="subTtype" placeholder="">
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
        }

        function submitEditProjectSubtypeForm(sub_id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                type: "PUT",
                url: '{{ url("/api/v1/project-sub-types") }}' + '/' + sub_id,
                data: $('#editProjectSubtypeForm').serialize(),
                success: function (data) {

                    swal({
                        title: "Success!",
                        text: "Project sub-type updated",
                        icon: "success",
                        confirmButtonColor: "#DD6B55",
                        // confirmButtonText: "OK",
                    });
                    window.setTimeout(function(){
                        $('#subtypemainModal').modal('hide');
                        location.reload();
                    }, 3000)

                    },
                    error: function (error) {
                    swal({
                        title: "Project sub-type editing failed",
                        text: "Please check the missing fields!",
                        icon: "error",
                        confirmButtonColor: "#fc3",
                        confirmButtonText: "OK",
                    });
                    }

                });
                // error: function (error) {
                //     console.log(error);
                //     alert("Project sub-type creation failed");
                // }

        }


        // Add 2nd project Sub type Post
            function addProjectSubtypeX(){
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                type: "POST",
                url: '{{ url("/api/v1/project-sub-types") }}',
                data: $('#addprojsubtypeform2').serialize(),
                success: function (data) {

                    swal({
                        title: "Success!",
                        text: "Project sub-type created",
                        icon: "success",
                        confirmButtonColor: "#DD6B55",
                        // confirmButtonText: "OK",
                    });
                    window.setTimeout(function(){
                        //getProjecSubTypeDT();
                        //document.getElementById('sub-type').value = "";
                        $('#subtypemainModal').modal('hide');
                        location.reload();
                    }, 3000)

                    },
                    error: function (error) {
                    swal({
                        title: "Project sub-type creation failed",
                        text: "Please check the missing fields!",
                        icon: "error",
                        confirmButtonColor: "#fc3",
                        confirmButtonText: "OK",
                    });
                    }

                });
                 }



                // Add project Sub type Post
            function addProjectSubtype(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                    type: "POST",
                    url: '{{ url("/api/v1/project-sub-types") }}',
                    data: $('#addprojSubtypeform1').serialize(),
                    success: function () {
                        swal({
                            title: "Success!",
                            text: "Project sub-type created",
                            icon: "success",
                            confirmButtonColor: "#DD6B55",
                            // confirmButtonText: "OK",
                        });
                        },
                        error: function (error) {

                        swal({
                            title: "Project sub-type creation failed",
                            text: "Please check the missing fields!",
                            icon: "error",
                            confirmButtonColor: "#fc3",
                            confirmButtonText: "OK",
                        });
                        }

                    });
                    }

    // post to the create proj table
    createProject=()=>{
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                    type: "POST",
                    url: '{{ url("/api/v1/projects") }}',
                    data: $('#addprojectform').serialize(),
                    success: function (data) {

                        swal({
                            title: "Success!",
                            text: "Project Created!",
                            icon: "success",
                            confirmButtonColor: "#DD6B55",
                            // confirmButtonText: "OK",
                        });
                        window.setTimeout(function(){
                            location.reload();
                        }, 3000)

                    },
                    error: function (error) {
                        swal({
                            title: "Project Creation Failed!",
                            text: "Please check the missing fields!",
                            icon: "error",
                            confirmButtonColor: "#fc3",
                            confirmButtonText: "OK",
                        });
                    }
                    });
    }


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
                render: function (data, type, full, meta) {
                  return '\<button onclick="displayProjectInfo('+full.id+'), editProject('+full.id+')" class="btn btn-secondary dropdown-toggle" type="button" id="projectToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                            <div class="dropdown-menu" aria-labelledby="projectToolsbtn" style="padding-left:8px; min-width: 80px; max-width: 15px;">\
                            <a class="link" href="#"><i class="fa fa-eye" style="color:black;" data-toggle="modal" data-target="#moreInfoModal"><span style="font-weight:100;"> View </span></i>\
                            </a><br>\
                            <a class="link" href="#">\
                                <i class="fa fa-pencil" style="color:black;" data-toggle="modal" data-target="#editProjectModal"><span style="font-weight:100;"> Edit</span></i>\
                            </a><br>\
                            <button onclick="deleteSingleProject('+full.id+')" class="link" style="border: none; background-color: white;"><a class="link" href="#"> <i class="fa fa-trash" style="color:black; margin-left: -5px;"> Delete</i></a></button>\
                            </div>\
                                    ';
                }
    },
        ],
        });


            //  Edit Project form
        var editProjectData;
    function editProject(project_id){
        $.ajax({
                        type: "GET",
                        url: "/api/v1/projects/" + project_id,
                        success: function(data){
                            editProjectData = data.data;
                            $('#client_list').val(editProjectData.client_id + "");
                            $('#project_name').val(editProjectData.name);
                            $('#manager_id').val(editProjectData.manager_id + "");
                            $('#projtypeboy').val(editProjectData.project_type_id + "");
                            $('#project_subtype_id').val(editProjectData.project_subtype_id + "");
                            $('#startingDate').val(editProjectData.starting_date);
                            $('#Dead-line').val(editProjectData.deadline);
                            $('#teammembers').val(editProjectData.team_members);
                            console.log(editProjectData);
                        },

                        error: function (data) {
                            console.log('Error:', data);
                        }

                    })

                $.ajax({
                    type: "GET",
                    url: "/api/v1/project_create",
                    success: function(data){
                        var projData = data;
                    let editProjectBody = document.getElementById('editProjectBody');
                        editProjectBody.innerHTML = `
                        <div class="col-md-12 ">
                                        <form id="editProjectform" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row col-md-12">
                                                <div class="col-md-6 form-group mt-3">
                                                    <label>Select Client</label>
                                                    <select id="client_list" name="client_id" class="selectDesign form-control required">
                                                        ` +
                                                        projData.clients.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                                    + `
                                                    </select>
                                                    <div class="error" id="editClientErr"></div>
                                                </div>

                                                <div class="col-md-6 form-group mt-3">
                                                        <label for="create-project">Project Name</label>
                                                    <input type="text" name="name" class="form-control" id="project_name" placeholder="" required>
                                                    <div class="error" id="editNameErr"></div>
                                                </div>
                                            </div>
                                            <div class="row col-md-12">
                                                <div class="col-md-4 form-group mt-3">
                                                    <label for="create-project">Manager</label><br>
                                                    <select id ="managerId" name="manager_id" class="form-control select2" style="width:100%;" required>
                                                        ` +
                                                        projData.managers.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                                    + `
                                                    </select>
                                                    <div class="error" id="editManagerErr"></div>
                                                </div>
                                                <div class="col-md-4 form-group mt-3">
                                                    <label for="create-project-type">Project Type</label>
                                                    <select class="form-control" id="projtypeboy" name="project_type_id" required>
                                                        ` +
                                                        projData.project_types.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                                    + `
                                                    </select>
                                                    <div class="error" id="editProjTypeErr"></div>
                                                </div>

                                                <div class="col-md-4 form-group mt-3">
                                                    <label for="exampleFormControlSelect1">Project Sub-type</label>
                                                    <select class="form-control" id="project_subtype_id" name="project_subtype_id" required>
                                                        ` +
                                                        projData.project_subtypes.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                                    + `
                                                    </select>
                                                    <div class="error" id="editProjSubErr"></div>
                                                </div>
                                            </div>
                                            <div class="row col-md-12 ">
                                                <div class="col-md-3 form-group">
                                                    <label for="starting-date">Start Date</label>
                                                    <input type="text" class="form-control date" name="starting_date" id="startingDate" required>
                                                    <div class="error" id="editStartErr"></div>
                                                </div>

                                                <div class="col-md-3 form-group">
                                                    <label for="Deadline">Deadline</label>
                                                    <input type="text" class="form-control datetime" name="deadline" id="Dead-line" required>
                                                    <div class="error" id="editEndErr"></div>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Team members</label><br>
                                                    <select multiple="multiple" class="form-control select2" id="teammembers" name="team_members[]" style="width:100%;"required>
                                                        ` +
                                                        projData.team_members.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                                    + `
                                                    </select>
                                                    <div class="error" id="editMembersErr"></div>
                                                </div>


                                                <div class="col-md-2 form-group mt-3">
                                                    <input class="btn btn-danger" type="button" style="background-color:#8a2a2b; color:white;" onclick="validateEditProjectForm(${project_id});" value="Update">
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


        @parent
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


            // Function for rendering the more info modal
        function displayProjectInfo(proID) {
            $.ajax({
            type: "GET",
            url: "/api/v1/projects/" + proID,
            success: function (data) {
                let moreInfo = document.getElementById("moreInfo")
                moreInfo.innerHTML = `<div class="modal fade" id="moreInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                `+ data.data.documents.map(item =>
                                                    `<tr>
                                                        <td></td>
                                                        <td>${item.name}</td>
                                                        <td>${item.version}</td>
                                                        <td>${item.created_at}</td>
                                                        <td></td>
                                                    </tr>`
                                                ) +`
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="$('#documentModal').modal('hide');">Close</button>
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
                                                    <th>#</th>
                                                    <th>Report</th>
                                                    <th>Date Created</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                `+ data.data.reports.map(item =>
                                                    `<tr>
                                                        <td></td>
                                                        <td>${item.project_report}</td>
                                                        <td>${item.created_at}</td>
                                                    </tr>`
                                                ) +`
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="$('#projectreportModal').modal('hide');">Close</button>
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
                            <form id="addprojectform" enctype="multipart/form-data">
                                 @csrf
                            <div class=" row col-md-12">
                                <div class="col-md-12 form-group mt-3">
                                    <label for="exampleFormControlTextarea1">Project Report</label>
                                    <textarea class="form-control" id="project_report" name="project_report" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-6 form-group mt-3">
                                    <input type="hidden" value="${data.data.reports.client_id}" name="client_id" id="client" class="form-control" id="address" placeholder="">
                                </div>
                                <div class="col-md-6 form-group mt-3">
                                    <input type="hidden" value="${data.data.reports.project_id}" name="project_id" id="project" class="form-control" id="address" placeholder="">
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
                                            <input type="button" onclick="submitProjectReport()" class="btn btn-block" style="background-color:#8a2a2b; color:white;">

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
                        <form enctype="multipart/form-data">
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
                                        <input style="background: #f1f1f1" type="file" name="files[]" multiple />
                                    </div>

                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input id ="project-list" name="project_id" value="${data.data.id}" type="hidden">
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

        function submitProjectReport(){
            $.ajax({
                type: "POST",
                url: "/api/v1/project-reports",
                success: function (data) {

                    swal({
                        title: "Success!",
                        text: "Project Report Submitted!",
                        icon: "success",
                        confirmButtonColor: "#DD6B55",
                        // confirmButtonText: "OK",
                    });
                    window.setTimeout(function(){
                        location.reload();
                    }, 3000)

                    },
                    error: function (error) {
                    swal({
                        title: "Project Report Wasn't Created!",
                        icon: "error",
                        confirmButtonColor: "#fc3",
                        confirmButtonText: "OK",
                    });
                    }
            });
        }

        function submitProjectDoc(){
            $.ajax({
                type: "POST",
                url: "/api/v1/documents",
                success: function (data) {

                    swal({
                        title: "Success!",
                        text: "Project document submitted!",
                        icon: "success",
                        confirmButtonColor: "#DD6B55",
                        // confirmButtonText: "OK",
                    });
                    window.setTimeout(function(){
                        location.reload();
                    }, 3000)

                    },
                    error: function (error) {
                    swal({
                        title: "Project document wasn't created!",
                        icon: "error",
                        confirmButtonColor: "#fc3",
                        confirmButtonText: "OK",
                    });
                    }
            });
        }


        function projectComments(project_id){
                $.ajax({
                    type: "GET",
                    url: "{{ url('/api/v1/projects') }}"+ '/'+project_id,
                    success: function (data) {
                        let commentbody = document.getElementById('commentModal');
                        // let probSubtypeBody = document.getElementById('subtypeModalBody');
                        commentbody.innerHTML = `
        <div class="modal-dialog modal-dialog-centered" id="commentPage" style="overflow-y:hidden; height:99vh; min-height: 70vh; max-width: 98vw; min-width: 70vw; overflow:hidden;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Project Comments</h5>
                  <button type="button" class="close" onclick="$('#commentPage').modal('hide');" aria-label="Close">
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
                                                                    <div class="modal-body">
                                                                        <textarea class="form-control " id="Textarea2" rows="4 " required></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" id="closeModal" class="m-btn--pill btn btn-secondary" onclick="$('#makecommentModal').modal('hide');">Close</button>
                                                                        <button type="button" class="m-btn--pill btn btn-primary" class="" onclick="addComment(), $('#makecommentModal').modal('hide')">Comment</button>
                                                                    </div>
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
        </div>`
                    }
                });
            }


        function documentDTCall(project_id){
            $(document).ready(function() {
                $('#kt_table_single_project_documents').DataTable();
            } );
        }


        function reportDTCall(project_id){
            $(document).ready(function() {
                $('#kt_table_single_project_reports').DataTable();
            } );
        }



        function taskDTCall(project_id){
            path_url = "/api/v1/projects_tasks/" + project_id;

              // Simple Project Tasks DT
            if ( $.fn.dataTable.isDataTable( '#kt_table_single_project_task') ) {
                let kt_table_single_project_task = $('#kt_table_single_project_task').DataTable();
            }else {
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
                    'excel', 'pdf', 'print'
                ]
            });
            }

        }


            // Delete Project Function

        function deleteSingleProject(proID){
            swal({
                title: "Are you sure?",
                text: "This Project will be deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('api/v1/projects')}}" + '/' + proID,
                        success: function (data) {
                            swal("Deleted!", "Project successfully deleted.", "success");
                            window.setTimeout(function(){
                                location.reload();
                            } , 2500);
                        },

                        error: function (data) {
                            swal("Delete failed", "Please try again", "error");
                        }

                        });
                        }

                else {
                        swal("Cancelled", "Delete cancelled", "error");
                    }

                });
            }


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
                    render: function (data, type, full, meta) {
                        return '\<button class="btn btn-secondary dropdown-toggle" onclick="editProjectType('+full.id+')" type="button" id="taskToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                <div class="dropdown-menu" aria-labelledby="taskToolsbtn" style="padding-left:8px; min-width: 80px; max-width: 15px;">\
                                <a class="link" href="#">\
                                    <i class="fa fa-pencil" data-toggle="modal" data-target="#EditProjectTypeModal" style="color:black;"><span style="font-weight:100;"> Edit</span></i>\
                                </a>\
                                <button onclick="deleteProjectType('+full.id+')" class="link" style="border: none; background-color: white;"><a class="link" href="#"> <i class="fa fa-trash" style="color:black; margin-left: -5px;"> Delete</i></a></button>\
                                </div>\
                            ';
                    }
        }],
                });
                    }
            };



            //          Function for deleting single project

        function deleteProjectType(proID){
            swal({
                title: "Are you sure?",
                text: "This project type will be deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('api/v1/project-types')}}" + '/' + proID,
                        success: function (data) {
                            swal("Deleted!", "Project type successfully deleted.", "success");
                            window.setTimeout(function(){
                                location.reload();
                            } , 2500);
                        },

                        error: function (data) {
                            swal("Delete failed", "Please try again", "error");
                        }

                        });
                        }

                else {
                        swal("Cancelled", "Delete cancelled", "error");
                    }

                });
            }

         //Edit Project Type
            var editProjectTypeData;
            function editProjectType(type_id){
                console.log(type_id)
            $.ajax({
                type: "GET",
                url: "/api/v1/project-types" + "/" + type_id,
                success: function(data){
                    console.log(data);
                    editProjectTypeData = data.data;
                    $('#editprojTypeInput').val(editProjectTypeData.name);
                },

                error: function(data){
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="$('#EditProjectTypeModal').modal('hide');">Close</button>
                        <input class="btn btn-danger" type="button" style="background-color:#8a2a2b; color:white;" onclick="submitEditProjectType(${type_id})" value="Update">
                    </div>
                </form>
                `
        }

        function submitEditProjectType(typeId){
            $.ajax({
                    type: "PUT",
                    data: $('#editProtypeform').serialize(),
                    url: "/api/v1/project-types" + "/" + typeId,
                    success: function (data) {
                        swal({
                            title: "Success!",
                            text: "Project type edited!",
                            icon: "success",
                            confirmButtonColor: "#DD6B55",
                        });
                        window.setTimeout(function(){
                            location.reload();
                        }, 3000)

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
                render: function (data, type, full, meta) {
                    return '\<button class="btn btn-secondary dropdown-toggle" type="button" id="taskToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                            <div class="dropdown-menu" aria-labelledby="taskToolsbtn" style="padding-left:8px; min-width: 80px; max-width: 15px;">\
                            <a class="link" href="#">\
                                <i class="fa fa-pencil" data-toggle="modal" onclick="editProjectSubtype('+full.id+')" data-target="#editProjectSubTypeModal" style="color:black;"><span style="font-weight:100;"> Edit</span></i>\
                            </a>\
                            <button onclick="deleteProjectSubType('+full.id+')" class="link" style="border: none; background-color: white;"><a class="link" href="#"> <i class="fa fa-trash" style="color:black; margin-left: -5px;"> Delete</i></a></button>\
                            </div>\
                            ';
                }
    }],
                });
                    }
            };


            //          Function for deleting single project subtype

        function deleteProjectSubType(proID){
            swal({
                title: "Are you sure?",
                text: "This Project subtype will be deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('api/v1/project-sub-types') }}" + '/' + proID,
                        success: function (data) {
                            swal("Deleted!", "Project subtype successfully deleted.", "success");
                            window.setTimeout(function(){
                                location.reload();
                            } , 2500);
                        },

                        error: function (data) {
                            swal("Delete failed", "Please try again", "error");
                        }

                        });
                        }

                else {
                        swal("Cancelled", "Delete cancelled", "error");
                    }

                });
            }


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
               function addProject(){
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
                        window.setTimeout(function(){
                            $('#AddProjecModalla').modal('hide');
                            document.getElementById('projTypeId').value = "";
                            getProjetTypeDT();
                            location.reload();
                        }, 2000)

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

            function printError(elemId, hintMsg) {
          document.getElementById(elemId).innerHTML = hintMsg;
        }

//    function validateCreateProjectForm() {
//     // Retrieving the values of form elements
//     let clientlist = $('#client-list').val();
//     let projectSublist = $('#projectSubtypeId1').val();
//     let projTypelist = $('#projtypeboy1').val();
//     let projectName = $('#create-project').val();
//     let manager = $('#manager_id').val();
//     let teamMembers = $('#teammembers').val();
//     let startDate = $('#starting-date').val();
//     let deadline = $('#Deadline').val();


// 	// Defining error variables with a default value
//     var clientErr = projTypeErr = projSubErr = nameErr = managerErr = membersErr = startErr = endErr = true;

//      // Validate client
//      if(clientlist == "") {
//         printError("clientErr", "Please select a client");
//     } else {
//         printError("clientErr", "");
//         clientErr = false;
//     }
//     // Validate project
//     if(projTypelist == "") {
//             printError("projTypeErr", "Please select a project type");
//         } else {
//             printError("projTypeErr", "");
//             projTypeErr = false;
//         }
//     // Validate project sub
//     if(projectSublist == "") {
//            printError("projSubErr", "Please select a project subtype");
//        } else {
//            printError("projSubErr", "");
//            projSubErr = false;
//        }

//     // Validate name

//     if(projectName == "") {
//         printError("nameErr", "Please input a project name");
//     } else {
//         var regex = /^[a-zA-Z\s]+$/;
//         if(regex.test(projectName) === false) {
//             printError("nameErr", "Please input a valid project name");
//         }
//         else {
//             printError("nameErr", "");
//             nameErr = false;
//         }
//     }

//     if(projectName){
//         projectName = projectName.toUpperCase();
//             $.ajax({
//                 type: "GET",
//                 url: "/api/v1/projects",
//                 success: function (data) {
//                 for(let i=0; i<data.data.length; i++){
//                     if(data.data[i].name.toUpperCase() ==projectName){
//                         printError("nameErr", "Project name already exists");
//                         nameErr = true;
//                     }
//                 }
//                 },

//                 error: function (data) {

//                 }

//             })
//         }else {
//             printError("nameErr", "");
//             nameErr = false;
//         }

//     // Validate task manager
//     if(manager == "") {
//             printError("managerErr", "Select a manager");
//         } else {
//             printError("managerErr", "");
//             managerErr = false;
//         }

//     // Validate members
//     if(teamMembers == "") {
//             printError("membersErr", "Please select a member");
//         } else {
//             printError("membersErr", "");
//             membersErr = false;
//         }

//     // Validate start date
//     if(startDate == "") {
//             printError("startErr", "Pick a date");
//         } else {
//             printError("startErr", "");
//             startErr = false;
//         }


//     // Validate deadline
//     if(deadline == "") {
//             printError("endErr", "Pick a date");
//         } else {
//             printError("endErr", "");
//             endErr = false;
//         }


//     // Prevent the form from being submitted if there are any errors

//     if((clientErr || projTypeErr || projSubErr || nameErr || managerErr || membersErr|| startErr || endErr) == true) {
//        return false;
//     } else {

//         createProject();
//     }
// };
    </script>

       @endsection
