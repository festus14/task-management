function validateCreateClient() {
    // Retrieving the values of form elements
    let companyName = $('#company-name').val();
    let status = $('#status').val();
    let dateEngaged = $('#date-of-eng').val();
    let expiryDate = $('#expiry-date').val();
    let phoneNum = $('#phone-num').val();
    let address = $('#address').val();
    let email = $('#email').val();


    // Defining error variables with a default value
    var companyErr = statusErr = dateEngagedErr = expiryErr = phoneErr = addressErr = emailErr = true;

    // Validate status
    if (status == "") {
        printError("statusErr", "Please select a status");
    } else {
        printError("statusErr", "");
        statusErr = false;
    }
    // Validate dateEngaged
    if (dateEngaged == "") {
        printError("dateEngagedErr", "Please select a date");
    } else {
        printError("dateEngagedErr", "");
        dateEngagedErr = false;
    }

    // Validate phoneNum
    if (phoneNum == "") {
        printError("phoneErr", "Please input the phone number");
    } else {
        printError("phoneErr", "");
        phoneErr = false;
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

    if (companyName == "") {
        printError("companyErr", "Please input a company name");
    } else if (companyName) {
        companyName = companyName.toUpperCase();

        for (let i = 0; i < allClients.data.length; i++) {
            if (allClients.data[i].name.toUpperCase() === companyName) {
                printError("companyErr", "Company already exists");
                companyErr = true;
                break;
            } else {
                printError("companyErr", "");
                companyErr = false;
            }
        }

    }

    // Validate expiryDate
    if (expiryDate == "") {
        printError("expiryErr", "Please select an expiry date");
    } else {
        printError("expiryErr", "");
        expiryErr = false;
    }

    // Validate address
    if (address == "") {
        printError("addressErr", "Please select a status");
    } else {
        printError("addressErr", "");
        addressErr = false;
    }

    // Validate email
    if (email == "") {
        printError("emailErr", "Please input an email");
    } else {
        printError("emailErr", "");
        emailErr = false;
    }



    // Prevent the form from being submitted if there are any errors

    if ((phoneErr || statusErr || dateEngagedErr || companyErr || expiryErr || addressErr || emailErr) == true) {
        return false;
    } else {

        createCliento();
    }
};

function validateEditClient(client_id) {
    // Retrieving the values of form elements
    let editCompanyName = $('#edit-company-name').val();
    let editStatus = $('#edit-status').val();
    let editDateEngaged = $('#edit-date-of-eng').val();
    let editExpiryDate = $('#edit-expiry-date').val();
    let editPhoneNum = $('#edit-phone-num').val();
    let editAddress = $('#edit-address').val();
    let editEmail = $('#edit-email').val();


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


    if (editCompanyName == "") {
        printError("editCompanyErr", "Please input a company name");
    } else {
        printError("editCompanyErr", "");
        editCompanyErr = false;
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
        printError("editAddressErr", "Please input company's address");
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

        submitEditClient(client_id);
    }
};