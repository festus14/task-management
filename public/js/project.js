var date = new Date();
var formattedDate = (date.toString().slice(0, 25));
document.getElementById("datee").innerHTML = formattedDate;


var data = [{
        "id": 2,
        name: "Yeha",
        "comment": "laudantium enim ladugbo mi ncicna jnsjkd cfjaka"
    },
    {
        "id": 1,
        name: "Ya",
        "comment": "est natus enim nihil"
    },
]
mapComment();


function mapComment() {
    data.map((elem, i) => {
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
                <div class="m-messenger__message-text" style="min-width: 250px; word-wrap: break-word; max-width: 440px; max-height: 4000px;">
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
                <div class="m-messenger__message-text" style=" min-width: 250px; word-wrap: break-word; max-width: 440px; max-height: 4000px;">
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
            // document.getElementById("mCSB_3_container").appendChild(html);
            // $( "<p>Test</p>" ).appendTo( ".inner" );

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


// Add project Sub type Post
$('#addprojSubtypeform1').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: '{{ url("/api/v1/project-sub-types") }}',
        data: $('#addprojSubtypeform1').serialize(),
        success: function(response, data) {
            alert("Project sub-type created");
            getProjetTypeDT();
            document.getElementById('subtypeId').value = "";
            $('#subtypeModal').modal('hide');
            console.log(data);
            console.log(response);
            return (data);
        },
        error: function(error) {
            console.log(error);
            alert("Project sub-type creation failed");
        }

    });
});

// Add 2nd project Sub type Post
$('#addprojsubtypeform2').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: '{{ url("/api/v1/project-sub-types") }}',
        data: $('#addprojsubtypeform2'),
        success: function(response, data) {
            alert("Project sub-type created");
            getProjecSubTypeDT();
            document.getElementById('sub-type').value = "";
            $('#subtypemainModal').modal('hide');
            console.log(data);
            console.log(response);
            return (data);
        },
        error: function(error) {
            console.log(error);
            alert("Project sub-type creation failed");
        }

    });
});


// post to the create proj table
$(document).ready(function() {

    $('#addprojectform').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '{{ url("/api/v1/projects") }}',
            data: $('#addprojectform').serialize(),
            success: function(response) {
                console.log(response)
                $('#createProjectModal').modal('hide');
                alert("Project Created");
                location.reload();
            },
            error: function(error) {
                console.log(error);
                alert("Project creation failed");
            }
        });
    });
});




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

// Delete Project Function
function deleteSingleProject(proID) {
    var confirmDel = confirm("Do you want to delete the document?");

    if (confirmDel) {
        $.ajax({
            type: "DELETE",
            url: "{{ url('admin/projects')}}" + '/' + proID,
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

//          Function for deleting single project
function deleteProjectType(proID) {

    var confirmDel = confirm("Do you want to delete the project type?");

    if (confirmDel) {
        $.ajax({
            type: "DELETE",
            url: "{{ url('admin/project-types')}}" + '/' + proID,
            success: function(data) {
                location.reload();
            },
            error: function(data) {
                console.log('Error:', data);
                location.reload();
            }
        });
    }
}

//          Function for deleting single project subtype
function deleteProjectSubType(proID) {

    var confirmDel = confirm("Do you want to delete the document?");

    if (confirmDel) {
        $.ajax({
            type: "DELETE",
            url: "{{ url('admin/project-sub-types')}}" + '/' + proID,
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

// function addTypeToProject(){
// Add to the proj type....one in create project
$(document).ready(function() {

    $('#addprojtypeform1').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '{{ url("/api/v1/project-types") }}',
            data: $('#addprojtypeform1').serialize(),
            success: function(response, data) {
                alert("Project-type created");
                displayAddProject();
                $('#PModal').modal('hide');
                console.log(data);
                console.log(response);
                return (data);
            },
            error: function(error) {
                console.log(error);
                alert("Project-type creation failed");
            }

        });
    });
});
// end of project type ajax call

// Add project type Post
$('#addprojTtypeform2').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: '{{ url("/api/v1/project-types") }}',
        data: $('#addprojTtypeform2').serialize(),
        success: function(response, data) {
            alert("Project-type created");
            document.getElementById('projTypeId').value = "";
            $('#AddProjecModalla').modal('hide');
            getProjetTypeDT();
            location.reload();
            console.log(data);
            console.log(response);
            return (data);
        },
        error: function(error) {
            console.log(error);
            alert("Project-type creation failed");
        }

    });
});