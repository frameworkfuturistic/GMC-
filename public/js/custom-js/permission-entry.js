// function for append value on role id select input
function appendRole(designationID){
    $('#dataTable').DataTable().destroy();
    appendMenuPermissions(0);                                   // for destroying datatable with 0 role values
    $('#loaderbody').show();
    var designation=document.getElementById('designation').value;
    if(designation==''){
        alert('Designation Field is Required');
        $('#loaderbody').hide();
        return false;
    }
    var mUrl='get-role-by-designation-id/'+designationID;

    $.ajax({
        url: mUrl,
        type: "GET",
        cache: false,
        contentType: "application/json;charset=utf-8",
        datatype: 'json',
        success: function (result) {
            if (result == false) {
                $select = $('#role');
                $select.find('option').remove();
                $select.append($('<option value="">').html('-- Select Role --'));
                $('#loaderbody').hide();
            } else {
                $select = $('#role');
                $select.find('option').remove();
                $select.append($('<option value="">').html('-- Select Role --'));
                Object.keys(result).forEach(function (key) {
                    console.log(key); // logs keys in myObject
                    console.log(result[key]); // logs values in myObject
                    $role_id = result[key].id;
                    $role_name = result[key].role_name;
                    $select.append('<option data-myid=' + $role_id + ' value=' + $role_id + '>' + $role_name +
                        '</option>');
                });
                $('#loaderbody').hide();
            }
        }
    });
}

/**
 * | Function for All append Menu Permissions
 */
function appendMenuPermissions(role_id){
    $('#loaderbody').show();
    var menuUrl='menu-masters/'+role_id;


    $.ajax({
        type: "GET",
        url: menuUrl,
        contentType: "application/json;",
        success: function (results) {
            $('#dataTable').DataTable().destroy();
            appendMenuPermissionsOnDataTable(results);
            $('#roleID').val(role_id);
            $('#loaderbody').hide();
            
        }
    });
}

/**
 * | Function for appand menu on Datatable
 */
function appendMenuPermissionsOnDataTable(data){
    $('#dataTable').dataTable({
        "data": data,
        "processing": true,
        "method": "GET",
        "columns": [
            {
                "data": "Description"
            },
            {
                "title": "Action",
                "data": "id",

                "render": function (data, type, row, meta) {
                    if(row.enabled==1){
                        return "<form action='save-permissions' id='save-permission' method='post'>" + 
                                "<label class='switch'>" + 
                                "<input id='menuID' name='menuID' type='hidden' value=" + row.MenuID + ">" + 
                                "<input id='status' name='status' value='-1' type='checkbox' checked>" + 
                                "<span class='slider round'></span>" + 
                                "<input type='hidden' id='roleID' name='roleID' value=" + row.role_id + ">" +
                                "</label>&nbsp;<button class='btn btn-success btn-sm' type='submit'><i class='fa fa-edit'></i> Submit</button>" + 
                                "</form>"
                    }
                    if(row.enabled==0){
                                return "<form action='save-permissions' id='save-permission' method='post'>" + 
                                "<label class='switch'>" + 
                                "<input id='menuID' name='menuID' type='hidden' value=" + row.MenuID + ">" + 
                                "<input id='status' name='status' value='-1' type='checkbox'>" + 
                                "<span class='slider round'></span>" + 
                                "<input type='hidden' id='roleID' name='roleID' value=" + row.role_id + ">" +
                                "</label>&nbsp;<button class='btn btn-success btn-sm' type='submit'><i class='fa fa-edit'></i> Submit</button>" + 
                                "</form>"
                            }
                }
            }
        ],

    });
}

/**
 * | Function for Edit or change permissions
 */
 $('#save-permission').submit(function (e) {
    var targetform = $('#save-permission');
    var murl = targetform.attr('action');
    var mdata = $("#save-permission").serialize();
    e.preventDefault();

    $.ajax({
        url: murl,
        type: "post",
        data: mdata,
        datatype: "json",
        success: function (mdata) {
            swal({
                title: "Good job!",
                text: "You Updated the Data!",
                icon: "success",
                button: "Ok!",
            });
        },
        error: function (error) {
            alert(error);
        },
    });
});