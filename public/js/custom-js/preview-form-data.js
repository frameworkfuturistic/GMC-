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

		// Final Table Data
		var data = license_year_data + applicant_data + father_data;
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