function preview() { 
    
    
    var license_year = $('#licenseYear').val();
	var license_year_label = "License Year";
    var license_year_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${license_year_label}</strong> </label><input type="text" class="form-control" value="${license_year}" disabled /></div></div>`;
	
    var applicant = $('#applicant').val();
    var applicant_label = "applicant";
    var applicant_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${applicant_label}<strong></label><input type="text" class="form-control" value="${applicant}" disabled /></div></div>`;
	
    var father = $('#Father').val();
    var father_label = "Father";
    var father_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${father_label}</strong> </label><input type="text" class="form-control" value="${father}" disabled /></div></div>`;

    var Email = $('#Email').val();
    var Email_label = "Email";
    var Email_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Email_label}</strong> </label><input type="text" class="form-control" value="${Email }" disabled /></div></div>`;

    var Mobile = $('#Mobile').val();
    var Mobile_label = "Mobile";
    var Mobile_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Mobile_label}</strong> </label><input type="text" class="form-control" value="${Mobile}" disabled /></div></div>`;

    var Residence_Address = $('#ResidenceAddress').val();
    var Residence_Address_label = "Residence Address";
    var Residence_Address_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Residence_Address_label}</strong> </label><input type="text" class="form-control" value="${Residence_Address }" disabled /></div></div>`;

    var Ward_No = $('#WardNo').val();
    var Ward_No_label = "Ward No";
    var Ward_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Ward_No_label}</strong> </label><input type="text" class="form-control" value="${Ward_No }" disabled /></div></div>`;

    var Permanent_Address = $('#PermanentAddress').val();
    var Permanent_Address_label = "Permanent Address";
    var Permanent_Address_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Permanent_Address_label}</strong> </label><input type="text" class="form-control" value="${Permanent_Address }" disabled /></div></div>`;

    var Ward_No1 = $('#WardNo1').val();
    var Ward_No1_label = "Ward No1 ";
    var Ward_No1_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Ward_No1_label}</strong> </label><input type="text" class="form-control" value="${Ward_No1 }" disabled /></div></div>`;

    var Hall_Type = $('#HallType').val();
    var Hall_Type_label = "Hall Type";
    var Hall_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Hall_Type_label}</strong> </label><input type="text" class="form-control" value="${Hall_Type }" disabled /></div></div>`;

    var Entity_Name = $('#EntityName').val();
    var Entity_Name_label = "Entity Name";
    var Entity_Name_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Entity_Name_label}</strong> </label><input type="text" class="form-control" value="${Entity_Name }" disabled /></div></div>`;

    var Entity_Address = $('#EntityAddress').val();
    var Entity_Address_label = "Entity Address";
    var Entity_Address_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Entity_Address_label}</strong></label><input type="text" class="form-control" value="${Entity_Address }" disabled /></div></div>`;

    var Entity_Ward = $('#EntityWard').val();
    var Entity_Ward_label = "Entity Ward";
    var Entity_Ward_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Entity_Ward_label}</strong></label><input type="text" class="form-control" value="${Entity_Ward }" disabled /></div></div>`;


    var Holding_No = $('#HoldingNo').val();
    var Holding_No_label = "Holding No";
    var Holding_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Holding_No_label}</strong></label><input type="text" class="form-control" value="${Holding_No }" disabled /></div></div>`;

    var Trade_License_No = $('#TradeLicenseNo').val();
    var Trade_License_No_label = "Trade License No";
    var Trade_License_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Trade_License_No_label}</strong> </label><input type="text" class="form-control" value="${Trade_License_No }" disabled /></div></div>`;

    var Longitude= $('#Longitude').val();
    var Longitude_label = "Longitude";
    var Longitude_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Longitude_label}</strong> </label><input type="text" class="form-control" value="${Longitude }" disabled /></div></div>`;
    
    var Latitude= $('#Latitude').val();
    var Latitude_label = "Latitude";
    var Latitude_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Latitude_label}</strong></label><input type="text" class="form-control" value="${Latitude }" disabled /></div></div>`;

    var Organization_Type= $('#OrganizationType').val();
    var Organization_Type_label = "Organization Type";
    var Organization_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Organization_Type_label}</strong></label><input type="text" class="form-control" value="${Organization_Type}" disabled /></div></div>`;

    var Floor_Area= $('#FloorArea').val();
    var Floor_Area_label = "Floor Area";
    var Floor_Area_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Floor_Area_label}<strong></label><input type="text" class="form-control" value="${Floor_Area}" disabled /></div></div>`;

    var Land_Deed_Type= $('#LandDeedType').val();
    var Land_Deed_Type_label = " Land Deed Type";
    var Land_Deed_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Land_Deed_Type_label} <strong></label><input type="text" class="form-control" value="${Land_Deed_Type}" disabled /></div></div>`;


    var Water_Supply_Type= $('#WaterSupplyType').val();
    var Water_Supply_Type_label = "Water Supply Type";
    var Water_Supply_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Water_Supply_Type_label}<strong></label><input type="text" class="form-control" value="${Water_Supply_Type}" disabled /></div></div>`;

    var Electricity_Type = $('#ElectricityType').val();
	var Electricity_Type_label = " Electricity Type ";
	var Electricity_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Electricity_Type_label}<strong></label><input type="text" class="form-control" value="${Electricity_Type}" disabled /></div></div>`;

    var Security_Type = $('#SecurityType').val();
	var Security_Type_label = "Security Type  ";
	var Security_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Security_Type_label} <strong></label><input type="text" class="form-control" value="${Security_Type}" disabled /></div></div>`;

    var CCTV_No = $('#CCTVNo').val();
	var CCTV_No_label = "CCTV No ";
	var CCTV_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${CCTV_No_label}</strong></label><input type="text" class="form-control" value="${CCTV_No}" disabled /></div></div>`;

    var Fire_Extinguishers_No = $('#FireExtinguishersNo').val();
	var Fire_Extinguishers_No_label = "Fire Extinguishers No  ";
	var Fire_Extinguishers_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Fire_Extinguishers_No_label}</strong></label><input type="text" class="form-control" value="${Fire_Extinguishers_No}" disabled /></div></div>`;

    var Entry_Gates_No= $('#EntryGatesNo').val();
	var Entry_Gates_No_label = "Entry Gates No";
	var Entry_Gates_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Entry_Gates_No_label} <strong></label><input type="text" class="form-control" value="${Entry_Gates_No}" disabled /></div></div>`;

    var Exit_Gates_No= $('#ExitGatesNo').val();
	var Exit_Gates_No_label = "Exit Gates No";
	var Exit_Gates_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Exit_Gates_No_label} <strong></label><input type="text" class="form-control" value="${Exit_Gates_No}" disabled /></div></div>`;

    var Two_Wheelers_Parking_Space= $('#TwoWheelersParkingSpace').val();
	var Two_Wheelers_Parking_Space_label = "Two Wheelers Parking Space";
	var Two_Wheelers_Parking_Space_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Two_Wheelers_Parking_Space_label}<strong></label><input type="text" class="form-control" value="${Two_Wheelers_Parking_Space}" disabled /></div></div>`;

    var Four_Wheelers_Parking_Space= $('#FourWheelersParkingSpace').val();
	var Four_Wheelers_Parking_Space_label = "Four Wheelers Parking Space";Longitude
	var Four_Wheelers_Parking_Space_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Four_Wheelers_Parking_Space_label}<strong></label><input type="text" class="form-control" value="${Four_Wheelers_Parking_Space}" disabled /></div></div>`;

    var Aadhar_Card_No= $('#AadharCardNo').val();
    var Aadhar_Card_No_label = "Aadhar Card No";
    var Aadhar_Card_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Aadhar_Card_No_label} <strong></label><input type="text" class="form-control" value="${Aadhar_Card_No}" disabled /></div></div>`;

    var PAN_Card_No= $('#PANCardNo').val();
    var PAN_Card_No_label = "PAN Card No";
    var PAN_Card_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${PAN_Card_No_label}<strong></label><input type="text" class="form-control" value="${PAN_Card_No}" disabled /></div></div>`;


    //Final data Table 
    var data = license_year_data+applicant_data + father_data+Email_data+Mobile_data+Residence_Address_data+Ward_No_data+Permanent_Address_data+Ward_No1_data+Hall_Type_data+Entity_Name_data+Entity_Address_data+Entity_Ward_data
    +Holding_No_data+Trade_License_No_data+Longitude_data+Latitude_data+Organization_Type_data+Floor_Area_data+Land_Deed_Type_data+Water_Supply_Type_data+Electricity_Type_data+Security_Type_data+CCTV_No_data+ Fire_Extinguishers_No_data+Entry_Gates_No_data+Exit_Gates_No_data+ Two_Wheelers_Parking_Space_data+Four_Wheelers_Parking_Space_data+Aadhar_Card_No_data+PAN_Card_No_data;



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