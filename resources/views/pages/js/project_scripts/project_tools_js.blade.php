<script>
    // Function for rendering the more info modal
    var projectName;
    function displayProjectInfo(proID) {
        $.ajax({
            type: "GET",
            url: '{{ url("/api/v1/projects/") }}' + "/" + proID,
            success: function (data) {
                projectName = data.data.name;
                let moreInfo = document.getElementById("moreInfo")
                moreInfo.innerHTML = `<div class="modal fade" id="moreInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="box-sizing: border-box;">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 80%; min-width: 500px;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" onclick="$('#moreInfoModal').modal('hide');" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 m-portlet " id="m_portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon">
                                                    <i class="flaticon-info"> </i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    ${data.data.name}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div class="accordion" id="accordionExample">
                                            <div onclick="taskDTCall(${data.data.id})" class="card">
                                                <div class="card-header" id="headingone">
                                                    <h6 style="cursor: pointer" class="mb-0">
                                                        <span class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    <i class="m-menu__link-icon flaticon-list"></i>
                                                    Project tasks
                                                </span>
                                                    </h6>
                                                </div>
                                                <div id="collapseOne" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="m-portlet">
                                                        <table class="table table-striped table-hover" style="width: 100%;" id="kt_table_single_project_task">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Starting Date</th>
                                                                    <th>Deadline</th>
                                                                    <th>Category</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div onclick="documentDTCall(${data.data.id})" class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h6 style="cursor: pointer" class="mb-0">
                                                        <span data-toggle="modal" data-target="#documentModal">
                                                    <i class="m-menu__link-icon flaticon-clipboard"></i>
                                                    Documents
                                                </span>
                                                    </h6>
                                                </div>
                                            </div>

                                            <div onclick="reportDTCall(${data.data.id})" class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h6 style="cursor: pointer" class="mb-0">
                                                        <span data-toggle="modal" data-target="#projectreportModal">
                                                    <i class="m-menu__link-icon flaticon-file"></i>
                                                    Report
                                                </span>
                                                    </h6>
                                                </div>
                                            </div>

                                            <div class="accordion" id="accordionExample5">
                                                <div class="card">
                                                    <div class="card-header" id="headingnine">
                                                        <h6 style="cursor: pointer" class="mb-0">
                                                            <span class="collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                        <i class="m-menu__link-icon flaticon-users"></i>
                                                        Project Members
                                                    </span>
                                                        </h6>
                                                    </div>
                                                    <div id="collapseNine" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample5" style="box-sizing: border-box;">
                                                        <input type="textOne" id="myInputNine" onkeyup="searchProjectMembers()" placeholder="Search for project member.." title="Type in a member">
                                                        <table id="myTableNine">
                                                            <tr class="header">
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                            </tr>
                                                            <tr class="">
                                                            </tr>
                                                            ` + data.data.team_members.map(item => `
                                                            <tr>
                                                                <td>${item.name}</td>
                                                                <td>${item.email}</td>
                                                            </tr>` ) + `
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div onclick="projectTComment(${data.data.id})" class="card-header" id="headingFour">
                                                        <h6 style="cursor: pointer" class="mb-0">
                                                            <span class="" data-toggle="modal" data-target="#projectCommentModal">
                                                <i class="m-menu__link-icon flaticon-comment"></i>
                                                Comments
                                            </span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 65%; min-width: 500px;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="documentModalLongTitle">Project Documents</h5>
                                <button type="button" class="close" onclick="$('#documentModal').modal('hide');" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="m-portlet" id="m_portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon">
                                                    <i class="flaticon-list-1"> </i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    Documents
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                            <ul class="m-portlet__nav">
                                                <li class="m-portlet__nav-item">
                                                    <a style="color:white; background-color: #8a2a2b;" data-toggle="modal" data-target="#addDocumentModal" class="btn m-btn--icon m-btn--pill">
                                                        <span>
                                                            <i class="la la-plus"></i>
                                                            <span>
                                                                Add Document
                                                            </span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div class="m-portlet">
                                            <table id="kt_table_single_project_documents" class="table table-striped table-hover" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Version</th>
                                                        <th>Date Created</th>
                                                        <th>File</th>
                                                        <th>Tools</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    ` + data.data.documents.map(item => `
                                                    <tr>
                                                        <td></td>
                                                        <td>${item.name}</td>
                                                        <td>${item.version}</td>
                                                        <td>${item.created_at}</td>
                                                        <td>` +
                                                            let mimeType = item.mime_type;
                                                            if(mimeType === 'application/pdf'){
                                                               `
                                                               <a href="{{ storage_path().'/' }}${item.media_report[0].id}/${item.media_report[0].file_name}" target="_blank">
                                                                    View file
                                                                </a>
                                                               `
                                                            }else{
                                                                `
                                                                <a href="http://docs.google.com/gview?url={{ storage_path().'/' }}${item.media_report[0].id}/${item.media_report[0].file_name}&embedded=true" target="_blank">
                                                                    View file
                                                                </a>
                                                                `
                                                            }
                                                         + `

                                                        </td>
                                                        </td>
                                                        <td>
                                                            <form action="{{ url('/admin/documents/${item.id}') }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                            </form>
                                                        </td>
                                                    </tr>` ) + `
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="projectreportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 65%; min-width: 500px;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Project Reports</h5>
                                <button type="button" class="close" onclick="$('#projectreportModal').modal('hide');" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon">
                                                    <i class="flaticon-list-1"> </i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    Reports
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                            <ul class="m-portlet__nav">
                                                <li class="m-portlet__nav-item">
                                                    <a style="color:white; background-color: #8a2a2b;" data-toggle="modal" data-target="#addReportModal" class="btn m-btn--icon m-btn--pill">
                                                        <span>
                                                            <i class="la la-plus"></i>
                                                            <span>
                                                                Add Report
                                                            </span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div class="m-portlet">
                                            <table id="kt_table_single_project_reports" class="table table-striped table-hover" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">#</th>
                                                        <th>Report</th>
                                                        <th>Date Created</th>
                                                        <th>File</th>
                                                        <th>Tools</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    ` + data.data.reports.map(item => `
                                                    <tr>
                                                        <td></td>
                                                        <td>${item.project_report}</td>
                                                        <td>${item.created_at}</td>
                                                        <td>` +
                                                            let mimeType = item.mime_type;
                                                            if(mimeType === 'application/pdf'){
                                                               `
                                                               <a href="{{ storage_path().'/' }}${item.media_report[0].id}/${item.media_report[0].file_name}" target="_blank">
                                                                    View file
                                                                </a>
                                                               `
                                                            }else{
                                                                `
                                                                <a href="http://docs.google.com/gview?url={{ storage_path().'/' }}${item.media_report[0].id}/${item.media_report[0].file_name}&embedded=true" target="_blank">
                                                                    View file
                                                                </a>
                                                                `
                                                            }
                                                         + `

                                                        </td>
                                                        <td>
                                                            <form action="{{ url('admin/project-reports/${item.id}') }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                            </form>
                                                        </td>
                                                    </tr>` ) + `
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                    `
                    document.getElementById('project-list').value = data.data.id;
                    document.getElementById('client-list').value = data.data.client_id;
                    document.getElementById('project').value = data.data.id;
                    document.getElementById('client').value = data.data.client_id;
            },

            error: function (data) {
                console.log('Error:', data);
            }

        })


    }

                    function documentDTCall(project_id) {
                    $(document).ready(function () {
                        $('#kt_table_single_project_documents').DataTable();
                    });
                }


                function reportDTCall(project_id) {
                    $(document).ready(function () {
                        $('#kt_table_single_project_reports').DataTable();
                    });
                }
    // Search Through Project Members FUnction
    function searchProjectMembers() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInputNine");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTableNine");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function submitProjectReport() {
        let formData = $('#addProjectReportForm').serialize();
        $.ajax({
            type: "POST",
            url: "{{ url('/api/v1/project-reports') }}",
            data: formData,
            success: function(data) {
                swal({
                    title: "Success!",
                    text: "Project Report Submitted!",
                    icon: "success",
                    confirmButtonColor: "#DD6B55",
                    // confirmButtonText: "OK",
                });
                window.setTimeout(function() {
                    location.reload();
                }, 3000)

            },
            error: function(error) {
                swal({
                    title: "Project Report Wasn't Created!",
                    icon: "error",
                    confirmButtonColor: "#fc3",
                    confirmButtonText: "OK",
                });
            }
        });
    }

    function submitProjectDoc() {
        let formData = $('#submitDoc').serialize();
        $.ajax({
            type: "POST",
            url: "{{ url('/api/v1/documents') }}",
            data: formData,
            success: function(data) {
                swal({
                    title: "Success!",
                    text: "Project document submitted!",
                    icon: "success",
                    confirmButtonColor: "#DD6B55",
                    // confirmButtonText: "OK",
                });
                $('#addDocumentModal').modal('hide');
                window.setTimeout(function() {
                    $("#kt_table_single_project_documentsS").DataTable().ajax.reload();
                }, 3000)

            },
            error: function(error) {
                swal({
                    title: "Project document wasn't created!",
                    icon: "error",
                    confirmButtonColor: "#fc3",
                    confirmButtonText: "OK",
                });
            }
        });
    }
</script>
