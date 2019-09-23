function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
  }

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
if(clientlist == "") {
  printError("clientErr", "Please select a client");
} else {
  printError("clientErr", "");
  clientErr = false;
}
// Validate project
if(projectlist == "") {
      printError("projListErr", "Please select a project");
  } else {
      printError("projListErr", "");
      projListErr = false;
  }
// Validate project sub
if(projSubList == "") {
     printError("projSubErr", "Please select a project subtype");
 } else {
     printError("projSubErr", "");
     projSubErr = false;
 }

// Validate name
if(taskName == "") {
  printError("nameErr", "Please input a task name");
} else {
  var regex = /^[a-zA-Z\s]+$/;
  if(regex.test(taskName) === false) {
      printError("nameErr", "Please input a valid task name");
  } else {
      printError("nameErr", "");
      nameErr = false;
  }
}

// Validate task category
if(taskCat == "") {
      printError("categoryErr", "Select a category");
  } else {
      printError("categoryErr", "");
      categoryErr = false;
  }

// Validate task status
if(taskStat == "") {
      printError("statusErr", "Select a status");
  } else {
      printError("statusErr", "");
      statusErr = false;
  }

// Validate task manager
if(manager == "") {
      printError("managerErr", "Select a manager");
  } else {
      printError("managerErr", "");
      managerErr = false;
  }

// Validate assigned tos
if(assignedTos == "") {
      printError("assignErr", "Please select a member");
  } else {
      printError("assignErr", "");
      assignErr = false;
  }

// Validate start date
if(startDate == "") {
      printError("startErr", "Pick a date");
  } else {
      printError("startErr", "");
      startErr = false;
  }


// Validate deadline
if(deadline == "") {
      printError("endErr", "Pick a date");
  } else {
      printError("endErr", "");
      endErr = false;
  }


// Prevent the form from being submitted if there are any errors

if((clientErr || projListErr || projSubErr || nameErr || categoryErr || statusErr|| managerErr || assignErr || startErr || endErr) == true) {
 return false;
} else {

  postCreateTask();
}
};