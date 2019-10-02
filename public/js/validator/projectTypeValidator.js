function validateProjectType() {
    var allProjectTyess;
    $.ajax({
        type: "GET",
        url: "/api/v1/project-types",
        async: false,
        success: function(data) {
            allProjectTyess = data;

        },

        error: function(data) {

        }

    })


    // Retrieving the values of form elements
    let projectType = $('#projTypeId').val();


    // Defining error variable with a default value
    var projectTypeErr = true;

    if (projectType == "") {

        printError("projectTypeErr", "Please input a project name");
    } else if (projectType) {
        projectType = projectType.toUpperCase();

        for (let i = 0; i < allProjectTyess.data.length; i++) {
            if (allProjectTyess.data[i].name.toUpperCase() === projectType) {
                printError("projectTypeErr", "Project type already exists");
                projectTypeErr = true;
                break;
            } else {
                printError("projectTypeErr", "");
                projectTypeErr = false;
            }
        }

    }

    // Prevent the form from being submitted if there are any errors

    if (projectTypeErr == true) {
        return false;
    } else {

        addProject();
    }
};

function validateEditProjectType(type_id) {
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
    var allProjectSubTyess;
    $.ajax({
        type: "GET",
        url: "/api/v1/project-sub-types",
        async: false,
        success: function(data) {
            allProjectSubTyess = data;

        },
        error: function(data) {

        }

    })
    let projectType = $('#project-type').val();
    let projectSubType = $('#sub-type').val();


    // Defining error variable with a default value
    var projectSubTypeErr = projectTTTypeErr = true;


    // if (projectType == "") {
    //     printError("projectTTTypeErr", "Please provide an input");
    // } else {
    //     printError("projectTTTypeErr", "");
    //     projectTTTypeErr = false;
    // }
    projectTTTypeErr = false;    if (projectSubType == "") {

        printError("projectSubTypeErr", "Please input a project name");
    } else if (projectSubType) {
        projectSubType = projectSubType.toUpperCase();

        for (let i = 0; i < allProjectSubTyess.data.length; i++) {
            if (allProjectSubTyess.data[i].name.toUpperCase() === projectSubType) {
                printError("projectSubTypeErr", "Project subtype already exists");
                projectSubTypeErr = true;
                break;
            } else {
                printError("projectSubTypeErr", "");
                projectSubTypeErr = false;
            }
        }

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
