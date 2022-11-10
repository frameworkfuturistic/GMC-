function preview() {  
	    
    var entity_Type = $('#entityType').val();
    var entity_Type_label = "entity Type";
    var entity_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label> <strong> ${entity_Type_label}</strong> </label><input type="text" class="form-control" value="${entity_Type}" disabled /></div></div>`;
    
    var entity_Name = $('#entityName').val();
    var entity_Name_label = "entity Name";
    var entity_Name_data = `<div class="form-row"><div class="form-group col-md-6"><label> <strong> ${entity_Name_label}</strong> </label><input type="text" class="form-control" value="${entity_Name}" disabled /></div></div>`;

    var address = $('#address').val();
    var address_label = "address";
    var address_data = `<div class="form-row"><div class="form-group col-md-6"><label> <strong> ${address_label}</strong> </label><input type="text" class="form-control" value="${address}" disabled /></div></div>`;

    var mobile = $('#mobile').val();
    var mobile_label = "mobile";
    var mobile_data = `<div class="form-row"><div class="form-group col-md-6"><label> <strong> ${mobile_label}</strong> </label><input type="text" class="form-control" value="${mobile}" disabled /></div></div>`;

    var telephone = $('#telephone').val();
    var telephone_label = "telephone";
    var telephone_data = `<div class="form-row"><div class="form-group col-md-6"><label> <strong> ${telephone_label}</strong> </label><input type="text" class="form-control" value="${telephone}" disabled /></div></div>`;
    
    var fax = $('#fax').val();
    var fax_label = "mobile";
    var fax_data = `<div class="form-row"><div class="form-group col-md-6"><label> <strong> ${fax_label}</strong> </label><input type="text" class="form-control" value="${fax}" disabled /></div></div>`;

    var email= $('#email').val();
    var email_label = "Email";
    var email_data = `<div class="form-row"><div class="form-group col-md-6"><label> <strong> ${email_label}</strong> </label><input type="text" class="form-control" value="${email}" disabled /></div></div>`;

    var PAN_No = $('#pan').val();
	var PAN_No_label = " PAN No";
	var PAN_No_data = `<div class="form-row"><div class="form-group col-md-6"><label> <strong> ${PAN_No_label}</strong> </label><input type="text" class="form-control" value="${PAN_No}" disabled /></div></div>`;

    var gstNo= $('#gstNo').val();
    var gstNo_label = "gstNo";
    var gstNo_data = `<div class="form-row"><div class="form-group col-md-6"><label> <strong> ${gstNo_label}</strong> </label><input type="text" class="form-control" value="${gstNo}" disabled /></div></div>`;

    // Final Table Data
		var data = entity_Type_data +entity_Name_data+address_data+mobile_data+telephone_data+ fax_data+email_data+PAN_No_data+gstNo_data ;


    $('#preview_data').html('');
    $('#preview_data').append(data);
    $('#preview_data').dialog({
        resizable: false,
        // height:140,
        modal: true,
        buttons: {
            'Submit': function() {
                //submit the form
                $('#formSubmit').submit();
            },
            Cancel: function() {
            $(this).dialog("close");
            }
        }
    });
}
