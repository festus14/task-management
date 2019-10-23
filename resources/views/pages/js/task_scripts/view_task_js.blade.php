<script>
    // Delete Task Function
    deleteSingleTask = (taskID) => {

        swal({
            title: "Are you sure?",
            text: "Everything relating to this task will be lost!",
            icon: "warning",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('/api/v1/tasks') }}" + "/" + taskID,
                    success: function(data) {
                        swal("Deleted!", "Task has been successfully deleted.", "success");
                        window.setTimeout(function() {
                            $("#kt_table_task").DataTable().ajax.reload();
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



    function submitEditTaskForm(taskID) {
        let formData = $('#editTaskform').serialize();
        $.ajax({
            type: "PUT",
            url: "{{ ('/api/v1/tasks') }}" + "/" + taskID,
            data: formData,
            success: function(data) {
                swal({
                    title: "Success!",
                    text: "Task successfully edited!",
                    icon: "success",
                    confirmButtonColor: "#DD6B55",
                    // confirmButtonText: "OK",
                });
                $('#editTaskModalMain').modal('hide');
                window.setTimeout(function() {
                    $("#kt_table_task").DataTable().ajax.reload();
                }, 2300)

            },
            error: function(error) {
                swal({
                    title: "Task editing failed!",
                    text: "Please check the missing fields!",
                    icon: "error",
                    confirmButtonColor: "#fc3",
                    confirmButtonText: "OK",
                });
            }

        })
    }


    // post to the create Task table
    function postCreateTask() {
        $.ajax({
            type: "POST",
            url: "{{ url('/api/v1/tasks') }}",
            data: $('#addTaskform').serialize(),
            success: function(response) {
                $('#createTaskModal').modal('hide');
                swal({
                    title: "Success!",
                    text: "Task successfully created!",
                    icon: "success",
                    confirmButtonText: "Ok",
                });
                $('#createTaskModal').modal('hide');
                window.setTimeout(function() {
                    $("#kt_table_task").DataTable().ajax.reload();
                }, 2300)
            },
            error: function(error) {
                swal("Task creation failed", "Please check missing fields", "error");
            }
        });
    }
</script>
