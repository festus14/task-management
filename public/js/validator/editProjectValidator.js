function validateEditProjectForm(project_id) {
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

    // if(editProjectName == "") {
    //     printError("editNameErr", "Please input a project name");
    // } else {
    //     var regex = /^[a-zA-Z\s]+$/;
    //     if(regex.test(editProjectName) === false) {
    //         printError("editNameErr", "Please input a valid project name");
    //     } else {
    //         printError("editNameErr", "");
    //         editNameErr = false;
    //     }
    // }


    //    if (editProjectName == "") {
    //        printError("editNameErr", "Please input a project name");
    //    } else if (editProjectName) {
    //        editProjectName = editProjectName.toUpperCase();
    //        $.ajax({
    //            type: "GET",
    //            url: "/api/v1/projects",
    //            success: function(data) {
    //                for (let i = 0; i < data.data.length; i++) {
    //                    if (data.data[i].name.toUpperCase() === editProjectName) {
    //                        printError("editNameErr", "Project name already exists");
    //                        // editNameErr = true;
    //                        break;
    //                    } else if (data.data[i].name.toUpperCase() !== editProjectName) {
    //                        printError("editNameErr", "");
    //                        editNameErr = false;
    //                    }
    //                }
    //
    //            },
    //
    //            error: function(data) {
    //
    //           }
    //
    //        })
    //    }

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