
<script>
        // Delete single task document
        function deleteTaskDocument(docID) {
            swal({
                title: "Are you sure?",
                text: "Everything relating to this document will be lost!",
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
                        url: "{{ url('/admin/documents/destroy')}}" + "/" + docID,
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
</script>
