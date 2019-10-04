@extends('layouts.inner')

@section('title', 'Clients')

@section('header', 'Clients Portal')

@section('sub_header', 'Clients Dashboard')

@section('css')
        <style>
            #myInput {
                background-image: url('/css/searchicon.png');
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 14px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 10px;
                }

                #myTable {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #ddd;
                font-size: 14px;
                }

                #myTable th, #myTable td {
                text-align: left;
                padding: 12px;
                }

                #myTable tr {
                border-bottom: 1px solid #ddd;
                }

                #myTable tr.header, #myTable tr:hover {
                background-color: #f1f1f1;
                }

            #myInputOne {
                background-image: url('/css/searchicon.png');
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 14px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 10px;
                }

                #myTableOne {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #ddd;
                font-size: 14px;
                }

                #myTableOne th, #myTableOne td {
                text-align: left;
                padding: 12px;
                }

                #myTableOne tr {
                border-bottom: 1px solid #ddd;
                }

                #myTableOne tr.header, #myTableOne tr:hover {
                background-color: #f1f1f1;
                }

        </style>

        <style>
            #myInputTen {
                background-image: url('/css/searchicon.png');
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 14px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 10px;
                }

                #myTableTen {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #ddd;
                font-size: 14px;
                }

                #myTableTen th, #myTableTen td {
                text-align: left;
                padding: 12px;
                }

                #myTableTen tr {
                border-bottom: 1px solid #ddd;
                }

                #myTableTen tr.header, #myTableTen tr:hover {
                background-color: #f1f1f1;
                }


            #myInputNine {
                background-image: url('/css/searchicon.png');
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 14px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 10px;
                }

                #myTableNine {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #ddd;
                font-size: 14px;
                }

                #myTableNine th, #myTableNine td {
                text-align: left;
                padding: 12px;
                }

                #myTableNine tr {
                border-bottom: 1px solid #ddd;
                }

                #myTableNine tr.header, #myTableNine tr:hover {
                background-color: #f1f1f1;
                }
            /* loader */
            #loading {
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                position: fixed;
                display: block;
                opacity: 0.7;
                background-color: #ffff;
                z-index: 99;
                text-align: center;
                }

                #loading-image {
                position: absolute;
                top: 40%;
                left: 45%;
                z-index: 100;
                }
        </style>
@endsection

@section('content')
        <div id="loading">
            <img id="loading-image" src={{ url('/loader/loader.gif')}} alt="Loading..." />
        </div>
        {{-- Create Client Modal --}}
        <div style="margin-right: 15%; margin-bottom: 5%;">
            <a class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-success pull-right" id="createClient" style="background-color:; color:white;" data-toggle="modal" onclick="changeFormat()" data-target="#createClientModal">
                    <span>
                        <i class="la la-plus"></i>
                        <span>
                            Add Client
                        </span>
                    </span>
                </a>
        </div>

        <div class="modal fade" id="createClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Client</h5>
                            <button type="button" class="close" onclick="$('#createClientModal').modal('hide');" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="createClientModalBody" class="modal-body col-md-12">
                            <div class="col-md-12 ">
                                <form class="form" id="clientForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row col-md-12">
                                        <div class="col-md-6 form-group mt-3">
                                            <label for="company-name">Company Name</label>
                                            <input type="text" name="name" class="form-control" id="company-name" required>
                                            <div class="error" id="companyErr"></div>
                                        </div>

                                        <div class="col-md-6 form-group mt-3">
                                            <label for="status">Status</label>
                                            <select id="status" name="status" class="form-control">
                                                <option value="" selected=""></option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            <div class="error" id="statusErr"></div>
                                        </div>


                                    </div>
                                    <div class="row col-md-12">

                                            <div class="col-md-4 form-group mt-3">
                                                <label for="date-of-eng">Date Of Engagement</label>
                                                <input type="text" id="date-of-eng" name="date_of_engagement" class="form-control date" required>
                                                <div class="error" id="dateEngagedErr"></div>
                                            </div>


                                            <div class="col-md-4 form-group mt-3">
                                                <label for="expiry-date">Expiry Date</label>
                                                <input type="text" id="expiry-date" name="expiry_date" class="form-control date" required>
                                                <div class="error" id="expiryErr"></div>
                                            </div>

                                            <div class="col-md-4 form-group mt-3">
                                                <label for="phone-num">Phone Number</label>
                                                <input type="" name="phone" class="form-control" id="phone-num" required>
                                                <div class="error" id="phoneErr"></div>
                                            </div>

                                        </div>
                                        <div class="row col-md-12 ">

                                            <div class="col-md-6 form-group mt-3">
                                                <label for="address">Address</label>
                                                <input type="text" name="address" class="form-control" id="address" placeholder="" required>
                                                <div class="error" id="addressErr"></div>
                                            </div>

                                            <div class="col-md-6 form-group mt-3">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control" id="email" required>
                                                <div class="error" id="emailErr"></div>
                                            </div>


                                        </div>
                                        <div class="row col-md-12 ">
                                            <div class="col-md-3 form-group mt-3">
                                            <input class="btn btn-danger" type="button" style="background-color:#8a2a2b; color:white;" onclick="validateCreateClient()" value="{{ trans('global.create') }}">
                                            </div>
                                        </div>
                                    </form>
                                </div>


                        </div>
                    </div>
                </div>
            </div>
          {{-- End Create Client Modal --}}


          <!-- Edit Client Modal -->
