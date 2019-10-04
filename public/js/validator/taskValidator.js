function validateCreateTaskForm() {
    // Retrieving the values of form elements
    let clientlist = $('#client-list').val();
    let projectlist = $('#project-list').val();
    let projSubList = $('#project-subtype-list').val();
    let taskName = $('#create-task').val();
    let taskCat = $('#task-category').val();
    let taskStat = $('#task-status').val();
    let manager = $('#manager').val();
    let assignedTos = $('#assinged_tos').val();
    let startDate = $('#starting-date').val();
    let deadline = $('#deadline').val();


    // Defining error variables with a default value
    var clientErr = projListErr = projSubErr = nameErr = categoryErr = statusErr = managerErr = assignErr = startErr = endErr = true;

    // Validate client
    if (clientlist == "") {
        printError("clientErr", "Please select a client");
    } else {
        printError("clientErr", "");
        clientErr = false;
    }
    // Validate project
    if (projectlist == "") {
        printError("projListErr", "Please select a project");
    } else {
        printError("projListErr", "");
        projListErr = false;
    }
    // Validate project sub
    if (projSubList == "") {
        printError("projSubErr", "Please select a project subtype");
    } else {
        printError("projSubErr", "");
        projSubErr = false;
    }

    var allTasks;
    $.ajax({
        type: "GET",
        url: "/api/v1/tasks",
        async: false,
        success: function(data) {
            allTasks = data;

        },

        error: function(data) {

        }

    })

    if (taskName == "") {
        printError("nameErr", "Please input a project name");
    } else if (taskName) {
        taskName = taskName.toUpperCase();

        for (let i = 0; i < allTasks.data.length; i++) {
            if (allTasks.data[i].name.toUpperCase() === taskName) {
                printError("nameErr", "Task name already exists");
                nameErr = true;
                break;
            } else {
                printError("nameErr", "");
                nameErr = false;
            }
        }

    }

    // Validate task category
    if (taskCat == "") {
        printError("categoryErr", "Please select a category");
    } else {
        printError("categoryErr", "");
        categoryErr = false;
    }

    // Validate task status
    if (taskStat == "") {
        printError("statusErr", "Please select a status");
    } else {
        printError("statusErr", "");
        statusErr = false;
    }

    // Validate task manager
    if (manager == "") {
        printError("managerErr", "Please select a manager");
    } else {
        printError("managerErr", "");
        managerErr = false;
    }

    // Validate assigned tos
    if (assignedTos == "") {
        printError("assignErr", "Please select a member");
    } else {
        printError("assignErr", "");
        assignErr = false;
    }

    // Validate start date
    if (startDate == "") {
        printError("startErr", "Pick a date");
    } else {
        printError("startErr", "");
        startErr = false;
    }


    // Validate deadline
    if (deadline == "") {
        printError("endErr", "Pick a date");
    } else {
        printError("endErr", "");
        endErr = false;
    }


    // Prevent the form from being submitted if there are any errors

    if ((clientErr || projListErr || projSubErr || nameErr || categoryErr || statusErr || managerErr || assignErr || startErr || endErr) == true) {
        return false;
    } else {

        postCreateTask();
    }
};

