var data = [
    {
        client_name: 'Stransact',
        image: "assets/app/media/img/users/100_4.jpg",
        project: [
            {
                name: 'Payroll',
                progress: '40%',
                task: [
                    {
                        task_name: 'Ise Task',
                        task_status: 'Holding',
                    },
                    {
                        task_name: 'Moore Task',
                        task_status: 'Priortize',
                    }
                ]
            },
            {
                name: 'Audit',
                progress: '50%',
                task: [
                    {
                        task_name: 'Ise Task',
                        task_status: 'Holding',
                    },
                    {
                        task_name: 'Moore Task',
                        task_status: 'Priortize',
                    }
                ]
            },
            {
                name: 'Account',
                progress: '89%',
                task: [
                    {
                        task_name: 'Ise Task',
                        task_status: 'Holding',
                    },
                    {
                        task_name: 'Moore Task',
                        task_status: 'Priortize',
                    }
                ]
            }
        ]
    },
    {
        client_name: 'Chicken Republic',
        image: "assets/app/media/img/users/100_14.jpg",
        project: [{
            name: 'Payroll',
            progress: '33%',
            task: [
                {
                    task_name: 'Ise Task',
                    task_status: 'Holding',
                },
                {
                    task_name: 'Moore Task',
                    task_status: 'Priortize',
                }
            ]
        },
        {
            name: 'Tax',
            progress: '30%',
            task: [
                {
                    task_name: 'Ise Task',
                    task_status: 'Holding',
                },
                {
                    task_name: 'Moore Task',
                    task_status: 'Priortize',
                }
            ]
        },
        {
            name: 'Account',
            progress: '83%',
            task: [
                {
                    task_name: 'Ise Task',
                    task_status: 'Holding',
                },
                {
                    task_name: 'Moore Task',
                    task_status: 'Priortize',
                }
            ]
        }
        ]
    },
    {
        client_name: 'Amazon',
        image: "assets/app/media/img/users/100_4.jpg",
        project: [{
            name: 'Payroll',
            progress: '99%',
            task: [
                {
                    task_name: 'Ise Task',
                    task_status: 'Completed',
                },
                {
                    task_name: 'Moore Task',
                    task_status: 'Completed',
                }
            ]
        },
        {
            name: 'Audit',
            progress: '40%',
            task: [
                {
                    task_name: 'Ise Task',
                    task_status: 'Holding',
                },
                {
                    task_name: 'Moore Task',
                    task_status: 'Priortize',
                }
            ]
        },
        ]
    },
]


data.map((datum, i) => {
    document.getElementById("rows").innerHTML = document.getElementById("rows").innerHTML + `<div class="col-md-12 col-lg-12 col-xl-12">                                    
    <div class="m-widget24">
        <div class="m-widget24__item">
            <h4 class="m-widget24__title">
                ${datum.client_name}
            </h4>
            <br>
            <span class="m-widget24__desc">
                Client Projects:
            </span>

            <span class="m-widget24__stats m--font-brand">
                <div class="m-widget4__img m-widget4__img--pic">
                    <img src="${datum.image}" alt width="75px" height="75px" style="border-radius: 1000px">
                </div>
            </span>

            <div class="m--space-10"></div>

            <ul>

                ${datum.project.map((elem, idx) => `<li>
                    <span>${elem.name}</span>
                    <div class="m--space-10"></div>
                    <div style="margin-bottom: -15px">
                        <span class="m-widget24__change">
                            Task Progress
                        </span>
                        <span class="m-widget24__number">
                            ${elem.progress}
                        </span>
                    </div>
                    <p>
                        <a style="margin-top: -15px;" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#${"collapseExample" + idx + '-' + i}" role="button" aria-expanded="false" aria-controls="collapseExample">
                            View Task Status
                        </a>
                    </p>
                    <div class="collapse" id="${"collapseExample" + idx + '-' + i}">
                        <div style="margin-bottom: -15px">
                           ${elem.task.map(task => (`
                            <div>
                                <span syle="margin-bottom: -10px;" class="m-widget24__change">
                                    ${task.task_name}
                                </span>
                                <span class="m-widget24__number">
                                    ${task.task_status}
                                </span>
                            </div>`
                           ))}
                        </div>
                    </div>
                </li>`)}


            </ul>
            
        </div>
    </div>
    
</div>`
})

