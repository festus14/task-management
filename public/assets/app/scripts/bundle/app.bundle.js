// Class definition
const KLib = function() {

    return {
        initMiniChart: function(src, data, color, border, fill, tooltip) {
            if (src.length === 0) {
                return;
            }

            // set default values
            fill = (typeof fill !== 'undefined') ? fill : false;
            tooltip = (typeof tooltip !== 'undefined') ? tooltip : false;

            const config = {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October"],
                    datasets: [{
                        label: "",
                        borderColor: color,
                        borderWidth: border,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 4,
                        pointBackgroundColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                        pointBorderColor: Chart.helpers.color('#000000').alpha(0).rgbString(),
                        pointHoverBackgroundColor: KApp.getStateColor('brand'),
                        pointHoverBorderColor: Chart.helpers.color('#000000').alpha(0.1).rgbString(),
                        fill: fill,
                        backgroundColor: color,
                        data: data,
                    }]
                },
                options: {
                    title: {
                        display: false,
                    },
                    tooltips: (tooltip ? {
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
                    } : false),
                    legend: {
                        display: false,
                        labels: {
                            usePointStyle: false
                        }
                    },
                    responsive: false,
                    maintainAspectRatio: true,
                    hover: {
                        mode: 'index'
                    },
                    scales: {
                        xAxes: [{
                            display: false,
                            gridLines: false,
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: false,
                            gridLines: false,
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            }
                        }]
                    },

                    elements: {
                        line: {
                            tension: 0.5
                        },
                        point: {
                            radius: 2,
                            borderWidth: 4
                        },
                    },

                    layout: {
                        padding: {
                            left: 6,
                            right: 0,
                            top: 4,
                            bottom: 0
                        }
                    }
                }
            };

            const chart = new Chart(src, config);
        },

        initMediumChart: function(src, data, max, color, border) {
            if (!document.getElementById(src)) {
                return;
            }

            border = border ? border : 2;

            // Main chart
            const ctx = document.getElementById(src).getContext("2d");

            const gradient = ctx.createLinearGradient(0, 0, 0, 100);
            gradient.addColorStop(0, Chart.helpers.color(color).alpha(0.3).rgbString());
            gradient.addColorStop(1, Chart.helpers.color(color).alpha(0).rgbString());

            const mainConfig = {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October'],
                    datasets: [{
                        label: 'Orders',
                        borderColor: color,
                        borderWidth: border,
                        backgroundColor: gradient,
                        pointBackgroundColor: KApp.getStateColor('brand'),
                        data: data,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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
        }
    };
}();

const KOffcanvasPanel = function() {
    const notificationPanel = KUtil.get('k_offcanvas_toolbar_notifications');
    const quickActionsPanel = KUtil.get('k_offcanvas_toolbar_quick_actions');
    const profilePanel = KUtil.get('k_offcanvas_toolbar_profile');
    const searchPanel = KUtil.get('k_offcanvas_toolbar_search');

    const initNotifications = function() {
        const head = KUtil.find(notificationPanel, '.k-offcanvas-panel__head');
        const body = KUtil.find(notificationPanel, '.k-offcanvas-panel__body');

        const offcanvas = new KOffcanvas(notificationPanel, {
            overlay: true,  
            baseClass: 'k-offcanvas-panel',
            closeBy: 'k_offcanvas_toolbar_notifications_close',
            toggleBy: 'k_offcanvas_toolbar_notifications_toggler_btn'
        }); 

        KUtil.scrollInit(body, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                let height = parseInt(KUtil.getViewPort().height);
               
                if (head) {
                    height = height - parseInt(KUtil.actualHeight(head));
                    height = height - parseInt(KUtil.css(head, 'marginBottom'));
                }
        
                height = height - parseInt(KUtil.css(notificationPanel, 'paddingTop'));
                height = height - parseInt(KUtil.css(notificationPanel, 'paddingBottom'));    

                return height;
            }
        });
    };

    const initQucikActions = function() {
        const head = KUtil.find(quickActionsPanel, '.k-offcanvas-panel__head');
        const body = KUtil.find(quickActionsPanel, '.k-offcanvas-panel__body');

        const offcanvas = new KOffcanvas(quickActionsPanel, {
            overlay: true,  
            baseClass: 'k-offcanvas-panel',
            closeBy: 'k_offcanvas_toolbar_quick_actions_close',
            toggleBy: 'k_offcanvas_toolbar_quick_actions_toggler_btn'
        }); 

        KUtil.scrollInit(body, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                let height = parseInt(KUtil.getViewPort().height);
               
                if (head) {
                    height = height - parseInt(KUtil.actualHeight(head));
                    height = height - parseInt(KUtil.css(head, 'marginBottom'));
                }
        
                height = height - parseInt(KUtil.css(quickActionsPanel, 'paddingTop'));
                height = height - parseInt(KUtil.css(quickActionsPanel, 'paddingBottom'));    

                return height;
            }
        });
    };

    const initProfile = function() {
        const head = KUtil.find(profilePanel, '.k-offcanvas-panel__head');
        const body = KUtil.find(profilePanel, '.k-offcanvas-panel__body');

        const offcanvas = new KOffcanvas(profilePanel, {
            overlay: true,  
            baseClass: 'k-offcanvas-panel',
            closeBy: 'k_offcanvas_toolbar_profile_close',
            toggleBy: 'k_offcanvas_toolbar_profile_toggler_btn'
        }); 

        KUtil.scrollInit(body, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                let height = parseInt(KUtil.getViewPort().height);
               
                if (head) {
                    height = height - parseInt(KUtil.actualHeight(head));
                    height = height - parseInt(KUtil.css(head, 'marginBottom'));
                }
        
                height = height - parseInt(KUtil.css(profilePanel, 'paddingTop'));
                height = height - parseInt(KUtil.css(profilePanel, 'paddingBottom'));    

                return height;
            }
        });
    };

    const initSearch = function() {
        const head = KUtil.find(searchPanel, '.k-offcanvas-panel__head');
        const body = KUtil.find(searchPanel, '.k-offcanvas-panel__body');
        
        const offcanvas = new KOffcanvas(searchPanel, {
            overlay: true,  
            baseClass: 'k-offcanvas-panel',
            closeBy: 'k_offcanvas_toolbar_search_close',
            toggleBy: 'k_offcanvas_toolbar_search_toggler_btn'
        }); 

        KUtil.scrollInit(body, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                let height = parseInt(KUtil.getViewPort().height);
               
                if (head) {
                    height = height - parseInt(KUtil.actualHeight(head));
                    height = height - parseInt(KUtil.css(head, 'marginBottom'));
                }
        
                height = height - parseInt(KUtil.css(searchPanel, 'paddingTop'));
                height = height - parseInt(KUtil.css(searchPanel, 'paddingBottom'));    

                return height;
            }
        });
    };

    return {     
        init: function() {  
            initNotifications(); 
            initQucikActions();
            initProfile();
            initSearch();
        }
    };
}();
$(document).ready(function() {
    KOffcanvasPanel.init();
});

