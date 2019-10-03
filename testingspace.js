function validateEditClient(client_id) {
    // Retrieving the values of form elements
    let editCompanyName = $('#company-name').val();
    let editStatus = $('#status').val();
    let editDateEngaged = $('#date-of-eng').val();
    let editExpiryDate = $('#expiry-date').val();
    let editPhoneNum = $('#phone-num').val();
    let editAddress = $('#address').val();
    let editEmail = $('#email').val();


    // Defining error variables with a default value
    var editCompanyErr = editStatusErr = editDateEngagedErr = editExpiryErr = editPhoneErr = editAddressErr = editEmailErr = true;

    // Validate status
    if (editStatus == "") {
        printError("editStatusErr", "Please select a status");
    } else {
        printError("editStatusErr", "");
        editStatusErr = false;
    }
    // Validate dateEngaged
    if (editDateEngaged == "") {
        printError("editDateEngagedErr", "Please select a date");
    } else {
        printError("editDateEngagedErr", "");
        editDateEngagedErr = false;
    }

    // Validate phoneNum
    if (editPhoneNum == "") {
        printError("editPhoneErr", "Please input the phone number");
    } else {
        printError("editPhoneErr", "");
        editPhoneErr = false;
    }

    var allClients;
    $.ajax({
        type: "GET",
        url: "/api/v1/clients",
        async: false,
        success: function(data) {
            allClients = data;

        },

        error: function(data) {

        }

    })

    if (editCompanyName == "") {
        printError("editCompanyErr", "Please input a company name");
    } else if (editCompanyName) {
        editCompanyName = editCompanyName.toUpperCase();

        for (let i = 0; i < allClients.data.length; i++) {
            if (allClients.data[i].name.toUpperCase() === editCompanyName) {
                printError("editCompanyErr", "Company already exists");
                editCompanyErr = true;
                break;
            } else {
                printError("editCompanyErr", "");
                editCompanyErr = false;
            }
        }

    }

    // Validate expiryDate
    if (editExpiryDate == "") {
        printError("editExpiryErr", "Please select an expiry date");
    } else {
        printError("editExpiryErr", "");
        editExpiryErr = false;
    }

    // Validate address
    if (editAddress == "") {
        printError("editAddressErr", "Please select a status");
    } else {
        printError("editAddressErr", "");
        editAddressErr = false;
    }

    // Validate email
    if (editEmail == "") {
        printError("editEmailErr", "Please input an email");
    } else {
        printError("editEmailErr", "");
        editEmailErr = false;
    }



    // Prevent the form from being submitted if there are any errors

    if ((editPhoneErr || editStatusErr || editDateEngagedErr || editCompanyErr || editExpiryErr || editAddressErr || editEmailErr) == true) {
        return false;
    } else {

        createCliento();
    }
};