@extends('layouts.inner')

@section('title', 'Task')

@section('header', 'Task Management')

@section('sub_header', 'Tasks')
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
</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="m-portlet " id="m_portlet" style="width:97%;">
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
                                <a class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" id="taskCategoryId" data-toggle="modal" data-target="#taskcategoryDatatable">
                                        <span onclick="getTaskCategoryAjaxDT()">
                                                <span>
                                                    Task Category
                                                </span>
                                        </span>
                                    </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body" style="overflow-x:auto; table-responsive">
                    <table id="kt_table_task" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Project</th>
                                <th>Name</th>
                                <th>Manager</th>
                                <th>Status</th>
                                <th>Members</th>
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
                                            <a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" style="color:white; background-color: #8a2a2b;" data-toggle="modal" data-target="#addTaskCategory">
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
                                            <th>#</th>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="$('#taskcategoryDatatable').modal('hide');">Close</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- End Task category datatable modal --}}


    <!-- More Info Modal -->
    <div id="moreInfo">
        {{-- <div class="modal fade" id="moretaskInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 500px;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" onclick="$('#moretaskInfoModal').modal('hide');" aria-label="Close">
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
                                                    <i class="flaticon-list-2"> </i>
                                                </span>
                                        <h3 class="m-portlet__head-text">
                                            'Taskname' info
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item">

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <div class="accordion" id="taskAccordion">
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h6 class="mb-0">
                                                <span data-toggle="modal" data-target="#taskDocumentModal">
                                                                <i class="m-menu__link-icon flaticon-clipboard"></i>
                                                                Documents
                                                        </span>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h6 class="mb-0">
                                                <span data-toggle="modal" data-target="#taskReportModal">
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
                        </div>
                        <!--end::Portlet-->


                            <!-- End main Content of More-info -->

                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div> --}}
        </div>
    <!-- End More Info Modal -->

    <!-- Comment Modal -->
    {{-- <div class="modal fade" id="commentModal" tabindex="-1" style="overflow:hidden;" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="overflow-y:hidden; height:99vh; min-height: 70vh; max-width: 98vw; min-width: 70vw; overflow:hidden;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Task Comments</h5>
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
                                                                Task Name
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
                                                        <div id="mCSB_3_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
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
                                                                            <div class="m-messenger__message-text" id="comContent" style="  max-width: 440px; max-height: 4000px; display: flex; flex-direction: column;
                                                                                        ">
                                                                                Hi Ayo. What time will be the meeting ? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel a ratione unde veritatis hic quidem totam quas, minima officiis ab sapiente necessitatibus doloribus vitae nesciunt atque deserunt.
                                                                                <br/>
                                                                                <div id="replydiv" style="width: 80%; flex-wrap: wrap; padding-bottom:5px; align-self: flex-end; text-align: right;">
                                                                                </div>
                                                                                <br>
                                                                                <i class="fa fa-reply" data-toggle="collapse" id="kkk" aria-hidden="true" data-target="#collapseReply" aria-expanded="false" aria-controls="collapseReply" style="display:flex; justify-content: flex-end;"></i>

                                                                                <div class="collapse" id="collapseReply">
                                                                                    <br>
                                                                                    <textarea class="form-control" name="replytext" id="replyTextId" rows="1" style="width: 100%" required></textarea>
                                                                                    <button type="submit" class="btn btn-primary" onclick="addReply()" style="margin-top: 5px; float: right;">Reply</button>
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
                                                        <!-- Modal -->
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
                                                                        <button type="button" id="closeModal" class="btn btn-secondary" onclick="$('#makecommentModal').modal('hide');">Close</button>
                                                                        <button type="button" class="btn btn-primary" class="" onclick="addComment(), $('#makecommentModal').modal('hide');">Comment</button>
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
                    </form>

                </div>
            </div>
        </div>
    </div> --}}
    {{--end comment--}}

    {{-- Task status datatable modal --}}
    <div class="modal fade" id="taskstatusDatatable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:70%; min-width:400px;">
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
                                        <th>#</th>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="$('#taskstatusDatatable').modal('hide');">Close</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- End Task category datatable modal --}}


    {{-- documentDTModal --}}
    {{-- <div class="modal fade" id="taskDocumentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 65%; min-width: 500px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="documentModalLongTitle">Task documents</h5>
                    <button type="button" class="close" onclick="$('#taskDocumentModal').modal('hide');" aria-label="Close">
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
                                        Task documents
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <a style="color:white; background-color: #8a2a2b;" data-toggle="modal" data-target="#addDocumentModal" class="btn m-btn--icon m-btn--pill">
                                            <span data-toggle="modal" data-target="#addDocumentModal">
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
                            <table id="kt_table_documents" class="table table-striped table-hover">
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

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end::Portlet-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#taskDocumentModal').modal('hide');">Close</button>
                </div>
            </div>
        </div>
        </div> --}}
    {{-- endDocumentDTModal --}}

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

    {{-- taskReport DT Modal --}}
    {{-- <div class="modal fade" id="taskReportModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="documentModalLongTitle">Task reports</h5>
                    <button type="button" class="close" onclick="$('#taskReportModal').modal('hide');" aria-label="Close">
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
                                            <span data-toggle="modal" data-target="#addTaskReportModal" aria-expanded="false" aria-controls="">
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
                            <table id="kt_table_reports" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Client</th>
                                        <th>Name</th>
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
                    <button type="button" class="btn btn-secondary" onclick="$('#taskReportModal').modal('hide');">Close</button>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- endtaskReport DT tModal --}}

    {{-- Add task report Modal --}}
    <div class="modal fade" id="addTaskReportModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 60%; min-width: 500px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="documentModalLongTitle">Add Report</h5>
                    <button type="button" class="close" onclick="$('#addTaskReportModal').modal('hide');" aria-label="Close">
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
                                        <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />

                                    </div>

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
                </div>
            </div>
        </div>
    </div>
    {{-- end Addtaskreport Modal --}}

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
                <div class="modal-body">
                    <form>
                        <div class="col-md-12 row">
                            <div class="col-md-6 form-group mt-3">
                                <label>Name</label>
                                <input type="text" class="form-control" id="category-name" placeholder="">
                            </div>

                            <div class="col-md-6 form-group mt-3">
                                <label>Project Type</label>
                                <select id="projectTypeList" class="selectDesign form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                                <div class="col-md-6 form-group mt-3">
                                    <label>Sub Category</label>
                                    <select id="subCategory" class="selectDesign form-control"></select>
                                </div>

                                <div class="col-md-6 form-group mt-3">
                                    <label>Weight</label>
                                    <input type="text" class="form-control" id="weightId" placeholder="">
                                </div>
                        </div>
                        <div class=" row col-md-12">
                            <div class="col-md-12 form-group mt-3">
                                <label for="exampleFormControlTextarea1">Desciption</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3 form-group mt-2">
                            <button type="submit" class="btn btn-block center-block" style="background-color:#8a2a2b; color:white;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    {{-- end Task Category Modal --}}

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
                <form id="addStatusform" action="{{ route("admin.project-types.store") }}"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="statusInput" name="name" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="$('#AddStatus').modal('hide');" >Close</button>
                        <button type="submit" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    <!--End modalled projType Modal -->

