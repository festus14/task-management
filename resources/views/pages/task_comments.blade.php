@extends('layouts.metro')
@section('title')
    <title>Task Management | Dashboard</title>
@endsection
@section('active_arrow_one')
    <span class="m-menu__item-here"></span>
@endsection
@section('css')
<style>
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
@section('subheader')
    {{-- <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">
                Dashboard
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{ url('admin/view_project') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Projects
                        </span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{ url('admin/view_task') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Tasks
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                <span class="m-subheader__daterange-label">
                    <span class="m-subheader__daterange-title"></span>
                    <span class="m-subheader__daterange-date m--font-brand"></span>
                </span>
                <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                    <i class="la la-angle-down"></i>
                </a>
            </span>
        </div>
    </div> --}}
@endsection
@section('content')
{{-- <div id="loading">
        <img id="loading-image" src={{ url('/loader/loader.gif')}} alt="Loading..." />
    </div> --}}
<div class="m-content" id="commentHolder" style="margin-top:-60px;">
</div>
@endsection
@section('javascript')
    {{--    <script src="metro/assets/app/js/dashboard.js" type="text/javascript"></script>--}}

<script>

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

     let taskComments_id = {{$id}};

    function taskComments (task_id){
                $.ajax({
                    type: "GET",
                    url: "{{ url('/api/v1/tasks') }}" + "/" + taskComments_id,
                    success: function (data) {
                        console.log(data);
                        let commentbody = document.getElementById('commentHolder');
                        // let probSubtypeBody = document.getElementById('subtypeModalBody');
                        commentbody.innerHTML = `
        <div id="taskCommentPage" class="modal-dialog modal-dialog-centered" style="overflow-y:hidden; height:95vh; min-height: 70vh; max-width: 90vw; min-width: 70vw; overflow:hidden;" role="document">
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
                                                                                    <span class="secondary"><strong>Tomiwa</strong></span>
                                                                                    <span id="datee" style="float: right;">${elem.created_at}</span>
                                                                                </div>
                                                                                <div class="m-messenger__message-text" id="comContent" style="  max-width: 450px; min-height:50px; max-height: 4000px; display: flex; flex-direction: column;">
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
                                                <div class="m-messenger__form " style="width: 100%;">
                                                    <div class="m-messenger__form-controls ">
                                                        <button type="button" onclick="makeCommo(${task_id})" class="m-btn--pill btn btn-primary pull-right" data-toggle="modal" data-target="#makecommentModal" style="margin-left: 72%; margin-bottom: 25px;">
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
                    </div>
                    </form>

                </div>
            </div>
        </div>`
                    }
                });
            }

            function makeCommo(task_id) {
            $.ajax({
                type: "GET",
                url: '{{ url("/api/v1/tasks") }}'+ "/" + task_id,
                success: function(data) {
                    let makecommentModal = document.getElementById('makecommentModal');
                    makecommentModal.innerHTML = `
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
                                                                        <textarea class="form-control goat" name="comments" id="commentText" rows="4 " required></textarea>
                                                                        <input type="hidden" id="user" name="user_id" value="${data.data.manager_id}">
                                                                        <input type="hidden" id="task" name="task_id" value="${data.data.id}">
                                                                        <input type="hidden" id="client" name="client_id" value="${data.data.client_id}">
                                                                        <input type="hidden" id="project" name="project_id" value="${data.data.project_id}">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="button" id="closeModal" class="m-btn--pill btn btn-secondary" onclick="$('#makecommentModal').modal('hide');" value="Close">
                                                                        <input type="button" class="m-btn--pill btn btn-primary" onclick="$('#makecommentModal').modal('hide'), postComment()" value="Comment">
                                                                    </div>
                                                                    </form>
                                                                </div>

                                                            </div>

               ` },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

}


    function postComment(){
        console.log("got here")
        $.ajax({
        type: "POST",
        url: "/api/v1/task-comments",
        data: $('#makeCommentForm').serialize(),
        success: function(data) {
            swal({
                title: "Success!",
                text: "Comment made!",
                icon: "success",
                confirmButtonColor: "#DD6B55",
                // confirmButtonText: "OK",
            });
            addComment()
            $('#makecommentModal').modal('hide')
            // $('#AddProjecModalla').modal('hide');
            // window.setTimeout(function() {
            //     $("#kt_table_project_type").DataTable().ajax.reload();
            // }, 2300)

        },
        error: function(error) {
            swal({
                title: "Comment failed",
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
        var commentMade;
        commentMade = document.getElementById("commentText").value;
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
    taskComments (taskComments_id);

</script>
@endsection
