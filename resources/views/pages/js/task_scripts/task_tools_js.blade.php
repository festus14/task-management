
<script>

    var taskName;
            function displayTaskInfo(task_id) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/api/v1/tasks') }}" + "/" + task_id,
                    success: function (data) {
                         taskName = data.data.name;
                        let moreInfo = document.getElementById("moreInfo")
                        moreInfo.innerHTML = `<div class="modal fade" id="moreTaskInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 70%; min-width: 500px;" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" onclick="$('#moreTaskInfoModal').modal('hide');" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">

                                    <div class="col-md-12 m-portlet " id="m_portlet">
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-title">
                                                    <span class="m-portlet__head-icon">
                                                                <i class="flaticon-list-2"> </i>
                                                            </span>
                                                    <h3 class="m-portlet__head-text">
                                                        ${data.data.name}
                                                    </h3>
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

                                        <div class="accordion" id="accordionExample5">
                                    <div class="card">
                                        <div class="card-header" id="headingnine">
                                            <h6 style="cursor: pointer" class="mb-0">
                                                <span class="collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                    <i class="m-menu__link-icon flaticon-users"></i>
                                                    Task Members
                                                </span>
                                            </h6>
                                        </div>
                                    <div id="collapseNine" class="collapse m-portlet__body" aria-labelledby="headingOne" data-parent="#accordionExample5">
                                        <input type="textOne" id="myInputNine" onkeyup="searchTaskMembers()" placeholder="Search for task member.." title="Type in a member">
                                        <table id="myTableNine">
                                            <tr class="header">
                                                <th>Name</th>
                                                <th>Email</th>
                                            </tr>
                                            <tr class="">
                                            </tr>
                                            `+ data.data.assinged_tos.map(item =>
                                            `<tr>
                                                <td>${item.name}</td>
                                                <td>${item.email}</td>
                                            </tr>`
                                            )+`
                                        </table>
                                    </div>
                                </div>

                                        <div onclick="taskCommentTester(${data.data.id})" class="card">
                                            <div class="card-header" id="headingFour">
                                                <h6 style="cursor: pointer" class="mb-0">
                                                    <span class="" id="commentTrigger" data-toggle="modal" data-target="#taskCommentModal">
                                                        <i class="m-menu__link-icon flaticon-comment"></i>
                                                        Comments
                                                    </span>
                                                </h6>
                                            </div>
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



            <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 65%; min-width: 500px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="documentModalLongTitle">Task Documents</h5>
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
                                        <table id="kt_table_single_task_documents" class="table table-striped table-hover" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">#</th>
                                                    <th>Name</th>
                                                    <th>Document Type</th>
                                                    <th>File</th>
                                                    <th>Date Created</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                `+ data.data.documents.map(item =>
                                                    `<tr>
                                                        <td></td>
                                                        <td>${item.name}</td>
                                                        <td style="text-align: center;">${item.document_type}</td>
                                                        <td>
                                                            <a href="http://docs.google.com/gview?url=http://localhost/storage/${item.media_report[0].id}/${item.media_report[0].file_name}&embedded=true" target="_blank">
                                                            <!-- <iframe
                                                                src="http://docs.google.com/gview?url=http://localhost/storage/${item.media_report[0].id}/${item.media_report[0].file_name}&embedded=true"
                                                                style="width:600px; height:500px;" frameborder="0">
                                                            </iframe> -->

                                                                View file
                                                            </a>
                                                        </td>
                                                        <td>${item.created_at}</td>
                                                        <td>
                                                            <form id="deleteTaskDocForm" style="display: inline-block;">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="submit" class="btn btn-xs btn-danger" onclick="deleteTaskDoc(${item.id})" value="{{ trans('global.delete') }}">
                                                            </form>
                                                        </td>
                                                    </tr>`
                                                ) +`
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end::Portlet-->
                        </div>
                    </div>
                </div>
                </div>






            `
            document.getElementById('client-list').value = data.data.client_id;
            document.getElementById('doc-task-id').value = data.data.id;
            document.getElementById('project-list_doc').value = data.data.project_id;

                },

            error: function (data) {
                console.log('Error:', data);


            }

            })

    }

        // Delete Task Report
        function deleteTaskReport(repID) {
            swal({
                title: "Are you sure?",
                text: "Everything relating to this report will be lost!",
                icon: "warning",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('api/v1/documents') }}" + "/" + docID,
                        success: function(data) {
                            swal("Deleted!", "Document has been successfully deleted.", "success");
                            window.setTimeout(function() {
                                location.reload();
                            }, 2500);
                        },
                        error: function(data) {
                            swal("Delete failed", "Please try again", "error");
                        }

                    });
                } else {
                    swal("Cancelled", "Delete cancelled", "error");
                }

            });
        }


        // Search Through Task Members FUnction
        function searchTaskMembers() {
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

        // Function for submitting task report
        function submitTaskReport() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('/api/v1/project-reports') }}",
                data: $('#taskReportForm').serialize(),
                success: function(data) {
                    swal({
                        title: "Success!",
                        text: "Task Report Submitted!",
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
                        title: "Task report wasn't created!",
                        icon: "error",
                        confirmButtonColor: "#fc3",
                        confirmButtonText: "OK",
                    });
                }
            });
        }

        function submitTaskDocument() {
            let formData = $('#taskDocumentForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('/api/v1/task-documents') }}",
                data: formData,
                success: function(data) {
                    swal({
                        title: "Success!",
                        text: "Task document submitted!",
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
                        title: "Task document wasn't created!",
                        icon: "error",
                        confirmButtonColor: "#fc3",
                        confirmButtonText: "OK",
                    });
                }
            });
        }


        function editFilterType() {
            let clientVal = document.getElementById("edit-client-list").value;
            $.ajax({
                type: "GET",
                url: "{{ url('/api/v1/clients')}}" + "/" + clientVal,
                success: function(data) {
                    document.getElementById('edit-project-list').innerHTML = `
                    <option value="" selected></option> ` +
                        data.data.projects.map(elem => `<option value="${elem.id}">${elem.name}</option>`) +
                        `
                    `
                },
                error: function(data) {
                    document.getElementById('edit-project-list').innerHTML =
                        `
                    <option value="" selected></option>
                    `
                    console.log('Error:', data);
                }
            });
        }

        Dropzone.options.documentDropzone = {
        url: '{{ route('admin.task-documents.storeMedia') }}',
        maxFilesize: 20, // MB
        maxFiles: 1,
        addRemoveLinks: true,
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        params: {
        size: 20
        },
        success: function (file, response) {
        $('form').find('input[name="document"]').remove()
        $('form').append('<input type="hidden" name="document" value="' + response.name + '">')
        },
        removedfile: function (file) {
        file.previewElement.remove()
        $('form').find('input[name="document"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
        },
        init: function () {
            @if(isset($taskDocument) && $taskDocument->document)
            var file = {!! json_encode($taskDocument->document) !!}
                this.options.addedfile.call(this, file)
            file.previewElement.classList.add('dz-complete')
            $('form').append('<input type="hidden" name="document" value="' + file.file_name + '">')
            this.options.maxFiles = this.options.maxFiles - 1

                @endif
            },
            error: function (file, response) {
            if ($.type(response) === 'string') {
                var message = response //dropzone sends it's own error messages in string
            } else {
                var message = response.errors.file
            }
            file.previewElement.classList.add('dz-error')
            _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
            _results = []
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i]
                _results.push(node.textContent = message)
            }

            return _results
        }
        }
</script>
