let popAddProj = document.getElementById('addProjId');
popAddProj.addEventListener("click", displayAddProject);

function displayAddProject() {
    $("#createProjectModal").modal('show');
    $.ajax({
        type: "GET",
        url: '{{ url("/api/v1/project_create") }}',
        success: function(data) {
            let createProjectBody = document.getElementById('createProjectBody');
            let probSubtypeBody = document.getElementById('subtypeModalBody');
            createProjectBody.innerHTML = `
                    <div class="col-md-12 ">
                        <form id="addprojectform" enctype="multipart/form-data">
                            @csrf
                            <div class="row col-md-12">
                                <div class="col-md-6 form-group mt-3">
                                    <label>Select Client</label>
                                    <select id="client-list" name="client_id" class="form-control required">
                                    ` +
                data.clients.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                    </select>
                                </div>

                                <div class="col-md-6 form-group mt-3">
                                        <label for="create-project">Project Name</label>
                                    <input type="text" name="name" class="form-control" id="create-project" placeholder="" required>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4 form-group mt-3">
                                    <label for="create-project">Manager</label><br>
                                    <select name="manager_id" class="form-control" style="width:100%;" required>
                                        ` +
                data.managers.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                    </select>
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="create-project-type">Project Type</label>
                                    <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#PModal" style="float:right;"></i>
                                    <select class="form-control" id="projtypeboy" name="project_type_id" required>
                                        ` +
                data.project_types.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                    </select>
                                </div>


                                <div class="col-md-4 form-group mt-3">
                                    <label for="exampleFormControlSelect1">Project Sub-type</label>
                                    <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#subtypeModal" style="float:right;"></i>
                                    <select class="form-control" id="projectSubtypeId" name="project_subtype_id" required>
                                        ` +
                data.project_subtypes.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                    </select>
                                </div>
                            </div>
                            <div class="row col-md-12 ">

                                <div class="col-md-3 form-group mt-3">
                                    <label for="starting-date">Start Date</label>
                                    <input type="text" class="form-control date" name="starting_date" id="starting-date" required>
                                </div>

                                <div class="col-md-3 form-group mt-3">
                                    <label for="Deadline">Deadline</label>
                                    <input type="text" class="form-control datetime" name="deadline" id="Deadline" required>
                                </div>
                                <div class="col-md-6 form-group mt-3">
                                    <label>Team members</label><br>
                                    <select multiple="multiple" class="form-control select2" name="team_members[]" style="width:100%;"required>
                                        <option value="" selected ></option>
                                        ` +
                data.team_members.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                    </select>
                                </div>


                                <div class="col-md-2 form-group mt-3">
                                    <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="createProject();" value="Create">
                                </div>
                            </div>
                        </form>
                    </div>  `

            probSubtypeBody.innerHTML = `
                                <form id="addprojSubtypeform1"  enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                        <label for="project-type">Select Project Type</label>
                                        <select id="project-type" class="selectDesign form-control">
                                            <option value="" selected ></option>
                                            ` +
                data.project_types.map((elem) => `<option name="project_type_id" value="${elem.id}">${elem.name}</option>`) +
                `
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="create-subType">Subtype Name</label>
                                        <input type="text" class="form-control" name="name" id="subtypeId" placeholder="" required>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="$('#subtypeModal').modal('hide');" data-target="#subtypeModal">Close</button>
                                    <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="addProjectSubtype();" value="Create">
                                </div>
                                </form>
                     `
            window._token = $('meta[name="csrf-token"]').attr('content');

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
    });

}

//  Edit Project form
var editProjectData;

function editProject(project_id) {
    $.ajax({
        type: "GET",
        url: "/api/v1/projects/" + project_id,
        success: function(data) {
            editProjectData = data.data;
            $('#client_list').val(editProjectData.client_id + "");
            $('#project_name').val(editProjectData.name);
            $('#manager_id').val(editProjectData.manager_id + "");
            $('#projtypeboy').val(editProjectData.project_type_id + "");
            $('#project_subtype_id').val(editProjectData.project_subtype_id + "");
            $('#starting-date').val(editProjectData.starting_date);
            $('#Deadline').val(editProjectData.deadline);
            $('#teammembers').val(editProjectData.team_members);
            console.log(editProjectData);
        },

        error: function(data) {
            console.log('Error:', data);
        }

    })
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
                                    <label>Select Client</label>
                                    <select id="client_list" name="client_id" class="selectDesign form-control required">
                                        ` +
                projData.clients.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                    </select>
                                </div>

                                <div class="col-md-6 form-group mt-3">
                                        <label for="create-project">Project Name</label>
                                    <input type="text" name="name" class="form-control" id="project_name" placeholder="" required>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4 form-group mt-3">
                                    <label for="create-project">Manager</label><br>
                                    <select name="manager_id" class="form-control select2" style="width:100%;" required>
                                        ` +
                projData.managers.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                    </select>
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="create-project-type">Project Type</label>
                                    <select class="form-control" id="projtypeboy" name="project_type_id" required>
                                        ` +
                projData.project_types.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                    </select>
                                </div>

                                <div class="col-md-4 form-group mt-3">
                                    <label for="exampleFormControlSelect1">Project Sub-type</label>
                                    <select class="form-control" id="project_subtype_id" name="project_subtype_id" required>
                                        ` +
                projData.project_subtypes.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                    </select>
                                </div>
                            </div>
                            <div class="row col-md-12 ">
                                <div class="col-md-4 form-group mt-3">
                                    <label for="starting-date">Start Date</label>
                                    <input type="text" class="form-control date" name="starting_date" id="starting-date" required>
                                </div>

                                <div class="col-md-4 form-group mt-3">
                                    <label for="Deadline">Deadline</label>
                                    <input type="text" class="form-control date" name="deadline" id="Deadline" required>
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label>Team members</label><br>
                                    <select multiple class="form-control select2" id="teammembers" name="team_members[]" style="width:100%;"required>
                                        ` +
                projData.team_members.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                                    </select>
                                </div>


                                <div class="col-md-2 form-group mt-3">
                                    <input class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="createProject();" value="{{ trans('global.update') }}">
                                </div>
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

}


//  Edit Project Sub form
function editProjectSubtype() {
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
                            <select id="projecttype" name="project_type_id" class="selectDesign form-control">
                                ${data.data.map(elem => `<option value="${elem.id}">${elem.name}</option>`)}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="create-task">Subtype Name</label>
                            <input type="text" class="form-control" name="name" id="sub-type" placeholder="">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#editProjectSubTypeModal').modal('hide');" data-target="#subtypemainModal">Close</button>
                    <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="submitEditProjectSubtypeForm();" value="Update">
                </div>
                </form>
        `
                },

                error: function (data) {
                    console.log('Error:', data);
                }

            })
        }

        function submitEditProjectSubtypeForm(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                type: "PUT",
                url: '{{ url("/api/v1/project-sub-types") }}',
                data: $('#editProjectSubtypeForm').serialize(),
                success: function (data) {
                    alert("Project sub-type updated");
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                    alert("Project sub-type creation failed");
                }

            });
        }


        // Add 2nd project Sub type Post
            function addProjectSubtypeX(){
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                type: "POST",
                url: '{{ url("/api/v1/project-sub-types") }}',
                data: $('#addprojsubtypeform2').serialize(),
                success: function (data) {
                    alert("Project sub-type created");
                    getProjecSubTypeDT();
                    document.getElementById('sub-type').value = "";
                    $('#subtypemainModal').modal('hide');
                },
                error: function (error) {
                    console.log(error);
                    alert("Project sub-type creation failed");
                }

                });
                 }

                // Add project Sub type Post
            function addProjectSubtype(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                    type: "POST",
                    url: '{{ url("/api/v1/project-sub-types") }}',
                    data: $('#addprojSubtypeform1').serialize(),
                    success: function (data) {
                        alert("Project sub-type created");
                        // getProjetTypeDT();
                        // document.getElementById('subtypeId').value = "";
                        // $('#subtypeModal').modal('hide');
                    },
                    error: function (error) {
                        console.log(error);
                        alert("Project sub-type creation failed");
                    }

                    });
                    } // post to the create proj table
            createProject=()=>{
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                            type: "POST",
                            url: '{{ url("/api/v1/projects") }}',
                            data: $('#addprojectform').serialize(),
                            success: function (data) {
                                alert("Project successfully created");
                                location.reload();
                            },
                            error: function (error) {
                                alert("Project creation failed");
                            }
                            });
            }

            var editData;
            function editProject(proID) {

                $.ajax({
                    type: "GET",
                    url: "/api/v1/projects/" + proID,
                    success: function(data){
                        editData = data.data;
                        $('#create-project').val(editData.name)
                        $('#client-list').val(editData.client_id + "");
                        $('#project-list').val(editData.project_id + "");
                        $('#task-status').val(editData.status_id + "");
                        $('#manager_id').val(editData.manager_id + "");
                        $('#projtypeboy').val(editData.project_type_id + "");
                        $('#project_subtype_id').val(editData.project_subtype_id + "");
                        $('#starting-date').val(editData.starting_date);
                        $('#Deadline').val(editData.deadline);
                        $('#project-type').val(editData.project_type_id + "");
                        $('#create-subType').val(editData.project_subtype_id + "");
                        console.log(editData);
                    },

                    error: function (data) {
                        console.log('Error:', data);
                    }

                })

                $.ajax({
                    type: "GET",
                    url: "/api/v1/project_create",
                    success: function(data){
                        var allData = data.data;
                        let createProjectBody = document.getElementById('editProjectBody');
                        let probSubtypeBody = document.getElementById('subtypeModalBody');
                        createProjectBody.innerHTML = `
                        <div class="col-md-12 ">
                    <form id="addprojectform" enctype="multipart/form-data">
                        @csrf
                        <div class="row col-md-12">
                            <div class="col-md-6 form-group mt-3">
                                <label>Select Client</label>
                                <select id="client-list" name="client_id" class="selectDesign form-control required">
                                ` +
                                    data.clients.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                + `
                                </select>
                            </div>

                            <div class="col-md-6 form-group mt-3">
                                    <label for="create-project">Project Name</label>
                                <input type="text" name="name" class="form-control" id="create-project" placeholder="" required>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-4 form-group mt-3">
                                <label for="manager_id">Manager</label><br>
                                <select name="manager_id" class="form-control select2" style="width:100%;" required>
                                    ` +
                                    data.managers.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                + `
                                </select>
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label for="create-project-type">Project Type</label>
                                <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#PModal" style="float:right;"></i>
                                <select class="form-control" id="projtypeboy" name="project_type_id" required>
                                    ` +
                                    data.project_types.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                + `
                                </select>
                            </div>


                            <div class="col-md-4 form-group mt-3">
                                <label for="project_subtype_id">Project Sub-type</label>
                                <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#subtypeModal" style="float:right;"></i>
                                <select class="form-control" id="project_subtype_id" name="project_subtype_id" required>
                                    ` +
                                    data.project_subtypes.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                + `
                                </select>
                            </div>
                        </div>
                        <div class="row col-md-12 ">

                            <div class="col-md-4 form-group mt-3">
                                <label for="starting-date">Start Date</label>
                                <input type="text" class="form-control date" name="starting_date" id="starting-date" required>
                            </div>

                            <div class="col-md-4 form-group mt-3">
                                <label for="Deadline">Deadline</label>
                                <input type="text" class="form-control date" name="deadline" id="Deadline" required>
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label>Team members</label><br>
                                <select multiple class="form-control select2" name="team_members[]" style="width:100%;"required>
                                    ` +
                                    data.team_members.map(elem => `<option value="${elem.id}">${elem.name}</option>`)
                                + `
                                </select>
                            </div>


                            <div class="col-md-2 form-group mt-3">
                                <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="submitEditProjectForm();" value="Update">
                            </div>
                        </div>
                    </form>
                </div>  `

                            probSubtypeBody.innerHTML = `
                            <form id="addprojSubtypeform1"  enctype="multipart/form-data">
                                @csrf
                            <div class="form-group">
                                    <label for="project-type">Select Project Type</label>
                                    <select id="project-type" class="selectDesign form-control">
                                        ` +
                                            data.project_types.map((elem) => `<option name="project_type_id" value="${elem.id}">${elem.name}</option>`)
                                        + `
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="create-subType">Subtype Name</label>
                                    <input type="text" class="form-control" name="name" id="create-subType" placeholder="" required>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="$('#subtypeModal').modal('hide');" data-target="#subtypeModal">Close</button>
                                <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="addProjectSubtype();" value="Create">
                            </div>
                            </form>
                    `

                    },

                    error: function (data) {
                        console.log('Error:', data);
                    }

                })




                }

            function submitEditProjectForm(){
                $.ajax({
                    type: "PUT",
                    url: "/api/v1/project_create/",
                    success: function (data) {
                        console.log(data)
                        location.reload();
                    },

                    error: function (data) {
                        console.log('Error:', data);
                    }

                })
            }

            function documentDTCall(project_id){
                $(document).ready(function() {
                    $('#kt_table_single_project_documents').DataTable();
                } );
            }


            function reportDTCall(project_id){
                $(document).ready(function() {
                    $('#kt_table_single_project_reports').DataTable();
                } );
            }

            // Delete Project Function
        function deleteSingleProject(proID){
            var confirmDel = confirm("Do you want to delete the document?");

            if(confirmDel){
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('admin/projects')}}" + '/' + proID,
                    success: function (data) {
                        console.log(data);
                        location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        location.reload();
                    }
                });
            }
        }

             //          Function for deleting single project
             function deleteProjectType(proID){

                var confirmDel = confirm("Do you want to delete the project type?");

                if(confirmDel){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('admin/project-types')}}" + '/' + proID,
                        success: function (data) {
                            location.reload();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                            location.reload();
                        }
                    });
                }
            }

             //Edit Task
                var editProjectData;
            function editProjectType(type_id){
                $.ajax({
                    type: "GET",
                    url: "/api/v1/project-types/" + type_id,
                    success: function(data){
                        editProjectData = data.data;
                        $('#editprojTypeInput').val(editProjectData.name);
                        console.log(editProjectData);
                    },

                    error: function(data){
                        console.log('Error:', data);
                    }
                })
            }//          Function for deleting single project subtype
        function deleteProjectSubType(proID){

            var confirmDel = confirm("Do you want to delete the document?");

            if(confirmDel){
                $.ajax({
                    type: "DELETE",
                    url: "api/v1/project-sub-types" + '/' + proID,
                    success: function (data) {
                        console.log(data);
                        location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        }


        function editProjectType(){
            $.ajax({
                    type: "PUT",
                    url: "/api/v1/project-types",
                    success: function (data) {
                        console.log(data);
                        location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
        }

            let addProjSubTypeId = document.getElementById('addProjSubTypeId');
            addProjSubTypeId.addEventListener("click", displayAddPsubtype);

            function displayAddPsubtype(){
                $("#subtypemainModal").modal('show');
                    $.ajax({
                        type: "GET",
                        url: '{{ url("/api/v1/project-types") }}',
                        success: function (data) {
                            let subtypemainModalBody = document.getElementById('subtypemainModalBody');
                            subtypemainModalBody.innerHTML =  `
                    <form id="addprojsubtypeform2" enctype="multipart/form-data">
                        @csrf
                    <div  class="modal-body">

                        <div class="form-group">
                            <label for="project-type">Select Project Type</label>
                            <select id="projecttype" name="project_type_id" class="selectDesign form-control">

                                        ${data.data.map(elem => `<option value="${elem.id}">${elem.name}</option>`)}

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="create-task">Subtype Name</label>
                            <input type="text" class="form-control" name="name" id="sub-type" placeholder="">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#subtypemainModal').modal('hide');" data-target="#subtypemainModal">Close</button>
                    <input type="button" class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="addProjectSubtypeX();" value="{{ trans('global.create') }}">
                </div>
                </form>

                                            `
                                    },

                                    error: function (data) {
                                        console.log('Error:', data);
                        }});
                                }


                // function addTypeToProject(){
                // Add to the proj type....one in create project
                        $(document).ready(function(){

                    $('#addprojtypeform1').on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                    type: "POST",
                    url: '{{ url("/api/v1/project-types") }}',
                    data: $('#addprojtypeform1').serialize(),
                    success: function (response, data) {
                        alert("Project-type created");
                        displayAddProject();
                        $('#PModal').modal('hide');
                        console.log(data);
                        console.log(response);
                        return(data);
                    },
                    error: function (error) {
                        console.log(error);
                        alert("Project-type creation failed");
                    }

                    });
                    });
                    });
                    // end of project type ajax call

            // Add project type Post
               function addProject(){
                    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    $.ajax({
                    type: "POST",
                    url: '{{ url("/api/v1/project-types") }}',
                    data: $('#addprojTtypeform2').serialize(),
                    success: function (data) {
                        alert(data.success);
                        $('#AddProjecModalla').modal('hide');
                        document.getElementById('projTypeId').value = "";
                        getProjetTypeDT();
                        //location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                        alert("Project-type creation failed");
                    }

                    });
                 }