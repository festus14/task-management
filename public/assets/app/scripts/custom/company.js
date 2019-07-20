//
// Dashboard
//

// Class definition
const CompanyList = function() {
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

    const companyList = function() {
        if ($('#company_list').length === 0) {
            return;
        }

        const table = $('#company_list').DataTable({
            ajax: {
                //url: '/assets/employee.json',
                url: 'https://ipaysuite.com.ng/api/v1/contact_companies',
                headers: {
                    'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBmM2NlYTdkNDlmMzYwM2RlZDY1ZDc4YThkYzQzM2VjMGNiODZjZmFlYjU3MjRmZjA0ZGVmZTU1MDk3Mzc4OGE2MmJlOWIyZmEyMjUzNGE4In0.eyJhdWQiOiIxIiwianRpIjoiMGYzY2VhN2Q0OWYzNjAzZGVkNjVkNzhhOGRjNDMzZWMwY2I4NmNmYWViNTcyNGZmMDRkZWZlNTUwOTczNzg4YTYyYmU5YjJmYTIyNTM0YTgiLCJpYXQiOjE1NDc2NDA2MDgsIm5iZiI6MTU0NzY0MDYwOCwiZXhwIjoxNTc5MTc2NjA4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ReYepoCCdgLPXKQcIkNqwaTm0l5CfZDU0XqUOaqB6hP7X4hxzz7aJbZiqBLyTmRqGO2AWCtU1xojyC1p8nmwwzs3vcagex3L5IVtcCBYZ9md4wpZXS_8T-dJXvSsvdBHB2-jL97VPzdUxk8JtylyX96vn8ctIVPXyOMmlcfJGl4bCGx2t2tDNGBGNaChfYxotQpGBA-E0lIMvUsN81cejHLXPnhLStVolQfOzKEQd1KEV8cBWHoOJABP3NW4tbTyL7nNBlWPx3kL4Ap_rpRiWOrdd6H0UZaQ6qqVp1QC_8emYaexsUYyyI09wrg6XVvhKYdzyk7QS0XKsFYgbsW4TOr_QCiVLjxm3DHHYEzOEssh0-_uYGREDrST7xmWxr-Os3pBjDpXA0ETP0Q3fts-CEn2nhvJML1yjGVkG4yh0MMu4mbL5XKfG6k4iBBwTUOTm4kONuuqcfWfhkB6vjVG-FOUMFzhjTyKGjJTKE_0qOmUnfY4WrN4EESaT1yFmKvYXJ_6kI_NPVqMqnlHBXyQb9JrZBEuxyhBKU0AJdXIVJWm8BrcCmnyUNKdE7598rk3YFcnoPAo5wxVGCxUUBwD_NuW1llbTDuzi6QcQobdo7AweRqwZgZoF7SYxqn2YMHxMAEbyGwWWERqINm4PYsNJZ9Gz4cAOKVkiQulo04e_jM'
                },
                datatype: 'json',
                /*data: {
                    pagination: {
                        perpage: 20,
                    },
                },*/
                dataSrc: data => {
                    localStorage.employee_list = JSON.stringify(data);
                    return data;
                }
            },
            responsive: true,
            /*dom:
                "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" + // read more: https://datatables.net/examples/basic_init/dom.html
                "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>",*/
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                  <'row'<'col-sm-12'tr>>
                  <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            buttons: [
                {
                    extend: 'copyHtml5',
                    text: window.copyButtonTrans,
                    exportOptions: {
                        columns: [1,2,3,4,5,6,7,8]
                    }
                },
                {
                    extend: 'csvHtml5',
                    text: window.csvButtonTrans,
                    exportOptions: {
                        columns: [1,2,3,4,5,6,7,8]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: window.excelButtonTrans,
                    exportOptions: {
                        columns: [1,2,3,4,5,6,7,8]
                    },
                    footer: true
                },
                {
                    extend: 'pdfHtml5',
                    text: window.pdfButtonTrans,
                    exportOptions: {
                        columns: [1,2,3,4,5,6,7,8]
                    }
                },
                {
                    extend: 'print',
                    text: window.printButtonTrans,
                    exportOptions: {
                        columns: [1,2,3,4,5,6,7,8]
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
                {data: {'name':'name', 'id':'id'}},
                {data: 'address'},
                {data: 'website'},
                {data: 'email'},
                {data: 'created_by_id'},
                {data: 'created_by_team_id'},
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
                        return `<button data-toggle="modal" data-target="#companyView" data-profile-id="${data.id}" class="btn btn-sm btn-clean font-weight-bold">${data.name}</button>`;
                    },
                },
                {
                    targets: -1,
                    title: 'Actions',
                    width: '150px',
                    className: 'noVis',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return `
                        <button type="button" class="btn btn-sm btn-clean btn-icon-md" data-toggle="modal" data-target="#companyView" data-profile-id="${data}"><i class="la la-eye"></i></button>
                        <button type="button" class="btn btn-sm btn-clean btn-icon-md" data-toggle="modal" data-target="#companyEdit" data-profile-id="${data}"><i class="la la-edit"></i></button>
                        <form method="POST" action="/contact_companies/${data}" accept-charset="UTF-8" style="display: inline-block;" onsubmit="return confirm('Are you sure?');">
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="_token" type="hidden" value="7DNJ47frvWTSVFnq8MSynsyPUfTvhY5nFuSczeGM">
                            <button type="submit" class="btn btn-sm btn-clean btn-icon-md"><i class="la la-trash"></i></button>
                        </form>`;
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
        init: function() {
            daterangepickerInit();

            companyList();
        }
    };
}();

// Class initialization
jQuery(document).ready(function() {
    CompanyList.init();
});