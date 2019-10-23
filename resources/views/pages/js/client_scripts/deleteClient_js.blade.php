<script>
    function deleteClient(client_id){
        swal({
            title: "Are you sure?",
            text: "This Client will be deleted!",
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
                    url: "{{ url('api/v1/clients')}}" + '/' + client_id,
                    success: function (data) {
                        swal("Deleted!", "Client successfully deleted.", "success");
                        window.setTimeout(function(){
                            location.reload();
                        } , 2500);
                    },

                    error: function (data) {
                        swal("Delete failed", "Please try again", "error");
                    }

                    });
                    }

            else {
                    swal("Cancelled", "Delete cancelled", "error");
                }

            });
        }
</script>
