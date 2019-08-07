@extends('layouts.inner')

@section('title', 'Task')

@section('header', 'Task Management')

@section('sub_header', 'Tasks')

@section('content')
          <div class="row">
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
                                      Tasks Datatable
                                  </h3>
                              </div>
                          </div>
                          <div class="m-portlet__head-tools">
                              <ul class="m-portlet__nav">
                                  <li class="m-portlet__nav-item">
                                      <a class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" style="background-color:#8a2a2b; color:white;" data-toggle="modal" data-target="#createTaskModal">
                                          <span>
                                              <i class="la la-plus"></i>
                                              <span>
                                                  Add Task
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

          <!-- Modal -->
      <div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
  
                        <div class="form-group">
                            <label for="client-list">Select Client</label>
                            <select id="client-list" class="selectDesign form-control"></select>
                        </div>
  
                        <div class="form-group">
                            <label>Select Project</label>
                            <select id="project-list" class="selectDesign form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label>Select Project Subtype</label>
                        <select id="project-subtype-list" class="selectDesign form-control"></select>
                        </div>
            
                        <div class="form-group">
                            <label for="create-task">Task Name</label>
                            <input type="text" class="form-control" id="create-task" placeholder="Enter Task Name">
                        </div>
                        
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <label>Task Category</label>
                            <select id="task-category" class="selectDesign form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                                <label for="assign-task">Assign task to</label>
                                <br>
                                <select  style="width: 100%" id="assign-task" multiple="multiple" required class="form-control select2">
                                  <option>Ade</option>
                                  <option>Bunmi</option>
                                </select>
                            </div>
                      </div>
                          <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label>Select Manager</label>
                                <select id="manager" class="selectDesign form-control"></select>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="starting-date">Starting Date</label>
                                    <input type="date" class="form-control" id="starting-date">
                                </div>
                          </div>
                        
                          <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="deadline">Deadline</label>
                                    <input type="date" class="form-control" id="deadline">
                                </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label>Task Status</label>
                                <select id="task-status" class="selectDesign form-control"></select>
                            </div>
                        </div>
                    
                </div>
          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add Task</button>
                    </div>
                
              </div>
            </div>
          </div>
  
       {
@endsection


@section('javascript')
<script>
    function add(parent, el) {
        return parent.add(el);
    }

    let dropdown = document.getElementById('project-list');
    dropdown.length = 0;

    let defaultOption = document.createElement('option');
    // defaultOption.text = '--Select Project--';

    dropdown.add(defaultOption);
    dropdown.selectedIndex = 0;


    // Dropdown for Project Subtype

    let dropdownTwo = document.getElementById('project-subtype-list');
    dropdownTwo.length = 0;

    defaultOption = document.createElement('option');
    // defaultOption.text = '--Select Project Subtype--';

    dropdownTwo.add(defaultOption);
    dropdownTwo.selectedIndex = 0;

    let dropdownThree = document.getElementById('client-list');
    dropdownThree.length = 0;

    defaultOption = document.createElement('option');

    dropdownThree.add(defaultOption);
    dropdownThree.selectedIndex = 0;


        $.ajax({
        type: "GET",
        url: '{{ url("/api/v1/projects") }}',
        success: function (data) {
          console.log('data1', data)
          data.map(elem => {
              let option = document.createElement('option');
              option.text = elem.name;
              add(dropdown, option)
            })
        },
        error: function (data) {
            console.log('Error:', data);
        }
      });

      $.ajax({
        type: "GET",
        url: '{{ url("/api/v1/project-sub-types") }}',
        success: function (dataTwo) {
          console.log('data2', dataTwo)
          dataTwo.map(elem => {
              let option = document.createElement('option');
              option.text = elem.name;
              add(dropdownTwo, option)
            })
        },
        error: function (dataTwo) {
            console.log('Error:', dataTwo);
        }
      });

      $.ajax({
        type: "GET",
        url: '{{ url("/api/v1/clients") }}',
        success: function (dataThree) {
          console.log('data3', dataThree)
          dataTwo.map(elem => {
              let option = document.createElement('option');
              option.text = elem.name;
              add(dropdownThree, option)
            })
        },
        error: function (dataThree) {
            console.log('Error:', dataThree);
        }
      });

</script>



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

@endsection