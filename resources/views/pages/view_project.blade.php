@extends('layouts.inner')
 @section('title', 'Project')
  @section('header', 'Project Management')
   @section('sub_header', 'Projects') 
   @section('content') 
   @section('css')
<style>

</style>
@endsection
<div class="m-portlet " id="m_portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                        <i class="flaticon-list-2"> </i>
                    </span>
                <h3 class="m-portlet__head-text">
                    Project table
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
                    <a class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" data-toggle="modal" data-target="#subDatatable">
                        <span>
                                <span>
                                    Project Subtype
                                </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <table id="kt_table_projects" class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Client</th>
                    <th>Name</th>
                    <th>Manager</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Members</th>
                    <th>Deadline</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                @php $counter = 1; @endphp @foreach($projects as $project)
                <tr data-entry-id="{{ $project->id }}">
                    <td> </td>                                        
                    <td>{{ $project->client->name ?? '' }}</td>
                    <td>{{ $project->name }}</td> 
                    <td>{{ $project->manager->email ?? '' }}</td>
                    <td>{{ $project->project_type->name ?? '' }}</td>
                    <td>{{ $project->status->name ?? '' }}</td>
                    <td>
                        @foreach ($project->team_members as $menber)
                            <span class="m-badge m-badge--success"> {{ $menber->email }} </span>
                        @endforeach  
                    </td>           
                    <td>{{ $project->deadline }}</td>                
                    <td>
                        @can('project_sub_type_show')
                        <a class="link" href="{{ route('admin.project-sub-types.show', $project->id) }}">
                            <i class="flaticon-eye"> </i>
                        </a>
                        @endcan
                        
                        @can('project_sub_type_edit')
                        <a class="link" href="{{ route('admin.project-sub-types.edit', $project->id) }}">
                            <i class="flaticon-edit"> </i>
                        </a>
                        @endcan 
                    
                        
                        @can('project_sub_type_edit')
                        <a class="link" href="#" id="project_subtype_{{  $project->id }}" data-project_type_id="{{  $project->id }}">
                            <i class="flaticon-graphic"> </i>
                        </a>
                        @endcan 

                        @can('project_sub_type_delete')
                        <form action="{{ route('admin.project-sub-types.destroy', $project->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="link"> <i class="flaticon-delete"> </i></button>
                        </form>
                        @endcan
                    </td>
                </tr>
               
                @php $counter ++; @endphp @endforeach @php $counter = 1; @endphp 
              
            </tbody>
        </table>
    </div>
</div>
<!--end::Portlet-->
<!-- Create Project Modal -->
<div class="modal fade" id="createProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 400px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Project</h5>
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
                                <i class="m-nav__link-icon flaticon-plus" data-toggle="modal" data-target="#PModal" style="float:right;"></i>
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
                                <label>Team members</label><br>
                                <select multiple class="form-control select2" style="width:100%;">
                                    <option class="form-control">Admin</option>
                                    <option class="form-control">Super duper administrator</option>
                                </select>
                            </div>

                            <!--Subtype Modal -->
                            <div class="modal fade" id="subtypeModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Subtype</h5>
                                            <button type="button" class="close" onclick="$('#subtypeModal').modal('hide');" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="project-type">Select Project Type</label>
                                                <select id="project-type" class="selectDesign form-control"></select>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="create-task">Subtype Name</label>
                                                <input type="text" class="form-control" id="subtype" placeholder="">
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
{{-- Project Subtype datatable modal --}}
<div class="modal fade" id="subDatatable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:70%; min-width:400px;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Project Subtype table</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="m-portlet " id="m_portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                    <i class="flaticon-list-2"> </i>
                                </span>
                            <h3 class="m-portlet__head-text">
                                Project Subtype table
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" data-toggle="modal" data-target="#subtypeModalla">
                                    <span>
                                            <i class="la la-plus"></i>
                                            <span>
                                                Add Subtype
                                            </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <table id="kt_table_project_subtype" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Project Type</th>
                                <th>created</th>
                                <th>Updated</th>
                                                       
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="$('#subDatatable').modal('hide');">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!--modalled projSubtype Modal -->
  <div class="modal fade" id="subtypeModalla" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Subtype</h5>
                <button type="button" class="close" onclick="$('#subtypeModalla').modal('hide');" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="project-type">Select Project Type</label>
                    <select id="project-type" class="selectDesign form-control"></select>
                </div>

                <div class="form-group">
                    <label for="create-task">Subtype Name</label>
                    <input type="text" class="form-control" id="subtype" placeholder="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="$('#subtypeModalla').modal('hide');" data-target="#subtypeModal">Close</button>
                <button type="button" class="btn btn-primary" style="background-color:#8a2a2b; color:white;">Add</button>
            </div>
        </div>
    </div>
</div>


@endsection @section('javascript')
<script>
    let languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };
    $(function() {

        let copyButtonTrans = 'copy';
        let csvButtonTrans = 'csv';
        let excelButtonTrans = 'excel';
        let pdfButtonTrans = 'pdf';
        let printButtonTrans = 'print';
        let colvisButtonTrans = 'col vis';
        $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
            className: 'btn'
        });
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
                style: 'multi+shift',
                selector: 'td:first-child'
            },
            scrollX: true,
            order: [],
            pageLength: 10,
            dom: 'lBfrtip<"actions">',
            buttons: [{
                extend: 'excel',
                className: 'btn-default',
                text: excelButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            }, {
                extend: 'pdf',
                className: 'btn-default',
                text: pdfButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            }, {
                extend: 'csv',
                className: 'btn-default',
                text: csvButtonTrans,
                exportOptions: {
                    columns: ':visible'
                }
            }]
        });

        $.fn.dataTable.ext.classes.sPageButton = '';
        let deleteButtonTrans = 'Delete Selected';
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.project-sub-types.massDestroy') }}",
            className: 'btn-danger',
            action: function(e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function(entry) {
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
                        .done(function() {
                            location.reload()
                        })
                }
            }
        }
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
        @can('task_delete')
        dtButtons.push(deleteButton);
        @endcan

        $('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
        
    })

</script>

<script> 
       var kt_table_projectsDataTable = $('#kt_table_projects').DataTable({
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
            select: {
                style: 'multi+shift',
                selector: 'td:first-child'
            },
            scrollX: true,
            order: [],
            pageLength: 10,
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        });
        
        $.fn.dataTable.ext.classes.sPageButton = '';
        let deleteButtonTrans = 'Delete Selected';
        let deleteProjectButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.project-sub-types.massDestroy') }}",
            className: 'btn-danger',
            action: function(e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function(entry) {
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
                        .done(function() {
                            location.reload()
                        })
                }
            }
        }
        let dtProjectButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
        @can('project_delete')
        dtProjectButtons.push(deleteProjectButton);
        @endcan

        $('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtProjectButtons
        })

</script>

<script>
   $('#kt_table_project_subtype').DataTable({
            ajax: "{{ url('/admin/get_project_subtype/1') }}",
            columns: [
                { "data": "id" },
                { "data": "name" },
                { "data": "project_type.name" },
                { "data": "created_at" },
                { "data": "updated_at" },
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
    function getSomething(ID){
        var taskDataTable = $('#kt_table_project_subtype').DataTable({
            ajax: "{{ url('/get_project_subtype/1') }}",
            columns: [
                { "data": "id" },
                { "data": "name" },
                { "data": "project_type.name" },
                { "data": "created_at" },
                { "data": "updated_at" },
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
    }
</script>
@endsection