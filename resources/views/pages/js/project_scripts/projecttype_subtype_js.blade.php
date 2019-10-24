<script>
    function displayAddPsubtype() {
    $("#subtypemainModal").modal('show');
    $.ajax({
        type: "GET",
        url: '{{ url("/api/v1/project-types") }}',
        success: function (data) {
            let subtypemainModalBody = document.getElementById('subtypemainModalBody');
            subtypemainModalBody.innerHTML = `
        <form id="addprojsubtypeform2" enctype="multipart/form-data">
            @csrf
                <div  class="modal-body">

                    <div class="form-group">
                        <label for="project-type">Select Project Type</label>
                        <select id="project-type" name="project_type_id" class="selectDesign form-control">
                            <option value="" selected></option>
                                ${data.data.map(elem => `<option value="${elem.id}">${elem.name}</option>`)}
                    </select>
                    <div class="error" id="projectTTTypeErr"></div>
                </div>

                <div class="form-group">
                    <label for="create-task">Subtype Name</label>
                    <input type="text" class="form-control" name="name" id="sub-type" placeholder="">
                    <div class="error" id="projectSubTypeErr"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#subtypemainModal').modal('hide');" data-target="#subtypemainModal">Close</button>
                <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="validateProjectSubType();" value="{{ trans('global.create') }}">
            </div>
        </form>

                        `
        },

        error: function (data) {
            console.log('Error:', data);
        }
    });
    }