const KQuickPanel = function() {
    const panel = KUtil.get('k_quick_panel');
    const notificationPanel = KUtil.get('k_quick_panel_tab_notifications');
    const actionsPanel = KUtil.get('k_quick_panel_tab_actions');
    const settingsPanel = KUtil.get('k_quick_panel_tab_settings');

    const getContentHeight = function() {
        let height;
        const nav = KUtil.find(panel, '.k-quick-panel__nav');
        const content = KUtil.find(panel, '.k-quick-panel__content');

        height = parseInt(KUtil.getViewPort().height) - parseInt(KUtil.actualHeight(nav)) - (2 * parseInt(KUtil.css(nav, 'padding-top'))) - 10;

        return height;
    };

    const initOffcanvas = function() {
        const offcanvas = new KOffcanvas(panel, {
            overlay: true,  
            baseClass: 'k-quick-panel',
            closeBy: 'k_quick_panel_close_btn',
            toggleBy: 'k_quick_panel_toggler_btn'
        });   
    };

    const initNotifications = function() {
        KUtil.scrollInit(notificationPanel, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                return getContentHeight();
            }
        });
    };

    const initActions = function() {
        KUtil.scrollInit(actionsPanel, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                return getContentHeight();
            }
        });
    };

    const initSettings = function() {
        KUtil.scrollInit(settingsPanel, {
            disableForMobile: true, 
            resetHeightOnDestroy: true, 
            handleWindowResize: true, 
            height: function() {
                return getContentHeight();
            }
        });
    };

    const updatePerfectScrollbars = function() {
        $(panel).find('a[data-toggle="tab"]').on('shown.bs.tab', function () {
            KUtil.scrollUpdate(notificationPanel);
            KUtil.scrollUpdate(actionsPanel);
            KUtil.scrollUpdate(settingsPanel);
        });
    };

    return {     
        init: function() {  
            initOffcanvas(); 
            initNotifications();
            initActions();
            initSettings();
            updatePerfectScrollbars();
        }
    };
}();
$(document).ready(function() {
    KQuickPanel.init();
});

