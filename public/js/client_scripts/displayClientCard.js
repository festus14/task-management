// Ajax call for the clients view
$.ajax({
    type: "GET",
    url: "{{ url('/api/v1/clients') }}",
    success: function (data) {

        let clientCard = document.getElementById('client-cards');
        let projectCard = document.getElementById('client-project-modal');
        let taskCard = document.getElementById('client-task-modal');

            data.data.map((datum, i) => {
            clientCard.innerHTML = clientCard.innerHTML + `
            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12" style="padding: 2%; border: 1px solid #dfdfdf; border-radius: 6%; margin-bottom: 2%; margin-right: 2%; max-width: 44%; box-sizing: border-box;">
                <div class="m-widget24">
                    <div style="display: inline-block;" class="pull-right">
                        <a onclick="editClient(${datum.id})" class="btn myButton" href="#" data-toggle="modal" data-target="#editClientModalBody">
                            <i class="fa fa-pencil" style="color:black;"><span style="font-weight:100;"></span></i>
                        </a>
                        <a onclick="deleteClient(${datum.id})" class=" myButton" href="#"> <i class="fa fa-trash" style="color:black; margin-left: -5px;"></i></a>
                    </div>
                    <div class="m-widget24__item">
                        <div class="body-header" style="">
                            <div class="" style=" float: left">
                                <img src="{{ asset('metro/assets/app/media/img/users/Logo2.png') }}" alt
                                    width="80px" height="80px" style="border-radius: 1000px">
                            </div>
                            <h1 class="m-widget24__title" style=" font-size: 20px; position: relative; top: -10px;">
                                ${datum.name}
                            </h1>
                            <br>
                        </div>

                        <div class="m--space-10"></div>

                        <div id="client-details" style="">
                            <p>${datum.address}</p>
                            <p>${datum.email}</p>
                            <p>${datum.phone}</p>
                        </div>

                        <button onclick ="getClientProjects(${datum.id})"  class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                data-toggle="modal" data-target="#view_client_project${datum.id}">
                            View Projects
                        </button>
                        <button onclick ="getClientTasks(${datum.id})" class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                data-toggle="modal" data-target="#view_client_task${datum.id}">
                            View Tasks
                        </button>
                    </div>
                </div>
            </div>
        `

    projectCard.innerHTML = projectCard.innerHTML + `<div class="modal fade" id="view_client_project${datum.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width: 100%; min-width: 400px; max-height: 100%;"
            role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Client Projects</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="m-portlet " id="m_portlet">
                            <div class="m-portlet__body">
                                <table id="kt_table_client_projects${datum.id}" class="table table-striped table-hover"
                                        style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Manager</th>
                                        <th>Type</th>
                                        <th>Subtypes</th>
                                        <th>Status</th>
                                        <th>Starting Date</th>
                                        <th>Deadline</th>
                                        <th>Tools</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>`;

    taskCard.innerHTML = taskCard.innerHTML + `<div class="modal fade" id="view_client_task${datum.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%; min-width: 400px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Client Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">

        <div class="m-portlet"; id="m_portlet">
            <div class="m-portlet__body">
            <table id="kt_table_tasks${datum.id}" class="table table-striped table-hover" style="width: 100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Manager</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Starting Date</th>
                        <th>Deadline</th>
                        <th>Tools</th>
                    </tr>
                </thead>

            </table>
        </div>
     </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>`


    })

},

    error: function (data) {
        console.log('Error:', data);
    }
});
