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
        url: "/api/v1/project-reports",
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
        url: "/api/v1/documents",
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