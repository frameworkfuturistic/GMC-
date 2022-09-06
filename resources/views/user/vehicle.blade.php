@extends('user.app')

@section('vehicleactive')
active
@endsection

@section('app-content')
<!-- success Message -->
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session()->get('message') }}
</div>
@endif
<!-- Success Message -->
<!-- form -->
<div class="card">
    <div class="card-body">
        <!-- tabs -->
        <div class="card-block">
            <div class="tab-content px-1 pt-1">
                <!-- application details tab -->
                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                    <div class="row">
                        <!-- data form -->
                        <div class="col-md-9">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">MOVABLE VEHICLE ADVERTISEMENT REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form tag -->

                            <!-- form -->
                            <form action="{{ url('rnc/addVehicleAdvet') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">Applicant<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="applicant" name="applicant" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Father<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input type="text" class="form-control" id="father" name="father" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">E-mail<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input type="email" class="form-control" id="email" name="email" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Residence Address<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input type="text" class="form-control" id="ResidenceAddress" name="ResidenceAddress" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo" name="WardNo" required>
                                                        <option value="">Select One</option>
                                                        @foreach($wards as $ward)
                                                        <option value="{{$ward->StringParameter}}">{{$ward->StringParameter}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="WardNo" data-valmsg-replace="true"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Permanent Address<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="PermanentAddress" name="PermanentAddress" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo1" name="WardNo1" required>
                                                        <option value="">Select One</option>
                                                        @foreach($wards as $ward)
                                                        <option value="{{$ward->StringParameter}}">{{$ward->StringParameter}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Mobile<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="MobileNo" name="MobileNo" type="text" value="{{ session('mobile') }}" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Aadhar No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="AadharNo" name="AadharNo" type="text" value="" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- form -->
                        </div>
                        <!-- data form -->
                        <!-- Help & Advisory -->
                        <div class="col-md-3 advisory">
                            <h4 class="card-title success">Help &amp; Advisory</h4>
                            <div class="alert alert-success">Please Note!!</div>
                            <p class="card-text">
                            </p>
                            <ul>
                                <li>Keep all the information handy before filling up the application form.
                                </li>
                                <li>You will have to visit RMC office for any correction regatding
                                    application information.</li>
                                <li>Keep your address concise</li>
                                <li>Visit Market Section for further enquiry</li>
                            </ul>
                            <p></p>
                        </div>
                        <!-- Help & Advisory -->
                        <!-- Shop/Establishment Details of Applicant -->
                        <div class="col-md-6">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">SELF ADVERTISEMENT REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="spin-label">License From<span class="spin-separator spin-star">*</span></td>
                                            <td>
                                                <input type="date" class="form-control" id="LicenseFrom" name="LicenseFrom" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">License To<span class="spin-separator spin-star">*</span></td>
                                            <td>
                                                <input type="date" class="form-control" id="LicenseTo" name="LicenseTo" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Entity Name <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="EntityName" name="EntityName" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Trade License No <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="TradeLicenseNo" name="TradeLicenseNo" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">GST No <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="GSTNo" name="GSTNo" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Vehicle No <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="VehicleNo" name="VehicleNo" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Vehicle Name <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="VehicleName" name="VehicleName" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Vehicle Type <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select name="VehicleType" id="VehicleType" class="form-control" required>
                                                    <option value="">Select One</option>
                                                    @foreach($vehicleTypes as $vehicleType)
                                                    <option value="{{$vehicleType->StringParameter}}">{{$vehicleType->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Brand Displayed in Vehicle <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="BrandDisplay" name="BrandDisplay" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Front Area(Sq ft) <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="number" class="form-control" id="FrontArea" name="FrontArea" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Rear Area(Sq ft) <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="number" class="form-control" id="RearArea" name="RearArea" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Side 1 Area(Sq ft) <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="number" class="form-control" id="Side1Area" name="Side1Area" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Top Area(Sq ft) <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="number" class="form-control" id="TopArea" name="TopArea" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Display Type <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select name="DisplayType" id="DisplayType" class="form-control" required>
                                                    <option value="">Select One</option>
                                                    @foreach($DisplayTypes as $DisplayType)
                                                    <option value="{{$DisplayType->StringParameter}}">{{$DisplayType->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- form -->
                        </div>
                        <!-- Shop/Establishment Details of Applicant -->
                        <!-- Upload Documents -->
                        <div class="col-md-6">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">Upload Documents</div>
                            </div>
                            <!-- form -->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Aadhar Document</span><input type="file" id="AadharPath" name="AadharPath" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Municipal Trade License Document</span><input name="TradeLicensePath" id="TradeLicensePath" type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Vehicle Photograph</span><input name="VehiclePhotoPath" id="VehiclePhotoPath" type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Owner Book</span><input id="OwnerBookPath" name="OwnerBookPath" type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;">
                                                <span>Upload Driving License</span><input id="DrivingLicensePath" name="DrivingLicensePath" type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;">
                                                <span>Upload Insurance Photo</span><input id="InsurancePhotoPath" name="InsurancePhotoPath" type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    GST No Photograph</span><input id="GSTNoPhotoPath" name="GSTNoPhotoPath" type="file" accept="application/pdf,image/*" style="width:100%;"></td>
                                        </tr>
                                        <tr colspan="4" class="spin-label">
                                            <td><button class="btn btn-success"><i class="icon-file-archive-o"></i>
                                                    Submit</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- form -->
                        </div>
                        <!-- Upload Documents -->
                        </form>
                        <!-- form tag -->
                    </div>
                </div>
                <!-- application details tab -->
            </div>
        </div>
        <!-- tabs -->
    </div>
</div>
<!-- form -->
@endsection