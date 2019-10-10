document.getElementById("business_add_one").innerHTML = " Address one";
document.getElementById("business_add_two").innerHTML = " Address two";
document.getElementById("business_add_three").innerHTML = " Address three";
document.getElementById("prospective_client").innerHTML = " Tunde Awopegba";
document.getElementById("designated_position").innerHTML = " Partner";
document.getElementById("staff_name").innerHTML = " Chieto Chiedu";


let dateClasses = document.getElementsByClassName("date");
for (let index = 0; index < dateClasses.length; index++) {
    const element = dateClasses[index];
    element.innerHTML = " 02/10/2019";
}

let jobTitleClasses = document.getElementsByClassName("job_title");
for (let index = 0; index < jobTitleClasses.length; index++) {
    const element = jobTitleClasses[index];
    element.innerHTML = " Auditing";
}

let comapnyNameClasses = document.getElementsByClassName("company_name");
for (let index = 0; index < comapnyNameClasses.length; index++) {
    const element = comapnyNameClasses[index];
    element.innerHTML = " Stransact Company";
}

let contactPersonClasses = document.getElementsByClassName("contact_person");
for (let index = 0; index < contactPersonClasses.length; index++) {
    const element = contactPersonClasses[index];
    element.innerHTML = " Festus Omole";
}

let summaryClasses = document.getElementsByClassName("summary");
for (let index = 0; index < summaryClasses.length; index++) {
    const element = summaryClasses[index];
    element.innerHTML = " Lorem ipsum blah blah bljhuwehcuojcpewlkcjfuvufoejvoejvhierhvgotghieothgeripjgoerjgvpeist";
}