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