function displayAddPsubtypeOut() {
    $("#subtypemainModal").modal('show');
    $.ajax({
        type: "GET",
        url: '{{ url("/api/v1/project-types") }}',
        success: function (data) {
            let subtypemainModalBody = document.getElementById('subtypemainModalBody');
            subtypemainModalBody.innerHTML = `
        <form id="addprojsubtypeform2" enctype="multipart/form-data">
            @csrf
                <div  class="modal-body">

                    <div class="form-group">
                        <label for="project-type">Select Project Type</label>
                        <select id="project-type" name="project_type_id" class="selectDesign form-control">
                            <option value="" selected></option>
                                ${data.data.map(elem => `<option value="${elem.id}">${elem.name}</option>`)}
                    </select>
                    <div class="error" id="projectTTTypeErr"></div>
                </div>

                <div class="form-group">
                    <label for="create-task">Subtype Name</label>
                    <input type="text" class="form-control" name="name" id="sub-type" placeholder="">
                    <div class="error" id="projectSubTypeErr"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#subtypemainModal').modal('hide');" data-target="#subtypemainModal">Close</button>
                <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="validateProjectSubTypeOut();" value="{{ trans('global.create') }}">
            </div>
        </form>

                        `
        },

        error: function (data) {
            console.log('Error:', data);
        }
    });
}

    function ProjectTypeSubmit() {
        $.ajax({
            type: "POST",
            url: "{{ url('/api/v1/project-types') }}",
            data: $('#addprojtypeform1').serialize(),
            success: function(data) {

                swal({
                    title: "Success!",
                    text: "Project Type Created!",
                    icon: "success",
                    confirmButtonColor: "#DD6B55",
                    // confirmButtonText: "OK",
                });
                $('#AddProjecModalla').modal('hide');
                window.setTimeout(function() {
                    $("#kt_table_project_type").DataTable().ajax.reload();
                }, 2300)

            },
            error: function(error) {
                swal({
                    title: "Project type creation failed",
                    text: "Please check the missing fields!",
                    icon: "error",
                    confirmButtonColor: "#fc3",
                    confirmButtonText: "OK",
                });
            }

        });
    }
    //found in create project modal
    function ProjectTypeSubmitIn() {
        $.ajax({
            type: "POST",
            url: "{{ url('/api/v1/project-types') }}",
            data: $('#addProjTypeFormIn').serialize(),
            success: function(data) {

                $.ajax({
                    type: "GET",
                    url: "{{ url('/api/v1/project_create') }}",
                    success: function(data) {
                        document.getElementById('projTypeBody1').innerHTML = `
            <option value="" selected></option>
            ` +
                            data.project_types.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                            `
            `
                    }
                });

                // $("#createProjectModal").modal('show');
                $('#projectModalIn').modal('hide');
                document.getElementById('subtypeNameIn').value = "";

                swal({
                    title: "Success!",
                    text: "Project Type Created!",
                    icon: "success",
                    confirmButtonColor: "#DD6B55",
                });
                window.setTimeout(function() {
                    $("#kt_table_project_type").DataTable().ajax.reload();
                }, 2300)
            },
            error: function(error) {
                swal({
                    title: "Project type creation failed",
                    text: "Please check the missing fields!",
                    icon: "error",
                    confirmButtonColor: "#fc3",
                    confirmButtonText: "OK",
                });
            }

        });
    }

    function submitEditProjectForm(proID) {
        let formdata = $('#editProjectform').serialize();
        $.ajax({
            type: "PUT",
            url: "{{ url('/api/v1/projects') }}" + "/" + proID,
            data: formdata,
            success: function(data) {
                swal({
                    title: "Success!",
                    text: "Project Edited!",
                    icon: "success",
                    confirmButtonColor: "#DD6B55",
                });
                $('#editProjectModal').modal('hide');
                window.setTimeout(function() {
                    $("#kt_table_projects").DataTable().ajax.reload();
                }, 2300)

            },
            error: function(error) {
                swal({
                    title: "Project Editing Failed!",
                    text: "Please check the missing fields!",
                    icon: "error",
                    confirmButtonColor: "#fc3",
                    confirmButtonText: "OK",
                });
            }


        })
    }



    function submitEditProjectSubtypeForm(sub_id) {
        $.ajax({
            type: "PUT",
            url: "{{ url('/api/v1/project-sub-types') }}" + "/" + sub_id,
            data: $('#editProjectSubtypeForm').serialize(),
            success: function(data) {

                swal({
                    title: "Success!",
                    text: "Project sub-type updated",
                    icon: "success",
                    confirmButtonColor: "#DD6B55",
                });
                $('#editProjectSubTypeModal').modal('hide');
                window.setTimeout(function() {
                    $("#kt_table_project_subtype").DataTable().ajax.reload();
                }, 2300)

            },
            error: function(error) {
                swal({
                    title: "Project sub-type editing failed",
                    text: "Please check the missing fields!",
                    icon: "error",
                    confirmButtonColor: "#fc3",
                    confirmButtonText: "OK",
                });
            }

        });
    }


    // Add 2nd project Sub type Post(in create project modal)
    function addProjectSubtypeX() {
        $.ajax({
            type: "POST",
            url: "{{ url('/api/v1/project-sub-types') }}",
            data: $('#addprojsubtypeform2').serialize(),
            success: function(data) {

                $.ajax({
                    type: "GET",
                    url: "{{ url('/api/v1/project_create') }}",
                    success: function(data) {
                        document.getElementById('projTypeBody1').innerHTML = `
                <option value="" selected></option>
                ` +
                            data.project_types.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                            `
                `
                    }
                });

                $('#subtypemainModal').modal('hide');
                document.getElementById('sub-type').value = "";

                swal({
                    title: "Success!",
                    text: "Project sub-type created",
                    icon: "success",
                    confirmButtonColor: "#DD6B55",
                });
                window.setTimeout(function() {
                    $("#kt_table_project_subtype").DataTable().ajax.reload();
                }, 2300)

            },
            error: function(error) {
                swal({
                    title: "Project sub-type creation failed",
                    text: "Please check the missing fields!",
                    icon: "error",
                    confirmButtonColor: "#fc3",
                    confirmButtonText: "OK",
                });
            }

        });
    }



    function addProjectSubtypeXOut() {
        $.ajax({
            type: "POST",
            url: "{{ url('/api/v1/project-sub-types') }}",
            data: $('#addprojsubtypeform2').serialize(),
            success: function(data) {
                swal({
                    title: "Success!",
                    text: "Project sub-type created",
                    icon: "success",
                    confirmButtonColor: "#DD6B55",
                    // confirmButtonText: "OK",
                });
                $('#subtypemainModal').modal('hide');
                window.setTimeout(function() {
                    $("#kt_table_project_subtype").DataTable().ajax.reload();
                }, 2300)

            },
            error: function(error) {
                swal({
                    title: "Project sub-type creation failed",
                    text: "Please check the missing fields!",
                    icon: "error",
                    confirmButtonColor: "#fc3",
                    confirmButtonText: "OK",
                });
            }

        });
    }

    // Add project Sub type Post
    function addProjectSubtype() {
        $.ajax({
            type: "POST",
            url: "{{ url('/api/v1/project-sub-types') }}",
            data: $('#addprojSubtypeform1').serialize(),
            success: function() {
                swal({
                    title: "Success!",
                    text: "Project sub-type created",
                    icon: "success",
                    confirmButtonColor: "#DD6B55",
                    // confirmButtonText: "OK",
                });
            },
            error: function(error) {

                swal({
                    title: "Project sub-type creation failed",
                    text: "Please check the missing fields!",
                    icon: "error",
                    confirmButtonColor: "#fc3",
                    confirmButtonText: "OK",
                });
            }

        });
    }

    function filterSubtype() {
        let typeVal = document.getElementById("projTypeBody1").value;
        $.ajax({
            type: "GET",
            url: "{{ url('/api/v1/project-types') }}" + "/" + typeVal,
            success: function(data) {
                document.getElementById('projectSubtypeId1').innerHTML = `
        <option value="" selected></option> ` +
                    data.data.project_sub_type.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                    `
    `
            },
            error: function(data) {
                `
    <option value="" selected></option>
    `
            }
        });
    }

    function editFilterSubtype() {
        let typeVal = document.getElementById("edit-projtypeboy").value;
        $.ajax({
            type: "GET",
            url: "{{ url('/api/v1/project-types') }}" + "/" + typeVal,
            success: function(data) {
                document.getElementById('edit-project_subtype_id').innerHTML = `
    <option value="" selected></option> ` +
                    data.data.project_sub_type.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                    `
    `
            },
            error: function(data) {
                `
    <option value="" selected></option>
    `
            }
        });
    }

    //  Edit Project Sub form
    var editSubData

