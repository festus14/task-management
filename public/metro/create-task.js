const subtypeList = [
    {
        name: 'Account'
    },
    {
        name: 'Bussiness'
    },
    {
        name: 'Econs'
    },
]

const projectList = [
    {
        name: 'Audit'
    },
    {
        name: 'Tax'
    },
    {
        name: 'Payroll'
    },
]

function add(parent, el) {
    return parent.add(el);
}

let dropdown = document.getElementById('project-list');
dropdown.length = 0;

let defaultOption = document.createElement('option');
defaultOption.text = '--Select Project--';

dropdown.add(defaultOption);
dropdown.selectedIndex = 0;


// Dropdown for Project Subtype

let dropdownTwo = document.getElementById('project-subtype-list');
dropdownTwo.length = 0;

defaultOption = document.createElement('option');
defaultOption.text = '--Select Project Subtype--';

dropdownTwo.add(defaultOption);
dropdownTwo.selectedIndex = 0;


// const url2 = ' https://myallies-breaking-news-v1.p.rapidapi.com/GetTopNews';

// fetch(url2)
// .then((resp) => resp.json())
// .then(function(data){
//     return data.map(function(i){
//         let option = document.createElement('option');
//         option.text = i.project_subtype_list;
//         option.value = i.id;

//         add(dropdown2, option)
//     })
// })

// .catch(function(error){
//     console.log(error);
// });

// // Script For Posting

// document.getElementById('postData').addEventListener('submit', postData);

// function postData(event){

// event.preventDefault();

// let name = dropdown.value;
// let project_subtype = dropdown2.value;
// let starting_date = document.getElementById('starting-date').value;
// let deadline = document.getElementById('deadline').value;


// fetch('https://api/project/subtype/posts', {

// method: 'POST',
// headers : new Headers(),
// body:JSON.stringify({name:name, project_subtype:project_subtype, deadline:deadline, starting_date:starting_date})

// })

// .then((res) => res.json())
// .then((data) =>  console.log(data))
// .catch((err)=>console.log(err))
// }

projectList.map(elem => {
    let option = document.createElement('option');
    option.text = elem.name;
    add(dropdown, option)
})

subtypeList.map(elem => {
    let option = document.createElement('option');
    option.text = elem.name;
    add(dropdownTwo, option)
})