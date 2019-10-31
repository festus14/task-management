
<script>

    function taskCommentFunction(task_id){
            console.log("here")
            $.ajax({
                    type: "GET",
                    url: "{{ url('/api/v1/tasks') }}" + "/" + task_id,
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
                                        ${taskName}
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
                                                                        <div class="m-messenger__message-text" id="comContent" style="  max-width: 450px; min-height:20px; max-height: 4000px; display: flex; flex-direction: column;">
                                                                                        ${elem.comments}

                                                                            <div id="${elem.id}replydiv" class="replyCommentBody" style="width: 80%; flex-wrap: wrap; padding-bottom:5px; align-self: flex-end; text-align: right;">
                                                                                ${elem.commentreply.map(replies=>`
                                                                                    <div class="m-messenger__wrapper" style=" margin-top:9px; padding-right: 10px; padding-left: 10px;">
                        <div class="m-messenger__message m-messenger__message--out">

                            <div class="m-messenger__message-body">
                                <div class="m-messenger__message-arrow"></div>
                                <div class="m-messenger__message-content">
                                <div class="m-messenger__message-username">
                                <span style="float: left; color: #0c2a7a;"><strong>${replies.reply_by.name}</strong></span>
                                <span class="datee" style="float: right; color:#0c2a7a">${replies.created_at}</span>

                                    </div>

                                    <div class="m-messenger__message-text" style="min-width: 250px; word-wrap: break-word; max-width: 320px; text-align: left; max-height: 4000px;">  <p> </br>

                                        ${replies.task_comment_reply}
                                                </p>
                                    </div>
                                        </br>
                                    <i class="fa fa-trash" onclick="deleteReply(${replies.id})" style="display:flex; justify-content: flex-end; margin-bottom:5px; color:black;"></i>

                                </div>
                            </div>
                            <div class="m-messenger__message-pic">
                            <img alt="" src="{{ url('metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
                        </div>
                        </div>
                    </div>`)}
                                                                            </div>
                                                                            <br>
                                                                        <i class="fa fa-trash" onclick="deleteComment(${elem.id})" style="display:flex; justify-content: flex-end; margin-bottom:5px;"></i>
                                                                        <i class="fa fa-reply" data-toggle="collapse" id="kkk" aria-hidden="true" data-target="#${elem.id}collapseReply" aria-expanded="false" aria-controls="collapseReply" style="display:flex; justify-content: flex-end;"></i>

                                                                        <div class="collapse" id="${elem.id}collapseReply">
                                                                            <br>
                                                                            <form id="${elem.id}replyForm" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="task_comment_id" id="task_comment_id" value="${elem.id}">
                                                                                <textarea class="form-control" name="task_comment_reply" id="${elem.id}replyTextId" rows="1" style="width: 100%" required></textarea>
                                                                                <input type="hidden" name="reply_by_id" id="reply_by_id" value="${userId}">
                                                                                <input type="button" class="m-btn--pill btn btn-primary" onclick="addReply(${elem.id})" data-toggle="collapse" data-target="#${elem.id}collapseReply" style="margin-top: 5px; float: right;" value="Reply">
                                                                            </form>
                                                                        </div>
                                                                    </div>

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
                                                <button type="button" onclick="makeComment(${task_id})" class="m-btn--pill btn btn-primary pull-right" data-toggle="modal" data-target="#msgModal" style="margin-left: 72%; margin-right: 5%; margin-bottom: 25px;">
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
                        `
                    }
                });
            }

        function makeComment(task_id) {
            $.ajax({
                type: "GET",
                url: '{{ url("/api/v1/tasks") }}'+ "/" + task_id,
                success: function(data) {
                    let makecommentModal = document.getElementById('makeCommentBodyId');
                    makecommentModal.innerHTML = `
                    <form id="makeCommentForm" enctype="multipart/form-data">
                                                                        @csrf
                                                                    <div class="modal-body">
                                                                        <textarea class="form-control goat" name="comments" id="commentText" rows="4 " required></textarea>
                                                                        <input type="hidden" id="user" name="user_id" value="${userId}">
                                                                        <input type="hidden" id="task" name="task_id" value="${data.data.id}">
                                                                        <input type="hidden" id="client" name="client_id" value="${data.data.client_id}">
                                                                        <input type="hidden" id="project" name="project_id" value="${data.data.project_id}">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="button" id="closeModal" class="m-btn--pill btn btn-secondary" onclick="$('#msgModal').modal('hide');" value="Close">
                                                                        <input type="button" class="m-btn--pill btn btn-primary" onclick="$('#msgModal').modal('hide'), postComment()" value="Comment">
                                                                    </div>
                                                                    </form>

            ` },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

        }

    function postComment() {
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

function deleteComment(comment_id) {
    swal({
        title: "Are you sure?",
        text: "This comment will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: '/api/v1/task-comments' + '/' + comment_id,
                success: function(data) {
                    swal("Deleted!", "Comment successfully deleted.", "success");
                    $('#taskCommentModal').modal('hide');
                    $('#taskCommentModal').modal('show');
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

function deleteReply(reply_id) {
    swal({
        title: "Are you sure?",
        text: "This reply will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: '/api/v1/task-comment-replies' + '/' + reply_id,
                success: function(data) {
                    swal("Deleted!", "Reply successfully deleted.", "success");
                    $("mCSB_3_container").load(" #mCSB_3_container");
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

                            </div>
                        </div>
                        <div class="m-messenger__message-pic">
                        <img src="../../metro/assets/app/media/img/users/user3.jpg" alt="" class="mCS_img_loaded">
                    </div>
                    </div>
                </div>`

    document.getElementById("mCSB_3_container").innerHTML = document.getElementById("mCSB_3_container").innerHTML + Commenthtml

}

function addReply(id) {
    $.ajax({
        type: "POST",
        url: "/api/v1/task-comment-replies",
        data: $(`#${id}replyForm`).serialize(),
        success: function(data) {

            swal({
                title: "Success!",
                text: "Reply made!",
                icon: "success",
                confirmButtonColor: "#DD6B55",
            });

    parentComment = document.getElementById(`${id}replydiv`);
    childComment = `<div class="m-messenger__wrapper" style=" margin-top:9px; padding-right: 10px; padding-left: 10px;">
                        <div class="m-messenger__message m-messenger__message--out">

               <div class="m-messenger__message-body">
               <div class="m-messenger__message-arrow"></div>
               <div class="m-messenger__message-content">
               <div class="m-messenger__message-username">
                <span style="float: left; color: #0c2a7a;"><strong>${userName}</strong></span>
                <span class="datee" style="float: right; color:#0c2a7a">${formattedDate}</span>
                   </div>

                   <div class="m-messenger__message-text" style="min-width: 250px; word-wrap: break-word; max-width: 320px; text-align: left; max-height: 4000px;">  <p> </br>

                    <spans style="width: 250px"> ${document.getElementById(`${id}replyTextId`).value} </span>
                             </p>
                   </div>
                   </br>
               </div>
           </div>
           <div class="m-messenger__message-pic">
           <img alt="" src="../../metro/assets/app/media/img/users/user3.jpg" class="mCS_img_loaded"/>
       </div>
       </div>
   </div>`
       parentComment.innerHTML = parentComment.innerHTML + childComment;
       document.getElementById(`${id}replyTextId`).value = "";
        },
        error: function(error) {
            swal({
                title: "Reply failed",
                text: "Please check the missing fields!",
                icon: "error",
                confirmButtonColor: "#fc3",
                confirmButtonText: "OK",
            });
        }

    });

}

// function populateReply(id) {
// console.log("here")
//     $.ajax({
//             type: "GET",
//             url: "{{ url('/api/v1/task-comments') }}" + "/" + id,
//             success: function (data) {
//    parentComment = document.getElementsByclass('replyCommentBody');
//    childComment = data.data.commentreply.map(elem=>`<div class="m-messenger__wrapper" style=" margin-top:9px; padding-right: 10px; padding-left: 10px;">
//    <div class="m-messenger__message m-messenger__message--out">

//        <div class="m-messenger__message-body">
//            <div class="m-messenger__message-arrow"></div>
//            <div class="m-messenger__message-content">
//            <div class="m-messenger__message-username">
//            <span style="float: left; color: #24262b;"><strong>Dammy</strong></span>
//            <span class="datee" style="float: right; color: #0c2a7a">2019-08-25 16:58:51</span>

//                </div>

//                <div class="m-messenger__message-text" style="min-width: 250px; word-wrap: break-word; max-width: 320px; text-align: left; max-height: 4000px;">  <p> </br>

//                  ${elem.task_comment_reply}
//                          </p>
//                </div>
//                </br>
//            </div>
//        </div>
//        <div class="m-messenger__message-pic">
//        <img alt="" src="{{ asset('../..metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
//    </div>
//    </div>
// </div>`);
//    parentComment.innerHTML = parentComment.innerHTML + childComment;
//    document.getElementById(`${id}replyTextId`).value = "";
// }
// });
// }

</script>