function validateEditCreateTaskForm(task_id) {
    // Retrieving the values of form elements
    let EditClientlist = $('#client-list').val();
    let EditProjectlist = $('#project-list').val();
    let EditProjSubList = $('#project-subtype-list').val();
    let EditTaskName = $('#create-task').val();
    let EditTaskCat = $('#task-category').val();
    let EditTaskStat = $('#task-status').val();
    let EditManager = $('#manager').val();
    let EditAssignedTos = $('#assinged_tos').val();
    let EditStartDate = $('#starting-date').val();
    let EditDeadline = $('#deadline').val();


    // Defining error variables with a default value
    var editClientErr = editProjectErr = editProjectSubTypeErr = editTaskNameErr = editTaskCatErr = editTaskStatusErr = editManagerErr = editAssignedTosErr = editStartErr = editEndErr = true;

    // Validate client
    if (EditClientlist == "") {
        printError("editClientErr", "Please select a client");
    } else {
        printError("editClientErr", "");
        editClientErr = false;
    }
    // Validate project
    if (EditProjectlist == "") {
        printError("editProjectErr", "Please select a project");
    } else {
        printError("editProjectErr", "");
        editProjectErr = false;
    }
    // Validate project sub
    if (EditProjSubList == "") {
        printError("editProjectSubTypeErr", "Please select a project subtype");
    } else {
        printError("editProjectSubTypeErr", "");
        editProjectSubTypeErr = false;
    }

    if (EditTaskName == "") {
        printError("editTaskNameErr", "Please input a task name");
    } else {
        printError("editTaskNameErr", "");
        editTaskNameErr = false;
    }

    // Validate task category
    if (EditTaskCat == "") {
        printError("editTaskCatErr", "Please select a category");
    } else {
        printError("editTaskCatErr", "");
        editTaskCatErr = false;
    }

    // Validate task status
    if (EditTaskStat == "") {
        printError("editTaskStatusErr", "Please select a status");
    } else {
        printError("editTaskStatusErr", "");
        editTaskStatusErr = false;
    }

    // Validate task EditManager
    if (EditManager == "") {
        printError("editManagerErr", "Please select a manager");
    } else {
        printError("editManagerErr", "");
        editManagerErr = false;
    }

    // Validate assigned tos
    if (EditAssignedTos == "") {
        printError("editAssignedTosErr", "Please select a member");
    } else {
        printError("editAssignedTosErr", "");
        editAssignedTosErr = false;
    }

    // Validate start date
    if (EditStartDate == "") {
        printError("editStartErr", "Pick a date");
    } else {
        printError("editStartErr", "");
        editStartErr = false;
    }


    // Validate deadline
    if (EditDeadline == "") {
        printError("editEndErr", "Pick a date");
    } else {
        printError("editEndErr", "");
        editEndErr = false;
    }


    // Prevent the form from being submitted if there are any errors

    if ((editClientErr || editProjectErr || editProjectSubTypeErr || editTaskNameErr || editTaskCatErr || editTaskStatusErr || editManagerErr || editAssignedTosErr || editStartErr || editEndErr) == true) {
        return false;
    } else {

        submitEditTaskForm(task_id)
    }
};

function validateTaskCategory() {
    var allTaskCategories;
    $.ajax({
        type: "GET",
        url: "/api/v1/tast-categories",
        async: false,
        success: function(data) {
            allTaskCategories = data;

        },

        error: function(data) {

        }

    })


    // Retrieving the values of form elements
    let categoryName = $('#category-name').val();
    let projType = $('#createProjectTypeList').val();
    let projSubType = $('#createSubCategory').val();
    let weight = $('#weightId').val();
    let description = $('#descriptionID').val();



    // Defining error variables with a default value
    var categoryNameErr = projectTypeeErr = subtypeeErr = weightErr = descriptionErr = true;

    if (categoryName == "") {
        printError("categoryNameErr", "Please input a project name");
    } else if (categoryName) {
        categoryName = categoryName.toUpperCase();

        for (let i = 0; i < allTaskCategories.data.length; i++) {
            if (allTaskCategories.data[i].name.toUpperCase() === categoryName) {
                printError("categoryNameErr", "Task category already exists");
                categoryNameErr = true;
                break;
            } else {
                printError("categoryNameErr", "");
                categoryNameErr = false;
            }
        }

    }

    // if (categoryName == "") {
    //     printError("categoryNameErr", "Please input a name");
    // } else {
    //     printError("categoryNameErr", "");
    //     categoryNameErr = false;
    // }
    // Validate project
    if (projType == "") {
        printError("projectTypeeErr", "Please select a project type");
    } else {
        printError("projectTypeeErr", "");
        projectTypeeErr = false;
    }
    // Validate project sub
    if (projSubType == "") {
        printError("subtypeeErr", "Please select a project subtype");
    } else {
        printError("subtypeeErr", "");
        subtypeeErr = false;
    }

    if (weight == "") {
        printError("weightErr", "Please fill in this field");
    } else {
        printError("weightErr", "");
        weightErr = false;
    }


    if (description == "") {
        printError("descriptionErr", "Please fill in this field");
    } else {
        printError("descriptionErr", "");
        descriptionErr = false;
    }


    // Prevent the form from being submitted if there are any errors

    if ((categoryNameErr || projectTypeeErr || subtypeeErr || descriptionErr || weightErr) == true) {
        return false;
    } else {

        postCreateTaskCategory();
    }
};


