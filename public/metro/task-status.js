const taskList = [
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

    let dropdown = document.getElementById('task-list');
    dropdown.length = 0;

    let defaultOption = document.createElement('option');
    defaultOption.text = '--Select Task--';

    dropdown.add(defaultOption);
    dropdown.selectedIndex = 0;

//     const url = 'https://api/task';

//     fetch(url)
//     .then((resp) => resp.json())
//     .then(function(data){
//         return data.map(function(i){
//             let option = document.createElement('option');
//             option.text = i.task_name;
//             option.value = i.task_id;

//             add(dropdown, option)
//         })
//     })

//     .catch(function(error){
//         console.log(error);
//     });

//     // Script For Posting

//     document.getElementById('postData').addEventListener('submit', postData);

//     function postData(event){

//     event.preventDefault();

//     let task_name = dropdown.value;
//     let task_status = document.getElementById('task-status').value;

//     fetch('https://api/project/posts', {
//     method: 'POST',
//     headers : new Headers(),
//     body:JSON.stringify({task_name:task_name, task_status:task_status})
    
//     })

//     .then((res) => res.json())
//     .then((data) =>  console.log(data))
//     .catch((err)=>console.log(err))
// }

taskList.map(elem => {
    let option = document.createElement('option');
    option.text = elem.name;
    add(dropdown, option)
})