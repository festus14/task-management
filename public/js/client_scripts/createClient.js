$(document).ajaxStop(function () {
    $('#loading').hide();
});

$(document).ajaxStart(function () {
    $('#loading').show();
});

let languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


function createCliento(){
    swal({
        title: "Success!",
        text: "Client Added!",
        icon: "success",
        confirmButtonText: "OK",
    });
    window.setTimeout(function(){
        location.reload();
    }, 2500);
}
