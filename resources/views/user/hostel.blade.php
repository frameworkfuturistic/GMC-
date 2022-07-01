@extends('user.app')

@section('hostelactive')
active
@endsection

@section('app-content')
<!-- Success Message -->
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
                                <div class="card-title my-card-title">LODGE/HOSTEL HALL REGISTRATION APPLICATION</div>
                            </div>
                            <!-- form tag -->

                            <!-- form -->
                            <form action="{{ url('rnc/addHostel') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">Applicant Name<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="Applicant" name="Applicant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Father's Name<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" type="text" id="Father" name="Father">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Mobile<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" type="number" id="mobile" name="mobile">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">E-mail<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" type="email" id="email" name="email">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Residence Address<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" type="text" id="ResidenceAddress" name="ResidenceAddress">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo" name="WardNo">
                                                        <option value="">Select One</option>
                                                        @foreach($wards as $ward)
                                                        <option value="{{$ward->StringParameter}}">
                                                            {{$ward->StringParameter}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="field-validation-valid text-danger"
                                                        data-valmsg-for="WardNo" data-valmsg-replace="true"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Permanent Address<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" type="text" id="PermanentAddress" name="PermanentAddress">
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo1" name="WardNo1">
                                                        <option value="">Select One</option>
                                                        @foreach($wards as $ward)
                                                        <option value="{{$ward->StringParameter}}">
                                                            {{$ward->StringParameter}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="field-validation-valid text-danger"
                                                        data-valmsg-for="WardNo1" data-valmsg-replace="true"></span>
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
                        <div class="col-md-7">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">SHOP/ESTABLISHMENT DETAILS OF APPLICANT</div>
                            </div>
                            <!--table form -->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>License Year<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                            <select class="form-control" id="LicenseYear" name="LicenseYear">
                                                <option value="">Select One</option>
                                                <option value="2018-19">2018-19</option>
                                                <option value="2019-20">2019-20</option>
                                                <option value="2020-21">2020-21</option>
                                                <option value="2021-22">2021-22</option>
                                            </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Established Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                            <select class="form-control" id="EstablishedType" name="EstablishedType">
                                                <option value="">Select One</option>
                                                @foreach($establishedTypes as $establishedType)
                                                <option value="{{$establishedType->StringParameter}}">{{$establishedType->StringParameter}}</option>
                                                @endforeach
                                            </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Entity Name<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="EntityName" name="EntityName">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Entity Address<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="EntityAddress" name="EntityAddress">
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>Entity Ward<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select name="" id="" class="form-control" id="EntityWard" name="EntityWard">
                                                    <option value="">Select One</option>
                                                    @foreach($wards as $ward)
                                                    <option value="{{$ward->StringParameter}}">
                                                        {{$ward->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>Holding No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="HoldingNo" name="HoldingNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Trade License No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="LicenseNo" name="LicenseNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Longitude<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="Longitude" name="Longitude">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="Latitude" name="Latitude">
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Organization Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select name="OrganizationType" id="OrganizationType" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach($organizeTypes as $organizeType)
                                                    <option value="{{$organizeType->StringParameter}}">
                                                        {{$organizeType->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Land Deed Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select name="LandDeedType" id="LandDeedType" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach($deedTypes as $deedType)
                                                    <option value="{{$deedType->StringParameter}}">
                                                        {{$deedType->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Water Supply Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select name="WaterSupplyType" id="WaterSupplyType" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach($supplyTypes as $supplyType)
                                                    <option value="{{$supplyType->StringParameter}}">
                                                        {{$supplyType->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Electricity Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select name="ElectricityType" id="ElectricityType" class="form-control">
                                                        <option value="">Select One</option>
                                                        @foreach($electricityTypes as $electricityType)
                                                        <option value="{{$electricityType->StringParameter}}">
                                                            {{$electricityType->StringParameter}}</option>
                                                        @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Security Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select name="SecurityType" id="SecurityType" class="form-control">
                                                      <option value="">Select One</option>
                                                      @foreach($organizeTypes as $organizeType)
                                                        <option value="{{$organizeType->StringParameter}}">
                                                            {{$organizeType->StringParameter}}</option>
                                                        @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Lodge Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select name="LodgeType" id="LodgeType" class="form-control">
                                                    <option value="">Select One</option>
                                                    @foreach($lodgeTypes as $lodgeType)
                                                    <option value="{{$organizeType->StringParameter}}">
                                                        {{$lodgeType->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of CCTV Camera<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" value="0" id="CCTVCameraNo" name="CCTVCameraNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Beds<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" value="0" id="NoOfBeds" name="NoOfBeds">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Rooms<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" value="0" id="NoOfRooms" name="NoOfRooms">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Fire Extinguishers<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" value="0" id="NoOfFireExtinguishers" name="NoOfFireExtinguishers">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Entry Gate<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" value="0" id="NoOfEntryGate" name="NoOfEntryGate">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Exit Gate<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" value="0" id="NoOfExitGate" name="NoOfExitGate">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Two Wheelers Parking<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" value="0" id="NoOfTwoWheelersParking" name="NoOfTwoWheelersParking">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Four Wheelers Parking<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" value="0" id="NoOfFourWheelersParking" name="NoOfFourWheelersParking">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aadhar No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="AadharNo" name="AadharNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PAN Card No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="PANNo" name="PANNo">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--table form -->
                        </div>
                        <!-- Shop/Establishment Details of Applicant -->
                        <!-- Upload Documents -->
                        <div class="col-md-5">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">Upload Documents</div>
                            </div>
                            <!-- form -->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Lodge/Hostel Frontage Photograph</span>
                                                    <input type="file" style="width:100%;" id="HostelFrontagePath" name="HostelFrontagePath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Aadhar No Photograph</span>
                                                    <input type="file" style="width:100%;" id="AadharNoPath" name="AadharNoPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Fire Extinguishers Photograph</span>
                                                    <input type="file" style="width:100%;" id="FireExtinguishersPath" name="FireExtinguishersPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload CCTV Camera Photograph</span>
                                                    <input type="file" style="width:100%;" id="CCTVCameraPath" name="CCTVCameraPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Name Plate With Mobile No Photograph</span>
                                                    <input type="file" style="width:100%;" id="NamePlatePath" name="NamePlatePath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Entry and Exit Photograph</span>
                                                    <input type="file" style="width:100%;" id="EntryExitPath" name="EntryExitPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Building Plan Photograph</span>
                                                    <input type="file" style="width:100%;" id="BuildingPlanPath" name="BuildingPlanPath">
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Solid Waste Photograph</span>
                                                    <input type="file" style="width:100%;" id="SolidWastePath" name="SolidWastePath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Holding Tax Receipt Photograph</span>
                                                    <input type="file" style="width:100%;" id="HoldingTaxReceiptPath" name="HoldingTaxReceiptPath">
                                            </td>
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
