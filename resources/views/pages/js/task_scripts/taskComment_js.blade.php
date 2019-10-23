
<script>
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
        data: $('#replyForm').serialize(),
        success: function(data) {
            swal({
                title: "Success!",
                text: "Reply made!",
                icon: "success",
                confirmButtonColor: "#DD6B55",
            });
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
    parentComment = document.getElementById(`${id}replydiv`);
    childComment = `<div class="m-messenger__wrapper" style=" margin-top:9px; padding-right: 10px; padding-left: 10px;">
       <div class="m-messenger__message m-messenger__message--out">

           <div class="m-messenger__message-body">
               <div class="m-messenger__message-arrow"></div>
               <div class="m-messenger__message-content">
               <div class="m-messenger__message-username">
               <span style="float: left; color: #24262b;"><strong>${userName}</strong></span>
               <span class="datee" style="float: right; color: #0c2a7a">${formattedDate}</span>

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

}

function populateReply(id) {
console.log("here")
    $.ajax({
            type: "GET",
            url: "{{ url('/api/v1/task-comments') }}" + "/" + id,
            success: function (data) {
   parentComment = document.getElementsByclass('replyCommentBody');
   childComment = data.data.commentreply.map(elem=>`<div class="m-messenger__wrapper" style=" margin-top:9px; padding-right: 10px; padding-left: 10px;">
   <div class="m-messenger__message m-messenger__message--out">

       <div class="m-messenger__message-body">
           <div class="m-messenger__message-arrow"></div>
           <div class="m-messenger__message-content">
           <div class="m-messenger__message-username">
           <span style="float: left; color: #24262b;"><strong>Dammy</strong></span>
           <span class="datee" style="float: right; color: #0c2a7a">2019-08-25 16:58:51</span>

               </div>

               <div class="m-messenger__message-text" style="min-width: 250px; word-wrap: break-word; max-width: 320px; text-align: left; max-height: 4000px;">  <p> </br>

                 ${elem.task_comment_reply}
                         </p>
               </div>
               </br>
           </div>
       </div>
       <div class="m-messenger__message-pic">
       <img alt="" src="{{ asset('../..metro/assets/app/media/img/users/user3.jpg') }}" class="mCS_img_loaded"/>
   </div>
   </div>
</div>`);
   parentComment.innerHTML = parentComment.innerHTML + childComment;
   document.getElementById(`${id}replyTextId`).value = "";
}
});
}

</script>