$('#employeeProfileView').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget); // Button that triggered the modal
    const employeeID = button.data('profileId'); // Extract info from data-* attributes
    const template = $('template').html();
    const modal = $(this);
    modal.find('#k_content_body__modal').html("");

    fetch(`https://ipaysuite.com.ng/api/v1/employees/${employeeID}`,
    //fetch('../../assets/8.json',
        {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBmM2NlYTdkNDlmMzYwM2RlZDY1ZDc4YThkYzQzM2VjMGNiODZjZmFlYjU3MjRmZjA0ZGVmZTU1MDk3Mzc4OGE2MmJlOWIyZmEyMjUzNGE4In0.eyJhdWQiOiIxIiwianRpIjoiMGYzY2VhN2Q0OWYzNjAzZGVkNjVkNzhhOGRjNDMzZWMwY2I4NmNmYWViNTcyNGZmMDRkZWZlNTUwOTczNzg4YTYyYmU5YjJmYTIyNTM0YTgiLCJpYXQiOjE1NDc2NDA2MDgsIm5iZiI6MTU0NzY0MDYwOCwiZXhwIjoxNTc5MTc2NjA4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ReYepoCCdgLPXKQcIkNqwaTm0l5CfZDU0XqUOaqB6hP7X4hxzz7aJbZiqBLyTmRqGO2AWCtU1xojyC1p8nmwwzs3vcagex3L5IVtcCBYZ9md4wpZXS_8T-dJXvSsvdBHB2-jL97VPzdUxk8JtylyX96vn8ctIVPXyOMmlcfJGl4bCGx2t2tDNGBGNaChfYxotQpGBA-E0lIMvUsN81cejHLXPnhLStVolQfOzKEQd1KEV8cBWHoOJABP3NW4tbTyL7nNBlWPx3kL4Ap_rpRiWOrdd6H0UZaQ6qqVp1QC_8emYaexsUYyyI09wrg6XVvhKYdzyk7QS0XKsFYgbsW4TOr_QCiVLjxm3DHHYEzOEssh0-_uYGREDrST7xmWxr-Os3pBjDpXA0ETP0Q3fts-CEn2nhvJML1yjGVkG4yh0MMu4mbL5XKfG6k4iBBwTUOTm4kONuuqcfWfhkB6vjVG-FOUMFzhjTyKGjJTKE_0qOmUnfY4WrN4EESaT1yFmKvYXJ_6kI_NPVqMqnlHBXyQb9JrZBEuxyhBKU0AJdXIVJWm8BrcCmnyUNKdE7598rk3YFcnoPAo5wxVGCxUUBwD_NuW1llbTDuzi6QcQobdo7AweRqwZgZoF7SYxqn2YMHxMAEbyGwWWERqINm4PYsNJZ9Gz4cAOKVkiQulo04e_jM'
            }
        })
        .then(r => r.json())
        .then(data => {
            const dob = data.employee.dob.split("-")[2] + '-' + data.employee.dob.split("-")[1] + '-' + data.employee.dob.split("-")[0];
            data.employee.dob = String(moment(dob).format("MMMM Do"));

            Mustache.parse(template);   // optional, speeds up future uses

            const rendered = Mustache.render(template, data);
            modal.find('#k_content_body__modal').html(rendered);
            modal.find('.modal-title span').text(data.employee.staff_no)
        });
});

