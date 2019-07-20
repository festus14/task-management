//
// Dashboard
//

// Class definition
const EmployeeList = function() {
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

    const options = {
        //fetch('../assets/employee.json').then(r => r.json()).then(data => {

        // datasource definition
        /*data: {
            type: 'local',
            source: data,
            pageSize: 25,
        },*/
        data: {
            type: 'remote',
            source: {
                read: {
                    url: 'https://ipaysuite.com.ng/api/v1/employees',
                    headers: {
                        'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBmM2NlYTdkNDlmMzYwM2RlZDY1ZDc4YThkYzQzM2VjMGNiODZjZmFlYjU3MjRmZjA0ZGVmZTU1MDk3Mzc4OGE2MmJlOWIyZmEyMjUzNGE4In0.eyJhdWQiOiIxIiwianRpIjoiMGYzY2VhN2Q0OWYzNjAzZGVkNjVkNzhhOGRjNDMzZWMwY2I4NmNmYWViNTcyNGZmMDRkZWZlNTUwOTczNzg4YTYyYmU5YjJmYTIyNTM0YTgiLCJpYXQiOjE1NDc2NDA2MDgsIm5iZiI6MTU0NzY0MDYwOCwiZXhwIjoxNTc5MTc2NjA4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ReYepoCCdgLPXKQcIkNqwaTm0l5CfZDU0XqUOaqB6hP7X4hxzz7aJbZiqBLyTmRqGO2AWCtU1xojyC1p8nmwwzs3vcagex3L5IVtcCBYZ9md4wpZXS_8T-dJXvSsvdBHB2-jL97VPzdUxk8JtylyX96vn8ctIVPXyOMmlcfJGl4bCGx2t2tDNGBGNaChfYxotQpGBA-E0lIMvUsN81cejHLXPnhLStVolQfOzKEQd1KEV8cBWHoOJABP3NW4tbTyL7nNBlWPx3kL4Ap_rpRiWOrdd6H0UZaQ6qqVp1QC_8emYaexsUYyyI09wrg6XVvhKYdzyk7QS0XKsFYgbsW4TOr_QCiVLjxm3DHHYEzOEssh0-_uYGREDrST7xmWxr-Os3pBjDpXA0ETP0Q3fts-CEn2nhvJML1yjGVkG4yh0MMu4mbL5XKfG6k4iBBwTUOTm4kONuuqcfWfhkB6vjVG-FOUMFzhjTyKGjJTKE_0qOmUnfY4WrN4EESaT1yFmKvYXJ_6kI_NPVqMqnlHBXyQb9JrZBEuxyhBKU0AJdXIVJWm8BrcCmnyUNKdE7598rk3YFcnoPAo5wxVGCxUUBwD_NuW1llbTDuzi6QcQobdo7AweRqwZgZoF7SYxqn2YMHxMAEbyGwWWERqINm4PYsNJZ9Gz4cAOKVkiQulo04e_jM'
                    },
                    method: 'GET'
                },
            },
            pageSize: 25,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
        },
        search: {
            input: $('#generalSearch'),
        },
        extensions: {
            checkbox: {},
        },

        // layout definition
        layout: {
            theme: 'default', // datatable theme
            scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
            height: null, // datatable's body's fixed height
            footer: false, // display/hide footer
        },

        // column sorting
        sortable: true,
        pagination: true,

        // columns definition
        columns: [{
            field: 'id',
            title: '#',
            sortable: false,
            width: 20,
            type: 'number',
            selector: {class: 'k-checkbox--solid k-checkbox--brand'},
            textAlign: 'center',
        }, {
            field: 'email',
            title: 'Email Address',
            template: function (row) {
                return `<a href="">${row.email}</a>`;
            },
        }, {
            field: 'firstname',
            title: 'First Name'
        }, {
            field: 'lastname',
            title: 'Last Name'
        }, {
            field: 'gender',
            title: 'Gender',
        }, {
            field: 'position',
            title: 'Position'
        }, {
            field: 'department',
            title: 'Department',
            template: function (row) {
                return row.department.name.replace(/ Department/, "");
            },
        }, {
            field: 'location',
            title: 'Location',
            template: function (row) {
                return row.location.name;
            },
        }, {
            field: 'staff_type',
            title: 'Staff Type',
            // callback function support for column rendering
            template: function (row) {
                const status = {
                    1: {'class': 'k-badge--info'},
                    2: {'class': 'k-badge--metal'},
                    3: {'class': 'k-badge--primary'},
                    4: {'class': 'k-badge--success'},
                    5: {'class': 'k-badge--warning'},
                    6: {'class': 'k-badge--success'},
                };
                return '<span class="k-badge ' + status[row.stafftype.id].class + ' k-badge--inline k-badge--pill">' + row.stafftype.name.split(" ")[0] + '</span>';
            },
        }, {
            field: 'Actions',
            title: 'Actions',
            sortable: false,
            width: 150,
            overflow: 'visible',
            textAlign: 'left',
            autoHide: false,
            template: function (row) {
                return `
                        <a href="profile.html/${row.id}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View Record">
                            <i class="la la-eye"></i>
                        </a>
                        <a href="employees/${row.id}/delete" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                            <i class="la la-trash"></i>
                        </a>
                        <div class="dropdown">
                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-sm" data-toggle="dropdown">
                                <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="employees/${row.id}/edit"><i class="la la-edit"></i> Edit Details</a>
                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                            </div>
                        </div>
                    `;
            },
        }]
    //});
    };

    const employeeList = function() {
        if ($('#employee_list').length === 0) {
            return;
        }

        fetch('../../assets/employee.json').then(r => r.json()).then(data => {
            const datatable = $('#employee_list').KDatatable({
                data: {
                    type: 'local',
                    source: data,
                    pageSize: 25,
                },
                buttons: [
                    'print',
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                ],
                /*data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: 'https://ipaysuite.com.ng/api/v1/employees',
                            headers: {
                                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBmM2NlYTdkNDlmMzYwM2RlZDY1ZDc4YThkYzQzM2VjMGNiODZjZmFlYjU3MjRmZjA0ZGVmZTU1MDk3Mzc4OGE2MmJlOWIyZmEyMjUzNGE4In0.eyJhdWQiOiIxIiwianRpIjoiMGYzY2VhN2Q0OWYzNjAzZGVkNjVkNzhhOGRjNDMzZWMwY2I4NmNmYWViNTcyNGZmMDRkZWZlNTUwOTczNzg4YTYyYmU5YjJmYTIyNTM0YTgiLCJpYXQiOjE1NDc2NDA2MDgsIm5iZiI6MTU0NzY0MDYwOCwiZXhwIjoxNTc5MTc2NjA4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ReYepoCCdgLPXKQcIkNqwaTm0l5CfZDU0XqUOaqB6hP7X4hxzz7aJbZiqBLyTmRqGO2AWCtU1xojyC1p8nmwwzs3vcagex3L5IVtcCBYZ9md4wpZXS_8T-dJXvSsvdBHB2-jL97VPzdUxk8JtylyX96vn8ctIVPXyOMmlcfJGl4bCGx2t2tDNGBGNaChfYxotQpGBA-E0lIMvUsN81cejHLXPnhLStVolQfOzKEQd1KEV8cBWHoOJABP3NW4tbTyL7nNBlWPx3kL4Ap_rpRiWOrdd6H0UZaQ6qqVp1QC_8emYaexsUYyyI09wrg6XVvhKYdzyk7QS0XKsFYgbsW4TOr_QCiVLjxm3DHHYEzOEssh0-_uYGREDrST7xmWxr-Os3pBjDpXA0ETP0Q3fts-CEn2nhvJML1yjGVkG4yh0MMu4mbL5XKfG6k4iBBwTUOTm4kONuuqcfWfhkB6vjVG-FOUMFzhjTyKGjJTKE_0qOmUnfY4WrN4EESaT1yFmKvYXJ_6kI_NPVqMqnlHBXyQb9JrZBEuxyhBKU0AJdXIVJWm8BrcCmnyUNKdE7598rk3YFcnoPAo5wxVGCxUUBwD_NuW1llbTDuzi6QcQobdo7AweRqwZgZoF7SYxqn2YMHxMAEbyGwWWERqINm4PYsNJZ9Gz4cAOKVkiQulo04e_jM'
                            },
                            method: 'GET'
                        },
                    },
                    pageSize: 25,
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },*/
                search: {
                    input: $('#generalSearch'),
                },
                extensions: {
                    checkbox: {},
                },

                // layout definition
                layout: {
                    theme: 'default', // datatable theme
                    scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
                    height: null, // datatable's body's fixed height
                    footer: false, // display/hide footer
                },

                // column sorting
                sortable: true,
                pagination: true,

                // columns definition
                columns: [{
                    field: 'id',
                    title: '#',
                    sortable: false,
                    width: 20,
                    type: 'number',
                    selector: {class: 'k-checkbox--solid k-checkbox--brand'},
                    textAlign: 'center',
                }, {
                    field: 'email',
                    title: 'Email Address',
                    width: 200,
                    template: function (row) {
                        return `<a href="profile.html/${row.id}" class="font-weight-bold">${row.email}</a>`;
                    },
                }, {
                    field: 'firstname',
                    title: 'First Name'
                }, {
                    field: 'lastname',
                    title: 'Last Name'
                }, {
                    field: 'gender',
                    title: 'Gender',
                }, {
                    field: 'position',
                    title: 'Position'
                }, {
                    field: 'department',
                    title: 'Department',
                    template: function (row) {
                        return row.department.name.replace(/ Department/, "");
                    },
                }, {
                    field: 'location',
                    title: 'Location',
                    width: 100,
                    template: function (row) {
                        return row.location.name;
                    },
                }, {
                    field: 'staff_type',
                    title: 'Staff Type',
                    width: 100,
                    // callback function support for column rendering
                    template: function (row) {
                        const status = {
                            1: {'class': 'k-badge--info'},
                            2: {'class': 'k-badge--metal'},
                            3: {'class': 'k-badge--primary'},
                            4: {'class': 'k-badge--success'},
                            5: {'class': 'k-badge--warning'},
                            6: {'class': 'k-badge--success'},
                        };
                        return '<span class="k-badge ' + status[row.stafftype.id].class + ' k-badge--inline k-badge--pill">' + row.stafftype.name.split(" ")[0] + '</span>';
                    },
                }, {
                    field: 'Actions',
                    title: 'Actions',
                    sortable: false,
                    width: 150,
                    overflow: 'visible',
                    textAlign: 'left',
                    autoHide: false,
                    template: function (row) {
                        return `
                            <a href="profile.html/${row.id}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View Record">
                                <i class="la la-eye"></i>
                            </a>
                            <a href="employees/${row.id}/delete" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                                <i class="la la-trash"></i>
                            </a>
                            <div class="dropdown">
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-sm" data-toggle="dropdown">
                                    <i class="la la-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="employees/${row.id}/edit"><i class="la la-edit"></i> Edit Details</a>
                                    <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                    <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                </div>
                            </div>
                        `;
                    },
                }]
            });

            /*$('#k_form_status').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'status');
            });

            $('#k_form_type').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'type');
            });

            $('#k_form_status,#k_form_type').selectpicker();*/

            datatable.spinnerCallback(true);

            datatable.on(
                'k-datatable--on-check k-datatable--on-uncheck k-datatable--on-layout-updated',
                function(e) {
                    var checkedNodes = datatable.rows('.k-datatable__row--active').nodes();
                    var count = checkedNodes.length;
                    $('#k_datatable_selected_number').html(count);
                    if (count > 0) {
                        $('#k_datatable_group_action_form').collapse('show');
                    } else {
                        $('#k_datatable_group_action_form').collapse('hide');
                    }
                });

            $('#k_modal_fetch_id').on('show.bs.modal', function(e) {
                var ids = datatable.rows('.k-datatable__row--active').
                nodes().
                find('.k-checkbox--single > [type="checkbox"]').
                map(function(i, chk) {
                    return $(chk).val();
                });
                var c = document.createDocumentFragment();
                for (var i = 0; i < ids.length; i++) {
                    var li = document.createElement('li');
                    li.setAttribute('data-id', ids[i]);
                    li.innerHTML = 'Selected record ID: ' + ids[i];
                    c.appendChild(li);
                }
                $(e.target).find('.k_datatable_selected_ids').append(c);
            }).on('hide.bs.modal', function(e) {
                $(e.target).find('.k_datatable_selected_ids').empty();
            });

            $('#export_print').on('click', function(e) {
                e.preventDefault();
                datatable.button(0).trigger();
            });

            $('#export_copy').on('click', function(e) {
                e.preventDefault();
                datatable.button(1).trigger();
            });

            $('#export_excel').on('click', function(e) {
                e.preventDefault();
                datatable.button(2).trigger();
            });

            $('#export_csv').on('click', function(e) {
                e.preventDefault();
                datatable.button(3).trigger();
            });

            $('#export_pdf').on('click', function(e) {
                e.preventDefault();
                datatable.button(4).trigger();
            });

        });
    };

    return {
        init: function() {
            daterangepickerInit();

            employeeList();
        }
    };
}();

// Class initialization
jQuery(document).ready(function() {
    EmployeeList.init();
});