var data = [
    {
        client_name: 'Stransact',
        image: "assets/app/media/img/users/100_4.jpg",
        project: [
            {
                name: 'Payroll',
                progress: '40%'
            },
            {
                name: 'Audit',
                progress: '50%'
            },
            {
                name: 'Account',
                progress: '89%'
            }
        ]
    },
    {
        client_name: 'Chicken Republic',
        image: "assets/app/media/img/users/100_14.jpg",
        project: [{
            name: 'Payroll',
            progress: '33%'
        },
        {
            name: 'Tax',
            progress: '30%'
        },
        {
            name: 'Account',
            progress: '83%'
        }
        ]
    },
    {
        client_name: 'Amazon',
        image: "assets/app/media/img/users/100_4.jpg",
        project: [{
            name: 'Payroll',
            progress: '99%'
        },
        {
            name: 'Audit',
            progress: '40%'
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

                ${datum.project.map(elem => `<li>
                    <span>${elem.name}</span>
                    <div class="m--space-10"></div>
                    <span class="m-widget24__change">
                        Task Progress
                    </span>
                    <span class="m-widget24__number">
                        ${elem.progress}
                    </span>
                </li>`)}


            </ul>
            
        </div>
    </div>
    
</div>`
})

