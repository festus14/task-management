<script>
    function projectTComment(proj_id){
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
                                                                            <span class="secondary" style="margin-right:30px; color: #6f727d;"><strong>${elem.user.name}</strong></span>
                                                                            <span id="datee" style="float: right; color: #6f727d;">${elem.created_at}</span>
                                                                        </div>
                                                                        <div class="m-messenger__message-text" id="comContent" style="max-width: 450px; min-height:20px; max-height: 4000px; display: flex; flex-direction: column;">
                                                                                        ${elem.comments}

                                                                            <div id="actionTaken" class="actionTaken" style="flex-wrap: wrap; border-radius: 10px;align-self: flex-end; text-align: right;">
                                                                                        <span class="pull-right" style="margin-right: 10px; margin-bottom:2px; font-weight: 600;">Action required</span> <br/>
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
                                                <button type="button" onclick="makeComment(${proj_id})" class="m-btn--pill btn pull-right" data-toggle="modal" data-target="#msgModal" style="margin-left: 72%; margin-right: 5%; background-color: #312b8e; color: white; margin-bottom: 25px;">
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


        function makeComment(proj_id) {
            console.log(proj_id);
            $.ajax({
                type: "GET",
                url: '{{ url("/api/v1/projects") }}'+ "/" + proj_id,
                success: function(data) {
                    console.log("the data "+ data);
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
                                                                        <input type="button" class="m-btn--pill btn" style="background-color: #312b8e; color: white;" onclick="$('#msgModal').modal('hide'), postComment()" value="Comment">
                                                                    </div>
                                                                    </form>

            ` },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

        }

  function postComment(){
    $.ajax({
    type: "POST",
    url: "/api/v1/project-comments",
    data: $('#makeCommentForm').serialize(),
    success: function(data) {
        swal({
            title: "Success!",
            text: "Comment made!",
            icon: "success",
            confirmButtonColor: "#DD6B55",
        });
        addComment()
        $('#msgModal').modal('hide')

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

function deleteComment(comment_id){
    swal({
    title: "Are you sure?",
    text: "This comment will be deleted!",
    icon: "warning",
    icon: "warning",
    buttons: true,
    dangerMode: true,
}).then((willDelete) => {
    if (willDelete) {
        $.ajax({
            type: "DELETE",
            url: '/api/v1/project-comments' + '/' + comment_id,
            success: function(data) {
                swal("Deleted!", "Comment successfully deleted.", "success");
                $('#projectCommentModal').modal('hide');
                $('#projectCommentModal').modal('show');
            },
            error: function(data) {
                swal("Delete failed", "Please try again", "error");
            }

        });
    } else {
        swal("Cancelled", "Delete cancelled", "error");
    }

});
}

var date = new Date();
var formattedDate = (date.toString().slice(0, 25));

        function addComment() {
// data.map((elem, i) => {
    var commentMade;
    commentMade = document.getElementById("commentText").value;
    action_required = document.getElementById("action_required").value;
    let Commenthtml = `<div class="m-messenger__wrapper commguy" style="padding-right: 10px; padding-left: 10px;">
                            <div class="m-messenger__message m-messenger__message--out">

                                <div class="m-messenger__message-body">
                                    <div class="m-messenger__message-arrow"></div>
                                    <div class="m-messenger__message-content">
                                    <div class="m-messenger__message-username">
                                    <span style="color: #0c2a7a; margin-right:30px"><strong>${userName}</strong></span>
                                    <span class="datee" style="float: right; color: #0c2a7a;">${formattedDate}</span>
                                </div>
                                <div class="m-messenger__message-text" style="  min-width: 250px; max-width: 440px; max-height: 4000px;">
                                    ${commentMade}
                                </div>
                                <div style="max-width: 440px; max-height: 4000px;">
                                    <div id="actionTaken" class="actionTaken" style="flex-wrap: wrap; border-radius: 10px;align-self: flex-end; text-align: right;">
                                    <span class="pull-right" style="margin-bottom:2px; font-weight: 200; ">Action required</span> <br/>
                                         <div style=" padding: 7px; border-radius: 7px; color: white; background-color: #6471c6;">


                                <span>${action_required}</span>

                                        </div>
                                </div>
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

</script>