function editProjectSubtype(sub_id) {

    $.ajax({
                type: "GET",
                url: "/api/v1/project-sub-types",
                success: function(data) {
                        let editProjectSubTypeModalBody = document.getElementById('editProjectSubTypeModalBody');
                        editProjectSubTypeModalBody.innerHTML = `
<form id="editProjectSubtypeForm" enctype="multipart/form-data">
    @csrf
                <div  class="modal-body">

                        <div class="form-group">
                            <label for="project-type">Select Project Type</label>
                            <select id="projecTttype" name="project_type_id" class="form-control" required>
                            ${data.data.map(elem => `<option value="${elem.project_type.id}">${elem.project_type.name}</option>`)}
                            </select>
                            <div class="error" id="editProjectTTTypeErr"></div>
                        </div>

                        <div class="form-group">
                            <label for="create-task">Subtype Name</label>
                            <input type="text" class="form-control" name="name" id="subTtype">
                            <div class="error" id="editProjectSubTypeErr"></div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#editProjectSubTypeModal').modal('hide');" data-target="#subtypemainModal">Close</button>
                    <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="ValidateEditProjectSubType(${sub_id});" value="Update">
                </div>
                </form>
        `
        },

        error: function (data) {
            console.log('Error:', data);
        }

    })

    $.ajax({
        type: "GET",
        url: "/api/v1/project-sub-types/" + sub_id,
        success: function (data) {
            editSubData = data.data;
            $('#projecTttype').val(editSubData[0].project_type_id + "");
            $('#subTtype').val(editSubData[0].name);
        },

        error: function (data) {
            console.log('Error:', data);
        }

    })

}

//Edit Project Type
var editProjectTypeData;

function editProjectType(type_id) {
    $.ajax({
        type: "GET",
        url: "/api/v1/project-types" + "/" + type_id,
        success: function (data) {
            editProjectTypeData = data.data;
            $('#editprojTypeInput').val(editProjectTypeData.name);
        },

        error: function (data) {
            console.log('Error:', data);
        }


    })


    let editProjectTypeBody = document.getElementById('editProjectTypeBody');
    editProjectTypeBody.innerHTML = `
<form id="editProtypeform" enctype="multipart/form-data">
    @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="create-task">Project type name</label>
                <input type="text" class="form-control" id="editprojTypeInput" name="name" placeholder="" value="" required>
                <div class="error" id="editProjectTypeErr"></div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="$('#EditProjectTypeModal').modal('hide');">Close</button>
            <input class="btn btn-danger" type="button" style="background-color:#8a2a2b; color:white;" onclick="validateEditProjectType(${type_id})" value="Update">
    </div>
</form>
`
}

function submitEditProjectType(typeId) {
    $.ajax({
        type: "PUT",
        data: $('#editProtypeform').serialize(),
        url: '/api/v1/project-types' + '/' + typeId,
        success: function (data) {
            swal({
                title: "Success!",
                text: "Project type edited!",
                icon: "success",
                confirmButtonColor: "#DD6B55",
            });
            $('#EditProjectTypeModal').modal('hide');
            window.setTimeout(function () {
                $("#kt_table_project_type").DataTable().ajax.reload();
            }, 2300)

        },
        error: function (error) {
            swal({
                title: "Project type editing failed!",
                icon: "error",
                confirmButtonColor: "#fc3",
                confirmButtonText: "OK",
            });
        }
    });
}


    //  Function for deleting single project
    function deleteProjectType(proID) {
        swal({
            title: "Are you sure?",
            text: "This project type will be deleted!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('/api/v1/project-types') }}" + "/" + proID,
                    success: function(data) {
                        swal("Deleted!", "Project type successfully deleted.", "success");
                        window.setTimeout(function() {
                            $("#kt_table_project_type").DataTable().ajax.reload();
                        }, 2300);
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

    //          Function for deleting single project subtype
    function deleteProjectSubType(proID) {
        swal({
            title: "Are you sure?",
            text: "This Project subtype will be deleted!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('/api/v1/project-sub-types') }}" + "/" + proID,
                    success: function(data) {
                        swal("Deleted!", "Project subtype successfully deleted.", "success");
                        window.setTimeout(function() {
                            $("#kt_table_project_subtype").DataTable().ajax.reload();
                        }, 2200);
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



    // function addTypeToProject(){
    // Add to the proj type....one in create project
    $(document).ready(function() {

        $('#addprojtypeform1').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('/api/v1/project-types') }}",
                data: $('#addprojtypeform1').serialize(),
                success: function(response, data) {
                    alert("Project-type created");
                    displayAddProject();
                    $('#projectModalIn').modal('hide');
                    return (data);
                },
                error: function(error) {
                    console.log(error);
                    alert("Project-type creation failed");
                }

            });
        });
    });

</script>
