@extends('layouts.inner')

@section('title', 'Project')
    
@section('header', 'Project Management')

@section('sub_header', 'View Project(s)')
@section('content')
<div class="row">
    
    <div class="row col-xl-12">
            <div class="col-xl-12">
                <!--begin::Portlet-->
                <div class="m-portlet " id="m_portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                    <i class="flaticon-list-2"> </i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Project Datatable
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                        <a class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" data-toggle="modal" data-target="#createProjectModal">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>
                                                Add Project
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <table id="kt_table_task" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status ID</th>
                                    <th>manager_id</th>
                                    <th>manager</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
    
        </div>
        <!-- End: Task Datatable -->
              <!-- Modal -->
              <div class="modal fade" id="createProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body col-md-12">
                                <div class="col-md-12 ">
                                        <form>
                                            <div class="row col-md-12">
                                                    <div class="col-md-6 form-group mt-3">
                                                        <label>Select Client</label>
                                                        <select id="client-list" class="selectDesign form-control"></select>
                                                    </div>
                                            
                                                    <div class="col-md-6 form-group mt-3">
                                                        <label for="create-project">Project Name</label>
                                                        <input type="text" class="form-control" id="create-project" placeholder="">
                                                    </div>
                                            </div>
                                            <div class="row col-md-12">
                                                    <div class="col-md-4 form-group mt-3">
                                                            <label for="create-project">Manager</label>
                                                            <input type="text" class="form-control" id="create-project" placeholder="">
                                                        </div>
                                                    <div class="col-md-4 form-group mt-3">
                                                        <label for="create-project-type">Project Type</label>
                                                        <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#PModal"style="float:right;"></i>
                                                        <input type="text" class="form-control" id="create-project-type" placeholder="">
                                                    </div>
                                
                                                            
                                                    <div class="col-md-4 form-group mt-3">
                                                                <label for="exampleFormControlSelect1">Project Sub-type</label>
                                                                <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#subtypeModal" style="float:right;"></i>
                                                                <select class="form-control" id="exampleFormControlSelect1">
                                                                  <option>1</option>
                                                                </select>
                                                     </div>                    
                                            </div>
                                             <div class="row col-md-12 ">
                                                        
                                                            <div class="col-md-4 form-group mt-3">
                                                                <label for="starting-date">Start Date</label>
                                                                <input type="date" class="form-control" id="starting-date">
                                                            </div>
                                                        
                                                            <div class="col-md-4 form-group mt-3">
                                                                    <label for="Deadline">Deadline</label>
                                                                    <input type="date" class="form-control" id="Deadline">
                                                            </div>
                                                            <div class="col-md-4 form-group mt-3">
                                                                    <label for="create-project">Team members</label>
                                                                    <select multiple="multiple" class="form-control select2 ">
                                                                            <option>Admin</option>
                                                                            <option>Super admin</option>
                                                                          </select>
                                                                </div>
                                                           
                                                                         <!--Subtype Modal -->
                                                                    <div class="modal fade" id="subtypeModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <h5 class="modal-title">Add Subtype</h5>
                                                                            <button type="button" class="close" onclick="$('#subtypeModal').modal('hide');"  aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                        <input type="text" class="form-control" id="create-project-subtype" placeholder="Input name">
                                                                                    </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" onclick="$('#subtypeModal').modal('hide');" data-target="#subtypeModal">Close</button>
                                                                            <button type="button" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add</button>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                
                                                                      <!--Project Type Modal -->
                                                                      <div class="modal fade" id="PModal" role="dialog" aria-labelledby="PModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <h5 class="modal-title" id="PModalLabel">Add Project Type</h5>
                                                                            <button type="button" class="close" onclick="$('#PModal').modal('hide');" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                        <input type="text" class="form-control" id="create-project-subtype" placeholder="Input name">
                                                                                    </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" onclick="$('#PModal').modal('hide');">Close</button>
                                                                            <button type="button" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add</button>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 form-group mt-3">
                                                            <button type="submit" class="btn btn-block center-block" style="background-color:#8a2a2b; color:white;">Add Project</button>   
                                                            </div>
                                                 </div>
                                                         
                                                </div>
                                        
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                              </div>
                        {{-- <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add Task</button>
                          
                        </div> --}}
                      </div>
    
    </div>
@endsection
@section('javascript')
{{--    <script src="metro/assets/app/js/dashboard.js" type="text/javascript"></script>--}}

