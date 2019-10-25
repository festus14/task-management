<script>

            //Ajax populate create task category
            function createTaskCategoryAjaxGet(){
                $.ajax({
                    type: "GET",
                    url: '{{ url("/api/v1/create_task_categories") }}',
                    success: function (data) {
                        let createTaskCategory = document.getElementById('taskCategoryModalbody');
                        createTaskCategory.innerHTML =
                        `
                        <form  id="addTaskCategoryForm" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 row">
                            <div class="col-md-6 form-group mt-3">
                                <label for="category-name">Name</label>
                                <input type="text" class="form-control" name="name" id="category-name" placeholder="">
                                <div class="error" id="categoryNameErr"></div>
                            </div>

                            <div class="col-md-6 form-group mt-3">
                                <label>Project Type</label>
                                <select onchange="filterCategorySub()" id="createProjectTypeList"  name="project_type_id" class="selectDesign form-control">
                                        <option value=""> </option>
                                        ${Object.keys(data.data.project_types).map((key, index) => `<option value="${key}">${data.data.project_types[key]}</option>`)}
                                </select>
                                <div class="error" id="projectTypeeErr"></div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                                <div class="col-md-6 form-group mt-3">
                                    <label>Project Subtype</label>
                                    <select id="createSubCategory" name="sub_category_id" class="selectDesign form-control">

                                    </select>
                                    <div class="error" id="subtypeeErr"></div>
                                </div>

                                <div class="col-md-6 form-group mt-3">
                                    <label>Weight</label>
                                    <input type="number"  name="weight" value="" class="form-control" id="weightId" placeholder="">
                                    <div class="error" id="weightErr"></div>
                                </div>
                        </div>
                        <div class=" row col-md-12">
                            <div class="col-md-12 form-group mt-3">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="description" id="descriptionID" rows="3"></textarea>
                                <div class="error" id="descriptionErr"></div>
                            </div>
                        </div>
                        <div class="col-md-3 form-group mt-2">
                            <input type=button class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="validateTaskCategory();" value="{{ trans('global.create') }}">
                        </div>
                    </form>
                        `
                    }
                });
            }


        //  Edit TaskCategory
         var editTaskCategoryData;
            function editTaskCategory(task_id){
                $.ajax({
                type: "GET",
                url: "{{ url('/api/v1/tast-categories') }}" + "/" + task_id,
                success: function(data){
                    editTaskCategoryData = data.data;
                    $('#editCategoryName').val(editTaskCategoryData.name);
                    $('#editProjectTypeListt').val(editTaskCategoryData.project_type_id + "");
                    $('#editSubCategory').val(editTaskCategoryData.sub_category_id + "");
                    $('#editWeightId').val(editTaskCategoryData.weight);
                    $('#editDescriptionID').val(editTaskCategoryData.description);
                },

                error: function (data) {
                    console.log('Error:', data);
                }

            })

            $.ajax({
                type: "GET",
                url: "{{ url('/api/v1/create_task_categories') }}",
                success: function(data){
                var editTaskCatData = data.data;
                let editTaskCatBody = document.getElementById('editTaskCategoryModalBody');
                editTaskCatBody.innerHTML = `
                <form id="editTaskCategoryForm" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 row">
                            <div class="col-md-6 form-group mt-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="editCategoryName" placeholder="">
                                <div class="error" id="editCategoryNameErr"></div>
                            </div>

                            <div class="col-md-6 form-group mt-3">
                                <label>Project Type</label>
                                <select id="editProjectTypeListt" onchange="editFilterCategorySub()" name="project_type_id" class="selectDesign form-control">
                                    ${Object.keys(editTaskCatData.project_types).map((key, index) => `<option value="${key}">${editTaskCatData.project_types[key]}</option>`)}
                                </select>
                                <div class="error" id="editProjectTypeeErr"></div>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                                <div class="col-md-6 form-group mt-3">
                                    <label>Sub Category</label>
                                    <select id="editSubCategory" name="sub_category_id" class="selectDesign form-control">
                                        ${Object.keys(editTaskCatData.projects_sub_types).map((key, index) => `<option value="${key}">${editTaskCatData.projects_sub_types[key]}</option>`)}
                                    </select>
                                    <div class="error" id="editSubtypeeErr"></div>
                                </div>

                                <div class="col-md-6 form-group mt-3">
                                    <label>Weight</label>
                                    <input type="number"  name="weight" value="" class="form-control" id="editWeightId" placeholder="">
                                    <div class="error" id="editWeightErr"></div>
                                </div>
                        </div>
                        <div class=" row col-md-12">
                            <div class="col-md-12 form-group mt-3">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="description" id="editDescriptionID" rows="3"></textarea>
                                <div class="error" id="editDescriptionErr"></div>
                            </div>
                        </div>
                        <div class="col-md-3 form-group mt-2">
                            <input type=button class="btn btn-danger" style="background-color:#8a2a2b; color:white;" onclick="validateEditTaskCategory(${task_id});" value="{{ trans('global.update') }}">
                        </div>
                    </form>

                        `
                }
            })
            $.ajax({
                type: "GET",
                url: "{{ url('/api/v1/tast-categories') }}" + "/" + task_id,
                success: function(data){
                    editTaskCategoryData = data.data;
                    $('#editCategoryName').val(editTaskCategoryData.name);
                    $('#editProjectTypeListt').val(editTaskCategoryData.project_type_id + "");
                    $('#editSubCategory').val(editTaskCategoryData.sub_category_id + "");
                    $('#editWeightId').val(editTaskCategoryData.weight);
                    $('#editDescriptionID').val(editTaskCategoryData.description);
                },

                error: function (data) {
                    console.log('Error:', data);
                }

            })


        }


function filterCategorySub() {
    let typeVal = document.getElementById("createProjectTypeList").value;
    $.ajax({
        type: "GET",
        url: "{{ url('/api/v1/project-types')}}" + "/" + typeVal,
        success: function(data) {
            document.getElementById('createSubCategory').innerHTML = `
            <option value="" selected></option> ` +
                data.data.project_sub_type.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
            `
        },
        error: function(data) {
            document.getElementById('createSubCategory').innerHTML = `
            <option value="" selected></option>
            `
        }
    });
}

function editFilterCategorySub() {
    let typeVal = document.getElementById("editProjectTypeListt").value;
    $.ajax({
        type: "GET",
        url: "{{ url('/api/v1/project-types')}}" + "/" + typeVal,
        success: function(data) {
            document.getElementById('editSubCategory').innerHTML = `
                <option value="" selected></option> ` +
                data.data.project_sub_type.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                `
                `
        },
        error: function(data) {
            document.getElementById('editSubCategory').innerHTML = `
                <option value="" selected></option>
                `
        }
    });
}


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
