// projectcomment js

var date = new Date();
var formattedDate = (date.toString().slice(0, 25));
document.getElementById("datee").innerHTML = formattedDate;

//  dummy data for test
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
// Delete Task Function
function deleteSingleTask(taskID) {
    var confirmDel = confirm("Do you want to delete the task?");

    if (confirmDel) {
        $.ajax({
            type: "DELETE",
            url: "{{ url('admin/tasks')}}" + '/' + taskID,
            success: function(data) {
                console.log(data);
                location.reload();
            },
            error: function(data) {
                console.log('Error:', data);
                location.reload();
            }
        });
    }
}



function documentDTCall(project_id) {
    $(document).ready(function() {
        $('#kt_table_single_project_documents').DataTable();
    });
}


function reportDTCall(project_id) {
    $(document).ready(function() {
        $('#kt_table_single_project_reports').DataTable();
    });
}



function taskComments(task_id) {
    // Task Comments Scripts Goes Here
    $.ajax({
        type: "GET",
        url: "{{ url('/api/v1/tasks') }}" + '/' + task_id,
        success: function(data) {
            let commentbody = document.getElementById('commentModal');
            // let probSubtypeBody = document.getElementById('subtypeModalBody');
            commentbody.innerHTML = `
<div class="modal-dialog modal-dialog-centered" id="commentPage" style="overflow-y:hidden; height:99vh; min-height: 70vh; max-width: 98vw; min-width: 70vw; overflow:hidden;" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Task Comments</h5>
            <button type="button" class="close" onclick="$('#commentPage').modal('hide');"  data-dismiss="modal" aria-label="Close">
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
                                                                        <i class="fa fa-reply" data-toggle="collapse" id="kkk" aria-hidden="true" data-target="#${elem.id}collapseReply" aria-expanded="false" aria-controls="collapseReply" style="display:flex; justify-content: flex-end;"></i>

                                                                        <div class="collapse" id="${elem.id}collapseReply">
                                                                            <br>
                                                                            <textarea class="form-control" name="replytext" id="replyTextId" rows="1" style="width: 100%" required></textarea>
                                                                            <button type="submit" class="btn btn-primary" onclick="addReply()" data-toggle="collapse" data-target="#${elem.id}collapseReply" style="margin-top: 5px; float: right;">Reply</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>`) +
                `

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
                                                                <button type="button" class="btn btn-primary" class="" onclick="addComment(), $('#makecommentModal').modal('hide')">Comment</button>
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
</div>`
        }
    });
}

function mapComment() {
    data.map((elem, i) => {
        console.log(elem.comment)
        let Commenthtml = `<div class="m-messenger__wrapper commguy" style="padding-right: 10px; padding-left: 10px;">
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
                    <img src="assets/app/media/img//users/user3.jpg" alt="" class="mCS_img_loaded">
                </div>
                </div>
            </div>`
            //                     :
            //             `<div class="m-messenger__wrapper commguy" style="padding-right: 10px; padding-left: 10px;">
            //     <div class="m-messenger__message m-messenger__message--out">

        //         <div class="m-messenger__message-body">
        //             <div class="m-messenger__message-arrow"></div>
        //             <div class="m-messenger__message-content">
        //             <div class="m-messenger__message-username">
        //             <span style="color: #0c2a7a"><strong>${elem.name}</strong></span>
        //             <span class="datee" style="float: right; color: #d0d3db;">${formattedDate}</span>

        //                 </div>
        //                 <div class="m-messenger__message-text" style=" min-width: 250px; max-width: 440px; max-height: 4000px;">
        //                     ${elem.comment}
        //                 </div>
        //             </div>
        //         </div>
        //         <div class="m-messenger__message-pic">
        //         <img src="assets/app/media/img//users/user3.jpg" alt="" class="mCS_img_loaded">
        //     </div>
        //     </div>
        // </div>`
        document.getElementById("mCSB_3_container").innerHTML = document.getElementById("mCSB_3_container").innerHTML + Commenthtml

    })
}

function addComment() {
    var newObj = {
        name: "Chiamaka",
        comment: document.getElementById("Textarea2").value,
        id: 5
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

               <div class="m-messenger__message-text" style="min-width: 250px; word-wrap: break-word; max-width: 320px; text-align: left; max-height: 4000px;">  <p> </br>
                 ${document.getElementById("replyTextId").value}
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


// post to the create Task table
$(document).ready(function() {
    $('#addTaskform').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '{{ url("/api/v1/tasks") }}',
            data: $('#addTaskform').serialize(),
            success: function(response) {
                console.log(response)
                $('#createTaskModal').modal('hide');
                alert("Task successfully created");
                location.reload();
            },
            error: function(error) {
                console.log(error);
                alert("Task creation failed");
            }
        });
    });
});


// post to the Task category table
$('#').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: '{{ url("/api/v1/tast-categories") }}',
        data: $('#addtaskCategoryform').serialize(),
        success: function(response, data) {
            console.log(response)
            getTaskCategoryAjaxDT();
            $('#addTaskCategory').modal('hide');
            alert("Task category successfully created");
            //document.getElementById('statusInput').value = "";
            //location.reload();
            console.log(data);
            console.log(response);
            return (data);
        },
        error: function(error) {
            console.log(error);
            alert("Task category creation failed");
        }
    });
});

// post to the Task status table
$('#addStatusform').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: '{{ url("/api/v1/task-statuses") }}',
        data: $('#addStatusform').serialize(),
        success: function(response, data) {
            console.log(response)
            $('#AddStatus').modal('hide');
            alert("Task status successfully created");
            document.getElementById('statusInput').value = "";
            //location.reload();
            console.log(data);
            console.log(response);
            return (data);
        },
        error: function(error) {
            console.log(error);
            alert("Task status creation failed");
        }
    });
});