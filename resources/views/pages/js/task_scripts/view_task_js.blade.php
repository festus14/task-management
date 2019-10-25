<script>
    //Ajax populate create task
    let createTask = document.getElementById('addTaskId');
            createTask.addEventListener("click", displayAddTask);

            function displayAddTask(){
            $("#createTaskModal").modal('show');
                $.ajax({
                    type: "GET",
                    url: "{{ url('/api/v1/create_task') }}",
                    success: function (data) {
                        let createTaskBody = document.getElementById('createTaskBody');
                        // let probSubtypeBody = document.getElementById('subtypeModalBody');
                        createTaskBody.innerHTML = `
                    <div class="modal-body">
                        <form class="form" id="addTaskform" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="client-list">Select Client</label>
                                            <select id="client-list" onchange="filterType()" name="client_id" class="form-control">
                                                <option value="" selected> </option>
                                                ${Object.keys(data.data.clients).map((key, index) => `<option value="${key}">${data.data.clients[key]}</option>`)}
                                            </select>
                                            <div class="error" id="clientErr"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="create-task">Task Name</label>
                                            <input type="text" name="name" class="form-control" id="create-task" placeholder="" required>
                                            <div class="error" id="nameErr"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Select Project</label>
                                            <select id="project-list" name="project_id" class="selectDesign form-control">

                                            </select>
                                            <div class="error" id="projListErr"></div>
                                        </div>

                                        <div class="form-group">
                                            <label>Task Category</label>
                                            <select id="task-category" name="category_id" class="selectDesign form-control">
                                                    <option value="" selected> </option>
                                                    ${Object.keys(data.data.categories).map((key, index) => `<option value="${key}">${data.data.categories[key]}</option>`)}
                                            </select>
                                            <div class="error" id="categoryErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Task Status</label>
                                            <select id="task-status" name="status_id" class="selectDesign form-control">
                                                    <option value="" selected> </option>
                                                    ${Object.keys(data.data.statuses).map((key, index) => `<option value="${key}" >${data.data.statuses[key]}</option>`)}
                                                </select>
                                                <div class="error" id="statusErr"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Select Manager</label>
                                            <select id="manager" name="manager_id" class="selectDesign form-control">
                                                    <option value="" selected> </option>
                                                    ${Object.keys(data.data.managers).map((key, index) => `<option value="${key}">${data.data.managers[key]}</option>`)}
                                            </select>
                                            <div class="error" id="managerErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="assign-task">Assign task to</label>
                                                <br>
                                            <select style="width: 100%" name="assinged_tos[]" id="assinged_tos" multiple="multiple" class="form-control select2" required>
                                                ${Object.keys(data.data.assinged_tos).map((key, index) => `<option value="${key}">${data.data.assinged_tos[key]}</option>`)}
                                            </select>
                                            <div class="error" id="assignErr"></div>
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="starting-date">Starting Date</label>
                                            <input type="text" name="starting_date" class="form-control datetime" id="starting-date" required>
                                            <div class="error" id="startErr"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="deadline">Deadline</label>
                                            <input type="text" name="ending_date" class="form-control datetime" id="deadline" required>
                                            <div class="error" id="endErr"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="validateCreateTaskForm();" value="{{ trans('global.create') }}">
                                </div>
                            </form>

                        </div>
                        `
                        window._token = $('meta[name="csrf-token"]').attr('content');

                        var allEditors = document.querySelectorAll('.ckeditor');
                        for (var i = 0; i < allEditors.length; ++i) {
                            ClassicEditor.create(allEditors[i]);
                        }

                        moment.updateLocale('en', {
                            week: {dow: 1} // Monday is the first day of the week
                        });

                        $('.date').datetimepicker({
                            format: 'DD-MM-YYYY',
                            locale: 'en'
                        });

                        $('.datetime').datetimepicker({
                            format: 'DD-MM-YYYY HH:mm:ss',
                            locale: 'en',
                            sideBySide: true
                        });

                        $('.timepicker').datetimepicker({
                            format: 'HH:mm:ss'
                        });

                        $('.select-all').click(function () {
                            let $select2 = $(this).parent().siblings('.select2')
                            $select2.find('option').prop('selected', 'selected')
                            $select2.trigger('change')
                        });
                        $('.deselect-all').click(function () {
                            let $select2 = $(this).parent().siblings('.select2');
                            $select2.find('option').prop('selected', '');
                            $select2.trigger('change')
                        });

                        $('.select2').select2();
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                    }
                                                });
                                            }

                    function filterType(){
                        let clientVal = document.getElementById("client-list").value;
                        console.log(clientVal);
                        $.ajax({
                            type: "GET",
                            url: "{{ url('/api/v1/clients')}}" + "/" + clientVal,
                            success: function (data) {
                                document.getElementById('project-list').innerHTML = `
                                <option value="" selected></option> ` +
                                data.data.projects.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                + `
                                `
                            },
                            error: function (data) {
                                document.getElementById('project-list').innerHTML =
                                `
                                <option value="" selected></option>
                                `
                                console.log('Error:', data);
                            }
                        });
                    }


                //Edit Task
                var editData;
            function editTaskMain(task_id) {

                    $.ajax({
                        type: "GET",
                        url: "{{ url('/api/v1/create_task') }}",
                        success: function(data){
                            var allData = data.data;
                        let editTaskBody = document.getElementById('editTaskBody');
                        editTaskBody.innerHTML = `
                            <div class="modal-body">
                            <form id="editTaskform" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="edit-client-list">Select Client</label>
                                            <select id="edit-client-list" onchange="editFilterType()" name="client_id" class="selectDesign form-control" selected="3">
                                                ${Object.keys(allData.clients).map((key, index) => `<option value="${key}">${allData.clients[key]}</option>`)}
                                            </select>
                                            <div class="error" id="editClientErr"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="edit-create-task">Task Name</label>
                                            <input type="text" name="name" class="form-control" id="edit-create-task" placeholder="Enter Task Name" required>
                                            <div class="error" id="editTaskNameErr"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="edit-project-list">Select Project</label>
                                            <select id="edit-project-list" name="project_id" class="selectDesign form-control">
                                                ${Object.keys(allData.projects).map((key, index) => `<option value="${key}">${allData.projects[key]}</option>`)}
                                            </select>
                                            <div class="error" id="editProjectErr"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="edit-task-category">Task Category</label>
                                            <select id="edit-task-category" name="category_id" class="selectDesign form-control">
                                                ${Object.keys(allData.categories).map((key, index) => `<option value="${key}">${allData.categories[key]}</option>`)}
                                            </select>
                                            <div class="error" id="editTaskCatErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="edit-task-status">Task Status</label>
                                            <select id="edit-task-status" name="status_id" class="selectDesign form-control">
                                                ${Object.keys(allData.statuses).map((key, index) => `<option value="${key}" >${allData.statuses[key]}</option>`)}
                                            </select>
                                            <div class="error" id="editTaskStatusErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="edit-manager">Select Manager</label>
                                            <select id="edit-manager" name="manager_id" class="selectDesign form-control">
                                                ${Object.keys(allData.managers).map((key, index) => `<option value="${key}">${allData.managers[key]}</option>`)}
                                            </select>
                                            <div class="error" id="editManagerErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="edit-edit_assinged_tos">Assign task to</label>
                                                <br>
                                            <select style="width: 100%" name="assinged_tos[]" id="edit-edit_assinged_tos" multiple="multiple" required class="form-control select2">
                                                ${Object.keys(allData.assinged_tos).map((key, index) => `<option value="${key}">${allData.assinged_tos[key]}</option>`)}
                                            </select>
                                            <div class="error" id="editAssignedTosErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="edit-starting-date">Starting Date</label>
                                            <input type="text" name="starting_date" class="form-control datetime" id="edit-starting-date" required>
                                            <div class="error" id="editStartErr"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="edit-deadline">Deadline</label>
                                            <input type="text" name="ending_date" class="form-control datetime" id="edit-deadline" required>
                                            <div class="error" id="editEndErr"></div>
                                        </div>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="validateEditCreateTaskForm(${task_id});" value="Update">
                                </div>
                            </form>

                        </div>
                        `

                        $.ajax({
                        type: "GET",
                        url: "{{ url('/api/v1/tasks/') }}" + "/" + task_id,
                        success: function(data){
                            editData = data.data;
                            $('#edit-create-task').val(editData.name);
                            $('#edit-client-list').val(editData.client_id + "");
                            $('#edit-project-list').val(editData.project_id + "");
                            $('#edit-task-status').val(editData.status_id + "");
                            $('#edit-manager').val(editData.manager_id + "");
                            $('#edit-task-category').val(editData.category_id + "");
                            $('#edit_assinged_tos').val(editData.assinged_tos + "");
                            $('#edit-starting-date').val(editData.starting_date);
                            $('#edit-deadline').val(editData.ending_date);
                        },

                        error: function (data) {
                            console.log('Error:', data);
                        }

                    })

                        window._token = $('meta[name="csrf-token"]').attr('content');

                            var allEditors = document.querySelectorAll('.ckeditor');
                            for (var i = 0; i < allEditors.length; ++i) {
                                ClassicEditor.create(allEditors[i]);
                            }

                            moment.updateLocale('en', {
                                week: {dow: 1} // Monday is the first day of the week
                            });

                            $('.date').datetimepicker({
                                format: 'DD-MM-YYYY',
                                locale: 'en'
                            });

                            $('.datetime').datetimepicker({
                                format: 'DD-MM-YYYY HH:mm:ss',
                                locale: 'en',
                                sideBySide: true
                            });

                            $('.timepicker').datetimepicker({
                                format: 'HH:mm:ss'
                            });

                            $('.select-all').click(function () {
                                let $select2 = $(this).parent().siblings('.select2')
                                $select2.find('option').prop('selected', 'selected')
                                $select2.trigger('change')
                            });
                            $('.deselect-all').click(function () {
                                let $select2 = $(this).parent().siblings('.select2');
                                $select2.find('option').prop('selected', '');
                                $select2.trigger('change')
                            });

                            $('.select2').select2();
                        },

                        error: function (data) {
                            console.log('Error:', data);
                        }

                    })

                    }

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
