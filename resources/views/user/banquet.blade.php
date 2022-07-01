@extends('user.app')

@section('banquetactive')
active
@endsection

@section('app-content')
<!-- success msg -->
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message') }}
    </div>
@endif
<!-- success msg -->
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
                                <div class="card-title my-card-title">BANQUET/MARRIAGE HALL APPLICATION</div>
                            </div>
                            <!-- form tag -->

                            <!-- form -->
                            <form action="{{ url('rnc/addBanquet') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">License Year<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="licenseYear" name="licenseYear">
                                                        <option value="">Select One</option>
                                                        <option value="2018-19">2018-19</option>
                                                        <option value="2019-20">2019-20</option>
                                                        <option value="2020-21">2020-21</option>
                                                        <option value="2021-22">2021-22</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Applicant<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="applicant" name="applicant">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Father<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="Father"
                                                        name="Father" type="text" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">E-mail<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control"
                                                        id="Email" name="Email" type="email" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Residence Address<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control"
                                                        id="ResidenceAddress" name="ResidenceAddress" type="text"
                                                        value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control"
                                                        id="WardNo" name="WardNo">
                                                        <option value="">Select One</option>
                                                        @foreach($wards as $ward)
                                                        <option value="{{$ward->StringParameter}}">
                                                            {{$ward->StringParameter}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Permanent Address<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control"
                                                        id="PermanentAddress" name="PermanentAddress" type="text"
                                                        value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo1"
                                                        name="WardNo1">
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
                                            <td>Hall Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="HallType" name="HallType">
                                                    <option value="">Select One</option>
                                                    @foreach($hallTypes as $hallType)
                                                    <option value="{{$hallType->StringParameter}}">
                                                        {{$hallType->StringParameter}}</option>
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
                                                <select class="form-control" id="EntityWard" name="EntityWard">
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
                                                <input class="form-control" type="text" id="HoldingNo" name="HoldingNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Trade License No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="TradeLicenseNo" name="TradeLicenseNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Longitude<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="Longitude" name="Longitude">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="Latitude" name="Latitude">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Organization Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="OrganizationType" name="OrganizationType">
                                                    <option value="">Select One</option>
                                                    @foreach($organizeTypes as $organizeType)
                                                    <option value="{{$organizeType->StringParameter}}">
                                                        {{$organizeType->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Floor Area<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="FloorArea" name="FloorArea">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Land Deed Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="LandDeedType" name="LandDeedType">
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
                                                <select class="form-control" id="WaterSupplyType" name="WaterSupplyType">
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
                                                <select class="form-control" id="ElectricityType" name="ElectricityType">
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
                                                <select class="form-control" id="SecurityType" name="SecurityType">
                                                    <option value="">Select One</option>
                                                    @foreach($organizeTypes as $organizeType)
                                                    <option value="{{$organizeType->StringParameter}}">
                                                        {{$organizeType->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of CCTV Camera<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="CCTVNo" name="CCTVNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Fire Extinguishers<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="FireExtinguishersNo" name="FireExtinguishersNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Entry Gates<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="EntryGatesNo" name="EntryGatesNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Exit Gates<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="ExitGatesNo" name="ExitGatesNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Two Wheelers Parking Space<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="TwoWheelersParkingSpace" name="TwoWheelersParkingSpace">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Four Wheelers Parking Space<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="FourWheelersParkingSpace" name="FourWheelersParkingSpace">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aadhar Card No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="AadharCardNo" name="AadharCardNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PAN Card No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="PANCardNo" name="PANCardNo">
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
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Banquet/ Marriage Hall Frontage Photograph</span>
                                                    <input type="file" style="width:100%;" id="BanquetHallPath" name="BanquetHallPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Aadhar Photograph</span>
                                                    <input type="file" style="width:100%;" id="AadharPath" name="AadharPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Fire Extinguisher Photograph</span>
                                                    <input type="file" style="width:100%;" id="FireExtinguishersPath" name="FireExtinguishersPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Composting Machine Photograph</span>
                                                    <input type="file" style="width:100%;" id="CompostingMachinePath" name="CompostingMachinePath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Building Plan Photograph</span>
                                                    <input type="file" style="width:100%;" id="BuildingPlanPath" name="BuildingPlanPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload CCTV Camera(s) Photograph</span>
                                                    <input type="file" style="width:100%;" id="CCTVCameraPath" name="CCTVCameraPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Name-plate with mobile Photograph</span>
                                                    <input type="file" style="width:100%;" id="NamePlatePath" name="NamePlatePath">
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Parking Photograph</span>
                                                    <input type="file" style="width:100%;" id="ParkingPath" name="ParkingPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Entry Exit Photograph</span>
                                                    <input type="file" style="width:100%;" id="EntryExitPath" name="EntryExitPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Input Out report of Composting Machine</span>
                                                    <input type="file" style="width:100%;" id="IOReportCompostingPath" name="IOReportCompostingPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Holding Tax Receipt Photo</span>
                                                    <input type="file" style="width:100%;" id="HoldingTaxPath" name="HoldingTaxPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Solid Waste Usage Charge Photo</span>
                                                    <input type="file" style="width:100%;" id="WaterUsageChargePath" name="WaterUsageChargePath">
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
