@extends('layouts.inner')

@section('title', 'Project')
    
@section('header', 'Project Management')

@section('sub_header', 'Create Project')

@section('content')
<div class="m-portlet " id="m_portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                            <i class="flaticon-list-2"> </i>
                        </span>
                    <h3 class="m-portlet__head-text">
                        'Projectname' info
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" data-toggle="modal" data-target="#createProjectModal">
                            <span>
                                    <i class="la la-plus"></i>
                                    <span>
                                        Iron Man
                                    </span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
               {{-- <span> <i class="la la-clipboard"></i>
                    <span>Tasks</span>
               </span>
               <span> <i class="la la-document"></i>
                <span>Documents</span>
           </span>
           <span> <i class="la la-report"></i>
            <span>Report</span>
       </span> --}}
       {{-- <ul>
            <li>
                <h5 class="m-menu__section-text">
                        <i class="la la-clipboard"></i>
                    Tasks
                </h5>
                
            </li>
            <li>
                    <h5 class="m-menu__section-text">
                            <i class="la la-task"></i>
                        Documents
                    </h5>
                    
                </li>
                <li>
                        <h5 class="m-menu__section-text">
                                <i class="la la-clipboard"></i>
                            Report
                        </h5>
                        
                    </li>
        </ul> --}}
        <div class="accordion" id="accordionExample">
                <div class="card">
                        <div class="card-header" id="headingone">
                          <h6 class="mb-0">
                            <span class="collapsed"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="m-menu__link-icon flaticon-list"></i>
                                    Tasks
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
                                <span class="collapsed"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-menu__link-icon flaticon-clipboard"></i>
                                        Documents
                                        <i style="float: right;" class="m-menu__link-icon flaticon-plus"></i>
                                </span>
                              </h6>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                              <div class="card-body">
                                  <ul>
                                    <li>Document 1</li>
                                    <li>Document 2</li>
                                    <li>Document 3</li>
                                </ul> 
                              </div>
                            </div>
                          </div>

                          <div class="card">
                                <div class="card-header" id="headingThree">
                                  <h6 class="mb-0">
                                    <span class="collapsed"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <i class="m-menu__link-icon flaticon-file"></i>
                                            Report
                                            <i style="float: right;" class="m-menu__link-icon flaticon-plus" data-toggle="modal" data-target="#projReport"></i>
                                    </span>
                                  </h6>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                                </div>
                              </div>

                        <!-- Modal -->
<div class="modal fade" id="projReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

                              <div class="card">
                                    <div class="card-header" id="headingFour">
                                      <h6 class="mb-0">
                                        <span class="">
                                                <i class="m-menu__link-icon flaticon-comment"></i>
                                                Comments
                                        </span>
                                      </h6>
                                    </div>
                                  </div>
        </div>
    <!--end::Portlet-->
    
@endsection