<div class="modal fade" id="editClientModalBody" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
                <button type="button" class="close" onclick="$('#editClientModalBody').modal('hide');" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div id="editClientBody" class="modal-body col-md-12">



            </div>

        </div>
    </div>
</div>


    <!-- Begin: List Client -->
    <div class="m-content" style="max-width: 100%">
        <div class="m-portlet__body  m-portlet__body--no-padding" style="max-width: 100%">
            <div class="row m-row--no-padding m-row--col-separator-xl" style="width: 100%" id="client-cards">

            </div>
        </div>
    </div>
    <!-- end: List Client -->

    <!-- View Project Modal Begin-->
    <div id="client-project-modal">

    </div>
    <!-- End: View Project Modal-->

    <!-- View Task Modal Begin-->
    <div id="client-task-modal">

    </div>

    <!-- End: View Task Modal-->

    <!-- More Info Modal -->
    <div id="moreProjectInfo">

    </div>

    <div id="moreTaskInfo">

    </div>

    <!-- End More Info Modal -->



@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/validator/clientValidtor.js') }}"></script>
{{--Body Scripts--}}
    <script>
     $(document).ajaxStop(function () {
        $('#loading').hide();
    });

    $(document).ajaxStart(function () {
        $('#loading').show();
    });

        var csvButtonTrans = '{{ trans('global.datatables.csv') }}';
        var excelButtonTrans = '{{ trans('global.datatables.excel') }}';
        var pdfButtonTrans = '{{ trans('global.datatables.pdf') }}';
        var printButtonTrans = '{{ trans('global.datatables.print') }}';
        var colvisButtonTrans = '{{ trans('global.datatables.colvis') }}';
        var languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };

        // Ajax call for the clients view
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '/api/v1/clients',
            success: function (data) {

                let clientCard = document.getElementById('client-cards');
                let projectCard = document.getElementById('client-project-modal');
                let taskCard = document.getElementById('client-task-modal');

                    data.data.map((datum, i) => {
                    clientCard.innerHTML = clientCard.innerHTML + `<div class="col-md-6 col-lg-6 col-xl-6" style="padding: 20px;">
                    <div class="m-widget24">
                        <div id="editDeleteBody" style="display: inline-block; margin-right: 10%;" class="pull-right btn-group" >
                            <a onclick="editClient(${datum.id})" class="btn btn-sm" href="#" style="display: inline;">
                                <i class="fa fa-pencil" style="color:black;" data-toggle="modal" data-target="#editClientModalBody"><span style="font-weight:100;"></span></i>
                            </a>
                            <a onclick="deleteClient(${datum.id})" class="btn btn-sm" href="#" style="border: none; background-color: white; display: inline;"> <i class="fa fa-trash" style="color:black; margin-left: -5px;"></i></a>
                        </div>
                        <div class="m-widget24__item">
                            <div class="body-header" style="">
                                <div class="" style=" float: left">
                                    <img src="{{ asset('metro/assets/app/media/img/users/100_4.jpg') }}" alt
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
                </div>`

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
                                                <th>Members Email</th>
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
                                <th>Task Owner</th>
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

            function submitEditClient(client_id){
                let formData = $('#editClientForm').serialize();
                    $.ajax({
                        type: "PUT",
                        url: '{{ url("/api/v1/clients") }}'+ '/'+ client_id,
                        data: formData,
                        success: function (data) {
                            swal({
                                title: "Success!",
                                text: "Client Edited!",
                                icon: "success",
                                confirmButtonColor: "#DD6B55",
                                // confirmButtonText: "OK",
                            });
                            window.setTimeout(function(){
                                location.reload();
                            }, 3000)

                            },
                            error: function (error) {
                            swal({
                                title: "Client Editing Failed!",
                                text: "Please check the missing fields!",
                                icon: "error",
                                confirmButtonColor: "#fc3",
                                confirmButtonText: "OK",
                            });
                            }


                    })
            }

            function deleteClient(client_id){
            swal({
                title: "Are you sure?",
                text: "This Client will be deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('api/v1/clients')}}" + '/' + client_id,
                        success: function (data) {
                            swal("Deleted!", "Client successfully deleted.", "success");
                            window.setTimeout(function(){
                                location.reload();
                            } , 2500);
                        },

                        error: function (data) {
                            swal("Delete failed", "Please try again", "error");
                        }

                        });
                        }

                else {
                        swal("Cancelled", "Delete cancelled", "error");
                    }

                });
            }



        //   Function for calling Client Projects on the DT
        function getClientProjects(client_id) {
            path_url = "/api/v1/clients_projects/" + client_id;
            if ( $.fn.dataTable.isDataTable( '#kt_table_client_projects' + client_id ) ) {
                var kt_table_client_projects = $('#kt_table_client_projects' + client_id).DataTable();
            }else {
                var kt_table_client_projects = $('#kt_table_client_projects' + client_id).DataTable({
                dom: 'lBfrtip<"actions">',
                language: {
                    url: languages. {{ app()->getLocale() }}
                },

                ajax: path_url,

                columns: [
                    {"defaultContent": ""},
                    {"data": "name"},
                    {"data": "manager.name"},
                    {"data": "project_type.name"},
                    {"data": "project_subtype.name"},
                    {"data": "status.name"},
                    {"data": "team_members[, ].name"},
                    {"data": "starting_date"},
                    {"data": "deadline"},
                ],
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                },
                {
                targets: 9,
                orderable: false,
                searchable: false,
                render: function (data, type, full, meta) {
                    return '\<button onclick=displayProjectInfo('+full.id+') class="btn btn-secondary dropdown-toggle" type="button" id="taskToolsbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                <div class="dropdown-menu" aria-labelledby="taskToolsbtn" style="padding-left:8px; min-width: 75px; max-width: 15px;">\
                                <a class="link" href="#"><i class="fa fa-eye" style="color:black;" data-toggle="modal"  data-target="#moreInfoModal"> <span style="font-weight:100;"> View </span></i>\
                                </a>\
                                </a>\
                            <button onclick="deleteSingleProject('+full.id+')" class="link" style="border: none; background-color: white;"><a class="link" href="#"><i class="fa fa-trash" style="color:black; margin-left: -5px;"> Delete</i></a></button>\
                            </div>\
                                    ';
                }
            },],
                select: {
                    style: 'multi+shift',
                    selector: 'td:first-child'
                },
                scrollX: true,
                order: [],
                pageLength: 10,
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });

            }

        }


