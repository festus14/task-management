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
    <div id="moreInfo">
        {{-- <div class="modal fade" id="moreInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        </div> --}}
            
        <!-- End More Info Modal -->

        {{-- documentDTModal --}}
            {{-- <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            </div> --}}
        {{-- endDocumentDTModal --}} 

        {{-- report DT Modal --}}
            {{-- <div class="modal fade" id="projectreportModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
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
            </div> --}}
        {{-- endreport DT tModal --}}

        {{-- Add report Modal --}}
            {{-- <div class="modal fade" id="addReportModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
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
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
        {{-- end Addreport Modal --}}

<!-- Add Document Modal -->
    {{-- <div class="modal fade" id="addDocumentModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
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
    </div> --}}
<!-- End Add Document Modal -->

<!-- Comment Modal -->
    {{-- <div class="modal fade" id="commentModal" tabindex="-1" style="overflow:hidden;" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
    </div> --}}
<!-- endComment Modal -->

    </div>



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
                    return '\<button class="btn btn-secondary dropdown-toggle" type="button" id="taskToolsbtns" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                        <div class="dropdown-menu" aria-labelledby="taskToolsbtn" style="padding-left:8px; min-width: 100px; max-width: 15px;">\
                                        <a class="link" href="#"><i class="fas fa-eye" style="color:black;" data-toggle="modal" onclick='+displayProjectInfo(full.id)+' id="innerDropdown" data-target="#moreInfoModal"> </i>\
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
                            <div onclick="taskDTCall(${data.data.id})" class="card">
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
                                            <table id="kt_table_single_project_task">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Starting Date</th>
                                                        <th>Deadline</th>
                                                        <th>Category</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div onclick="documentDTCall(${data.data.id})" class="card-header" id="headingTwo">
                                    <h6 class="mb-0">
                                        <span data-toggle="modal" data-target="#documentModal">
                                            <i class="m-menu__link-icon flaticon-clipboard"></i>
                                            Documents
                                        </span>
                                    </h6>
                                </div>
                            </div>

                            <div class="card">
                                <div onclick="reportDTCall(${data.data.id})" class="card-header" id="headingThree">
                                    <h6 class="mb-0">
                                        <span data-toggle="modal" data-target="#projectreportModal">
                                                                <i class="m-menu__link-icon flaticon-file"></i>
                                                                Report
                                                        </span>
                                    </h6>
                                </div>
                            </div>

                            <div class="card">
                                <div onclick="projectComments(${data.data.id})" class="card-header" id="headingFour">
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
                                    <table id="kt_table_single_project_documents" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Version</th>
                                                <th>Date Created</th>
                                            </tr>
                                        </thead>
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
                                    <table id="kt_table_single_project_reports" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Report</th>
                                                <th>Date Uploaded</th>
                                            </tr>
                                        </thead>
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

                `


            },

            error: function (data) {
                console.log('Error:', data);

                
            }

            })

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
                    {
                        targets: 8,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, full, meta) {
                            return '\<button class="btn btn-secondary dropdown-toggle" type="button" id="taskToolsbtns" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                    <div class="dropdown-menu" aria-labelledby="taskToolsbtn" style="padding-left:8px; min-width: 100px; max-width: 15px;">\
                                    <a class="link" href="#"><i class="fas fa-eye" style="color:black;" data-toggle="modal" onclick='+displayTaskInfo(full.id)+' id="innerDropdown" data-target="#moreInfoModal"> </i>\
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
        
        // Function Populating the project Document Modal
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
                    {"defaultContent": ""},
                    {"data": "name"},
                    {"data": "starting_date"},
                    {"data": "ending_date"},
                    {"data": "category.name"},
                    {"data": "status.name"},
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


        // Function Populating the project Document Modal
        function documentDTCall(project_id){
            path_url = "/api/v1/tasks/" + project_id;

            // Single Projects Document DT
            if ( $.fn.dataTable.isDataTable( '#kt_table_single_project_documents') ) {
                let kt_table_single_project_documents = $('#kt_table_single_project_documents').DataTable();
            }else {
                let kt_table_single_project_documents = $('#kt_table_single_project_documents').DataTable({
                dom: 'lBfrtip<"actions">',
                language: {
                    url: languages. {{ app()->getLocale() }}
                },

                ajax: path_url,
                columns: [
                    {"defaultContent": ""},
                    {"data": "name"},
                    {"data": "deadline"},
                    {"data": "created_at"},
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

        function reportDTCall(project_id){
            path_url = "/api/v1/projects/" + project_id;
            // Single Project Reports DT
            if ( $.fn.dataTable.isDataTable( '#kt_table_single_project_reports') ) {
                let kt_table_single_project_reports = $('#kt_table_single_project_reports').DataTable();
            }else {
                let kt_table_single_project_reports = $('#kt_table_single_project_reports').DataTable({
                dom: 'lBfrtip<"actions">',
                language: {
                    url: languages. {{ app()->getLocale() }}
                },

                ajax: path_url,
                        
                columns: [
                    {"defaultContent": ""},
                    {"data": "project_report"},
                    {"data": "created_at"},
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

        function projectComments(project_id){
            path_url = "/api/v1/projects" + project_id;
            // Comment Function Goes Here
            
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
