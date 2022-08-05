/**
 * -------------------------------------------------------------------------------------------------------------------------
 * | Function used for Designation Crud Operations
 * -------------------------------------------------------------------------------------------------------------------------
 */
// Save Designations Using Ajax
function saveDesignation(e) {
    var targetform = $('#addDesignation');
    var murl = targetform.attr('action');
    var mdata = $("#addDesignation").serialize();
    e.preventDefault();

    $.ajax({
        url: murl,
        type: "post",
        data: mdata,
        datatype: "json",
        success: function (mdata) {
            swal({
                title: "Good job!",
                text: "You Updated the Designation!",
                icon: "success",
                button: "Ok!",
            });
            $('#dataTable').DataTable().destroy();
            fetchData();
        },

        error: function (error) {
            var mError = error.responseJSON.errors['designation'];
            swal({
                title: "Oops!",
                text: mError[0],
                icon: "error",
                button: "Ok!",
            });
        },
    });
}

// Update Designation
function updateDesignation(e) {
    var targetform = $('#updateDesignation');
    var murl = targetform.attr('action');
    var mdata = $("#updateDesignation").serialize();
    e.preventDefault();

    $.ajax({
        url: murl,
        type: "post",
        data: mdata,
        datatype: "json",
        success: function (mdata) {
            swal({
                title: "Good job!",
                text: "You Updated the Designation!",
                icon: "success",
                button: "Ok!",
            });
            $('#dataTable').DataTable().destroy();
            $('#designationUpd').val('');
            fetchData();
        },

        error: function (error) {
            var mError = error.responseJSON;
            swal({
                title: "Oops!",
                text: mError,
                icon: "error",
                button: "Ok!",
            });
        },
    });
}   

// Fetch Data
function fetchData(){
    $.ajax({
        type: "GET",
        url: "/get-designations",
        contentType: "application/json;",
        success: function (results) {
            showData(results);
        }
    })
}

// Fetch all Data on Datatable
function showData(data){
    $('#dataTable').DataTable({
        "data": data,
         "processing": true,
         "method": "GET",
         "columns": [
                {
                    "data": "designation"
                },
                {
                 "title": "Action",
                 "data": "id",
                 "render": function (data) {
                     return "<button class='btn btn-success btn-sm' onclick='detailPreview(" + data + ");''><i class='fa fa-pen'></i> Edit</button>";
                 },
                 "orderable": "false",
                 "searchable": "false"
             }
         ],
    });
}

// Get Designation full URL
function detailPreview(designationID) {
    var mUrl="get-designation-by-id/" + designationID;
    showDesignationByID(mUrl);
    
}

// Show Designation Value BY ID
function showDesignationByID(url){

    $.ajax({
        url: url,
        type: "GET",
        cache: false,
        contentType: "application/json;charset=utf-8",
        datatype: 'json',
        success: function (result) {
            if (result == false) {
                alertify.error('Error! No Records Found');
            } else {
                $('#id').val(result.id);
                $('#designationUpd').val(result.designation);
            }
        }
    });

    $("#base-tab2").trigger("click");
}

/**
 * -------------------------------------------------------------------------------------------------------------------------
 * | Function Used for Designation Crud Operations
 * -------------------------------------------------------------------------------------------------------------------------
 */