//          Function for deleting single project
        function deleteSingleProject(proID){

            swal({
                title: "Are you sure?",
                text: "This Project will be deleted!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('api/v1/projects')}}" + '/' + proID,
                        success: function (data) {
                            swal("Deleted!", "Project successfully deleted.", "success");
                            window.setTimeout(function(){
                                location.reload();
                            } , 2500);
                        },

                        error: function (data) {
                            swal("Delete failed", "Please try again", "error");
                        }

                        });
                        }

                else {
                        swal("Cancelled", "Delete cancelled", "error");
                    }

                });
        }

        // Function for calling Projects tasks
        function displayProjectInfo(proID) {
            $.ajax({
            type: "GET",
            url: "/api/v1/projects/" + proID,
            success: function (data) {
                let moreProjectInfo = document.getElementById("moreProjectInfo")
                moreProjectInfo.innerHTML = `<div class="modal fade" id="moreInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 80%; min-width: 500px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" onclick="$('#moreInfoModal').modal('hide');" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                <!-- More-info content -->
                        <div class="col-md-12 m-portlet " id="m_portlet">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon">
                                            <i class="flaticon-info"> </i>
                                        </span>
                                        <h3 class="m-portlet__head-text">
                                            More info
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <div class="accordion" id="accordionExample">
                                    <div onclick="taskDTCall(${data.data.id})" class="card">
                                        <div class="card-header" id="headingone">
                                            <h6 style="cursor: pointer" class="mb-0">
                                                <span class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    <i class="m-menu__link-icon flaticon-list"></i>
                                                    Project tasks
                                                </span>
                                            </h6>
                                        </div>
                                        <div id="collapseOne" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="m-portlet">
                                                <table class="table table-striped table-hover" style="width: 100%;" id="kt_table_single_project_task">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Starting Date</th>
                                                            <th>Deadline</th>
                                                            <th>Category</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion" id="accordionExample2">
                                    <div class="card">
                                        <div class="card-header" id="headingone">
                                            <h6 style="cursor: pointer" class="mb-0">
                                                <span class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <i class="m-menu__link-icon flaticon-clipboard"></i>
                                                    Documents
                                                </span>
                                            </h6>
                                        </div>
                                        <div id="collapseTwo" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample2">
                                            <input type="text" id="myInput" onkeyup="searchProjectDocument()" placeholder="Search for documents.." title="Type in a documents">
                                                <table id="myTable">
                                                        <tr class="header">
                                                            <th>Name</th>
                                                            <th>Version</th>
                                                            <th>Date Created</th>
                                                            <th>File</th>
                                                        </tr>
                                                        `+ data.data.documents.map(item =>
                                                            `<tr>
                                                                <td>${item.name}</td>
                                                                <td>${item.version}</td>
                                                                <td>${item.created_at}</td>
                                                                <td></td>
                                                            </tr>`
                                                        )+`
                                                </table>

                                        </div>
                                    </div>


                                    <div class="accordion" id="accordionExample3">
                                        <div class="card">
                                            <div class="card-header" id="headingthree">
                                                <h6 style="cursor: pointer" class="mb-0">
                                                    <span class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        <i class="m-menu__link-icon flaticon-file"></i>
                                                        Reports
                                                    </span>
                                                </h6>
                                            </div>
                                        <div id="collapseThree" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample3">
                                            <input type="textOne" id="myInputOne" onkeyup="searchProjectReport()" placeholder="Search for report.." title="Type in a report">
                                            <table id="myTableOne">
                                                <tr class="header">
                                                    <th>Name</th>
                                                    <th>Document Type</th>
                                                    <th>File</th>
                                                    <th>Date Uploaded</th>
                                                </tr>
                                                `+ data.data.reports.map(item =>
                                                `<tr>
                                                    <td>${item.name}</td>
                                                    <td>${item.document_type}</td>
                                                    <td></td>
                                                    <td>${item.created_at}</td>
                                                </tr>`
                                                )+`
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div onclick="projectComments(${data.data.id})" class="card-header" id="headingFour">
                                            <h6 style="cursor: pointer" class="mb-0">
                                                <span class="" data-toggle="modal" data-target="#commentModal">
                                                    <i class="m-menu__link-icon flaticon-comment"></i>
                                                    Comments
                                                </span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Portlet-->






                    <!-- End main Content of More-info -->

                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div>




                `


            },

            error: function (data) {
                console.log('Error:', data);


            }

            })

        }

            // Search Through Project Documents FUnction
        function searchProjectDocument() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }

            // Search Through Project Reports FUnction
        function searchProjectReport(){
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInputOne");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableOne");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }


        //   Function for calling Client Tasks on the DT
        function getClientTasks(client_id) {
            path_url = "/api/v1/clients_tasks/" + client_id;
            if ( $.fn.dataTable.isDataTable( '#kt_table_tasks' + client_id ) ) {
                var kt_table_tasks = $('#kt_table_tasks' + client_id).DataTable();
            }else {
                var kt_table_tasks = $('#kt_table_tasks' + client_id).DataTable({
                    dom: 'lBfrtip<"actions">',
                    language: {
                        url: languages. {{ app()->getLocale() }}
                    },
                    ajax: path_url,
                    columns: [
                        {"defaultContent": ""},
                        {"data": "name"},
                        {"data": "manager.name"},
                        {"data": "assigned_tos[, ].email"},
                        {"data": "status.name"},
                        {"data": "category.name"},
                        {"data": "starting_date"},
                        {"data": "ending_date"},
                    ],
                    columnDefs: [{
                        orderable: false,
                        className: 'select-checkbox',
                        targets: 0
                    }, {
                        orderable: false,
                        searchable: false,
                        targets: -1
                    },
                    {
                        targets: 8,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, full, meta) {
                            return '\<button onclick=displayTaskInfo('+full.id+') class="btn btn-secondary dropdown-toggle" type="button" id="taskToolsbtns" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                                        <div class="dropdown-menu" aria-labelledby="taskToolsbtn" style="padding-left:20px; min-width: 100px; max-width: 15px;">\
                                        <a class="link" href="#"><i class="fas fa-eye" style="color:black;" data-toggle="modal" id="innerDropdown" data-target="#moreTaskInfoModal"> </i>\
                                        </a>\
                                    <button onclick="deleteSingleTask('+full.id+')" class="link" style="border: none; background-color: white;"><a class="link" href="#"> <i class="far fa-trash-alt" style="color:black;"></i></a></button>\
                                </div>\
                                ';
                        }
                    },
                    ],
                    select: {
                        style: 'multi+shift',
                        selector: 'td:first-child'
                    },
                    scrollX: true,
                    order: [],
                    pageLength: 10,
                    buttons: [
                        'excel', 'pdf', 'print'
                    ]
                });
            }


        }

        function displayTaskInfo(task_id) {
                $.ajax({
                    type: "GET",
                    url: "/api/v1/tasks/" + task_id,
                    success: function (data) {
                        let moreTaskInfo = document.getElementById("moreTaskInfo")
                        moreTaskInfo.innerHTML = `<div class="modal fade" id="moreTaskInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 500px;" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" onclick="$('#moreTaskInfoModal').modal('hide');" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                        <div class="col-md-12 m-portlet " id="m_portlet">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon">
                                            <i class="flaticon-info"> </i>
                                        </span>
                                        <h3 class="m-portlet__head-text">
                                            More info
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">

                                <div class="accordion" id="accordionExample4">
                                <div class="card">
                                    <div class="card-header" id="headingone">
                                        <h6 style="cursor: pointer" class="mb-0">
                                            <span class="collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                <i class="m-menu__link-icon flaticon-clipboard"></i>
                                                Documents
                                            </span>
                                        </h6>
                                    </div>
                                    <div id="collapseTen" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample4">
                                        <input type="text" id="myInputTen" onkeyup="searchDocument()" placeholder="Search for documents.." title="Type in a documents">
                                            <table id="myTableTen">
                                                    <tr class="header">
                                                        <th>Name</th>
                                                        <th>Document Type</th>
                                                        <th>File</th>
                                                        <th>Date Uploaded</th>
                                                    </tr>
                                                    `+ data.data.documents.map(item =>
                                                        `<tr>
                                                            <td>${item.name}</td>
                                                            <td>${item.document_type}</td>
                                                            <td></td>
                                                            <td>${item.created_at}</td>
                                                        </tr>`
                                                    )+`
                                            </table>

                                    </div>
                                </div>


                                <div class="accordion" id="accordionExample5">
                                    <div class="card">
                                        <div class="card-header" id="headingnine">
                                            <h6 style="cursor: pointer" class="mb-0">
                                                <span class="collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                    <i class="m-menu__link-icon flaticon-file"></i>
                                                    Reports
                                                </span>
                                            </h6>
                                        </div>
                                    <div id="collapseNine" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample5">
                                        <input type="textOne" id="myInputNine" onkeyup="searchTaskReport()" placeholder="Search for report.." title="Type in a report">
                                        <table id="myTableNine">
                                            <tr class="header">
                                                <th>Name</th>
                                                <th>Document Type</th>
                                                <th>File</th>
                                                <th>Date Uploaded</th>
                                            </tr>
                                            <tr class="">
                                            </tr>
                                            `+ data.data.reports.map(item =>
                                            `<tr>
                                                <td>${item.name}</td>
                                                <td>${item.document_type}</td>
                                                <td></td>
                                                <td>${item.created_at}</td>
                                            </tr>`
                                            )+`
                                        </table>
                                    </div>
                                </div>
                                <div class="card">
                                    <div onclick="taskComments(${data.data.id})" class="card-header" id="headingFour">
                                        <h6 style="cursor: pointer" class="mb-0">
                                            <span class="" data-toggle="modal" data-target="#commentModal">
                                                <i class="m-menu__link-icon flaticon-comment"></i>
                                                Comments
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                <!-- Comment Modal -->
    <div class="modal fade" id="commentModal" tabindex="-1" style="overflow:hidden;" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    </div>
                        `


                },

                        error: function (data) {
                            console.log('Error:', data);


                        }

                        })
            }

            function changeFormat(){
                var allEditors = document.querySelectorAll('.ckeditor');
                    for (var i = 0; i < allEditors.length; ++i) {
                        ClassicEditor.create(allEditors[i]);
                    }

                    moment.updateLocale('en', {
                        week: {dow: 1} // Monday is the first day of the week
                    })

                    $('.date').datetimepicker({
                        format: 'DD-MM-YYYY',
                        locale: 'en'
                    })

                    $('.datetime').datetimepicker({
                        format: 'DD-MM-YYYY HH:mm:ss',
                        locale: 'en',
                        sideBySide: true
                    })

                    $('.timepicker').datetimepicker({
                        format: 'HH:mm:ss'
                    })

                    $('.select-all').click(function () {
                        let $select2 = $(this).parent().siblings('.select2')
                        $select2.find('option').prop('selected', 'selected')
                        $select2.trigger('change')
                    })
                    $('.deselect-all').click(function () {
                        let $select2 = $(this).parent().siblings('.select2')
                        $select2.find('option').prop('selected', '')
                        $select2.trigger('change')
                    })

                    $('.select2').select2()

                    $('.treeview').each(function () {
                        var shouldExpand = false
                        $(this).find('li').each(function () {
                        if ($(this).hasClass('active')) {
                            shouldExpand = true
                        }
                        })
                        if (shouldExpand) {
                        $(this).addClass('active')
                        }
                    })
            }

            //Posting-Create client
            function createCliento(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: '/api/v1/clients',
                    data: $('#clientForm').serialize(),

                    success: function (data) {
                        $('#createClientModal').modal('hide');
                        swal({
                            title: "Success!",
                            text: "Client Added!",
                            icon: "success",
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "OK",
                        });
                        window.setTimeout(function(){
                            location.reload();
                        }, 3000)

                    },
                    error: function (data) {
                    swal("Client creation failed", "Please check missing fields", "error");
                }
                });
            }

            // Search Through Task Documents FUnction
        function searchTaskDocument() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInputTen");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableTen");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }

            // Search Through Task Reports FUnction
        function searchTaskReport(){
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInputNine");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableNine");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }

            // Function for deleting single task
        function deleteSingleTask(taskID){

            swal({
                    title: "Are you sure?",
                    text: "Everything relating to this task will be lost!",
                    icon: "warning",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                     if (willDelete) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                            $.ajax({
                                type: "DELETE",
                                url: "{{ url('api/v1/tasks')}}" + '/' + taskID,
                                success: function (data) {
                                    swal("Deleted!", "Task has been successfully deleted.", "success");
                                    window.setTimeout(function(){
                                        location.reload();
                                    } , 2500);
                                },
                                    error: function (data) {
                                        swal("Delete failed", "Please try again", "error");
                                    }

                                });
                            }

             else {
                        swal("Cancelled", "Delete cancelled", "error");
                    }

                });
        }

        // Function Populating the project Document Modal
        function taskDTCall(project_id){
            path_url = "/api/v1/projects_tasks/" + project_id;

              // Simple Project Tasks DT
            if ( $.fn.dataTable.isDataTable( '#kt_table_single_project_task') ) {
                let kt_table_single_project_task = $('#kt_table_single_project_task').DataTable();
            }else {
                let kt_table_single_project_task = $('#kt_table_single_project_task').DataTable({
                dom: 'lBfrtip<"actions">',
                language: {
                    url: languages. {{ app()->getLocale() }}
                },

                ajax: path_url,

                columns: [
                    {"defaultContent": ""},
                    {"data": "name"},
                    {"data": "starting_date"},
                    {"data": "ending_date"},
                    {"data": "category.name"},
                    {"data": "status.name"},
                ],
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                },
                ],
                select: {
                    style: 'multi+shift',
                    selector: 'td:first-child'
                },
                scrollX: true,
                order: [],
                pageLength: 10,
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
            }

        }


        // Function Populating the project Document Modal


        function projectComments(project_id){
            path_url = "/api/v1/projects" + project_id;
            // Comment Function Goes Here

        }

        function taskComments(task_id){

        }

        $.fn.dataTable.ext.classes.sPageButton = '';
        var deleteButtonTrans = 'Delete Selected';
        var deleteProjectButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.project-sub-types.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function (entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert('{{ trans('global.datatables.zero_selected ') }}');
                    return
                }

                if (confirm('{{ trans('global.areYouSure ') }}')) {
                    $.ajax({
                        headers: {
                            'x-csrf-token': _token
                        },
                        method: 'POST',
                        url: config.url,
                        data: {
                            ids: ids,
                            _method: 'DELETE'
                        }
                    })
                        .done(function () {
                            location.reload()
                        })
                }
            }
        };
        var dtProjectButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
        @can('project_delete')
        dtProjectButtons.push(deleteProjectButton);
        @endcan

        $('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtProjectButtons
        })
        function printError(elemId, hintMsg) {
            document.getElementById(elemId).innerHTML = hintMsg;
        }

    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection
