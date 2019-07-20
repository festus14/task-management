//
// Dashboard
//

// Class definition
const Dashboard = function() {

    const mediumCharts = function() {
        KLib.initMediumChart('k_widget_mini_chart_1', [20, 45, 20, 10, 20, 35, 20, 25, 10, 10], 70, KApp.getStateColor('brand'));
        KLib.initMediumChart('k_widget_mini_chart_2', [10, 15, 25, 45, 15, 30, 10, 40, 15, 25], 70, KApp.getStateColor('danger'));
        KLib.initMediumChart('k_widget_mini_chart_3', [22, 15, 40, 10, 35, 20, 30, 50, 15, 10], 70, KApp.getBaseColor('shape', 4));
    };

    const latestProductsMiniCharts = function() {
        KLib.initMiniChart($('#k_widget_latest_products_chart_1'), [6, 12, 9, 18, 15, 9, 11, 8], KApp.getStateColor('info'), 2, false, false);
        KLib.initMiniChart($('#k_widget_latest_products_chart_2'), [8, 6, 13, 16, 9, 6, 11, 14], KApp.getStateColor('warning'), 2, false, false);
        KLib.initMiniChart($('#k_widget_latest_products_chart_3'), [8, 6, 13, 16, 9, 6, 11, 14], KApp.getStateColor('warning'), 2, false, false);
        KLib.initMiniChart($('#k_widget_latest_products_chart_4'), [3, 9, 9, 18, 15, 9, 11, 8], KApp.getStateColor('success'), 2, false, false);
        KLib.initMiniChart($('#k_widget_latest_products_chart_5'), [5, 7, 9, 18, 15, 9, 11, 8], KApp.getStateColor('brand'), 2, false, false);
        KLib.initMiniChart($('#k_widget_latest_products_chart_6'), [3, 9, 5, 18, 15, 7, 11, 6], KApp.getStateColor('danger'), 2, false, false);
    };

    const generalStatistics = function() {
        // Mini charts
        KLib.initMiniChart($('#k_widget_general_statistics_chart_1'), [6, 8, 3, 18, 15, 7, 11, 7], KApp.getStateColor('warning'), 2, false, false);
        KLib.initMiniChart($('#k_widget_general_statistics_chart_2'), [8, 6, 9, 18, 15, 7, 11, 16], KApp.getStateColor('brand'), 2, false, false);
        KLib.initMiniChart($('#k_widget_general_statistics_chart_3'), [4, 12, 9, 18, 15, 7, 11, 12], KApp.getStateColor('danger'), 2, false, false);
        KLib.initMiniChart($('#k_widget_general_statistics_chart_4'), [3, 14, 5, 12, 15, 8, 14, 16], KApp.getStateColor('success'), 2, false, false);

        // Main chart
        if (!document.getElementById("k_widget_general_statistics_chart_main")) {
            return;
        }

        const ctx = document.getElementById("k_widget_general_statistics_chart_main").getContext("2d");

        const gradient1 = ctx.createLinearGradient(0, 0, 0, 350);
        gradient1.addColorStop(0, Chart.helpers.color(KApp.getStateColor('brand')).alpha(0.3).rgbString());
        gradient1.addColorStop(1, Chart.helpers.color(KApp.getStateColor('brand')).alpha(0).rgbString());

        const gradient2 = ctx.createLinearGradient(0, 0, 0, 350);
        gradient2.addColorStop(0, Chart.helpers.color(KApp.getStateColor('danger')).alpha(0.3).rgbString());
        gradient2.addColorStop(1, Chart.helpers.color(KApp.getStateColor('danger')).alpha(0).rgbString());

        const mainConfig = {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October'],
                datasets: [{
                    label: 'Sales',
                    borderColor: KApp.getStateColor('brand'),
                    borderWidth: 2,
                    backgroundColor: gradient1,
                    pointBackgroundColor: KApp.getStateColor('brand'),
                    data: [30, 60, 25, 7, 5, 15, 30, 20, 15, 10],
                }, {
                    label: 'Orders',
                    borderWidth: 1,
                    borderColor: KApp.getStateColor('danger'),
                    backgroundColor: gradient2,
                    pointBackgroundColor: KApp.getStateColor('danger'),
                    data: [10, 15, 25, 35, 15, 30, 55, 40, 65, 40]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                title: {
                    display: false,
                    text: ''
                },
                tooltips: {
                    enabled: true,
                    intersect: false,
                    mode: 'nearest',
                    bodySpacing: 5,
                    yPadding: 10,
                    xPadding: 10, 
                    caretPadding: 0,
                    displayColors: false,
                    backgroundColor: KApp.getStateColor('brand'),
                    titleFontColor: '#ffffff', 
                    cornerRadius: 4,
                    footerSpacing: 0,
                    titleSpacing: 0
                },
                legend: {
                    display: false,
                    labels: {
                        usePointStyle: false
                    }
                },
                hover: {
                    mode: 'index'
                },
                scales: {
                    xAxes: [{
                        display: false,
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        },
                        ticks: {
                            display: false,
                            beginAtZero: true
                        }
                    }],
                    yAxes: [{
                        display: true,
                        stacked: false,
                        scaleLabel: {
                            display: false,
                            labelString: 'Value'
                        },
                        gridLines: {
                            color: '#eef2f9',
                            drawBorder: false,
                            offsetGridLines: true,
                            drawTicks: false
                        },
                        ticks: {
                            display: false,
                            beginAtZero: true
                        }
                    }]
                },
                elements: {
                    point: {
                        radius: 0,
                        borderWidth: 0,
                        hoverRadius: 0,
                        hoverBorderWidth: 0
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        };

        const chart = new Chart(ctx, mainConfig);

        // Update chart on window resize
        KUtil.addResizeHandler(function() {
            chart.update();
        });
    };
    
    const widgetTechnologiesChart = function() {
        if ($('#k_widget_technologies_chart').length === 0) {
            return;
        }

        const randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };

        const config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        35, 30, 35
                    ],
                    backgroundColor: [
                        KApp.getBaseColor('shape', 3),
                        KApp.getBaseColor('shape', 4),
                        KApp.getStateColor('brand')
                    ]
                }],
                labels: [
                    'Angular',
                    'CSS',
                    'HTML'
                ]
            },
            options: {
                cutoutPercentage: 75,
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Technology'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                tooltips: {
                    enabled: true,
                    intersect: false,
                    mode: 'nearest',
                    bodySpacing: 5,
                    yPadding: 10,
                    xPadding: 10, 
                    caretPadding: 0,
                    displayColors: false,
                    backgroundColor: KApp.getStateColor('brand'),
                    titleFontColor: '#ffffff', 
                    cornerRadius: 4,
                    footerSpacing: 0,
                    titleSpacing: 0
                }
            }
        };

        const ctx = document.getElementById('k_widget_technologies_chart').getContext('2d');
        const myDoughnut = new Chart(ctx, config);
    };

    const widgetTotalOrdersChart = function() {
        if (!document.getElementById('k_widget_total_orders_chart')) {
            return;
        }

        // Main chart
        const max = 80;
        const color = KApp.getStateColor('brand');
        const ctx = document.getElementById('k_widget_total_orders_chart').getContext("2d");
        const gradient = ctx.createLinearGradient(0, 0, 0, 120);
        gradient.addColorStop(0, Chart.helpers.color(color).alpha(0.3).rgbString());
        gradient.addColorStop(1, Chart.helpers.color(color).alpha(0).rgbString());

        const data = [30, 35, 45, 65, 35, 50, 40, 60, 35, 45];

        const mainConfig = {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October'],
                datasets: [{
                    label: 'Orders',
                    borderColor: color,
                    borderWidth: 3,
                    backgroundColor: gradient,
                    pointBackgroundColor: KApp.getStateColor('brand'),
                    data: data,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                title: {
                    display: false,
                    text: 'Stacked Area'
                },
                tooltips: {
                    enabled: true,
                    intersect: false,
                    mode: 'nearest',
                    bodySpacing: 5,
                    yPadding: 10,
                    xPadding: 10, 
                    caretPadding: 0,
                    displayColors: false,
                    backgroundColor: KApp.getStateColor('brand'),
                    titleFontColor: '#ffffff', 
                    cornerRadius: 4,
                    footerSpacing: 0,
                    titleSpacing: 0
                },
                legend: {
                    display: false,
                    labels: {
                        usePointStyle: false
                    }
                },
                hover: {
                    mode: 'index'
                },
                scales: {
                    xAxes: [{
                        display: false,
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        },
                        ticks: {
                            display: false,
                            beginAtZero: true,
                        }
                    }],
                    yAxes: [{
                        display: false,
                        scaleLabel: {
                            display: false,
                            labelString: 'Value'
                        },
                        gridLines: {
                            color: '#eef2f9',
                            drawBorder: false,
                            offsetGridLines: true,
                            drawTicks: false
                        },
                        ticks: {
                            max: max,
                            display: false,
                            beginAtZero: true
                        }
                    }]
                },
                elements: {
                    point: {
                        radius: 0,
                        borderWidth: 0,
                        hoverRadius: 0,
                        hoverBorderWidth: 0
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        };

        const chart = new Chart(ctx, mainConfig);

        // Update chart on window resize
        KUtil.addResizeHandler(function() {
            chart.update();
        });
    };

    const widgetSalesStatisticsChart = function() {
        if (!document.getElementById('k_chart_sales_statistics')) {
            return;
        }

        const MONTHS = ['1 Aug', '2 Aug', '3 Aug', '4 Aug', '5 Aug', '6 Aug', '7 Aug'];

        const color = Chart.helpers.color;
        const barChartData = {
            labels: ['1 Aug', '2 Aug', '3 Aug', '4 Aug', '5 Aug', '6 Aug', '7 Aug'],
            datasets: [{
                label: 'Sales',
                backgroundColor: color(KApp.getStateColor('brand')).alpha(1).rgbString(),
                borderWidth: 0,
                data: [20, 30, 40, 35, 45, 55, 45]
            }, {
                label: 'Orders',
                backgroundColor: color(KApp.getBaseColor('shape', 1)).alpha(1).rgbString(),
                borderWidth: 0,
                data: [25, 35, 45, 40, 50, 60, 50]
            }]
        };

        const ctx = document.getElementById('k_chart_sales_statistics').getContext('2d');
        const myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: false,
                scales: {
                    xAxes: [{
                        categoryPercentage: 0.35,
                        barPercentage: 0.70,
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        },
                        gridLines: false,
                        ticks: {
                            display: true,
                            beginAtZero: true,
                            fontColor: KApp.getBaseColor('shape', 3),
                            fontSize: 13,
                            padding: 10
                        }
                    }],
                    yAxes: [{
                        categoryPercentage: 0.35,
                        barPercentage: 0.70,
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Value'
                        },
                        gridLines: {
                            color: KApp.getBaseColor('shape', 2),
                            drawBorder: false,
                            offsetGridLines: false,
                            drawTicks: false,
                            borderDash: [3, 4],
                            zeroLineWidth: 1,
                            zeroLineColor: KApp.getBaseColor('shape', 2),
                            zeroLineBorderDash: [3, 4]
                        },
                        ticks: {
                            max: 70,                            
                            stepSize: 10,
                            display: true,
                            beginAtZero: true,
                            fontColor: KApp.getBaseColor('shape', 3),
                            fontSize: 13,
                            padding: 10
                        }
                    }]
                },
                title: {
                    display: false
                },
                hover: {
                    mode: 'index'
                },
                tooltips: {
                    enabled: true,
                    intersect: false,
                    mode: 'nearest',
                    bodySpacing: 5,
                    yPadding: 10,
                    xPadding: 10, 
                    caretPadding: 0,
                    displayColors: false,
                    backgroundColor: KApp.getStateColor('brand'),
                    titleFontColor: '#ffffff', 
                    cornerRadius: 4,
                    footerSpacing: 0,
                    titleSpacing: 0
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 5,
                        bottom: 5
                    }
                }
            }
        });
    };

    const widgetRevenueGrowthChart = function() {
        if (!document.getElementById('k_chart_revenue_growth')) {
            return;
        }

        const color = Chart.helpers.color;
        const barChartData = {
            labels: ['1 Aug', '2 Aug', '3 Aug', '4 Aug', '5 Aug', '6 Aug', '7 Aug', '8 Aug', '9 Aug', '10 Aug', '11 Aug', '12 Aug'],
            datasets: [{
                label: 'Sales',
                backgroundColor: color(KApp.getStateColor('brand')).alpha(1).rgbString(),
                borderWidth: 0,
                data: [10, 40, 20, 40, 40, 60, 40, 80, 40, 70, 40, 70],
                borderColor: KApp.getStateColor('brand'),
                borderWidth: 3,
                backgroundColor: color(KApp.getStateColor('brand')).alpha(0.07).rgbString(),
                //pointBackgroundColor: KApp.getStateColor('brand'),
                fill: true
            }]
        };

        const ctx = document.getElementById('k_chart_revenue_growth').getContext('2d');
        const myBar = new Chart(ctx, {
            type: 'line',
            data: barChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: false,
                scales: {
                    xAxes: [{
                        categoryPercentage: 0.35,
                        barPercentage: 0.70,
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        },
                        gridLines: false,
                        ticks: {
                            display: true,
                            beginAtZero: true,
                            fontColor: KApp.getBaseColor('shape', 3),
                            fontSize: 13,
                            padding: 10
                        }
                    }],
                    yAxes: [{
                        categoryPercentage: 0.35,
                        barPercentage: 0.70,
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Value'
                        },
                        gridLines: {
                            color: KApp.getBaseColor('shape', 2),
                            drawBorder: false,
                            offsetGridLines: false,
                            drawTicks: false,
                            borderDash: [3, 4],
                            zeroLineWidth: 1,
                            zeroLineColor: KApp.getBaseColor('shape', 2),
                            zeroLineBorderDash: [3, 4]
                        },
                        ticks: {
                            max: 100,                            
                            stepSize: 20,
                            display: true,
                            beginAtZero: true,
                            fontColor: KApp.getBaseColor('shape', 3),
                            fontSize: 13,
                            padding: 10
                        }
                    }]
                },
                title: {
                    display: false
                },
                hover: {
                    mode: 'index'
                },
                elements: {
                    line: {
                        tension: 0.5
                    },
                    point: { 
                        radius: 0 
                    }
                },
                tooltips: {
                    enabled: true,
                    intersect: false,
                    mode: 'nearest',
                    bodySpacing: 5,
                    yPadding: 10,
                    xPadding: 10, 
                    caretPadding: 0,
                    displayColors: false,
                    backgroundColor: KApp.getStateColor('brand'),
                    titleFontColor: '#ffffff', 
                    cornerRadius: 4,
                    footerSpacing: 0,
                    titleSpacing: 0
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 5,
                        bottom: 5
                    }
                }
            }
        });
    };

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

    /*const employeeList = function() {
        if ($('#employee_list').length === 0) {
            return;
        }

        //fetch('../assets/employee.json').then(r => r.json()).then(data => {

        const datatable = $('#employee_list').KDatatable({
            // datasource definition
            /!*data: {
                type: 'local',
                source: data,
                pageSize: 10,
            },*!/
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
                pageSize: 15
            },

            // layout definition
            layout: {
                theme: 'default', // datatable theme
                class: '', // custom wrapper class
                scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
                // height: 450, // datatable's body's fixed height
                footer: false, // display/hide footer
            },

            // column sorting
            sortable: true,
            pagination: true,

            search: {
                input: $('#generalSearch'),
            },

            // columns definition
            columns: [
                {
                    field: 'id',
                    title: '#',
                    sortable: false,
                    width: 20,
                    type: 'number',
                    selector: {class: 'k-checkbox--solid k-checkbox--brand'},
                    textAlign: 'center',
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
                    field: 'email',
                    title: 'Email Address'
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
                            1: {'class': 'k-badge--brand'},
                            2: {'class': 'k-badge--metal'},
                            3: {'class': 'k-badge--primary'},
                            4: {'class': 'k-badge--success'},
                            5: {'class': 'k-badge--success'},
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
                                <a href="employees/${row.id}/edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit details">
                                    <i class="la la-edit"></i>
                                </a>
                                <a href="employees/${row.id}/delete" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                                    <i class="la la-trash"></i>
                                </a>
                            `;
                    },
                }],
        });

        $('#k_form_status').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'status');
        });

        $('#k_form_type').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'gender');
        });

        $('#k_form_status,#k_form_type').selectpicker();

        // Reload datatable layout on aside menu toggle
        if (KLayout.getAsideSecondaryToggler && KLayout.getAsideSecondaryToggler()) {
            KLayout.getAsideSecondaryToggler().on('toggle', function () {
                datatable.redraw();
            });
        }

        // Fix datatable layout in tabs
        datatable.closest('.k-content__body').find('[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            datatable.redraw();
        });
        //});
    };*/

    return {
        init: function() {
            mediumCharts();

            latestProductsMiniCharts();

            daterangepickerInit();

            generalStatistics();

            //employeeList();

            widgetTechnologiesChart();

            widgetTotalOrdersChart();

            widgetSalesStatisticsChart();

            widgetRevenueGrowthChart();
        }
    };
}();

// Class initialization
jQuery(document).ready(function() {
    Dashboard.init();
});