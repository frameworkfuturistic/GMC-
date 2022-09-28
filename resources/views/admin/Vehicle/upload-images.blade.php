<div class="scroll">
    <label for="">Aadhar no Document Photo</label>
    &nbsp;
    <a class="btn btn-danger btn-sm view-pdf" href="{{$vehicle->AadharPath}}">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$vehicle->AadharPath}}" alt="" style="width:100%;" id="AadharPath" name="AadharPath" onclick="myfunction('first')">
    <br>
    <label for="">Trade License Document Photo</label>
    &nbsp;
    <a class="btn btn-danger btn-sm view-pdf" href="{{$vehicle->TradeLicensePath}}">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$vehicle->TradeLicensePath}}" alt="" style="width:100%;" id="TradeLicensePath" name="TradeLicensePath" onclick="myfunction('second')">
    <br>
    <label for="">Vehicle Document Photo</label>
    &nbsp;
    <a class="btn btn-danger btn-sm view-pdf" href="{{$vehicle->VehiclePhotoPath}}">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$vehicle->VehiclePhotoPath}}" alt="" style="width: 100%;" id="VehiclePhotoPath" name="VehiclePhotoPath" onclick="myfunction('third')">
    <br>
    <label for="">Owner Book Document Photo</label>
    &nbsp;
    <a class="btn btn-danger btn-sm view-pdf" href="{{$vehicle->OwnerBookPath}}">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$vehicle->OwnerBookPath}}" alt="" style="width: 100%;" id="OwnerBookPath" name="OwnerBookPath" onclick="myfunction('forth')">
    <br>
    <label for="">Driving License Document Photo</label>
    &nbsp;
    <a class="btn btn-danger btn-sm view-pdf" href="{{$vehicle->DrivingLicensePath}}">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$vehicle->DrivingLicensePath}}" alt="" style="width: 100%;" id="DrivingLicensePath" name="DrivingLicensePath" onclick="myfunction('fifth')">
    <br>
    <label for="">Insurance Document Photo</label>
    &nbsp;
    <a class="btn btn-danger btn-sm view-pdf" href="{{$vehicle->InsurancePhotoPath}}">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$vehicle->InsurancePhotoPath}}" alt="" style="width: 100%;" id="InsurancePhotoPath" name="InsurancePhotoPath" onclick="myfunction('sixth')">
    <br>
    <label for="">GST No Document Photo</label>
    &nbsp;
    <a class="btn btn-danger btn-sm view-pdf" href="{{$vehicle->GSTNoPhotoPath}}">
        <i class="fa fa-eye"></i> Preview
    </a>
    <embed src="{{$vehicle->GSTNoPhotoPath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath" name="GSTNoPhotoPath" onclick="myfunction('seventh')">
</div>