<div class="scroll">
    <label for="">GST Photo</label>
    &nbsp;
    <a href="{{$agency->GSTPath}}" class="btn btn-danger btn-sm view-pdf">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$agency->GSTPath}}" alt="" style="width:100%;" id="AadharPath" name="AadharPath" onclick="myfunction('first')">
    <br>
    <label for="">IT Return 1</label>
    &nbsp;
    <a href="{{$agency->ITReturnPath1}}" class="btn btn-danger btn-sm view-pdf">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$agency->ITReturnPath1}}" alt="" style="width:100%;" id="TradeLicensePath" name="TradeLicensePath" onclick="myfunction('second')">
    <br>
    <label for="">IT Return 2</label>
    &nbsp;
    <a href="{{$agency->ITReturnPath2}}" class="btn btn-danger btn-sm view-pdf">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$agency->ITReturnPath2}}" alt="" style="width: 100%;" id="agencyPhotoPath" name="agencyPhotoPath" onclick="myfunction('third')">
    <br>
    <label for="">PAN No</label>
    &nbsp;
    <a href="{{$agency->PANNoPath}}" class="btn btn-danger btn-sm view-pdf">
        <i class="fa fa-eye"></i> Preview
    </a>

    <embed src="{{$agency->PANNoPath}}" alt="" style="width: 100%;" id="OwnerBookPath" name="OwnerBookPath" onclick="myfunction('forth')">
    <br>
    <label for="">Director 1 Aadhar</label>
    &nbsp;
    <a href="{{$agency->Director1AadharPath}}" class="btn btn-danger btn-sm view-pdf">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$agency->Director1AadharPath}}" alt="" style="width: 100%;" id="DrivingLicensePath" name="DrivingLicensePath" onclick="myfunction('fifth')">
    <br>
    <label for="">Director 2 Aadhar</label>
    &nbsp;
    <a href="{{$agency->Director2AadharPath}}" class="btn btn-danger btn-sm view-pdf">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$agency->Director2AadharPath}}" alt="" style="width: 100%;" id="InsurancePhotoPath" name="InsurancePhotoPath" onclick="myfunction('sixth')">
    <br>
    <label for="">Director 3 Aadhar</label>
    &nbsp;
    <a href="{{$agency->Director3AadharPath}}" class="btn btn-danger btn-sm view-pdf">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$agency->Director3AadharPath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath" name="GSTNoPhotoPath" onclick="myfunction('seventh')">
    <br>
    <label for="">Director 4 Aadhar</label>
    &nbsp;
    <a href="{{$agency->Director4AadharPath}}" class="btn btn-danger btn-sm view-pdf">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$agency->Director4AadharPath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath" name="GSTNoPhotoPath" onclick="myfunction('eighth')">
    <br>
    <br>
    <label for="">Affidifit Path</label>
    &nbsp;
    <a href="{{$agency->AffidavitPath}}" class="btn btn-danger btn-sm view-pdf">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$agency->AffidavitPath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath" name="GSTNoPhotoPath" onclick="myfunction('ninth')">
</div>