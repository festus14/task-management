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



//  Edit Project form
var editProjectData;

function editProject(project_id) {


    $.ajax({
        type: "GET",
        url: "/api/v1/project_create",
        success: function(data) {
            var projData = data;
            let editProjectBody = document.getElementById('editProjectBody');
            editProjectBody.innerHTML = `
                        <div class="col-md-12 ">
                            <form id="editProjectform" enctype="multipart/form-data">
                                @csrf
                                    <div class="row col-md-12">
                                        <div class="col-md-6 form-group mt-3">
                                            <label for="edit-client_list">Select Client</label>
                                            <select id="edit-client_list" name="client_id" class="selectDesign form-control required">
` +
                projData.clients.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group mt-3">
                                            <label for="edit-project_name">Project Name</label>
                                        <input type="text" name="name" class="form-control" id="edit-project_name" placeholder="" required>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-4 form-group mt-3">
                                        <label for="edit-manager_id">Manager</label><br>
                                        <select id ="edit-manager_id" name="manager_id" class="form-control" style="width:100%;" required>
                                            ` +
                projData.managers.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group mt-3">
                                        <label for="edit-projtypeboy">Project Type</label>
                                        <select class="form-control" id="edit-projtypeboy" onchange="editFilterSubtype()" onclick="editFilterSubtype()" name="project_type_id" required>
                                            ` +
                projData.project_types.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                        </select>
                                    </div>

                                    <div class="col-md-4 form-group mt-3">
                                        <label for="edit-project_subtype_id">Project Sub-type</label>
                                        <select class="form-control" id="edit-project_subtype_id" name="project_subtype_id" required>
                                            ` +
                projData.project_subtypes.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                        </select>
                                    </div>
                                </div>
                                <div class="row col-md-12 ">
                                    <div class="col-md-3 form-group">
                                        <label for="edit-starting-date">Start Date</label>
                                        <input type="text" class="form-control date" name="starting_date" id="edit-starting-date" required>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="edit-Deadline">Deadline</label>
                                        <input type="text" class="form-control datetime" name="deadline" id="edit-Deadline" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="edit-teammembers">Team members</label><br>
                                        <select multiple="multiple" class="form-control select2" id="edit-teammembers" name="team_members[]" style="width:100%;"required>
                                            ` +
                projData.team_members.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                        </select>
                                    </div>


                                    <div class="col-md-2 form-group mt-3">
                                        <input class="btn btn-danger" type="button" style="background-color:#8a2a2b; color:white;" onclick="submitEditProjectForm(${project_id});" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                        `
            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(allEditors[i]);
            }

            moment.updateLocale('en', {
                week: { dow: 1 } // Monday is the first day of the week
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

            $('.select-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            });
            $('.deselect-all').click(function() {
                let $select2 = $(this).parent().siblings('.select2');
                $select2.find('option').prop('selected', '');
                $select2.trigger('change')
            });

            $('.select2').select2();
        },

        error: function(data) {
            console.log('Error:', data);
        }

    })
    $.ajax({
        type: "GET",
        url: "/api/v1/projects/" + project_id,
        success: function(data) {
            editProjectData = data.data;
            let team_members = editProjectData.team_members.map(elem => elem.name)
            $('#edit-client_list').val(editProjectData.client_id + "");
            $('#edit-project_name').val(editProjectData.name);
            $('#edit-manager_id').val(editProjectData.manager_id + "");
            $('#edit-projtypeboy').val(editProjectData.project_type_id + "");
            $('#edit-project_subtype_id').val(editProjectData.project_subtype_id + "");
            $('#edit-starting-date').val(editProjectData.starting_date);
            $('#edit-Deadline').val(editProjectData.deadline);
            $('#edit-teammembers').val(team_members);
        },

        error: function(data) {
            console.log('Error:', data);
        }

    })
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "{{ url('api/v1/projects')}}" + '/' + proID,
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