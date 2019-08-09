@extends('layouts.inner')

@section('title', 'Create Project')
    
@section('header', 'Project Management')

@section('sub_header', 'Create Project')

@section('content')
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
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a style="color:white; background-color: #8a2a2b;" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" data-toggle="modal" data-target="#createProjectModal">
                            <span>
                                    <i class="la la-plus"></i>
                                    <span>
                                        blah
                                    </span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
        <div class="accordion" id="accordionExample">
                <div class="card">
                        <div class="card-header" id="headingone">
                          <h6 class="mb-0">
                            <span class="collapsed"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="m-menu__link-icon flaticon-list"></i>
                                    Project tasks
                            </span>
                          </h6>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                           <ol>
                               <li>name of task 1</li>
                               <li>name of task 2</li>
                               <li>name of task 3</li>
                           </ol>
                         </div>
                        </div>
                    </div>


                      <div class="card">
                            <div class="card-header" id="headingTwo">
                              <h6 class="mb-0">
                                <span data-toggle="modal" data-target="#documentModal" aria-expanded="false" aria-controls="">
                                        <i class="m-menu__link-icon flaticon-clipboard"></i>
                                        Documents
                                </span>
                              </h6>
                            </div>
                        </div>

                        <div class="card">
                                <div class="card-header" id="headingThree">
                                  <h6 class="mb-0">
                                    <span data-toggle="modal" data-target="#reportModal" aria-expanded="false" aria-controls="">
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
    <!--end::Portlet-->


    {{-- documentModal --}}
    <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 65%; min-width: 500px;" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="documentModalLongTitle">Documents</h5>
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
    {{-- endDocumentModal --}}

    {{-- report DT Modal --}}
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 65%; min-width: 500px;" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="documentModalLongTitle">Reports</h5>
                  <button type="button" class="close" onclick="$('#reportModal').modal('hide');" aria-label="Close">
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
                                                        Report
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
                  <button type="button" class="btn btn-secondary" onclick="$('#reportModal').modal('hide');">Close</button>
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
                                                                                    <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
                                                                                    {{-- <div id="filedrag">or drop files here</div> --}}
                                                                                </div>
{{--                                                                     
                                                                                <div id="submitbutton">
                                                                                    <button type="submit">Upload Files</button>
                                                                                </div> --}}
                                                                     <div id="messages">
                                                                                
                                                                            </div>
                                                                            </fieldset>
                                                                            <div class="row col-md-12">
                                                                                    <div class="col-md-2 form-group mt-3">
                                                                            <button class="btn btn-block" style="background-color:#8a2a2b; color:white;">Submit</button>
                                                                                    </div>
                                                                    </div>
                                                                </form>
                            
                </div>
              </div>
            </div>
          </div>
    {{-- end Addreport Modal --}}

{{-- documentModal --}}
<div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 65%; min-width: 500px;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="documentModalLongTitle">Documents</h5>
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
{{-- endDocumentModal --}}

<!-- Add Document Modal -->
<div class="modal fade" id="addDocumentModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 60%; min-width: 300px;"role="document">
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
            
                        <div class="col-md-2 form-group mt-2">
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
    <div class="modal-dialog modal-dialog-centered" style="overflow-y:hidden; height:100vh; min-height: 100vh; max-width: 100%; min-width: 100px; overflow:hidden;" role="document">
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
                            <div class="col-lg-4">
                    
                                <div class="m-portlet__body">
                                    <div class="m-card-profile">
                                        <div class="m-card-profile__title m--hide">
                                            Comments
                                        </div>
                                        <div class="m-card-profile__pic">
                                            <div class="m-card-profile__pic-wrapper">
                                                    <img alt="" src="{{ asset('metro/assets/app/media/img/users/user4.jpg') }}" class="mCS_img_loaded"/>
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
                            <div class="col-lg-8">
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
                                                    <div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: auto; scrollbar-width: thin;">
                                                        <div id="mCSB_3_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                                            <br>
                                                            <span id="filler"> </span>
                    
                                                            <div class="m-messenger__wrapper commguy" style="padding-right: 10px; display:flex; flex-wrap: flex; padding-left: 10px;">
                                                                <div class="m-messenger__message m-messenger__message--in">
                                                                    <div class="m-messenger__message-pic">
                                                                        <img alt="" src="{{ asset('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
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
                                                                                    <button class="m-btn--pill" type="submit" class="btn btn-primary" onclick="addReply()" style="margin-top: 5px; float: right;">Reply</button>
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
                                                        <button type="button" class="m-btn--pill btn btn-primary"  data-toggle="modal" data-target="#makecommentModal" style="margin-left: 72%; margin-bottom: 25px;">
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
                                                                        <button type="button"class="m-btn--pill btn btn-primary" class="" onclick="addComment(), $('#exampleModal').modal('toggle');">Comment</button>
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
       
                       <div class="m-messenger__message-text" style="min-width: 250px; max-width: 300px; max-height: 4000px;">  <p> </br> 
                     <span style="width: 250px"> ${document.getElementById("replyTextId").value} </span>
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
       @endsection
