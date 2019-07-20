"use strict";
const DatatablesExtensionButtons = function() {
    const daterangepickerInit = function() {
        if ($('#k_dashboard_daterangepicker').length == 0) {
            return;
        }

        const picker = $('#k_dashboard_daterangepicker');
        const start = moment();
        const end = moment();

        function cb(start, end, label) {
            let title = '';
            let range = '';

            if ((end - start) < 100 || label == 'Today') {
                title = 'Today:';
                range = start.format('MMM D');
            } else if (label === 'Yesterday') {
                title = 'Yesterday:';
                range = start.format('MMM D');
            } else {
                range = start.format('MMM D') + ' - ' + end.format('MMM D');
            }

            picker.find('#k_dashboard_daterangepicker_date').html(range);
            picker.find('#k_dashboard_daterangepicker_title').html(title);
        }

        picker.daterangepicker({
            direction: KUtil.isRTL(),
            startDate: start,
            endDate: end,
            opens: 'left',
            applyClass: "btn btn-sm btn-primary",
            cancelClass: "btn btn-sm btn-secondary",
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end, '');
    };

    const employeeListing = function() {
        const table = $('#company_list').DataTable({
            responsive: true,
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                  <'row'<'col-sm-12'tr>>
                  <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: window.csvButtonTrans,
                    exportOptions: {
                        columns: [2,3,4,5,6,7]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: window.excelButtonTrans,
                    exportOptions: {
                        columns: [2,3,4,5,6,7]
                    },
                    footer: true
                },
                {
                    extend: 'pdfHtml5',
                    text: window.pdfButtonTrans,
                    exportOptions: {
                        columns: [2,3,4,5,6,7]
                    }
                },
                {
                    extend: 'print',
                    text: window.printButtonTrans,
                    exportOptions: {
                        columns: [2,3,4,5,6,7]
                    }
                },
                {
                    extend: 'colvis',
                    //columns: ':not(.noVis)'
                },
            ],
            lengthMenu: [20, 30, 50, 100],
            pageLength: 20,
            // Order settings
            order: [[1, 'asc']],
            headerCallback: function(thead, data, start, end, display) {
                thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="k-checkbox k-checkbox--single k-checkbox--solid">
                        <input type="checkbox" value="${data.id}" class="k-group-checkable">
                        <span></span>
                    </label>`;
            },
            columns: [
                {data: 'id'},
                {data: {'email':'email', 'id':'id'}},
                {data: 'name'},
                {data: 'address'},
                {data: 'website'},
                {data: 'created_by.email'},
                {data: 'created_by_team.name'},
                {data: 'id'}
            ],
            columnDefs: [
                {
                    targets: 0,
                    width: '30px',
                    className: 'dt-right',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return `
                        <label class="k-checkbox k-checkbox--single k-checkbox--solid">
                            <input type="checkbox" value="${data}" class="k-checkable">
                            <span></span>
                        </label>`;
                    },
                },
                {
                    targets: 1,
                    render: function(data, type, full, meta) {
                        return `<button data-toggle="modal" data-target="#companyView" data-profile-id="${data.id}" class="btn btn-sm btn-clean font-weight-bold">${data.email}</button>`;
                    },
                },
                {
                    targets: 6,
                    render: function(data, type, full, meta) {
                        return data.replace(/ Department/, "");
                    },
                },
                {
                    targets: -1,
                    title: 'Actions',
                    width: '200px',
                    className: 'noVis',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return `
                        <button type="button" class="btn btn-sm btn-clean btn-icon-md" data-toggle="modal" data-target="#companyView" data-profile-id="${data}"><i class="la la-eye"></i></button>
                        <button type="button" class="btn btn-sm btn-clean btn-icon-md" data-toggle="modal" data-target="#employeeProfileEdit" data-profile-id="${data}"><i class="la la-edit"></i></button>
                        <form method="POST" action="/contact_company/${data}" accept-charset="UTF-8" style="display: inline-block;" onsubmit="return confirm('Are you sure?');">
                            <input name="_method" type="hidden" value="DELETE">
                            
                            <button type="submit" class="btn btn-sm btn-clean btn-icon-md"><i class="la la-trash"></i></button>
                        </form>
                        <div class="dropdown">
                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon-md" data-toggle="dropdown">
                                <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button type="button" class="btn btn-sm btn-clean btn-icon-md" data-toggle="modal" data-target="#employeeAddPayment" data-profile-id="${data}" data-finance-type="payment"><i class="la la-plus-circle"></i>&nbsp;Add Payment</button>
                                <button type="button" class="btn btn-sm btn-clean btn-icon-md" data-toggle="modal" data-target="#employeeAddPayment" data-profile-id="${data}" data-finance-type="recurrent_payment"><i class="la la-plus-circle"></i>&nbsp;Add Recurrent Payment</button>
                                <button type="button" class="btn btn-sm btn-clean btn-icon-md" data-toggle="modal" data-target="#employeeAddPayment" data-profile-id="${data}" data-finance-type="deductions"><i class="la la-minus-circle"></i>&nbsp;Add Deductions</button>
                                <button type="button" class="btn btn-sm btn-clean btn-icon-md" data-toggle="modal" data-target="#employeeAddPayment" data-profile-id="${data}" data-finance-type="recurrent_deductions"><i class="la la-minus-circle"></i>&nbsp;Add Recurrent Deductions</button>
                            </div>
                        </div>`;
                    },
                },
                {
                    targets: 8,
                    render: function(data, type, full, meta) {
                        var status = {
                            1: {'class': 'k-badge--brand'},
                            2: {'class': 'k-badge--metal'},
                            3: {'class': 'k-badge--primary'},
                            4: {'class': 'k-badge--success'},
                            5: {'class': 'k-badge--success'},
                            6: {'class': 'k-badge--success'}
                        };
                        return '<span class="k-font-bold k-badge ' + status[data.id].class + ' k-badge--inline k-badge--pill">' + data.name.split(" ")[0] + '</span>';
                    },
                },
            ],
        });

        $('#export_print').on('click', function(e) {
            e.preventDefault();
            table.button(0).trigger();
        });

        $('#export_copy').on('click', function(e) {
            e.preventDefault();
            table.button(1).trigger();
        });

        $('#export_excel').on('click', function(e) {
            e.preventDefault();
            table.button(2).trigger();
        });

        $('#export_csv').on('click', function(e) {
            e.preventDefault();
            table.button(3).trigger();
        });

        $('#export_pdf').on('click', function(e) {
            e.preventDefault();
            table.button(4).trigger();
        });

        table.on('change', '.k-group-checkable', function() {
            var set = $(this).closest('table').find('td:first-child .k-checkable');
            var checked = $(this).is(':checked');

            $(set).each(function() {
                if (checked) {
                    $(this).prop('checked', true);
                    $(this).closest('tr').addClass('active');
                }
                else {
                    $(this).prop('checked', false);
                    $(this).closest('tr').removeClass('active');
                }
            });
        });

        table.on('change', 'tbody tr .k-checkbox', function() {
            $(this).parents('tr').toggleClass('active');
        });

    };

    return {
        //main function to initiate the module
        init: function() {
            daterangepickerInit();
            employeeListing();
        },
    };

}();

jQuery(document).ready(function() {
    DatatablesExtensionButtons.init();
});
