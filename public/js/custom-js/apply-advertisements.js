function showModal($header,$link){
    $('#exampleModalLabel').empty();
    $('#exampleModalLabel').append($header);
    $('#link').val($link);
}

// Store OTP
function storeOTP(e){
    var targetform = $('#otp-master');
    var murl = targetform.attr('action');
    var mdata = $("#otp-master").serialize();
    e.preventDefault();

    $.ajax({
        url: murl,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
        type: "post",
        data: mdata,
        datatype: "json",
        success: function (mdata) {
            swal({
                title: "Good job!",
                text: mdata,
                icon: "success",
                button: "Ok!",
            });
        },

        error: function (error) {
            var mError = JSON. stringify(error.responseJSON.errors);
            swal({
                title: "Oops!",
                text: mError,
                icon: "error",
                button: "Ok!",
            });
        },
    });
}