$('#companyView').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget); // Button that triggered the modal
    const companyID = button.data('profileId'); // Extract info from data-* attributes
    const template = $('template').html();
    const modal = $(this);
    modal.find('#k_content_body__modal').html("");

    fetch(`https://ipaysuite.com.ng/api/v1/contact_companies/${companyID}`,
        {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBmM2NlYTdkNDlmMzYwM2RlZDY1ZDc4YThkYzQzM2VjMGNiODZjZmFlYjU3MjRmZjA0ZGVmZTU1MDk3Mzc4OGE2MmJlOWIyZmEyMjUzNGE4In0.eyJhdWQiOiIxIiwianRpIjoiMGYzY2VhN2Q0OWYzNjAzZGVkNjVkNzhhOGRjNDMzZWMwY2I4NmNmYWViNTcyNGZmMDRkZWZlNTUwOTczNzg4YTYyYmU5YjJmYTIyNTM0YTgiLCJpYXQiOjE1NDc2NDA2MDgsIm5iZiI6MTU0NzY0MDYwOCwiZXhwIjoxNTc5MTc2NjA4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ReYepoCCdgLPXKQcIkNqwaTm0l5CfZDU0XqUOaqB6hP7X4hxzz7aJbZiqBLyTmRqGO2AWCtU1xojyC1p8nmwwzs3vcagex3L5IVtcCBYZ9md4wpZXS_8T-dJXvSsvdBHB2-jL97VPzdUxk8JtylyX96vn8ctIVPXyOMmlcfJGl4bCGx2t2tDNGBGNaChfYxotQpGBA-E0lIMvUsN81cejHLXPnhLStVolQfOzKEQd1KEV8cBWHoOJABP3NW4tbTyL7nNBlWPx3kL4Ap_rpRiWOrdd6H0UZaQ6qqVp1QC_8emYaexsUYyyI09wrg6XVvhKYdzyk7QS0XKsFYgbsW4TOr_QCiVLjxm3DHHYEzOEssh0-_uYGREDrST7xmWxr-Os3pBjDpXA0ETP0Q3fts-CEn2nhvJML1yjGVkG4yh0MMu4mbL5XKfG6k4iBBwTUOTm4kONuuqcfWfhkB6vjVG-FOUMFzhjTyKGjJTKE_0qOmUnfY4WrN4EESaT1yFmKvYXJ_6kI_NPVqMqnlHBXyQb9JrZBEuxyhBKU0AJdXIVJWm8BrcCmnyUNKdE7598rk3YFcnoPAo5wxVGCxUUBwD_NuW1llbTDuzi6QcQobdo7AweRqwZgZoF7SYxqn2YMHxMAEbyGwWWERqINm4PYsNJZ9Gz4cAOKVkiQulo04e_jM'
            }
        })
        .then(r => r.json())
        .then(data => {
            console.log(data);

            Mustache.parse(template);
            const rendered = Mustache.render(template, data);
            modal.find('#k_content_body__modal').html(rendered);
        });
});