function validateEditTaskCategory(task_id) {
    // Retrieving the values of form elements
    let editCategoryName = $('#categoryName').val();
    let editProjType = $('#projectTypeListt').val();
    let editProjSubType = $('#editSubCategory').val();
    let editWeight = $('#editWeightId').val();
    let editDescription = $('#editDescriptionID').val();



    // Defining error variables with a default value
    var editCategoryNameErr = editProjectTypeeErr = editSubtypeeErr = editWeightErr = editDescriptionErr = true;

    if (editCategoryName == "") {
        printError("editCategoryNameErr", "Please input a name");
    } else {
        printError("editCategoryNameErr", "");
        editCategoryNameErr = false;
    }

    if (editProjType == "") {
        printError("editProjectTypeeErr", "Please select a project type");
    } else {
        printError("editProjectTypeeErr", "");
        editProjectTypeeErr = false;
    }

    if (editProjSubType == "") {
        printError("editSubtypeeErr", "Please select a project subtype");
    } else {
        printError("editSubtypeeErr", "");
        editSubtypeeErr = false;
    }

    if (editWeight == "") {
        printError("editWeightErr", "Please fill in this field");
    } else {
        printError("editWeightErr", "");
        editWeightErr = false;
    }


    if (editDescription == "") {
        printError("editDescriptionErr", "Please fill in this field");
    } else {
        printError("editDescriptionErr", "");
        editDescriptionErr = false;
    }


    // Prevent the form from being submitted if there are any errors

    if ((editCategoryNameErr || editProjectTypeeErr || editSubtypeeErr || editDescriptionErr || editWeightErr) == true) {
        return false;
    } else {

        submitEditTaskCategory(task_id);

    }
};


function validateStatus() {
    var allTaskStatuses;
    $.ajax({
            type: "GET",
            url: "/api/v1/task-statuses",
            async: false,
            success: function(data) {
                allTaskStatuses = data;

            },

            error: function(data) {

            }

        })
        // Retrieving the values of form elements
    let taskStatus = $('#statusInput').val();


    // Defining error variable with a default value
    var taskStatusErr = true;

    if (taskStatus == "") {
        printError("taskStatusErr", "Please input a project name");
    } else if (taskStatus) {
        taskStatus = taskStatus.toUpperCase();

        for (let i = 0; i < allTaskStatuses.data.length; i++) {
            if (allTaskStatuses.data[i].name.toUpperCase() === taskStatus) {
                printError("taskStatusErr", "Task status already exists");
                taskStatusErr = true;
                break;
            } else {
                printError("taskStatusErr", "");
                taskStatusErr = false;
            }
        }

    }


    // Prevent the form from being submitted if there are any errors

    if (taskStatusErr == true) {
        return false;
    } else {

        postTaskStatus();
    }
};

function validateEditStatus(taskStatusId) {
    // Retrieving the values of form elements
    let editTaskStatus = $('#editStatusInput').val();


    // Defining error variable with a default value
    var editTaskStatusErr = true;

    if (editTaskStatus == "") {
        printError("editTaskStatusErr", "Please provide an input");
    } else {
        printError("editTaskStatusErr", "");
        editTaskStatusErr = false;
    }


    // Prevent the form from being submitted if there are any errors

    if (editTaskStatusErr == true) {
        return false;
    } else {

        submitEditTaskStatus(taskStatusId);
    }
};