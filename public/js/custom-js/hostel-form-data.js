function preview() {  

    var applicant = $('#Applicant').val();
	var applicant_label = "applicant";
	var applicant_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${applicant_label}<strong> </label><input type="text" class="form-control" value="${applicant}" disabled /></div></div>`;

    var father = $('#Father').val();
    var father_label = "Father";
    var father_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${father_label}</strong> </label><input type="text" class="form-control" value="${father}" disabled /></div></div>`;

    var mobile = $('#mobile').val();
    var mobile_label = "Mobile";
    var mobile_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${mobile_label}</strong> </label><input type="text" class="form-control" value="${mobile}" disabled /></div></div>`;

    var email= $('#email').val();
    var email_label = "Email";
    var email_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${email_label}</strong> </label><input type="text" class="form-control" value="${email}" disabled /></div></div>`;

    var Residence_Address = $('#ResidenceAddress').val();
    var Residence_Address_label = "Residence Address";
    var Residence_Address_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Residence_Address_label}</strong> </label><input type="text" class="form-control" value="${Residence_Address }" disabled /></div></div>`;

    var Ward_No= $('#WardNo').val();
    var Ward_No_label = "Ward No";
    var Ward_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Ward_No_label}</strong> </label><input type="text" class="form-control" value="${Ward_No }" disabled /></div></div>`;

    var Permanent_Address = $('#PermanentAddress').val();
    var Permanent_Address_label = "Permanent Address";
    var Permanent_Address_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Permanent_Address_label}</strong> </label><input type="text" class="form-control" value="${Permanent_Address }" disabled /></div></div>`;

    var Ward_No1 = $('#WardNo1').val();
    var Ward_No1_label = "Ward No1 ";
    var Ward_No1_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Ward_No1_label}</strong> </label><input type="text" class="form-control" value="${Ward_No1 }" disabled /></div></div>`;

    var License_Year = $('#LicenseYear').val();
	var License_Year_label = "License Year";
    var License_Year_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${License_Year_label}</strong> </label><input type="text" class="form-control" value="${License_Year}" disabled /></div></div>`;

    var Established_Type= $('#EstablishedType').val();
    var Established_Type_label = "Established Type";
    var Established_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong> ${Established_Type_label}</strong> </label><input type="text" class="form-control" value="${Established_Type}" disabled /></div></div>`;

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

    var License_No = $('#LicenseNo').val();
	var License_No_label = " License No ";
    var License_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${License_No_label}</strong></label><input type="text" class="form-control" value="${License_No }" disabled /></div></div>`;

    var Longitude= $('#Longitude').val();
    var Longitude_label = "Longitude";
    var Longitude_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Longitude_label}</strong> </label><input type="text" class="form-control" value="${Longitude }" disabled /></div></div>`;

    var Latitude= $('#Latitude').val();
    var Latitude_label = "Latitude";
    var Latitude_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Latitude_label}</strong></label><input type="text" class="form-control" value="${Latitude }" disabled /></div></div>`;

    var Organization_Type= $('#OrganizationType').val();
    var Organization_Type_label = "Organization Type";
    var Organization_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Organization_Type_label}</strong></label><input type="text" class="form-control" value="${Organization_Type}" disabled /></div></div>`;

    var Land_Deed_Type= $('#LandDeedType').val();
    var Land_Deed_Type_label = " Land Deed Type";
    var Land_Deed_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Land_Deed_Type_label} <strong></label><input type="text" class="form-control" value="${Land_Deed_Type}" disabled /></div></div>`;

    var Water_Supply_Type= $('#WaterSupplyType').val();
    var Water_Supply_Type_label = "Water Supply Type";
    var Water_Supply_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Water_Supply_Type_label}<strong></label><input type="text" class="form-control" value="${Water_Supply_Type}" disabled /></div></div>`;

    var Electricity_Type = $('#ElectricityType').val();
	var Electricity_Type_label = " Electricity Type ";
	var Electricity_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Electricity_Type_label}<strong></label><input type="text" class="form-control" value="${Electricity_Type}" disabled /></div></div>`;

    // var Electricity_Type = $('#ElectricityType').val();
	// var Electricity_Type_label = " Electricity Type ";
	// var Electricity_Type_data = `<strong> ${Electricity_Type_label} </strong> :
	// <div class=""><input type="text" class="form-control"  value="${  Electricity_Type}" disabled></div>`

    var Security_Type = $('#SecurityType').val();
	var Security_Type_label = "Security Type  ";
	var Security_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Security_Type_label} <strong></label><input type="text" class="form-control" value="${Security_Type}" disabled /></div></div>`;

    var Lodge_Type = $('#LodgeType').val();
	var Lodge_Type_label = " Lodge Type";
	var Lodge_Type_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Lodge_Type_label} <strong></label><input type="text" class="form-control" value="${Lodge_Type}" disabled /></div></div>`;

    var CCTV_Camera_No= $('#CCTVCameraNo').val();
	var CCTV_Camera_No_label = " CCTV Camera No";
	var CCTV_Camera_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${CCTV_Camera_No_label} <strong></label><input type="text" class="form-control" value="${CCTV_Camera_No}" disabled /></div></div>`;

    var No_Of_Beds= $('#NoOfBeds').val();
	var No_Of_Beds_label = " No Of Beds";
	var No_Of_Beds_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${No_Of_Beds_label} <strong></label><input type="text" class="form-control" value="${No_Of_Beds}" disabled /></div></div>`;

    var No_Of_Rooms= $('#NoOfRooms').val();
	var No_Of_Rooms_label = " No Of Rooms";
	var No_Of_Rooms_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${No_Of_Rooms_label} <strong></label><input type="text" class="form-control" value="${No_Of_Rooms}" disabled /></div></div>`;

    var No_Of_Fire_Extinguishers= $('#NoOfFireExtinguishers').val();
	var No_Of_Fire_Extinguishers_label = "No Of Fire Extinguishers";
	var No_Of_Fire_Extinguishers_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${No_Of_Fire_Extinguishers_label} <strong></label><input type="text" class="form-control" value="${No_Of_Fire_Extinguishers}" disabled /></div></div>`;

    var No_Of_Exit_Gate= $('#NoOfExitGate').val();
	var No_Of_Exit_Gate_label = "No Of Exit Gate";
    var No_Of_Exit_Gate_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${No_Of_Exit_Gate_label} <strong></label><input type="text" class="form-control" value="${No_Of_Exit_Gate}" disabled /></div></div>`;

    var No_Of_Two_Wheelers_Parking= $('#NoOfTwoWheelersParking').val();
	var No_Of_Two_Wheelers_Parking_label = "No Of Two Wheelers Parking";
    var No_Of_Two_Wheelers_Parking_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${No_Of_Two_Wheelers_Parking_label} <strong></label><input type="text" class="form-control" value="${No_Of_Two_Wheelers_Parking}" disabled /></div></div>`;

    var No_Of_Four_Wheelers_Parking= $('#NoOfFourWheelersParking').val();
	var No_Of_Four_Wheelers_Parking_label = " No Of Four Wheelers Parking";
    var No_Of_Four_Wheelers_Parking_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${No_Of_Four_Wheelers_Parking_label} <strong></label><input type="text" class="form-control" value="${No_Of_Four_Wheelers_Parking}" disabled /></div></div>`;


    var Aadhar_No = $('#AadharNo').val();
	var Aadhar_No_label = " Aadhar No";
	var Aadhar_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${Aadhar_No_label} <strong></label><input type="text" class="form-control" value="${Aadhar_No}" disabled /></div></div>`;

    var PAN_No = $('#PANNo').val();
	var PAN_No_label = " PAN No";
	var PAN_No_data = `<div class="form-row"><div class="form-group col-md-6"><label><strong>${PAN_No_label} <strong></label><input type="text" class="form-control" value="${PAN_No}" disabled /></div></div>`;


    //Final data Table 
    var data = applicant_data + father_data+mobile_data +email_data+Residence_Address_data+ Ward_No_data+Permanent_Address_data+Ward_No1_data+License_Year_data+ Established_Type_data+Entity_Name_data+Entity_Address_data+Entity_Ward_data+Holding_No_data + License_No_data+Longitude_data+Latitude_data+Organization_Type_data+Land_Deed_Type_data+Water_Supply_Type_data+Electricity_Type_data+Security_Type_data+Lodge_Type_data+CCTV_Camera_No_data+ No_Of_Beds_data+No_Of_Rooms_data+No_Of_Fire_Extinguishers_data+No_Of_Exit_Gate_data+No_Of_Two_Wheelers_Parking_data+No_Of_Four_Wheelers_Parking_data+Aadhar_No_data+PAN_No_data;



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