function showModal($header){
    $('#exampleModalLabel').empty();
    $('#exampleModalLabel').append($header);
}

// Store OTP
function storeOTP(e){
    var targetform = $('#otp-master');
    var murl = targetform.attr('action');
    var mdata = $("#otp-master").serialize();
    e.preventDefault();

    $.ajax({
        url: murl,
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