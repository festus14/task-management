@extends('layouts.inner')

@section('title', 'Clients')

@section('header', 'Clients Portal')

@section('sub_header', 'Clients Dashboard')

@section('css')
    <style>


    </style>
@endsection

{{-- <div class="m-portlet ">

    <div id="rows" class="m-portlet__body  m-portlet__body--no-padding">
        <div style="margin-bottom: 15px;" class="row m-row--no-padding m-row--col-separator-xl">
                    <div  id="client-card" class="col-md-12 col-lg-12 col-xl-12">
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h1 style="font-size: 30px;" class="m-widget24__title">
                                    Stransact
                                </h1>

                                <br>

                                <span class="m-widget24__stats m--font-brand">
                                    <div class="m-widget4__img m-widget4__img--pic">
                                        <img src="assets/app/media/img/users/100_4.jpg" class="far fa-building" alt width="100px" height="100px" style="border-radius: 1000px">
                                    </div>
                                </span>

                                <div class="m--space-10"></div>


                                <p style="margin-top: 10px">
                                        <a style="margin-top: -15px; margin-left: 25px" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            View Projects
                                        </a>
                                    </p>
                                    <div style="box-sizing: border-box;" class="collapse" id="collapseExample">
                                        <ul style="list-style: none;" >
                                            <li>
                                                <p style="font-size: 15px; font-weight: bold;">Tax</p>
                                                <p>
                                                    <a style="margin-top: -15px;" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#collapseExampleIn" role="button" aria-expanded="false" aria-controls="collapseExample" style="background: white">
                                                        View Tasks Progress
                                                    </a>
                                                </p>
                                                <div class="collapse" id="collapseExampleIn">

                                                    <div class="k-portlet__body" style="background: white; box-sizing: border-box; padding: 20px 20px 20px; margin: 0 20px 20px 0;">

                                                        <div class="k-portlet__body k-portlet__body--fit">
                                                        <!--begin: Datatable -->
                                                        <table id="kt_table_task" class="table table-striped table-hover" style="width: 100%">
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
                                                            <!--end: Datatable -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                </div>


                        </div>
                    </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div> --}}