@endsection
@section('javascript')
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

        {{-- projectcomment js --}}
        <script>
                var date = new Date();
            var formattedDate = (date.toString().slice(0, 25));
            document.getElementById("datee").innerHTML = formattedDate;


            var data = [{
                    "id": 2,
                    name: "Yeha",
                    date: "12/2/2000",
                    "comment": "laudantium enim ladugbo mi ncicna jnsjkd cfjaka"
                },
                {
                    "id": 1,
                    name: "Ya",
                    date: "2/3/2019",
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
                            <div class="m-messenger__message-text" style="  min-width: 250px; max-width: 440px; max-height: 4000px;">
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
                            <div class="m-messenger__message-text" style=" min-width: 250px; max-width: 440px; max-height: 4000px;">
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
                    id: 5,
                    date: "12/3/1990"
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

                            <div class="m-messenger__message-text" style="min-width: 250px; max-width: 300px; max-height: 4000px;">
                            <p> </br>
                            <spans style="width: 250px"> ${document.getElementById("replyTextId").value} </span>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#kt_table_task').DataTable({
                ajax: "{{ url('/api/v1/tasks') }}",
                columns: [
                    { defaultContent : "" },
                    { "data": "client.name" },
                    { "data": "project.name" },
                    { "data": "name" },
                    { "data": "manager.name" },
                    { "data": "status.name" },
                    { "data": "assinged_tos[, ].name" },
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
                    return '\<button onclick="displayTaskInfo('+full.id+')" class="btn btn-secondary dropdown-toggle" type="button" id="taskToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                            <div class="dropdown-menu" aria-labelledby="taskToolsbtn" style="padding-left:8px; min-width: 100px; max-width: 15px;">\
                                            <a class="link" href="#"><i class="fas fa-eye" style="color:black;" data-toggle="modal"   data-target="#moretaskInfoModal"> </i>\
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



            function getTaskCategoryAjaxDT(){
                if ( $.fn.dataTable.isDataTable( '#kt_table_task_status') ) {
                    var kt_table_task_category = $('#kt_table_task_category').DataTable();
                }else {
                    var kt_table_task_category = $('#kt_table_task_category').DataTable({
                        ajax: "{{ url('/api/v1/tast-categories') }}",
                        columns: [
                            { defaultContent : "" },
                            { "data": "name" },
                            { "data": "project_type_id" },
                            { "data": "sub_category_id" },
                            { "data": "weight" },
                            { "data": "Description" }
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
                            render: function () {
                            return '\<button class="btn btn-secondary dropdown-toggle" type="button" id="taskcategoryToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                        <div class="dropdown-menu" aria-labelledby="taskcategoryToolsbtn" style="padding-left:8px; min-width: 60px; max-width: 15px;">\
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
                    },
                    ],
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
                            render: function () {
                            return '\<button class="btn btn-secondary dropdown-toggle" type="button" id="taskcategoryToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                                    <div class="dropdown-menu" aria-labelledby="taskcategoryToolsbtn" style="padding-left:8px; min-width: 60px; max-width: 15px;">\
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
                    },

                    ],
                    });

                }
            }

            function displayTaskInfo(task_id) {
                $.ajax({
                    type: "GET",
                    url: "/api/v1/tasks/" + task_id,
                    success: function (data) {
                        let moreInfo = document.getElementById("moreInfo")
                        moreInfo.innerHTML = `<div class="modal fade" id="moretaskInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 500px;" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" onclick="$('#moretaskInfoModal').modal('hide');" aria-label="Close">
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
                                                                <i class="flaticon-list-2"> </i>
                                                            </span>
                                                    <h3 class="m-portlet__head-text">
                                                        ${data.data.name} Info
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="m-portlet__head-tools">
                                                <ul class="m-portlet__nav">
                                                    <li class="m-portlet__nav-item">

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="m-portlet__body">
                                            <div class="accordion" id="taskAccordion">
                                                <div onclick="documentDTCall(${data.data.id})" class="card">
                                                    <div class="card-header" id="headingTwo">
                                                        <h6 class="mb-0">
                                                            <span data-toggle="modal" data-target="#taskDocumentModal">
                                                                            <i class="m-menu__link-icon flaticon-clipboard"></i>
                                                                            Documents
                                                                    </span>
                                                        </h6>
                                                    </div>
                                                </div>

                                                <div onclick="reportDTCall(${data.data.id})" class="card">
                                                    <div class="card-header" id="headingThree">
                                                        <h6 class="mb-0">
                                                            <span data-toggle="modal" data-target="#taskReportModal">
                                                                                <i class="m-menu__link-icon flaticon-file"></i>
                                                                                Report
                                                                        </span>
                                                        </h6>
                                                    </div>
                                                </div>

                                                <div onclick="commentDTCall(${data.data.id})" class="card">
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



                    <div class="modal fade" id="taskDocumentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 65%; min-width: 500px;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="documentModalLongTitle">Task documents</h5>
                                <button type="button" class="close" onclick="$('#taskDocumentModal').modal('hide');" aria-label="Close">
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
                                                    ${data.data.name} documents
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                            <ul class="m-portlet__nav">
                                                <li class="m-portlet__nav-item">
                                                    <a style="color:white; background-color: #8a2a2b;" data-toggle="modal" data-target="#addDocumentModal" class="btn m-btn--icon m-btn--pill">
                                                        <span data-toggle="modal" data-target="#addDocumentModal">
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
                                    <div style="width=100%" class="m-portlet__body">
                                        <table id="kt_table_single_task_documents" style="width=100%" class="table table-striped table-hover">
                                            <thead >
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>File</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!--end::Portlet-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="$('#taskDocumentModal').modal('hide');">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="taskReportModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 70%;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="documentModalLongTitle">${data.data.name} reports</h5>
                                <button type="button" class="close" onclick="$('#taskReportModal').modal('hide');" aria-label="Close">
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
                                                        <span data-toggle="modal" data-target="#addTaskReportModal" aria-expanded="false" aria-controls="">
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
                                        <table id="kt_table_single_task_reports" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Name</th>
                                                    <th>Date Created</th>
                                                    <th>Document Type</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!--end::Portlet-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="$('#taskReportModal').modal('hide');">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Comment Modal -->
    <div class="modal fade" id="commentModal" tabindex="-1" style="overflow:hidden;" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="overflow-y:hidden; height:99vh; min-height: 70vh; max-width: 98vw; min-width: 70vw; overflow:hidden;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Task Comments</h5>
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
                                                                Task Name
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
                                                                                    <span class="secondary"><strong>Tomiwa wrote</strong></span>
                                                                                    <span id="datee" style="float: right;"></span>
                                                                                </div>
                                                                                <div class="m-messenger__message-text" id="comContent" style="  max-width: 440px; min-height:50px; max-height: 4000px; display: flex; flex-direction: column;
                                                                                            ">
                                                                                                ${elem.comments}
                                                                                    <br/>
                                                                                    <div id="replydiv" style="width: 80%; flex-wrap: wrap; padding-bottom:5px; align-self: flex-end; text-align: right;">
                                                                                    </div>
                                                                                    <br>
                                                                                <i class="fa fa-reply" data-toggle="collapse" id="kkk" aria-hidden="true" data-target="#collapseReply" aria-expanded="false" aria-controls="collapseReply" style="display:flex; justify-content: flex-end;"></i>

                                                                                <div class="collapse" id="collapseReply">
                                                                                    <br>
                                                                                    <textarea class="form-control" name="replytext" id="replyTextId" rows="1" style="width: 100%" required></textarea>
                                                                                    <button type="submit" class="btn btn-primary" onclick="addReply()" style="margin-top: 5px; float: right;">Reply</button>
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
                                                        <!-- Modal -->
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
                                                                        <button type="button" id="closeModal" class="btn btn-secondary" onclick="$('#makecommentModal').modal('hide');">Close</button>
                                                                        <button type="button" class="btn btn-primary" class="" onclick="addComment(), $('#makecommentModal').modal('hide');">Comment</button>
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

            function documentDTCall(task_id){
                path_url = "/api/v1/tasks_documents/" + task_id;

                // Single Projects Document DT
                if ( $.fn.dataTable.isDataTable( '#kt_table_single_task_documents') ) {
                    let kt_table_single_task_documents = $('#kt_table_single_task_documents').DataTable();
                }else {
                    let kt_table_single_task_documents = $('#kt_table_single_task_documents').DataTable({
                    dom: 'lBfrtip<"actions">',
                    language: {
                        url: languages. {{ app()->getLocale() }}
                    },

                    ajax: path_url,
                            
                    columns: [
                        {"defaultContent": ""},
                        {"data": "documents.name"},
                        {"data": "documents.type"},
                        {"data": "documents.file"},
                    ],
                    });
                }
            }

            function reportDTCall(task_id){
                path_url = "/api/v1/tasks_documents/" + task_id;

                // Single Projects Document DT
                if ( $.fn.dataTable.isDataTable( '#kt_table_single_task_reports') ) {
                    let kt_table_single_task_reports = $('#kt_table_single_task_reports').DataTable();
                }else {
                    let kt_table_single_task_reports = $('#kt_table_single_task_reports').DataTable({
                    dom: 'lBfrtip<"actions">',
                    language: {
                        url: languages. {{ app()->getLocale() }}
                    },

                    ajax: path_url,
                            
                    columns: [
                        {"defaultContent": ""},
                        {"data": "reports.name"},
                        {"data": "reports.created_at"},
                        {"data": "reports.document_type"},
                    ],
                    });
                }
            }

            function taskComments(task_id){
                // Task Comments Scripts Goes Here
            }
            
            let createTask = document.getElementById('addTaskId');
            createTask.addEventListener("click", displayAddTask);

            function displayAddTask(){
            $("#createTaskModal").modal('show');
                $.ajax({
                    type: "GET",
                    url: '{{ url("/api/v1/create_task") }}',
                    success: function (data) {
                        let createTaskBody = document.getElementById('createTaskBody');
                        // let probSubtypeBody = document.getElementById('subtypeModalBody');
                        createTaskBody.innerHTML = `
                    <div class="modal-body">
                        <form id="addTaskform" action="{{ url('/api/v1/tasks') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="client-list">Select Client</label>
                                            <select id="client-list" name="client_id" class="selectDesign form-control">
                                                    ${Object.keys(data.data.clients).map((key, index) => `<option value="${key}">${data.data.clients[key]}</option>`)}
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Select Project</label>
                                            <select id="project-list" name="project_id" class="selectDesign form-control">
                                                ${Object.keys(data.data.projects).map((key, index) => `<option value="${key}">${data.data.projects[key]}</option>`)}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Select Project Subtype</label>
                                            <select id="project-subtype-list" name="project_subtype_id" class="selectDesign form-control">
                                                ${Object.keys(data.data.projects_sub_type).map((key, index) => `<option value="${key}">${data.data.projects_sub_type[key]}</option>`)}
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="create-task">Task Name</label>
                                            <input type="text" name="name" class="form-control" value="" id="create-task" placeholder="Enter Task Name" required>
                                        </div>

                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label>Task Category</label>
                                            <select id="task-category" name="category_id" class="selectDesign form-control">
                                                ${Object.keys(data.data.categories).map((key, index) => `<option value="${key}">${data.data.categories[key]}</option>`)}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="assign-task">Assign task to</label>
                                                <br>
                                            <select style="width: 100%" name="assinged_tos" id="assign-task" multiple="multiple" required class="form-control select2">
                                                ${Object.keys(data.data.assinged_tos).map((key, index) => `<option value="${key}">${data.data.assinged_tos[key]}</option>`)}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label>Select Manager</label>
                                            <select id="manager" name="manager_id" class="selectDesign form-control">
                                                ${Object.keys(data.data.managers).map((key, index) => `<option value="${key}">${data.data.managers[key]}</option>`)}
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="starting-date">Starting Date</label>
                                            <input type="date" name="starting_date" class="form-control" value="" id="starting-date" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="deadline">Deadline</label>
                                            <input type="date" name="ending_date" class="form-control" value="" id="deadline" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label>Task Status</label>
                                            <select id="task-status" name="status_id" class="selectDesign form-control">
                                                ${Object.keys(data.data.statuses).map((key, index) => `<option value="${key}" >${data.data.statuses[key]}</option>`)}
                                                </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add Task</button>
                                </div>
                            </form>

                        </div>
                        `
                    }
                });
            }
        // post to the create Task table
            $(document).ready(function(){
                $('#addTaskform').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                type: "POST",
                url: '{{ url("/api/v1/tasks") }}',
                data: $('#addTaskform').serialize(),
                success: function (response) {
                    console.log(response)
                    $('#createTaskModal').modal('hide');
                    alert("Task successfully created");
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                    alert("Task creation failed");
                }
                });
                });
                });

        
            
    </script>


@endsection
