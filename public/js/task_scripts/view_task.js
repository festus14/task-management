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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: "{{ url('api/v1/tasks')}}" + '/' + taskID,
                success: function(data) {
                    swal("Deleted!", "Task has been successfully deleted.", "success");
                    window.setTimeout(function() {
                        location.reload();
                    }, 2500);
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
        url: "{{ url('/api/v1/tasks') }}" + "/" + taskID,
        data: formData,
        success: function(data) {
            swal({
                title: "Success!",
                text: "Task successfully edited!",
                icon: "success",
                confirmButtonColor: "#DD6B55",
                // confirmButtonText: "OK",
            });
            window.setTimeout(function() {
                location.reload();
            }, 3000)

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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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
            window.setTimeout(function() {
                location.reload();
            }, 3000);
        },
        error: function(error) {
            swal("Task creation failed", "Please check missing fields", "error");
        }
    });
}