$('#employeeProfileAdd').on('show.bs.modal', function (event) {
    const modal = $(this);

    fetch(`https://ipaysuite.com.ng/api/v1/contact_companies`,
        {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBmM2NlYTdkNDlmMzYwM2RlZDY1ZDc4YThkYzQzM2VjMGNiODZjZmFlYjU3MjRmZjA0ZGVmZTU1MDk3Mzc4OGE2MmJlOWIyZmEyMjUzNGE4In0.eyJhdWQiOiIxIiwianRpIjoiMGYzY2VhN2Q0OWYzNjAzZGVkNjVkNzhhOGRjNDMzZWMwY2I4NmNmYWViNTcyNGZmMDRkZWZlNTUwOTczNzg4YTYyYmU5YjJmYTIyNTM0YTgiLCJpYXQiOjE1NDc2NDA2MDgsIm5iZiI6MTU0NzY0MDYwOCwiZXhwIjoxNTc5MTc2NjA4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ReYepoCCdgLPXKQcIkNqwaTm0l5CfZDU0XqUOaqB6hP7X4hxzz7aJbZiqBLyTmRqGO2AWCtU1xojyC1p8nmwwzs3vcagex3L5IVtcCBYZ9md4wpZXS_8T-dJXvSsvdBHB2-jL97VPzdUxk8JtylyX96vn8ctIVPXyOMmlcfJGl4bCGx2t2tDNGBGNaChfYxotQpGBA-E0lIMvUsN81cejHLXPnhLStVolQfOzKEQd1KEV8cBWHoOJABP3NW4tbTyL7nNBlWPx3kL4Ap_rpRiWOrdd6H0UZaQ6qqVp1QC_8emYaexsUYyyI09wrg6XVvhKYdzyk7QS0XKsFYgbsW4TOr_QCiVLjxm3DHHYEzOEssh0-_uYGREDrST7xmWxr-Os3pBjDpXA0ETP0Q3fts-CEn2nhvJML1yjGVkG4yh0MMu4mbL5XKfG6k4iBBwTUOTm4kONuuqcfWfhkB6vjVG-FOUMFzhjTyKGjJTKE_0qOmUnfY4WrN4EESaT1yFmKvYXJ_6kI_NPVqMqnlHBXyQb9JrZBEuxyhBKU0AJdXIVJWm8BrcCmnyUNKdE7598rk3YFcnoPAo5wxVGCxUUBwD_NuW1llbTDuzi6QcQobdo7AweRqwZgZoF7SYxqn2YMHxMAEbyGwWWERqINm4PYsNJZ9Gz4cAOKVkiQulo04e_jM'
            }
        })
        .then(r => r.json())
        .then(data => {
            data.companies = data;
            const template = '{{#companies}}<option value="{{id}}">{{name}}</option>{{/companies}}';
            const rendered = Mustache.render(template, data);
            modal.find('#company_id').append(rendered);
            modal.find('.k_selectpicker').selectpicker();
        });

    fetch(`https://ipaysuite.com.ng/api/v1/departments`,
        {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBmM2NlYTdkNDlmMzYwM2RlZDY1ZDc4YThkYzQzM2VjMGNiODZjZmFlYjU3MjRmZjA0ZGVmZTU1MDk3Mzc4OGE2MmJlOWIyZmEyMjUzNGE4In0.eyJhdWQiOiIxIiwianRpIjoiMGYzY2VhN2Q0OWYzNjAzZGVkNjVkNzhhOGRjNDMzZWMwY2I4NmNmYWViNTcyNGZmMDRkZWZlNTUwOTczNzg4YTYyYmU5YjJmYTIyNTM0YTgiLCJpYXQiOjE1NDc2NDA2MDgsIm5iZiI6MTU0NzY0MDYwOCwiZXhwIjoxNTc5MTc2NjA4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ReYepoCCdgLPXKQcIkNqwaTm0l5CfZDU0XqUOaqB6hP7X4hxzz7aJbZiqBLyTmRqGO2AWCtU1xojyC1p8nmwwzs3vcagex3L5IVtcCBYZ9md4wpZXS_8T-dJXvSsvdBHB2-jL97VPzdUxk8JtylyX96vn8ctIVPXyOMmlcfJGl4bCGx2t2tDNGBGNaChfYxotQpGBA-E0lIMvUsN81cejHLXPnhLStVolQfOzKEQd1KEV8cBWHoOJABP3NW4tbTyL7nNBlWPx3kL4Ap_rpRiWOrdd6H0UZaQ6qqVp1QC_8emYaexsUYyyI09wrg6XVvhKYdzyk7QS0XKsFYgbsW4TOr_QCiVLjxm3DHHYEzOEssh0-_uYGREDrST7xmWxr-Os3pBjDpXA0ETP0Q3fts-CEn2nhvJML1yjGVkG4yh0MMu4mbL5XKfG6k4iBBwTUOTm4kONuuqcfWfhkB6vjVG-FOUMFzhjTyKGjJTKE_0qOmUnfY4WrN4EESaT1yFmKvYXJ_6kI_NPVqMqnlHBXyQb9JrZBEuxyhBKU0AJdXIVJWm8BrcCmnyUNKdE7598rk3YFcnoPAo5wxVGCxUUBwD_NuW1llbTDuzi6QcQobdo7AweRqwZgZoF7SYxqn2YMHxMAEbyGwWWERqINm4PYsNJZ9Gz4cAOKVkiQulo04e_jM'
            }
        })
        .then(r => r.json())
        .then(data => {
            data.departments = data;
            const template = '{{#departments}}<option value="{{id}}">{{name}}</option>{{/departments}}';
            const rendered = Mustache.render(template, data);
            modal.find('#department_id').append(rendered);
            modal.find('.k_selectpicker').selectpicker();
        });

    fetch(`https://ipaysuite.com.ng/api/v1/banks`,
        {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBmM2NlYTdkNDlmMzYwM2RlZDY1ZDc4YThkYzQzM2VjMGNiODZjZmFlYjU3MjRmZjA0ZGVmZTU1MDk3Mzc4OGE2MmJlOWIyZmEyMjUzNGE4In0.eyJhdWQiOiIxIiwianRpIjoiMGYzY2VhN2Q0OWYzNjAzZGVkNjVkNzhhOGRjNDMzZWMwY2I4NmNmYWViNTcyNGZmMDRkZWZlNTUwOTczNzg4YTYyYmU5YjJmYTIyNTM0YTgiLCJpYXQiOjE1NDc2NDA2MDgsIm5iZiI6MTU0NzY0MDYwOCwiZXhwIjoxNTc5MTc2NjA4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ReYepoCCdgLPXKQcIkNqwaTm0l5CfZDU0XqUOaqB6hP7X4hxzz7aJbZiqBLyTmRqGO2AWCtU1xojyC1p8nmwwzs3vcagex3L5IVtcCBYZ9md4wpZXS_8T-dJXvSsvdBHB2-jL97VPzdUxk8JtylyX96vn8ctIVPXyOMmlcfJGl4bCGx2t2tDNGBGNaChfYxotQpGBA-E0lIMvUsN81cejHLXPnhLStVolQfOzKEQd1KEV8cBWHoOJABP3NW4tbTyL7nNBlWPx3kL4Ap_rpRiWOrdd6H0UZaQ6qqVp1QC_8emYaexsUYyyI09wrg6XVvhKYdzyk7QS0XKsFYgbsW4TOr_QCiVLjxm3DHHYEzOEssh0-_uYGREDrST7xmWxr-Os3pBjDpXA0ETP0Q3fts-CEn2nhvJML1yjGVkG4yh0MMu4mbL5XKfG6k4iBBwTUOTm4kONuuqcfWfhkB6vjVG-FOUMFzhjTyKGjJTKE_0qOmUnfY4WrN4EESaT1yFmKvYXJ_6kI_NPVqMqnlHBXyQb9JrZBEuxyhBKU0AJdXIVJWm8BrcCmnyUNKdE7598rk3YFcnoPAo5wxVGCxUUBwD_NuW1llbTDuzi6QcQobdo7AweRqwZgZoF7SYxqn2YMHxMAEbyGwWWERqINm4PYsNJZ9Gz4cAOKVkiQulo04e_jM'
            }
        })
        .then(r => r.json())
        .then(data => {
            data.banks = data;
            const template = '{{#banks}}<option value="{{id}}">{{name}}</option>{{/banks}}';
            const rendered = Mustache.render(template, data);
            modal.find('#bank_name','#p_bank').append(rendered);
            modal.find('.k_selectpicker').selectpicker();
        });
});