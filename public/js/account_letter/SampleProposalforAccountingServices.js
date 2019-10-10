function setElementValue(type, identifier, value) {
    switch (type) {
        case "id":
            document.getElementById(identifier).innerHTML = " " + value;
            break;
        case "class":
            let className = document.getElementsByClassName(identifier);
            for (let index = 0; index < className.length; index++) {
                const element = className[index];
                element.innerHTML = " " + value;
            }
    }
}

setElementValue("id", "business_add_one", "Address one");
setElementValue("id", "business_add_two", "Address two");
setElementValue("id", "business_add_three", "Address three");
setElementValue("id", "prospective_client", "Tunde Awopegba");
setElementValue("id", "designated_position", "Partner");
setElementValue("id", "staff_name", "Chieto Chiedu");
setElementValue("class", "date", "02/10/2019");
setElementValue("class", "job_title", "Auditing");
setElementValue("class", "company_name", "Stransact Comany");
setElementValue("class", "contact_person", "Festus Omole");
setElementValue("class", "summary", "SUMMARYSUMMARYSUMMARY");