function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

function validateCreateProjectForm() {
    // Retrieving the values of form elements
    let clientlist = $('#client-list').val();
    let projectSublist = $('#projectSubtypeId1').val();
    let projTypelist = $('#projtypeboy1').val();
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

    // Validate name

    // if(projectName == "") {
    //     printError("nameErr", "Please input a project name");
    // } else {
    //     var regex = /^[a-zA-Z\s]+$/;
    //     if(regex.test(projectName) === false) {
    //         printError("nameErr", "Please input a valid project name");
    //     } else {
    //         printError("nameErr", "");
    //         nameErr = false;
    //     }
    // }

    if (projectName == "") {
        printError("nameErr", "Please input a project name");
    } else if (projectName) {
        projectName = projectName.toUpperCase();
        $.ajax({
            type: "GET",
            url: "/api/v1/projects",
            success: function(data) {
                for (let i = 0; i < data.data.length; i++) {
                    if (data.data[i].name.toUpperCase() === projectName) {
                        printError("nameErr", "Project name already exists");
                        // nameErr = true;
                        break;
                    } else if (data.data[i].name.toUpperCase() !== projectName) {
                        printError("nameErr", "");
                        nameErr = false;
                    }
                }

            },

            error: function(data) {

            }

        })
    }

    if (projectName == "") {
        printError("nameErr", "Please input a project name");
    } else {
        printError("nameErr", "");
        nameErr = false;
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