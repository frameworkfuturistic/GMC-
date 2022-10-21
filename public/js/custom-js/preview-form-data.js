function preview(){
        var license_year = $('#LicenseYear').val();
		var license_year_label = "License Year";
		var license_year_data = '<p><strong>' + license_year_label + '</strong> : ' + license_year + '</p>';

		var applicant = $('#Applicant').val();
		var applicant_label = "Applicant";
		var applicant_data = '<p><strong>' + applicant_label + '</strong> : ' + applicant + '</p>';

		var father = $('#Father').val();
		var father_label = "Father";
		var father_data = '<p><strong>' + father_label + '</strong> : ' + father + '</p>';

		var Email = $('#Email').val();
		var Email_label = "Email";
		var Email_data = '<p><strong>' + Email_label + '</strong> : ' + Email + '</p>';

		var Residence_Address = $('#ResidenceAddress').val();
		var Residence_Address_label = "Residence Address";
		var Residence_Address_data = '<p><strong>' + Residence_Address_label+ '</strong> : ' + Residence_Address + '</p>';

        var WardNO = $('#WardNo').val();
		var WardNo_label = "Ward No";
		var WardNo_data = '<p><strong>' + WardNo_label + '</strong> : ' + WardNO + '</p>';
		
		var Permanent_Address = $('#PermanentAddress').val();
		var Permanent_Address_label = "Permanent Address";
		var Permanent_Address_data = '<p><strong>' + Permanent_Address_label + '</strong> : ' + Permanent_Address+ '</p>';

		var Mobile_No = $('#MobileNo').val();
		var Mobile_No_label = "Mobile No";
		var Mobile_No_data = '<p><strong>' + Mobile_No_label + '</strong> : ' + Mobile_No + '</p>';
 
        var Aadhar_No= $('#AadharNo').val();
		var AadharNo_label = "Aadhar No";
		var Aadhar_No_data = '<p><strong>' + AadharNo_label + '</strong> : ' + Aadhar_No + '</p>';  

        var EntityName= $('#EntityName').val();
		var EntityName_label = "Entity Name";
		var EntityName_data = '<p><strong>' + EntityName_label + '</strong> : ' + EntityName + '</p>';  

		var EntityAddress= $('#EntityAddress').val();
		var EntityAddress_label = "EntityAddress";
		var EntityAddress_data = '<p><strong>' + EntityAddress_label + '</strong> : ' + EntityAddress + '</p>'; 

		var WardNO = $('#WardNo').val();
		var WardNo_label = "Ward No";
		var WardNo_data = '<p><strong>' + WardNo_label + '</strong> : ' + WardNO + '</p>';
		

		var InstallLocation= $('#InstallLocation').val();
		var InstallLocation_label = "Install Location";
		var InstallLocation_data = '<p><strong>' + InstallLocation_label + '</strong> : ' + InstallLocation + '</p>'; 

		var BrandDisplay= $('#BrandDisplay').val();
		var BrandDisplay_label = "Brand Display";
		var BrandDisplay_data = '<p><strong>' + BrandDisplay_label + '</strong> : ' + BrandDisplay + '</p>'; 

		var HoldingNo= $('#HoldingNo').val();
		var HoldingNo_label = "Holding No";
		var HoldingNo_data = '<p><strong>' + HoldingNo_label + '</strong> : ' + HoldingNo+ '</p>'; 

		var TradeLicense= $('#TradeLicense').val();
		var TradeLicense_label = "Trade License";
		var TradeLicense_data = '<p><strong>' + TradeLicense_label + '</strong> : ' + TradeLicense + '</p>'; 

		var GSTNo= $('#GSTNo').val();
		var GSTNo_label = "GST No";
		var GSTNo_data = '<p><strong>' + GSTNo_label + '</strong> : ' + GSTNo + '</p>'; 

		var DisplayType= $('#DisplayType').val();
		var DisplayType_label = "Display Type";
		var DisplayType_data = '<p><strong>' + DisplayType_label + '</strong> : ' + DisplayType + '</p>'; 

		var DisplayArea= $('#DisplayArea').val();
		var DisplayArea_label = "Display Area";
		var DisplayArea_data = '<p><strong>' + DisplayArea_label + '</strong> : ' + DisplayArea+ '</p>'; 

		var Longitude= $('#Longitude').val();
		var Longitude_label = "Longitude";
		var Longitude_data = '<p><strong>' + Longitude_label + '</strong> : ' + Longitude+ '</p>'; 

		var Latitude= $('#Latitude').val();
		var Latitude_label = "Latitude";
		var Latitude_data = '<p><strong>' + Latitude_label + '</strong> : ' + Latitude + '</p>'; 

		// Final Table Data
		var data = license_year_data + applicant_data + father_data + Email_data + Residence_Address_data + WardNo_data + Permanent_Address_data + Mobile_No_data  + 
		Aadhar_No_data + EntityName_data + EntityAddress_data + WardNo_data + InstallLocation_data + BrandDisplay_data + HoldingNo_data +TradeLicense_data + GSTNo_data + DisplayType_data
		+DisplayArea_data +Longitude_data +Latitude_data;
		

		$('#preview_data').html('');
		$('#preview_data').append(data);
		$('#preview_data').dialog({
			resizable: false,
			//height:140,
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
