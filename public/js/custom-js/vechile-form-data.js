function preview() {  

		var applicant = $('#Applicant').val();
		var applicant_label = "applicant";
		var applicant_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${applicant_label}</strong> </label><input type="text" class="form-control" value="${applicant}" disabled /></div></div>`;

        var father = $('#Father').val();
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
		var AadharNo_label = "Aadhar No";
		var Aadhar_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${AadharNo_label}</strong> </label><input type="text" class="form-control" value="${Aadhar_No }" disabled /></div></div>`;

		var License_From = $('#LicenseFrom').val();
	    var License_From_label = "License From";
	    var License_From_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${License_From_label}</strong> </label><input type="text" class="form-control" value="${License_From }" disabled /></div></div>`;

		var License_To = $('#LicenseTo').val();
	    var License_To_label = "License To";
	    var License_To_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${License_To_label}</strong> </label><input type="text" class="form-control" value="${License_To }" disabled /></div></div>`;

		var Entity_Name = $('#EntityName').val();
		var Entity_Name_label = "Entity Name";
		var Entity_Name_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Entity_Name_label}</strong> </label><input type="text" class="form-control" value="${Entity_Name }" disabled /></div></div>`;

		var Trade_License_No = $('#TradeLicenseNo').val();
        var Trade_License_No_label = "Trade License No";
        var Trade_License_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Trade_License_No_label}</strong> </label><input type="text" class="form-control" value="${Trade_License_No }" disabled /></div></div>`;

        var GST_No= $('#GSTNo').val();
		var GST_No_label = "GST No";
		var GST_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${GST_No_label}</strong></label><input type="text" class="form-control" value="${GST_No }" disabled /></div></div>`

		var Vehicle_No = $('#VehicleNo').val();
		var Vehicle_No_label = "Vehicle No ";
		var Vehicle_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Vehicle_No_label}</strong></label><input type="text" class="form-control" value="${Vehicle_No }" disabled /></div></div>`

		var Vehicle_Name = $('#VehicleName').val();
		var Vehicle_Name_label = "Vehicle Name ";
		var Vehicle_Name_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Vehicle_Name_label}</strong></label><input type="text" class="form-control" value="${Vehicle_Name }" disabled /></div></div>`
		var Vehicle_Type = $('#VehicleType').val();
		var Vehicle_Type_label = "Vehicle Type";
		var Vehicle_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Vehicle_Type_label}</strong></label><input type="text" class="form-control" value="${Vehicle_Type }" disabled /></div></div>`

		var Brand_Display= $('#BrandDisplay').val();
		var Brand_Display_label = "Brand Display";
		var Brand_Display_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Brand_Display_label}</strong></label><input type="text" class="form-control" value="${Brand_Display }" disabled /></div></div>`;

		var Front_Area= $('#FrontArea').val();
		var Front_Area_label = "Front Area";
		var Front_Area_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Front_Area_label}</strong></label><input type="text" class="form-control" value="${Front_Area}" disabled /></div></div>`;

		var Rear_Area= $('#RearArea').val();
		var Rear_Area_label = "Rear Area";
		var Rear_Area_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Rear_Area_label}</strong></label><input type="text" class="form-control" value="${Rear_Area}" disabled /></div></div>`;

		var Side1_Area= $('#Side1Area').val();
		var Side1_Area_label = "Side Area";
		var Side1_Area_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Side1_Area_label}</strong></label><input type="text" class="form-control" value="${Side1_Area}" disabled /></div></div>`;

		var Top_Area= $('#TopArea').val();
		var Top_Area_label = "Top Area";
		var Top_Area_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Top_Area_label}</strong></label><input type="text" class="form-control" value="${Top_Area}" disabled /></div></div>`; 
		
		var Display_Type= $('#DisplayType').val();
		var Display_Type_label = "Display Type";
		var Display_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Display_Type_label}</strong></label><input type="text" class="form-control" value="${Display_Type}" disabled /></div></div>`; 

        //Final data Table 
        var data = applicant_data + father_data + Email_data+ Residence_Address_data+Ward_No_data+Permanent_Address_data+Mobile_No_data+Aadhar_No_data+License_From_data+License_To_data+Entity_Name_data+Trade_License_No_data+GST_No_data+Vehicle_No_data+Vehicle_Name_data+Vehicle_Type_data+Brand_Display_data+Front_Area_data+Rear_Area_data+Side1_Area_data+Top_Area_data+Display_Type_data ;



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
