<script>
    // Delete Task Category
    deleteSingleTaskCategory = (taskCategoryID) => {
        swal({
            title: "Are you sure?",
            text: "This category will be deleted!",
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
                    url: "{{ url('/api/v1/tast-categories') }}" + "/" + taskCategoryID,
                    success: function(data) {
                        swal("Deleted!", "Task category successfully deleted.", "success");
                        window.setTimeout(function() {
                            $("#kt_table_task_category").DataTable().ajax.reload();
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

    function submitEditTaskCategory(taskID) {
        $.ajax({
            type: "PUT",
            url: "{{ url('/api/v1/tast-categories') }}" + "/" + taskID,
            data: $('#editTaskCategoryForm').serialize(),
            success: function(data) {
                swal({
                    title: "Success!",
                    text: "Task category successfully edited!",
                    icon: "success",
                    confirmButtonColor: "#DD6B55",
                    // confirmButtonText: "OK",
                });
                $('#editTaskCategoryModal').modal('hide');
                window.setTimeout(function() {
                    $("#kt_table_task_category").DataTable().ajax.reload();
                }, 2300)

            },
            error: function(error) {
                swal({
                    title: "Task category editing failed!",
                    text: "Please check the missing fields!",
                    icon: "error",
                    confirmButtonColor: "#fc3",
                    confirmButtonText: "OK",
                });
            }

        })
    }

    function postCreateTaskCategory() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "{{ url('/api/v1/tast-categories') }}",
            data: $('#addTaskCategoryForm').serialize(),
            success: function(data) {
                $('#addTaskCategory').modal('hide');
                swal({
                    title: "Success!",
                    text: "Task category created!",
                    icon: "success",
                    confirmButtonText: "Ok",
                });
                $('#addTaskCategory').modal('hide');
                window.setTimeout(function() {
                        $("#kt_table_task_category").DataTable().ajax.reload();
                    }, 2300)
                    // getTaskCategoryAjaxDT();
                    // document.getElementById('category-name').value = "";
                    // document.getElementById('weightId').value = "";
            },
            error: function(data) {
                swal("Task category creation failed!", "Please check missing fields", "error");
            }
        });
    }
</script>
