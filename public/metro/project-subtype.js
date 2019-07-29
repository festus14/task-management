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

    // const url = 'https://api/project';

    // fetch(url)
    // .then((resp) => resp.json())
    // .then(function(data){
    // return data.map(function(i){
    //     let option = document.createElement('option');
    //     option.text = i.project_name;
    //     option.value = i.project_id;
        
    //     add(dropdown, option)
    // })

    // })

    // .catch(function(error){
    // console.log(error);
    // });

    // // Script For Posting

    // document.getElementById('postData').addEventListener('submit', postData);

    // function postData(event){

    // event.preventDefault();

    // let name = dropdown.value;
    // let project_subtype = document.getElementById('create-project-subtype').value;

    // fetch('https://api/project/subtype/posts', {
    // method: 'POST',
    // headers : new Headers(),
    // body:JSON.stringify({name:name, project_subtype:project_subtype})

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