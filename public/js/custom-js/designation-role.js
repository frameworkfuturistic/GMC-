/**
 * ----------------------------------------------------------------------------------------------------------------------
 * | Function used for Designation Roles Crud Operations using ajax method
 * ----------------------------------------------------------------------------------------------------------------------
 */

// Save Designations Using Ajax
function store(e,designationID) {
    var targetform = $('#addDesignationRole');
    var murl = targetform.attr('action');
    var mdata = $("#addDesignationRole").serialize();
    e.preventDefault();

    $.ajax({
        url: murl,
        type: "post",
        data: mdata,
        datatype: "json",
        success: function (mdata) {
            swal({
                title: "Good job!",
                text: "You Saved the Designation Role!",
                icon: "success",
                button: "Ok!",
            });
            $('#dataTable').DataTable().destroy();
            showData(designationID);
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

// Update Designation Using ajax
function update(e,designationID){
    var targetform = $('#updateForm');
    var murl = targetform.attr('action');
    var mdata = $("#updateForm").serialize();
    e.preventDefault();

    $.ajax({
        url: murl,
        type: "post",
        data: mdata,
        datatype: "json",
        success: function (mdata) {
            swal({
                title: "Good job!",
                text: "You Updated the Designation Role!",
                icon: "success",
                button: "Ok!",
            });
            $('roleUpd').val('');
            $('#dataTable').DataTable().destroy();
            showData(designationID);
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

// show data on DataTable
function showData(id){
    $.ajax({
        type: "GET",
        url: "get-role-by-designation-id/"+id,
        contentType: "application/json;",
        success: function (results) {
            fetchDataOnDataTable(results);
        }
    })
}

// Fetch All Data On Datatable
function fetchDataOnDataTable(data){
    $('#dataTable').DataTable().destroy();
    $('#dataTable').DataTable({
        "data": data,
         "processing": true,
         "method": "GET",
         "columns": [
                {
                    "data": "role_name"
                },
                {
                 "title": "Action",
                 "data": "id",
                 "render": function (data,type, row, meta) {
                     return "<button class='btn btn-success btn-sm' onclick='detailPreview(" + data + ");''><i class='fa fa-pen'></i> Edit</button>";
                 },
                 "orderable": "false",
                 "searchable": "false"
             }
         ],
    });
}

// Fetch Value in DataTable and append Value on Text
function fetchRoles(id){
    $('#designationID').val(id);
    $('#updDesignationID').val(id);
    showData(id);
}

// Detail Preview append value for update on another tab
function detailPreview(id) {
    var mUrl="get-designation-role-by-id/" + id;
    showDesignationRoleByID(mUrl);
}

// Fetching Data on Tab 
function showDesignationRoleByID(url){
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
                $('#roleUpd').val(result.role_name);
            }
        }
    });

    $("#base-tab2").trigger("click");
}