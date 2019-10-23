<script>
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
                                    <span class="pull-right" style="margin-bottom:2px; font-weight: 600; ">Action required</span> <br/>
                                         <div style=" padding: 7px; border-radius: 7px; color: white; background-color: #5e669b;">


                                <span>${action_required}</span>

                                        </div>
                                </div>
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

</script>
