@extends('layouts.inner')

@section('title', 'Clients')

@section('header', 'Clients Portal')

@section('sub_header', 'Clients Dashboard')

@section('css')
    <style>


    </style>
@endsection

@section('content')
    <!-- Begin: List Client -->
    <div class="m-content">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl" id="client-cards">

                {{--<div class="col-md-6 col-lg-6 col-xl-6" style="padding: 20px;">--}}
                    {{--<!--begin::Total Profit-->--}}
                    {{--<div class="m-widget24">--}}
                        {{--<div class="m-widget24__item">--}}
                            {{--<div class="body-header" style="">--}}
                                {{--<div class="" style=" float: left">--}}
                                    {{--<img src="{{ asset('metro/assets/app/media/img/users/100_4.jpg') }}" alt--}}
                                         {{--width="80px" height="80px" style="border-radius: 1000px">--}}
                                {{--</div>--}}
                                {{--<h1 class="m-widget24__title" style=" font-size: 20px; position: relative; top: -10px;">--}}
                                    {{--Stransact Partners--}}
                                {{--</h1>--}}
                                {{--<br>--}}
                            {{--</div>--}}

                            {{--<div class="m--space-10"></div>--}}

                            {{--<div id="client-details" style="">--}}
                                {{--<p>Plot 126 Adejobi Cresent, Anthony Vilage, Lagos</p>--}}
                                {{--<p>stransact@gmail.com</p>--}}
                                {{--<p>08156401454</p>--}}
                            {{--</div>--}}

                            {{--<button class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"--}}
                                    {{--data-toggle="modal" data-target="#view_client_project">--}}
                                {{--View Projects--}}
                            {{--</button>--}}
                            {{--<button class="btn btn-sm m-btn--pill" style="background: #8a2a2b; color: white;"--}}
                                    {{--data-toggle="modal" data-target="#view_client_task">--}}
                                {{--View Tasks--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!--end::Total Profit-->--}}
                {{--</div>--}}

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
                                                    <ul class="m-portlet__nav">
                                                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                                                            <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
                                                                <i class="la la-ellipsis-h m--font-brand"></i>
                                                            </a>
                                                            <div class="m-dropdown__wrapper">
                                                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                                <div class="m-dropdown__inner">
                                                                    <div class="m-dropdown__body">
                                                                        <div class="m-dropdown__content">
                                                                            <ul class="m-nav">
                                                                                <li class="m-nav__item">
                                                                                    @can('project_sub_type_show')
                                                                                    <a href="#view_client_task" class="m-nav__link" >
                                                                                        <i class="m-nav__link-icon flaticon-eye"></i>
                                                                                        <span class="m-nav__link-text">
																					View Tasks
																				</span>
                                                                                    </a>
                                                                                    @endcan
                                                                                </li>
                                                                                <li class="m-nav__item">
                                                                                    @can('project_sub_type_edit')
                                                                                        <a href="{{ route('admin.project-sub-types.edit', $project->id) }}" class="m-nav__link">
                                                                                            <i class="m-nav__link-icon flaticon-edit"></i>
                                                                                            <span class="m-nav__link-text">
																					Edit Project
																				</span>
                                                                                        </a>
                                                                                    @endcan
                                                                                </li>
                                                                                <li class="m-nav__item">
                                                                                    @can('project_sub_type_show')
                                                                                        <a href="{{ route('admin.project-sub-types.show', $project->id) }}" class="m-nav__link">
                                                                                            <i class="m-nav__link-icon flaticon-eye"></i>
                                                                                            <span class="m-nav__link-text">
																					View Tasks
																				</span>
                                                                                        </a>
                                                                                    @endcan
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
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

{{--Body Scripts--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: '{{ url("/api/v1/client_project/1") }}',
            success: function (data) {
                console.log(data)
                
                var card = document.getElementById('client-cards');
                data.data.map((datum, i) => {
                    card.innerHTML = card.innerHTML + `<div class="col-md-6 col-lg-6 col-xl-6" style="padding: 20px;">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <div class="body-header" style="">
                                <div class="" style=" float: left">
                                    <img src="{{ asset('metro/assets/app/media/img/users/100_4.jpg') }}" alt
                                         width="80px" height="80px" style="border-radius: 1000px">
                                </div>
                                <h1 class="m-widget24__title" style=" font-size: 20px; position: relative; top: -10px;">
                                    ${datum.client.name}
                                </h1>
                                <br>
                            </div>

                            <div class="m--space-10"></div>

                            <div id="client-details" style="">
                                <p>${datum.client.address}</p>
                                <p>${datum.client.email}</p>
                                <p>${datum.client.phone}</p>
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
                   </div>`
                })
            },

            error: function (data) {
                console.log('Error:', data);
            }
        });
    </script>

@endsection