@parent
<script>
    let languages = {
        'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
    };
    var taskDataTable = $('#kt_table_task').DataTable({
        ajax: "{{ url('/api/v1/tasks') }}",
        columns: [
            { "data": "id" },
            { "data": "name" },
            { "data": "status.name" },
            { "data": "manager_id" },
            { "data": "manager.email" }
        ],
        dom: 'lBfrtip<"actions">',
        language: {
            url: languages.{{ app()->getLocale() }}
        },
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox',
            targets: 0
        }, {
            orderable: false,
            searchable: false,
            targets: -1
        }],
    });
    new $.fn.dataTable.Buttons( taskDataTable, {
            buttons: [
                'copy', 'excel', 'pdf'
            ],
        } );

        $(function () {

            let copyButtonTrans = '{{ trans('global.datatables.copy') }}';
            let csvButtonTrans = '{{ trans('global.datatables.csv') }}';
            let excelButtonTrans = '{{ trans('global.datatables.excel') }}';
            let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}';
            let printButtonTrans = '{{ trans('global.datatables.print') }}';
            let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}';
            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' });
            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: languages.{{ app()->getLocale() }}
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                    style:    'multi+shift',
                    selector: 'td:first-child'
                },
                order: [],
                pageLength: 10,
                dom: 'lBfrtip<"actions">',
                buttons: [
                    {
                        extend: 'excel',
                        className: 'btn-primary',
                        text: excelButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-success',
                        text: pdfButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn-accent',
                        text: csvButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ]
            });

            $.fn.dataTable.ext.classes.sPageButton = '';
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.tasks.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}');
                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
            @can('task_delete')
            dtButtons.push(deleteButton);
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        })

    </script>
      <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    url: '{{ url("/api/v1/projects") }}',
                    success: function (data) {
    
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
    
                //delete user login
                $('body').on('click', '.delete-user', function () {
                    var user_id = $(this).data("id");
                    confirm("Are You sure want to delete !");
    
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('ajax-crud')}}" + '/' + user_id,
                        success: function (data) {
                            $("#user_id_" + user_id).remove();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                });
            });
    
            var datatableClient = function () {
                if ($('#m_datatable_clients_list').length === 0) {
                    return;
                }
    
                var datatable = $('.m_datatable').mDatatable(
                    {
                    data: {
                        type: 'remote',
                        source: {
                            read: {
                                url: '{{ url("/api/v1/clients/") }}',
                                method: 'GET',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                contentType: 'application/json',
                            }
                        },
                        pageSize: 10,
                        saveState: {
                            cookie: false,
                            webstorage: true
                        },
                        serverPaging: true,
                        serverFiltering: true,
                        serverSorting: true
                    },
    
                    layout: {
                        theme: 'default',
                        class: '',
                        scroll: true,
                        height: 380,
                        footer: false
                    },
    
                    sortable: true,
    
                    filterable: false,
    
                    pagination: true,
                    search: {
                        input: $('#generalSearch'),
                        onEnter: true,
                    },
                    toolbar: {
                        layout: ['pagination', 'info']
                    }, buttons: [
                        'copy', 'excel', 'pdf'
                    ],
                    columns: [
                        {
                            field: "id",
                            title: "#",
                            sortable: false,
                            width: 40,
                            selector: {
                                class: 'm-checkbox--solid m-checkbox--brand'
                            },
                            textAlign: 'center'
                        }, {
                            field: "name",
                            title: "Client",
                            sortable: 'asc',
                            filterable: true,
                            width: 150,
                        }, {
                            field: "phone",
                            title: "Phone",
                            width: 150,
                        }, {
                            field: "email",
                            title: "Email",
                            width: 150,
                            responsive: {
                                visible: 'lg'
                            }
                        }, {
                            field: "address",
                            title: "Address",
                            width: 150,
                            responsive: {
                                visible: 'lg'
                            }
                        }, {
                            field: "date_of_engagement",
                            title: "Engaged",
                            width: 100,
                        }, {
                            field: "expiry_date",
                            title: "Expire",
                            width: 100,
                        }, {
                            field: "Actions",
                            width: 110,
                            title: "Actions",
                            sortable: false,
                            overflow: 'visible',
                            template: function (row) {
                                var dropup = (row.getDatatable().getPageSize() - row.getIndex()) <= 4 ? 'dropup' : '';
                                return '\<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">\
                                <i class="la la-edit"></i>\
                            </a>\
                            <a href="" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">\
                                <i class="la la-trash"></i>\
                            </a>\
                        ';
                            }
                        }],
                });
    
            };
            </script>
    @endsection
