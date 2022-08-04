@extends('admin.agencyDash.app')

@section('heading')
Apply New Hoarding
@endsection

@section('pagecss')
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
@endsection

@section('activeNewHoarding')
active
@endsection

@section('app-content')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session()->get('message') }}
</div>
@endif
<div class="card">
    <div class="card-body">
        <div class="card-block">
            <!-- tabs -->
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="pill" href="#home"
                        aria-expanded="true">Pending Applications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="pill" href="#profile" aria-expanded="false">Apply
                        New</a>
                </li>
            </ul>
            <!-- tabs -->
            <!-- tab-content -->
            <div class="tab-content px-1 pt-1">
                <!-- PENDING APPLICATIONS -->
                <div role="tabpanel" class="tab-pane active" id="home" aria-labelledby="home-tab" aria-expanded="true">
                    <div class="table-responsive">
                        <table class="table table-responsive table-hover table-striped display" id="datatable">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>TempID</th>
                                    <th>AppDate</th>
                                    <th>Lic.Year</th>
                                    <th>Location</th>
                                    <th>Length</th>
                                    <th>Width</th>
                                    <th>Area</th>
                                    <th>Landmark</th>
                                    <th>Face</th>
                                    <th>Illumination</th>
                                    <th>PropertyType</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hoardings as $hoarding)
                                <tr>
                                    <td>
                                        <button class="btn btn-success btn-sm"><i class="icon-pen"></i>
                                            Details
                                        </button>
                                    </td>
                                    <td>{{$hoarding->HoardingNo}}</td>
                                    <td>{{$hoarding->ApplicationDate}}</td>
                                    <td>{{$hoarding->LicenseYear}}</td>
                                    <td>{{$hoarding->Location}}</td>
                                    <td>{{$hoarding->Length}}</td>
                                    <td>{{$hoarding->Width}}</td>
                                    <td>{{$hoarding->BoardArea}}</td>
                                    <td>{{$hoarding->Landmark}}</td>
                                    <td>{{$hoarding->Face}}</td>
                                    <td>{{$hoarding->Illumination}}</td>
                                    <td>{{$hoarding->PropertyType}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- PENDING APPLICATIONS -->
                <!-- APPLY NEW HOARDING -->
                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
                    <div class="row">
                        <!-- form -->
                        <form action="storeHoarding" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="col-md-9">
                                <div class="card-header card-bg">
                                    <div class="card-title my-card-title">APPLY FOR NEW HOARDING</div>
                                </div>
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">License Year <span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="spin-valuearea form-control" id="LicenseYear"
                                                        name="LicenseYear">
                                                        <option value="">Select One</option>
                                                        @foreach($licYears as $licYear)
                                                        <option value="{{$licYear->StringParameter}}">
                                                            {{$licYear->StringParameter}}</option>
                                                        @endforeach
                                                    </select>

                                                    <input type="hidden" id="renewalID" name="renewalID" value="{{auth()->user()->name}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Location<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="location"
                                                        name="location">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Longitude<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="longitude"
                                                        name="longitude">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Latitude<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="latitude"
                                                        name="latitude">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">LengthOfHoarding<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="number" class="form-control" id="lengthOfHoarding"
                                                        name="lengthOfHoarding" value="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">WidthOfHoarding<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="number" class="form-control" id="widthOfHoarding"
                                                        name="widthOfHoarding" value="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">AreaOfBoard<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="number" class="form-control" id="areaOfBoard"
                                                        name="areaOfBoard" value="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Material Type<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select name="materialType" id="materialType" class="form-control">
                                                        <option value="">Select Material Type</option>
                                                        @foreach($materialTypes as $materialType)
                                                        <option value="{{$materialType->StringParameter}}">
                                                            {{$materialType->StringParameter}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Illumination<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select name="illumination" id="illumination" class="form-control">
                                                        <option value="">Select Illumination</option>
                                                        @foreach($illus as $illu)
                                                        <option value="{{$illu->StringParameter}}">
                                                            {{$illu->StringParameter}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Facing<span
                                                        class="spin-separator spin-star">*</span>
                                                </td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select name="facing" id="facing" class="form-control">
                                                        <option value="">Select Facing</option>
                                                        @foreach($faces as $face)
                                                        <option value="{{$face->StringParameter}}">
                                                            {{$face->StringParameter}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Landmark<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="landmark"
                                                        name="landmark">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Hoarding Type<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="hoardingType" name="hoardingType">
                                                        <option value="">Select Hoarding Type</option>
                                                        @foreach($hoardingTypes as $hoardingType)
                                                        <option value="{{$hoardingType->StringParameter}}">
                                                            {{$hoardingType->StringParameter}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Property Type<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select name="propertyType" id="propertyType" class="form-control">
                                                        <option value="">Select Property Type</option>
                                                        @foreach($propertyTypes as $propertyType)
                                                        <option value="{{$propertyType->StringParameter}}">
                                                            {{$propertyType->StringParameter}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">OwnerName (If Property Type is Private)<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="ownerName"
                                                        class="ownerName" name="ownerName">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">OwnerAddress (If Property Type is Private)<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="ownerAddress"
                                                        class="ownerAddress" name="ownerAddress">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">OwnerCity (If Property Type is Private)<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="ownerCity"
                                                        class="ownerCity" name="ownerCity">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">OwnerPhone (If Property Type is Private)<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="ownerPhone"
                                                        class="ownerPhone" name="ownerPhone">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">OwnerWhatsappNo (If Property Type is
                                                    Private)<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="ownerWhatsapp"
                                                        class="ownerPhone" name="ownerWhatsapp">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Help and Advisory -->
                            @include('admin.help-and-advisory')
                            <!-- Help and Advisory -->
                            <!-- UPLOAD DOCUMENTS -->
                            <div class="col-md-9">
                                <div class="card-header card-bg">
                                    <div class="card-title my-card-title">UPLOAD DOCUMENTS</div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                        Building
                                                        Permit</span>
                                                    <input type="file" id="buildingPermitPath" name="buildingPermitPath"
                                                        accept="application/pdf,image/*" style="width:100%;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Site
                                                        Photograph</span>
                                                    <input name="sitePhotographPath" id="sitePhotographPath" type="file"
                                                        accept="application/pdf,image/*" style="width:100%;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                        Engineer Certificate</span>
                                                    <input name="engineerCertificatePath" id="engineerCertificatePath"
                                                        type="file" accept="application/pdf,image/*"
                                                        style="width:100%;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                        Agreement</span>
                                                    <input id="agreementPath" name="agreementPath" type="file"
                                                        accept="application/pdf,image/*" style="width:100%;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="spin-label" style="width:100%;">
                                                    <span>Upload GPS Photograph</span><input id="GPSPath"
                                                        name="GPSPath" type="file" accept="application/pdf,image/*"
                                                        style="width:100%;">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="4" class="spin-label" style="width:100%;">
                                                    <span>Upload Sketch Plan</span>
                                                    <input id="sketchPlanPath" name="sketchPlanPath" type="file"
                                                        accept="application/pdf,image/*" style="width:100%;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                        Pending Dues</span><input id="pendingDuesPath"
                                                        name="pendingDuesPath" type="file"
                                                        accept="application/pdf,image/*" style="width:100%;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                        Architectural Drawing</span><input
                                                        id="architecturalDrawingPath" name="architecturalDrawingPath"
                                                        type="file" accept="application/pdf,image/*"
                                                        style="width:100%;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                        Proceeding 1 Photo</span><input id="proceeding1Photo"
                                                        name="proceeding1Photo" type="file"
                                                        accept="application/pdf,image/*" style="width:100%;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                        Proceeding 2 Photo</span><input id="proceeding2Photo"
                                                        name="proceeding2Photo" type="file"
                                                        accept="application/pdf,image/*" style="width:100%;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                        Extra Document 1</span><input id="extraDoc1" name="extraDoc1"
                                                        type="file" accept="application/pdf,image/*"
                                                        style="width:100%;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                        Extra Document 2</span><input id="extraDoc2" name="extraDoc2"
                                                        type="file" accept="application/pdf,image/*"
                                                        style="width:100%;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!-- updation for initiator -->
                                                    <button class="btn btn-success"><i class="icon-file-archive-o"></i>
                                                        Submit</button>
                                                    <!-- updation for initiator -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- UPLOAD DOCUMENTS -->
                        </form>
                        <!-- form -->
                    </div>
                </div>
                <!-- APPLY NEW HOARDING -->
            </div>
            <!-- tab-content -->
        </div>
    </div>
</div>
@endsection

@section('pagescript')
<script src="js/datatable_buttons/dataTables.buttons.min.js"></script>
@endsection

@section('script')
<script>
    $('#datatable').DataTable();

</script>
@endsection
