// post to the create proj table
const createProject = () => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: '/api/v1/projects',
        data: $('#addProjectForm').serialize(),
        success: function(data) {

            swal({
                title: "Success!",
                text: "Project Created!",
                icon: "success",
                confirmButtonColor: "#DD6B55",
                // confirmButtonText: "OK",
            });
            $('#createProjectModal').modal('hide');
            window.setTimeout(function() {
                $("#kt_table_projects").DataTable().ajax.reload();
            }, 2400)

        },
        error: function(error) {
            console.log(error)
            swal({
                title: "Project Creation Failed!",
                text: "Please check the missing fields!",
                icon: "error",
                confirmButtonColor: "#fc3",
                confirmButtonText: "OK",
            });
        }
    });
}


// Delete Project Function
function deleteSingleProject(proID) {
    swal({
        title: "Are you sure?",
        text: "This Project will be deleted!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {

            $.ajax({
                type: "DELETE",
                url: '/api/v1/projects' + '/' + proID,
                success: function(data) {
                    swal("Deleted!", "Project successfully deleted.", "success");
                    window.setTimeout(function() {
                        $("#kt_table_projects").DataTable().ajax.reload();
                    }, 2400);
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
