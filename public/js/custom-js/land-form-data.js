function preview() {  

    var applicant = $('#applicant').val();
	var applicant_label = "applicant";
	var applicant_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${applicant_label}<strong> </label><input type="text" class="form-control" value="${applicant}" disabled /></div></div>`;

    var father = $('#father').val();
	var father_label = "Father";
	var father_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${father_label}</strong> </label><input type="text" class="form-control" value="${father}" disabled /></div></div>`;

    var Email = $('#Email').val();
    var Email_label = "Email";
    var Email_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Email_label}</strong> </label><input type="text" class="form-control" value="${Email }" disabled /></div></div>`;

    var Residence_Address = $('#ResidenceAddress').val();
	var Residence_Address_label = "Residence Address";
	var Residence_Address_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Residence_Address_label}</strong> </label><input type="text" class="form-control" value="${Residence_Address }" disabled /></div></div>`;

    var Ward_No = $('#WardNo').val();
    var Ward_No_label = "Ward No";
    var Ward_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Ward_No_label}</strong> </label><input type="text" class="form-control" value="${Ward_No }" disabled /></div></div>`;

    var Permanent_Address = $('#PermanentAddress').val();
    var Permanent_Address_label = "Permanent Address";
    var Permanent_Address_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Permanent_Address_label}</strong> </label><input type="text" class="form-control" value="${Permanent_Address }" disabled /></div></div>`;

    var Mobile_No = $('#MobileNo').val();
    var Mobile_No_label = "Mobile No";
    var Mobile_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Mobile_No_label}</strong> </label><input type="text" class="form-control" value="${Mobile_No }" disabled /></div></div>`;

    var Aadhar_No= $('#AadharNo').val();
	var Aadhar_No_label = "Aadhar No";
	var Aadhar_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Aadhar_No_label}</strong> </label><input type="text" class="form-control" value="${Aadhar_No }" disabled /></div></div>`;

    var License_From = $('#LicenseFrom').val();
	var License_From_label = "License From";
	var License_From_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${License_From_label}</strong> </label><input type="text" class="form-control" value="${License_From }" disabled /></div></div>`;

    var License_To = $('#LicenseTo').val();
	var License_To_label = "License To";
	var License_To_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${License_To_label}</strong> </label><input type="text" class="form-control" value="${License_To }" disabled /></div></div>`;

    var Holding_No = $('#HoldingNo').val();
	var Holding_No_label = "Holding No";
	var Holding_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Holding_No_label}</strong></label><input type="text" class="form-control" value="${Holding_No }" disabled /></div></div>`

    var Trade_License= $('#TradeLicenseNo').val();
	var Trade_License_label = "Trade License";
	var Trade_License_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Trade_License_label}</strong></label><input type="text" class="form-control" value="${Trade_License }" disabled /></div></div>`

    var GST_No= $('#GSTNo').val();
    var GST_No_label = "GST No";
    var GST_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${GST_No_label}</strong></label><input type="text" class="form-control" value="${GST_No }" disabled /></div></div>`

    var Entity_Address = $('#EntityAddress').val();
    var Entity_Address_label = "Entity Address";
    var Entity_Address_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Entity_Address_label}</strong></label><input type="text" class="form-control" value="${Entity_Address }" disabled /></div></div>`;

    var Entity_Name = $('#EntityName').val();
	var Entity_Name_label = "Entity Name";
	var Entity_Name_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Entity_Name_label}</strong> </label><input type="text" class="form-control" value="${Entity_Name }" disabled /></div></div>`;

    var Brand_Display_Name= $('#BrandDisplayName').val();
    var Brand_Display_Name_label="Brand Display Name"
    var Brand_Display_Name_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Brand_Display_Name_label}</strong> </label><input type="text" class="form-control" value="${Brand_Display_Name }" disabled /></div></div>`;

    var Brand_Display_Address= $('#BrandDisplayAddress').val();
    var Brand_Display_Address_label="Brand Dispaly Address"
    var Brand_Display_Address_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Brand_Display_Address_label}</strong> </label><input type="text" class="form-control" value="${Brand_Display_Address }" disabled /></div></div>`;
    
    var Entity_Ward_No = $('#EntityWardNo').val();
	var Entity_Ward_No_label = "EntityWardNo ";
    var Entity_Ward_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Entity_Ward_No_label}</strong> </label><input type="text" class="form-control" value="${Entity_Ward_No }" disabled /></div></div>`;
    
    var Display_Area = $('#DisplayArea').val();
	var Display_Area_label = "Total Display Area";
	var Display_Area_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Display_Area_label}</strong> </label><input type="text" class="form-control" value="${Display_Area }" disabled /></div></div>`;

    var Display_Type = $('#DisplayType').val();
	var Display_Type_label = "DisplayType";
	var Display_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Display_Type_label}</strong> </label><input type="text" class="form-control" value="${Display_Type }" disabled /></div></div>`;

    var No_Of_Hoarding = $('#NoOfHoarding').val();
	var No_Of_Hoarding_label = "No Of Hoardings";
	var No_Of_Hoarding_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${No_Of_Hoarding_label}</strong> </label><input type="text" class="form-control" value="${No_Of_Hoarding }" disabled /></div></div>`;

    var Longitude= $('#Longitude').val();
    var Longitude_label = "Longitude";
    var Longitude_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Longitude_label}</strong></label><input type="text" class="form-control" value="${Longitude}" disabled /></div></div>`

    var Latitude= $('#Latitude').val();
	var Latitude_label = "Latitude";
	var Latitude_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Latitude_label}</strong></label><input type="text" class="form-control" value="${Latitude}" disabled /></div></div>`

    var Installation_Location= $('#InstallationLocation').val();
	var Installation_Location_label = " InstallationLocation";
	var Installation_Location_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Installation_Location_label}</strong></label><input type="text" class="form-control" value="${Installation_Location}" disabled /></div></div>` 



    //Final data Table 
    var data = applicant_data + father_data + Email_data+Residence_Address_data + Ward_No_data + Permanent_Address_data +Mobile_No_data + Aadhar_No_data + License_From_data + License_To_data+ Holding_No_data + Trade_License_data+GST_No_data+ Entity_Name_data+Entity_Address_data+Brand_Display_Name_data
    +Brand_Display_Address_data+Entity_Ward_No_data+Display_Area_data+Display_Type_data+ No_Of_Hoarding_data+Longitude_data+Latitude_data+Installation_Location_data;

 

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
