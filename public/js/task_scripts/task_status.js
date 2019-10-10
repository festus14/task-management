function submitEditTaskStatus(taskStatusId) {
    $.ajax({
        type: "PUT",
        data: $('#editTaskStatusform').serialize(),
        url: '/api/v1/task-statuses' + "/" + taskStatusId,
        success: function(data) {
            swal({
                title: "Success!",
                text: "Task status edited!",
                icon: "success",
                confirmButtonColor: "#DD6B55",
            });
            $('#editTaskStatusModal').modal('hide');
            window.setTimeout(function() {
                $("#kt_table_task_status").DataTable().ajax.reload();
            }, 2300)

        },
        error: function(error) {
            swal({
                title: "Task status edit failed!",
                icon: "error",
                confirmButtonColor: "#fc3",
                confirmButtonText: "OK",
            });
        }
    });
}


// Delete Task Status
deleteSingleTaskStatus = (taskStatusID) => {
        swal({
            title: "Are you sure?",
            text: "This status will be deleted!",
            icon: "warning",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "DELETE",
                    url: '/api/v1/task-statuses' + '/' + taskStatusID,
                    success: function(data) {
                        swal("Deleted!", "Task category successfully deleted.", "success");
                        window.setTimeout(function() {
                            $("#kt_table_task_status").DataTable().ajax.reload();
                        }, 2300)
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
    // post to the Task status table
function postTaskStatus() {
    $.ajax({
        type: "POST",
        url: '/api/v1/task-statuses',
        data: $('#addStatusform').serialize(),
        success: function(data) {
            //$('#AddStatus').modal('hide');
            //document.getElementById('statusInput').value = "";
            swal({
                title: "Success!",
                text: "Task status created!",
                icon: "success",
                confirmButtonText: "Ok",
            });
            $('#AddStatus').modal('hide');
            window.setTimeout(function() {
                $("#kt_table_task_status").DataTable().ajax.reload();
            }, 2300)
        },
        error: function(error) {
            swal("Task creation failed", "Please check missing fields", "error");
        }
    });

}