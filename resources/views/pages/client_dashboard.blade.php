@extends('layouts.inner')

@section('title', 'Clients')
    
@section('header', 'Clients Portal')

@section('sub_header', 'Clients Dashboard')

@section('css')
<style>
    #client-card{
        background-color: #f1f1f1;
    }
        
    </style>
@endsection

@section('content')

<div class="m-portlet ">
    
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

        <div class="row m-row--no-padding m-row--col-separator-xl">
                <div  id="client-card" class="col-md-12 col-lg-12 col-xl-12">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h1 style="font-size: 30px;" class="m-widget24__title">
                                NNPC
                            </h1>
                            
                            <br>

                            <span class="m-widget24__stats m--font-brand">
                                <div class="m-widget4__img m-widget4__img--pic">
                                    <img src="assets/app/media/img/users/100_4.jpg" alt width="75px" height="75px" style="border-radius: 1000px">
                                </div>
                            </span>

                            <div class="m--space-10"></div>

                            
                            <p style="margin-top: 10px">
                                    <a style="margin-top: -15px; margin-left: 25px" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#collapseExampleThree" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        View Projects
                                    </a>
                                </p>
                                <div style="box-sizing: border-box;" class="collapse" id="collapseExampleThree">
                                    <ul style="list-style: none;" >
                                        <li>
                                            <p style="font-size: 15px; font-weight: bold;">Tax</p>
                                            <p>
                                                <a style="margin-top: -15px;" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#collapseExampleInFour" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    View Tasks Progress
                                                </a>
                                            </p>
                                            <div class="collapse" id="collapseExampleInFour">
                                                
                                                <div class="k-portlet__body">
                                                    <!--begin: Search Form -->
                                                    <div class="k-form k-fork--label-right k-margin-t-20 k-margin-b-10">
                                                <div class="row align-items-center">
                                                    <div class="col-xl-8 order-2 order-xl-1">
                                                        <div class="row align-items-center">				
                                                            <div class="col-md-6 k-margin-b-20-tablet-and-mobile">
                                                                <div class="k-input-icon k-input-icon--left">
                                                                    <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                                                    <span class="k-input-icon__icon k-input-icon__icon--left">
                                                                        <span><i class="la la-search"></i></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>		<!--end: Search Form -->
                                        </div>
                                        <div class="k-portlet__body k-portlet__body--fit">
                                                    <!--begin: Datatable -->
                                            <table class="k-datatable" id="html_table" width="100%">
                                                <thead>
                                                <tr>
                                                    <th title="Field #1">Task</th>
                                                    <th title="Field #2">In Charge</th>
                                                    <th title="Field #3">Status</th>
                                                    <th title="Field #4">Deadline</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Audit</td>
                                                        <td>Wale Yimika</td>
                                                        <td>Pending</td>
                                                        <td>27/09/2019</td>
                                                    </tr>
                                                    <tr>
                                                            <td>Audit</td>
                                                            <td>Wale Yimika</td>
                                                            <td>Pending</td>
                                                            <td>27/09/2019</td>
                                                        </tr>
                                                        <tr>
                                                                <td>Audit</td>
                                                                <td>Wale Yimika</td>
                                                                <td>Pending</td>
                                                                <td>27/09/2019</td>
                                                            </tr>
                                                            <tr>
                                                                    <td>Audit</td>
                                                                    <td>Wale Yimika</td>
                                                                    <td>Pending</td>
                                                                    <td>27/09/2019</td>
                                                                </tr>
                                                </tbody>
                                            </table>
                                                    <!--end: Datatable -->
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                                <p style="font-size: 15px; font-weight: bold;">Audit</p>
                                                <p>
                                                    <a style="margin-top: -15px;" class="btn btn-sm m-btn--pill btn-secondary m-btn m-btn--label-brand" data-toggle="collapse" href="#collapseExampleInFive" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                        View Tasks Progress
                                                    </a>
                                                </p>
                                                <div class="collapse" id="collapseExampleInFive">
                                                    
                                                    <div class="k-portlet__body">
                                                        <!--begin: Search Form -->
                                                        <div class="k-form k-fork--label-right k-margin-t-20 k-margin-b-10">
                                                    <div class="row align-items-center">
                                                        <div class="col-xl-8 order-2 order-xl-1">
                                                            <div class="row align-items-center">				
                                                                <div class="col-md-6 k-margin-b-20-tablet-and-mobile">
                                                                    <div class="k-input-icon k-input-icon--left">
                                                                        <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                                                        <span class="k-input-icon__icon k-input-icon__icon--left">
                                                                            <span><i class="la la-search"></i></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 k-margin-b-20-tablet-and-mobile">
                                                                    <div class="k-form__group k-form__group--inline">
                                                                        <div class="k-form__label">
                                                                            <label>Status:</label>
                                                                        </div>
                                                                        <div class="k-form__control">
                                                                            <select class="form-control bootstrap-select" id="k_form_status">
                                                                                <option value="">All</option>
                                                                                <option value="1">Completed</option>
                                                                                <option value="2">Pending</option>
                                                                                <option value="3">Holding</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>		<!--end: Search Form -->
                                            </div>
                                            <div class="k-portlet__body k-portlet__body--fit">
                                                        <!--begin: Datatable -->
                                                <table class="k-datatable" id="html_table" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th title="Field #1">Task</th>
                                                        <th title="Field #2">In Charge</th>
                                                        <th title="Field #3">Status</th>
                                                        <th title="Field #4">Deadline</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Audit</td>
                                                            <td>Funso</td>
                                                            <td>Pending</td>
                                                            <td>27/09/2019</td>
                                                        </tr>
                                                        <tr>
                                                                <td>Audit</td>
                                                                <td>Wale Yimika</td>
                                                                <td>Pending</td>
                                                                <td>27/09/2019</td>
                                                            </tr>
                                                            <tr>
                                                                    <td>Audit</td>
                                                                    <td>Wale Yimika</td>
                                                                    <td>Pending</td>
                                                                    <td>27/09/2019</td>
                                                                </tr>
                                                                <tr>
                                                                        <td>Audit</td>
                                                                        <td>Wale Yimika</td>
                                                                        <td>Pending</td>
                                                                        <td>27/09/2019</td>
                                                                    </tr>
                                                    </tbody>
                                                </table>
                                                        <!--end: Datatable -->
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

@endsection

@section('javascript')
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