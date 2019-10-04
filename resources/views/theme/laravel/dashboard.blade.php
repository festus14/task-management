@extends('layouts.metro')
@section('name')
    <title>Task Management | Dashboard</title>
@endsection
@section('active_arrow_one')
    <span class="m-menu__item-here"></span>
@endsection
@section('css')
<style>
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
@section('subheader')
    <div id="loading">
        <img id="loading-image" src={{ url('/loader/loader.gif')}} alt="Loading..." />
    </div>
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">
                Dashboard
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{ url('admin/view_project') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Projects
                        </span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{ url('admin/view_task') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Tasks
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                <span class="m-subheader__daterange-label">
                    <span class="m-subheader__daterange-title"></span>
                    <span class="m-subheader__daterange-date m--font-brand"></span>
                </span>
                <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                    <i class="la la-angle-down"></i>
                </a>
            </span>
        </div>
    </div>
@endsection
@section('content')
    <!--begin:: Widgets/Stats-->
    <div class="m-portlet ">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title"><a href="" class="m-menu__link-text">Project</a></h4>
                            <br>
                            <span class="m-widget24__desc">Total Number</span>
                            <span class="m-widget24__stats m--font-brand"> {{ count($projects) }}</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-brand" role="progressbar"
                                     style="width: {{ ($projects->where('status_id', 4)->count() * 100)/ count($projects) }}%;"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <span class="m-widget24__change">Completed</span>
                            <span class="m-widget24__number">{{ ($projects->where('status_id', 4)->count() * 100)/ count($projects) }}%</span>
                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Feedbacks-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">Task</h4>
                            <br>
                            <span class="m-widget24__desc">Total Task</span>
                            <span class="m-widget24__stats m--font-info">{{ count($tasks) }}</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-info" role="progressbar"
                                     style="width: {{ ($tasks->where('status_id', 4)->count() * 100)/ count($projects) }}%;"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="m-widget24__change">Completed</span>
                            <span class="m-widget24__number">{{ ($tasks->where('status_id', 4)->count() * 100)/ count($projects) }}%</span>
                        </div>
                    </div>
                    <!--end::New Feedbacks-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Orders-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Clients
                            </h4>
                            <br>
                            <span class="m-widget24__desc">Total Number</span>
                            <span class="m-widget24__stats m--font-danger">{{ count($clients) }}</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-danger" role="progressbar"
                                     style="width: {{ ($clients->where('date_of_engagement', date('Y'))->count() * 100)/ count($clients) }}%;"
                                     aria-valuenow="50" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <span class="m-widget24__change">New Addition</span>
                            <span class="m-widget24__number">69%</span>
                        </div>
                    </div>
                    <!--end::New Orders-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Users-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Staff Members
                            </h4>
                            <br>
                            <span class="m-widget24__desc">Total User</span>
                            <span class="m-widget24__stats m--font-success">{{ count($users) }}</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-danger" role="progressbar"
                                     style="width: 0%;" aria-valuenow="50" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>

                        </div>
                    </div>
                    <!--end::New Users-->
                </div>
            </div>
        </div>
    </div>
    <!--end:: Widgets/Stats-->

    <!--Begin::Section Calendar-->
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="m-portlet " id="m_portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <i class="flaticon-map-location"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Calendar
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>
                                            Add Event
                                        </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_calendar"></div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    <!--End::Section Calendar-->

    <!-- Begin: Client Datatable --->
    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Client List
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <div
                                    class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                                    data-dropdown-toggle="hover" aria-expanded="true">
                                    <a href="#"
                                       class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                        <i class="la la-ellipsis-h m--font-brand"></i>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span
                                            class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav">
                                                        <li class="m-nav__section m-nav__section--first">
																				<span class="m-nav__section-text">
																					Quick Actions
																				</span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                                <span class="m-nav__link-text">
																						Create Post
																					</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                <span class="m-nav__link-text">
																						Send Messages
																					</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                                                <span class="m-nav__link-text">
																						Upload File
																					</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__section">
																				<span class="m-nav__section-text">
																					Useful Links
																				</span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-info"></i>
                                                                <span class="m-nav__link-text">
																						FAQ
																					</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                <span class="m-nav__link-text">
																						Support
																					</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                                                        <li class="m-nav__item m--hide">
                                                            <a href="#"
                                                               class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                                Submit
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <div class="m_datatable" id="m_datatable_clients_list"></div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>
    <!-- End: Client Datatable -->
    <!-- Begin: Task Datatable --->
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
                                Tasks
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{ route('admin.tasks.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
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
                    <table id="kt_table_task_temple" class="table table-striped table-hover datatable">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Client</th>
                            <th>Status</th>
                            <th>Manager</th>
                            <th>Project</th>
                            <th>Project Subtype</th>
                            <th>Category</th>
                            <th>Starting</th>
                            <th>Ending</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php  $counter = 1; @endphp
                        @foreach($tasks as $task)
                            <tr data-entry-id="{{ $task->id }}">
                                <td> </td>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->client->name }}</td>
                                <td>{{ $task->status_id }}</td>
                                <td>{{ $task->manager->email }}</td>
                                <td>{{ $task->project->name }}</td>
                                <td>{{ $task->project_sub_type->name }}</td>
                                <td>{{ $task->category->name }}</td>
                                <td>{{ $task->starting_date }}</td>
                                <td>{{ $task->ending_date }}</td>
                            </tr>
                            @php  $counter ++; @endphp
                        @endforeach
                        @php  $counter = 1; @endphp
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Portlet-->
        </div>

    </div>
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
                                <a href="{{ route('admin.tasks.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
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
    <!-- End: Task Datatable -->
@endsection
@section('javascript')
    {{--    <script src="metro/assets/app/js/dashboard.js" type="text/javascript"></script>--}}

    @parent
    <script>
        $(window).on('load', function() {
            $('#loading').hide();
        });

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
        function createProjectType() {
            $.ajax({
                type: "POST",
                contentType: 'application/json',
                url: '{{ url('/api/v1/project-types') }}',
                data: $('#project_type').serialize(),
                success: function (data) {
                    alert(data.success)
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }

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
                    },
                    {
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
        // datatables for Clients
        datatableClient();

        var calendarInit = function () {
            if ($('#m_calendar').length === 0) {
                return;
            }

            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');
            let events = {!! json_encode($events) !!};
            $('#m_calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                navLinks: true,
                defaultDate: moment(),
                events: events,

                eventRender: function (event, element) {
                    if (element.hasClass('fc-day-grid-event')) {
                        element.data('content', event.description);
                        element.data('placement', 'top');
                        mApp.initPopover(element);
                    } else if (element.hasClass('fc-time-grid-event')) {
                        element.find('.fc-title').append('<div class="fc-description">' + event.description + '</div>');
                    } else if (element.find('.fc-list-item-title').lenght !== 0) {
                        element.find('.fc-list-item-title').append('<div class="fc-description">' + event.description + '</div>');
                    }
                }
            });
        }

        calendarInit();
    </script>
@endsection
