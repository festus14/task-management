const clientList = [
    {
        name: 'Stransact'
    },
    {
        name: 'NNPC'
    },
    {
        name: 'LUTH'
    },
    {
        name: 'Airtel'
    },
]


function add(parent, el) {
    return parent.add(el);
}

let dropdown = document.getElementById('client-list');
dropdown.length = 0;

let defaultOption = document.createElement('option');
defaultOption.text = '--Select Client--';

dropdown.add(defaultOption);
dropdown.selectedIndex = 0;

// const url = 'https://jsonplaceholder.typicode.com/todos/1';


// fetch(url, {
//     method: 'GET',
// })
// .then((resp) => resp.json())
// .then(data => {
//     console.log(data)
//     data.map(elem => {
//         let option = document.createElement('option');
//         option.text = elem.name;
//         add(dropdown, option)
//     })
// })
// .catch(function(error){
//     console.log(error);
// });

// console.log(data);

clientList.map(elem => {
    let option = document.createElement('option');
    option.text = elem.name;
    add(dropdown, option)
})