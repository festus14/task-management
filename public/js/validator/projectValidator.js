function validateCreateProjectForm() {
    // Retrieving the values of form elements
    let clientlist = $('#client-list').val();
    let projectSublist = $('#projectSubtypeId1').val();
    let projTypelist = $('#projTypeBody1').val();
    let projectName = $('#create-project').val();
    let manager = $('#manager_id').val();
    let teamMembers = $('#teammembers').val();
    let startDate = $('#starting-date').val();
    let deadline = $('#Deadline').val();


    // Defining error variables with a default value
    var clientErr = projTypeErr = projSubErr = nameErr = managerErr = membersErr = startErr = endErr = true;

    // Validate client
    if (clientlist == "") {
        printError("clientErr", "Please select a client");
    } else {
        printError("clientErr", "");
        clientErr = false;
    }
    // Validate project
    if (projTypelist == "") {
        printError("projTypeErr", "Please select a project type");
    } else {
        printError("projTypeErr", "");
        projTypeErr = false;
    }
    // Validate project sub
    if (projectSublist == "") {
        printError("projSubErr", "Please select a project subtype");
    } else {
        printError("projSubErr", "");
        projSubErr = false;
    }


    var allProjects;
    $.ajax({
        type: "GET",
        url: '/api/v1/projects',
        async: false,
        success: function(data) {
            allProjects = data;

        },

        error: function(data) {

        }

    })

    if (projectName == "") {
        printError("nameErr", "Please input a project name");
    } else if (projectName) {
        projectName = projectName.toUpperCase();

        for (let i = 0; i < allProjects.data.length; i++) {
            if (allProjects.data[i].name.toUpperCase() === projectName) {
                printError("nameErr", "Project name already exists");
                nameErr = true;
                break;
            } else {
                printError("nameErr", "");
                nameErr = false;
            }
        }

    }

    // Validate task manager
    if (manager == "") {
        printError("managerErr", "Select a manager");
    } else {
        printError("managerErr", "");
        managerErr = false;
    }

    // Validate members
    if (teamMembers == "") {
        printError("membersErr", "Please select a member");
    } else {
        printError("membersErr", "");
        membersErr = false;
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

    if ((clientErr || projTypeErr || projSubErr || nameErr || managerErr || membersErr || startErr || endErr) == true) {
        return false;
    } else {
        createProject();
    }
};

function validateEditProjectForm(project_id) {
    console.log('here')
        // Retrieving the values of form elements
    let editClientlist = $('#client_list').val();
    let editProjectSublist = $('#project_subtype_id').val();
    let editProjTypelist = $('#projtypeboy').val();
    let editProjectName = $('#project_name').val();
    let editManager = $('#managerId').val();
    let editTeamMembers = $('#team-members').val();
    let editStartDate = $('#startingDate').val();
    let editDeadline = $('#Dead-line').val();


    // Defining error variables with a default value
    var editClientErr = editProjTypeErr = editProjSubErr = editNameErr = editManagerErr = editMembersErr = editStartErr = editEndErr = true;

    // Validate client
    if (editClientlist == "") {
        printError("editClientErr", "Please select a client");
    } else {
        printError("editClientErr", "");
        editClientErr = false;
    }
    // Validate project
    if (editProjTypelist == "") {
        printError("editProjTypeErr", "Please select a project type");
    } else {
        printError("editProjTypeErr", "");
        editProjTypeErr = false;
    }
    // Validate project sub
    if (editProjectSublist == "") {
        printError("editProjSubErr", "Please select a project subtype");
    } else {
        printError("editProjSubErr", "");
        editProjSubErr = false;
    }

    // Validate name
    if (editProjectName == "") {
        printError("editNameErr", "Please input a project name");
    } else {
        printError("editNameErr", "");
        editNameErr = false;
    }

    // Validate task manager
    if (editManager == "") {
        printError("editManagerErr", "Select a manager");
    } else {
        printError("editManagerErr", "");
        editManagerErr = false;
    }

    // Validate members
    if (editTeamMembers == "") {
        printError("editMembersErr", "Please select a member");
    } else {
        printError("editMembersErr", "");
        editMembersErr = false;
    }

    // Validate start date
    if (editStartDate == "") {
        printError("editStartErr", "Pick a date");
    } else {
        printError("editStartErr", "");
        editStartErr = false;
    }


    // Validate deadline
    if (editDeadline == "") {
        printError("editEndErr", "Pick a date");
    } else {
        printError("editEndErr", "");
        editEndErr = false;
    }


    // Prevent the form from being submitted if there are any errors

    if ((editClientErr || editProjTypeErr || editProjSubErr || editNameErr || editManagerErr || editMembersErr || editStartErr || editEndErr) == true) {
        return false;
    } else {

        submitEditProjectForm(project_id);
    }
};