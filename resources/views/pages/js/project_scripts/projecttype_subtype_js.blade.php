<script>
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
        let formData = $('#editProjectform').serialize();
        $.ajax({
            type: "PUT",
            url: "{{ url('/api/v1/projects') }}" + "/" + proID,
            data: formData,
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