@section('content')
    <!-- Begin: List Client -->
    <div class="m-content">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">

                <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 20px;">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <div class="body-header" style="">
                                <div class="" style=" float: left">
                                    <img src="{{ asset('metro/assets/app/media/img/users/100_4.jpg') }}" alt
                                         width="80px" height="80px" style="border-radius: 1000px">
                                </div>
                                <h1 class="m-widget24__title" style=" font-size: 20px; position: relative; top: -10px;">
                                    Stransact Partners
                                </h1>
                                <br>
                            </div>

                            <div class="m--space-10"></div>

                            <div id="client-details" style="">
                                <p>Plot 126 Adejobi Cresent, Anthony Vilage, Lagos</p>
                                <p>stransact@gmail.com</p>
                                <p>08156401454</p>
                            </div>

                            <button class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                    data-toggle="modal" data-target="#view_client_project">
                                View Projects
                            </button>
                            <button class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                    data-toggle="modal" data-target="#view_client_task">
                                View Tasks
                            </button>
                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>

                <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 20px;">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <div class="body-header" style="">
                                <div class="" style=" float: left">
                                    <img src="{{ asset('metro/assets/app/media/img/users/100_4.jpg') }}" alt
                                         width="80px" height="80px" style="border-radius: 1000px">
                                </div>
                                <h1 class="m-widget24__title" style=" font-size: 20px; position: relative; top: -10px;">
                                    Oil and Gas
                                </h1>
                                <br>
                            </div>

                            <div class="m--space-10"></div>

                            <div id="client-details" style="">
                                <p>Plot 126 Adejobi Cresent, Anthony Vilage, Lagos</p>
                                <p>stransact@gmail.com</p>
                                <p>090564054625</p>
                            </div>

                            <button class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                    data-toggle="modal" data-target="#view_client_project">
                                View Projects
                            </button>
                            <button class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                    data-toggle="modal" data-target="#view_client_task">
                                View Tasks
                            </button>
                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>

                <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 20px;">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <div class="body-header" style="">
                                <div class="" style=" float: left">
                                    <img src="{{ asset('metro/assets/app/media/img/users/100_4.jpg') }}" alt
                                         width="80px" height="80px" style="border-radius: 1000px">
                                </div>
                                <h1 class="m-widget24__title" style=" font-size: 20px; position: relative; top: -10px;">
                                    Oil and Gas
                                </h1>
                                <br>
                            </div>

                            <div class="m--space-10"></div>

                            <div id="client-details" style="">
                                <p>Plot 126 Adejobi Cresent, Anthony Vilage, Lagos</p>
                                <p>stransact@gmail.com</p>
                                <p>090564054625</p>
                            </div>

                            <button class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                    data-toggle="modal" data-target="#view_client_project">
                                View Projects
                            </button>
                            <button class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                    data-toggle="modal" data-target="#createTaskModal">
                                View Tasks
                            </button>
                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>

                <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 20px;">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <div class="body-header" style="">
                                <div class="" style=" float: left">
                                    <img src="{{ asset('metro/assets/app/media/img/users/100_4.jpg') }}" alt
                                         width="80px" height="80px" style="border-radius: 1000px">
                                </div>
                                <h1 class="m-widget24__title" style=" font-size: 20px; position: relative; top: -10px;">
                                    Oil and Gas
                                </h1>
                                <br>
                            </div>

                            <div class="m--space-10"></div>

                            <div id="client-details" style="">
                                <p>Plot 126 Adejobi Cresent, Anthony Vilage, Lagos</p>
                                <p>stransact@gmail.com</p>
                                <p>090564054625</p>
                            </div>

                            <button class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                    data-toggle="modal" data-target="#view_client_project">
                                View Projects
                            </button>
                            <button class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"
                                    data-toggle="modal" data-target="#createTaskModal">
                                View Tasks
                            </button>
                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>

            </div>
        </div>
    </div>
    <!-- end: List Client -->

    <!-- View Project Modal Begin-->
    <div class="modal fade" id="view_client_project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 100%; min-width: 400px; max-height: 100%;"
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
                            <!--begin::Portlet-->
                            <div class="m-portlet " id="m_portlet">

                                <div class="m-portlet__body">
                                    <table id="kt_table_client_projects" class="table table-striped table-hover"
                                           style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Manager</th>
                                            <th>Type</th>
                                            <th>Subtypes</th>
                                            <th>Status</th>
                                            <th>Members Name</th>
                                            <th>Members Email</th>
                                            <th>Deadline</th>
                                            <th>Tools</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $counter = 1; @endphp @foreach($projects as $project)
                                            <tr data-entry-id="{{ $project->id }}">
                                                <td></td>
                                                <td>{{ $project->name }}</td>
                                                <td>{{ $project->manager->email ?? '' }}</td>
                                                <td>{{ $project->project_type->name ?? '' }}</td>
                                                <td>{{ $project->project_subtype->name ?? '' }}</td>
                                                <td>{{ $project->status->name ?? '' }}</td>
                                                <td>
                                                    @foreach ($project->team_members as $menber)
                                                        <span
                                                            class="m-badge m-badge--success"> {{ $menber->email }} </span>
                                                    @endforeach
                                                </td>
                                                <td>{{ $project->deadline }}</td>
                                                <td>
                                                    @can('project_sub_type_show')
                                                        <a class="link"
                                                           href="{{ route('admin.project-sub-types.show', $project->id) }}">
                                                            <i class="flaticon-eye"> </i>
                                                        </a>
                                                    @endcan

                                                    @can('project_sub_type_edit')
                                                        <a class="link"
                                                           href="{{ route('admin.project-sub-types.edit', $project->id) }}">
                                                            <i class="flaticon-edit"> </i>
                                                        </a>
                                                    @endcan


                                                    @can('project_sub_type_edit')
                                                        <a class="link" href="#"
                                                           id="project_subtype_{{  $project->id }}"
                                                           data-project_type_id="{{  $project->id }}">
                                                            <i class="flaticon-graphic"> </i>
                                                        </a>
                                                    @endcan
                                                        @can('project_sub_type_edit')
                                                            <a class="link" href="#"
                                                               id="project_subtype_{{  $project->id }}"
                                                               data-project_type_id="{{  $project->id }}">
                                                                <i class="flaticon-graphic"> task </i>
                                                            </a>
                                                        @endcan

                                                    @can('project_sub_type_delete')
                                                        <form
                                                            action="{{ route('admin.project-sub-types.destroy', $project->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                            style="display: inline-block;">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                           <input type="submit" value="X">
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: View Project Modal-->

    <!-- View Task Modal Begin-->
    <div class="modal fade" id="view_client_task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 90%; min-width: 400px;" role="document">
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
                            <!--begin::Portlet-->
                            <div class="m-portlet " id="m_portlet">

                                <div class="m-portlet__body">
                                    <table id="kt_table_tasks" class="table table-striped table-hover"
                                           style="width: 100%">
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
                                            {{-- <th>Tools</th> --}}
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end::Portlet-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: View Task Modal-->

@endsection

@section('javascript')

    <script>

        var csvButtonTrans = '{{ trans('global.datatables.csv') }}'
        var excelButtonTrans = '{{ trans('global.datatables.excel') }}'
        var pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
        var printButtonTrans = '{{ trans('global.datatables.print') }}'
        var colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
        var languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };


        function getclientProject(client_id) {
             path_url = "api/v1/client_project" + client_id;

            var kt_table_client_projects = $('#ddd').DataTable({
                dom: 'lBfrtip<"actions">',
                language: {
                    url: languages. {{ app()->getLocale() }}
                },
                ajax: window.location + path_url,
                columns: [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "manager.name"},
                    {"data": "project_type.name"},
                    {"data": "project_subtype.name"},
                    {"data": "status.name"},
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
                }],
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
        }
        var dtProjectButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
        @can('project_delete')
        dtProjectButtons.push(deleteProjectButton);
        @endcan

        $('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtProjectButtons
        })

    </script>
    {{-- Script for Project View End--}}


    {{-- Script for Task View Begin--}}
    <script>

        var kt_table_projectsDataTable = $('#kt_table_tasks').DataTable({
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
        }
        var dtProjectButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
        @can('project_delete')
dtProjectButtons.push(deleteProjectButton);
        @endcan

$('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtProjectButtons
        })

    </script>
    {{-- Script for Task View End--}}

@endsection
