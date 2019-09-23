function validateProjectType(project_id) {
    // Retrieving the values of form elements
    let projectType = $('#projTypeId').val();


    // Defining error variable with a default value
    var projectTypeErr = true;

    if (projectType == "") {
        printError("projectTypeErr", "Please provide an input");
    } else {
        printError("projectTypeErr", "");
        projectTypeErr = false;
    }


    // Prevent the form from being submitted if there are any errors

    if (projectTypeErr == true) {
        return false;
    } else {

        addProject();
    }
};

function validateEditProjectType(type_id) {
    console.log('ok na')
        // Retrieving the values of form elements
    let editProjectType = $('#editprojTypeInput').val();


    // Defining error variable with a default value
    var editProjectTypeErr = true;

    if (editProjectType == "") {
        printError("editProjectTypeErr", "Please provide an input");
    } else {
        printError("editProjectTypeErr", "");
        editProjectTypeErr = false;
    }


    // Prevent the form from being submitted if there are any errors

    if (editProjectTypeErr == true) {
        return false;
    } else {

        submitEditProjectType(type_id);
    }
}

function validateProjectSubType() {
    // Retrieving the values of form elements
    let projectType = $('#project-type').val();
    let projectSubType = $('#sub-type').val();


    // Defining error variable with a default value
    var projectSubTypeErr = projectTTTypeErr = true;

    if (projectType == "") {
        console.log("projectype empty");
        printError("projectTTTypeErr", "Please provide an input");
    } else {
        printError("projectTTTypeErr", "");
        projectTTTypeErr = false;
    }

    if (projectSubType == "") {
        printError("projectSubTypeErr", "Please provide an input");
    } else {
        printError("projectSubTypeErr", "");
        projectSubTypeErr = false;
    }


    // Prevent the form from being submitted if there are any errors

    if ((projectSubTypeErr == true) || (projectTTTypeErr == true)) {
        return false;
    } else {

        addProjectSubtypeX();
    }
};

function ValidateEditProjectSubType(sub_id) {
    // Retrieving the values of form elements
    let editProjectType = $('#projecTttype').val();
    let editProjectSubType = $('#subTtype').val();


    // Defining error variable with a default value
    var editProjectSubTypeErr = editProjectTTTypeErr = true;

    if (editProjectType == "") {
        console.log("projectype empty");
        printError("editProjectTTTypeErr", "Please provide an input");
    } else {
        printError("editProjectTTTypeErr", "");
        editProjectTTTypeErr = false;
    }

    if (editProjectSubType == "") {
        printError("editProjectSubTypeErr", "Please provide an input");
    } else {
        printError("editProjectSubTypeErr", "");
        editProjectSubTypeErr = false;
    }


    // Prevent the form from being submitted if there are any errors

    if ((editProjectSubTypeErr == true) || (editProjectTTTypeErr == true)) {
        return false;
    } else {

        submitEditProjectSubtypeForm(sub_id);
    }
};