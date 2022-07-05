@extends('admin.app')

@section('heading')
Approved Banquet
@endsection

@section('banquetApprovedActive')
class="active"
@endsection

@section('app-content')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message') }}
    </div>
@endif
<ul class="nav nav-pills nav-justified mb-8">
    <li class="nav-item col-md-4">
        <a class="nav-link active" id="active-pill" data-toggle="pill" href="#active" aria-expanded="true">Update
            Panel</a>
    </li>
</ul>
<!-- tab-content start here -->
<!-- update -->
<div class="card">
    <div class="card-body">
        <!-- tabs -->
        <div class="card-block">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1"
                        aria-expanded="true">Application Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2"
                        aria-expanded="false">Workflow</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3"
                        aria-expanded="false">Documents</a>
                </li>
            </ul>
            <div class="tab-content px-1 pt-1">
                <!-- application details tab -->
                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                    <div class="row">
                        <!-- data form -->
                        <div class="col-md-9">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">BANQUET/MARRIAGE REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <form action="{{url('rnc/updateBanquet/'.$banquet->id)}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">License Year<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="hidden" value="{{$banquet->id}}" id="id" name="id">
                                                    <select class="form-control" id="licenseYear" name="licenseYear">
                                                        <option value="{{$banquet->licenseYear}}">
                                                            {{$banquet->licenseYear}}</option>
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
                                                    <input class="form-control" id="applicant" name="applicant"
                                                        value="{{$banquet->Applicant}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Father<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="Father" name="Father" type="text"
                                                        value="{{$banquet->Father}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">E-mail<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="Email" name="Email" type="email"
                                                        value="{{$banquet->Email}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Residence Address<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="ResidenceAddress"
                                                        name="ResidenceAddress" type="text"
                                                        value="{{$banquet->ResidenceAddress}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo" name="WardNo">
                                                        <option value="{{$banquet->WardNo}}">{{$banquet->WardNo}}
                                                        </option>
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
                                                    <input class="form-control" id="PermanentAddress"
                                                        name="PermanentAddress" type="text"
                                                        value="{{$banquet->PermanentAddress}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo1" name="WardNo1">
                                                        <option value="{{$banquet->WardNo1}}">{{$banquet->WardNo1}}
                                                        </option>
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
                        <div class="col-md-3">
                            <h4 class="card-title success">Help & Advisory</h4>
                            <div class="alert alert-success">Please Note!!</div>
                            <p class="card-text">
                                <ul>
                                    <li>Keep all the information handy before filling up the application form.
                                    </li>
                                    <li>You will have to visit RMC office for any correction regatding
                                        application information.</li>
                                    <li>Keep your address concise</li>
                                    <li>Visit Market Section for further enquiry</li>
                                </ul>
                            </p>
                        </div>
                        <!-- Help & Advisory -->
                        <!-- Shop/Establishment Details of Applicant -->
                        <div class="col-md-6">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">BANQUET/MARRIAGE REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Hall Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="HallType" name="HallType">
                                                    <option value="{{$banquet->HallType}}">{{$banquet->HallType}}
                                                    </option>
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
                                                <input type="text" class="form-control" id="EntityName"
                                                    name="EntityName" value="{{$banquet->EntityName}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Entity Address<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="EntityAddress"
                                                    name="EntityAddress" value="{{$banquet->EntityAddress}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Entity Ward<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="EntityWard" name="EntityWard">
                                                    <option value="{{$banquet->EntityWard}}">{{$banquet->EntityWard}}
                                                    </option>
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
                                                <input class="form-control" type="text" id="HoldingNo" name="HoldingNo"
                                                    value="{{$banquet->HoldingNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Trade License No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="TradeLicenseNo"
                                                    name="TradeLicenseNo" value="{{$banquet->TradeLicenseNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Longitude<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="Longitude" name="Longitude"
                                                    value="{{$banquet->Longitude}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="Latitude" name="Latitude"
                                                    value="{{$banquet->Latitude}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Organization Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="OrganizationType"
                                                    name="OrganizationType">
                                                    <option value="{{$banquet->OrganizationType}}">
                                                        {{$banquet->OrganizationType}}</option>
                                                    <option value="">Select One</option>
                                                    <!-- <option value="PRIVATE">PRIVATE</option>
                                                    <option value="GOVERNMENT">GOVERNMENT</option> -->
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
                                                <input class="form-control" type="text" id="FloorArea" name="FloorArea"
                                                    value="{{$banquet->FloorArea}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Land Deed Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="LandDeedType" name="LandDeedType">
                                                    <option value="{{$banquet->LandDeedType}}">
                                                        {{$banquet->LandDeedType}}</option>
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
                                                <select class="form-control" id="WaterSupplyType"
                                                    name="WaterSupplyType">
                                                    <option value="{{$banquet->WaterSupplyType}}">
                                                        {{$banquet->WaterSupplyType}}</option>
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
                                                <select class="form-control" id="ElectricityType"
                                                    name="ElectricityType">
                                                    <option value="{{$banquet->ElectricityType}}">
                                                        {{$banquet->ElectricityType}}</option>
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
                                                    <option value="{{$banquet->SecurityType}}">
                                                        {{$banquet->SecurityType}}</option>
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
                                                <input class="form-control" type="text" id="CCTVNo" name="CCTVNo"
                                                    value="{{$banquet->CCTVNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Fire Extinguishers<span class="spin-separator spin-star">*</span>
                                            </td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="FireExtinguishersNo"
                                                    name="FireExtinguishersNo"
                                                    value="{{$banquet->FireExtinguishersNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Entry Gates<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="EntryGatesNo"
                                                    name="EntryGatesNo" value="{{$banquet->EntryGatesNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Exit Gates<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="ExitGatesNo"
                                                    name="ExitGatesNo" value="{{$banquet->ExitGatesNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Two Wheelers Parking Space<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="TwoWheelersParkingSpace"
                                                    name="TwoWheelersParkingSpace"
                                                    value="{{$banquet->TwoWheelersParkingSpace}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Four Wheelers Parking Space<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="FourWheelersParkingSpace"
                                                    name="FourWheelersParkingSpace"
                                                    value="{{$banquet->FourWheelersParkingSpace}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aadhar Card No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="AadharCardNo"
                                                    name="AadharCardNo" value="{{$banquet->AadharCardNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PAN Card No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="PANCardNo" name="PANCardNo"
                                                    value="{{$banquet->PANCardNo}}">
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
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Banquet/
                                                    Marriage Hall Frontage Photograph</span>
                                                <input type="file" style="width:100%;" id="BanquetHallPath"
                                                    name="BanquetHallPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Aadhar
                                                    Photograph</span>
                                                <input type="file" style="width:100%;" id="AadharPath"
                                                    name="AadharPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Fire
                                                    Extinguisher Photograph</span>
                                                <input type="file" style="width:100%;" id="FireExtinguishersPath"
                                                    name="FireExtinguishersPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Composting Machine Photograph</span>
                                                <input type="file" style="width:100%;" id="CompostingMachinePath"
                                                    name="CompostingMachinePath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Building
                                                    Plan Photograph</span>
                                                <input type="file" style="width:100%;" id="BuildingPlanPath"
                                                    name="BuildingPlanPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload CCTV
                                                    Camera(s) Photograph</span>
                                                <input type="file" style="width:100%;" id="CCTVCameraPath"
                                                    name="CCTVCameraPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Name-plate with mobile Photograph</span>
                                                <input type="file" style="width:100%;" id="NamePlatePath"
                                                    name="NamePlatePath">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Parking
                                                    Photograph</span>
                                                <input type="file" style="width:100%;" id="ParkingPath"
                                                    name="ParkingPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Entry
                                                    Exit Photograph</span>
                                                <input type="file" style="width:100%;" id="EntryExitPath"
                                                    name="EntryExitPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Input
                                                    Out report of Composting Machine</span>
                                                <input type="file" style="width:100%;" id="IOReportCompostingPath"
                                                    name="IOReportCompostingPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Holding
                                                    Tax Receipt Photo</span>
                                                <input type="file" style="width:100%;" id="HoldingTaxPath"
                                                    name="HoldingTaxPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Solid
                                                    Waste Usage Charge Photo</span>
                                                <input type="file" style="width:100%;" id="WaterUsageChargePath"
                                                    name="WaterUsageChargePath">
                                            </td>
                                        </tr>
                                        <tr colspan="4" class="spin-label">
                                            <td>
                                                <!-- UDPATION FOR INITIATOR -->
                                                @if(auth()->user()->user_type=='2')
                                                <button class="btn btn-success"><i class="icon-file-archive-o"></i>
                                                    Submit</button>
                                                @endif
                                                <!-- UPDATION FOR INITIATOR -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- form -->
                        </div>
                        <!-- Upload Documents -->
                        </form>
                    </div>
                </div>
                <!-- application details tab -->
                <!-- workflow tab -->
                <div class="tab-pane" id="tab2" aria-labelledby="base-tab2" aria-expanded="false">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">Verification Process Notes</div>
                            </div>
                            <!-- comments -->
                            <form action="{{url('rnc/banquetInboxComment/'.$banquet->id)}}" method="POST" id="commentTo">
                                @method('POST')
                                @csrf
                                <div class="form-group mb-top">
                                    <input type="hidden" value="{{$banquet->RenewalID}}" id="RenewalID"
                                        name="RenewalID">
                                    <label for="complaintinput5">Comments</label>
                                    <textarea id="comments" name="comments" rows="5" class="form-control round"
                                        placeholder="comments"></textarea>
                                    <button type="submit" class="btn btn-success mb-top" id="commentTo">
                                        <i class="icon-check2"></i> Comment
                                    </button>

                                    <button type="button" class="btn btn-info mb-top" onclick="inputTools();">
                                        <i class="icon-pen"></i> Hindi Input Tools
                                    </button>
                                </div>
                            </form>
                            <!-- comments -->
                        </div>
                        <div class="col-md-3">
                            <!-- comments -->
                            <div class="container bootstrap snippets bootdey">
                                <div class="blog-comment">
                                    <h3 class="text-success">Comments</h3>
                                        @foreach($comments as $comment)
                                        <ul class="comments mb-top">
                                            <li class="clearfix">
                                            <div class="post-comments">
                                                <p class="meta">
                                                    <span class="CommentUser"><i class="icon-android-contact"></i> {{$comment->UserID}}</span> says : <i class="pull-right"></i>
                                                    <i class="icon-android-stopwatch"></i> {{$comment->TrackDate}}
                                                </p>
                                                <p class="comment_color">
                                                    <i class="icon-edit2"></i> {{$comment->Remarks}}
                                                </p>
                                            </div>
                                            </li>
                                        </ul>
                                        @endforeach
                                </div>
                            </div>
                            </ul>
                            <!-- comments -->
                        </div>
                    </div>
                </div>
                <!-- workflow tab -->
                <!-- documents tab -->
                <div class="tab-pane" id="tab3" aria-labelledby="base-tab3" aria-expanded="false">
                    <div class="row">
                        <!-- photos -->
                        <div class="col-md-3">
                            <div class="scroll">
                                <label for="">Banquet/ Marriage Hall Frontage Photograph</label>
                                <img src="{{$banquet->BanquetHallPath}}" alt="" style="width:100%;" id="AadharPath"
                                    name="AadharPath" onclick="myfunction('first')">
                                <br>
                                <label for="">Aadhar Document Photo</label>
                                <img src="{{$banquet->AadharPath}}" alt="" style="width:100%;" id="TradeLicensePath"
                                    name="TradeLicensePath" onclick="myfunction('second')">
                                <br>
                                <label for="">Fire Extinguisher Photo</label>
                                <img src="{{$banquet->FireExtinguishersPath}}" alt="" style="width: 100%;"
                                    id="banquetPhotoPath" name="banquetPhotoPath" onclick="myfunction('third')">
                                <br>
                                <label for="">Composting Machine Document Photo</label>
                                <img src="{{$banquet->CompostingMachinePath}}" alt="" style="width: 100%;"
                                    id="OwnerBookPath" name="OwnerBookPath" onclick="myfunction('forth')">
                                <br>
                                <label for="">Building Plan Document Photo</label>
                                <img src="{{$banquet->BuildingPlanPath}}" alt="" style="width: 100%;"
                                    id="DrivingLicensePath" name="DrivingLicensePath" onclick="myfunction('fifth')">
                                <br>
                                <label for="">CCTV Camera Document Photo</label>
                                <img src="{{$banquet->CCTVCameraPath}}" alt="" style="width: 100%;"
                                    id="InsurancePhotoPath" name="InsurancePhotoPath" onclick="myfunction('sixth')">
                                <br>
                                <label for="">Name Plate With Mobile Document Photo</label>
                                <img src="{{$banquet->NamePlatePath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath"
                                    name="GSTNoPhotoPath" onclick="myfunction('seventh')">
                                <br>
                                <label for="">Parking Document Photo</label>
                                <img src="{{$banquet->ParkingPath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath"
                                    name="GSTNoPhotoPath" onclick="myfunction('eighth')">
                                <br>
                                <br>
                                <label for="">Entry Exit Document Photo</label>
                                <img src="{{$banquet->EntryExitPath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath"
                                    name="GSTNoPhotoPath" onclick="myfunction('ninth')">
                                <br>
                                <label for="">IO Report Of Composting Machine Document Photo</label>
                                <img src="{{$banquet->IOReportCompostingPath}}" alt="" style="width: 100%;"
                                    id="GSTNoPhotoPath" name="GSTNoPhotoPath" onclick="myfunction('tenth')">
                                <br>
                                <label for="">Holding Tax Document Photo</label>
                                <img src="{{$banquet->HoldingTaxPath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath"
                                    name="GSTNoPhotoPath" onclick="myfunction('eleventh')">
                                <br>
                                <label for="">Solid Waste Usage Document Photo</label>
                                <img src="{{$banquet->WaterUsageChargePath}}" alt="" style="width: 100%;"
                                    id="GSTNoPhotoPath" name="GSTNoPhotoPath" onclick="myfunction('twelth')">
                            </div>
                        </div>
                        <!-- photos -->
                        <!-- preview -->
                        <div class="col-md-9">
                            <div class="card-header card-bg mb-8">
                                <div class="card-title my-card-title">Preview</div>
                            </div>
                            <a href="{{$banquet->BanquetHallPath}}" data-toggle="lightbox">
                                <img src="{{$banquet->BanquetHallPath}}" alt="" id="first" href="#img1"
                                    style="width: 100%;">
                            </a>

                            <a href="{{$banquet->AadharPath}}" data-toggle="lightbox">
                                <img src="{{$banquet->AadharPath}}" alt="" style="width:100%;" id="second">
                            </a>
                            <a href="{{$banquet->FireExtinguishersPath}}" data-toggle="lightbox">
                                <img src="{{$banquet->FireExtinguishersPath}}" alt="" style="width: 100%;" id="third">
                            </a>

                            <a href="{{$banquet->CompostingMachinePath}}" data-toggle="lightbox">
                                <img src="{{$banquet->CompostingMachinePath}}" alt="" style="width: 100%;" id="forth">
                            </a>

                            <a href="{{$banquet->BuildingPlanPath}}" data-toggle="lightbox">
                                <img src="{{$banquet->BuildingPlanPath}}" alt="" style="width: 100%;" id="fifth">
                            </a>

                            <a href="{{$banquet->CCTVCameraPath}}" data-toggle="lightbox">
                                <img src="{{$banquet->CCTVCameraPath}}" alt="" style="width: 100%;" id="sixth">
                            </a>

                            <a href="{{$banquet->NamePlatePath}}" data-toggle="lightbox">
                                <img src="{{$banquet->NamePlatePath}}" alt="" style="width: 100%;" id="seventh">
                            </a>
                            <a href="{{$banquet->ParkingPath}}" data-toggle="lightbox">
                                <img src="{{$banquet->ParkingPath}}" alt="" style="width: 100%;" id="eighth">
                            </a>
                            <a href="{{$banquet->EntryExitPath}}" data-toggle="lightbox">
                                <img src="{{$banquet->EntryExitPath}}" alt="" style="width: 100%;" id="ninth">
                            </a>
                            <a href="{{$banquet->IOReportCompostingPath}}" data-toggle="lightbox">
                                <img src="{{$banquet->IOReportCompostingPath}}" alt="" style="width: 100%;" id="tenth">
                            </a>
                            <a href="{{$banquet->HoldingTaxPath}}" data-toggle="lightbox">
                                <img src="{{$banquet->HoldingTaxPath}}" alt="" style="width: 100%;" id="eleventh">
                            </a>
                            <a href="{{$banquet->WaterUsageChargePath}}" data-toggle="lightbox">
                                <img src="{{$banquet->WaterUsageChargePath}}" alt="" style="width: 100%;" id="twelth">
                            </a>
                        </div>
                        <!-- preview -->
                    </div>
                </div>
                <!-- document tab -->
            </div>
        </div>
        <!-- tabs -->
    </div>
</div>
<!-- update -->
<!-- tab-content start here -->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"
    integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    $(document).ready(function () {
        // add active class
        $("#banquetApproved").addClass('active');// add active class
        $('#datatable').DataTable();
        displayNone();
    });

    function displayNone() {
        document.getElementById("first").style.display = 'none';
        document.getElementById("second").style.display = 'none';
        document.getElementById("third").style.display = 'none';
        document.getElementById("forth").style.display = 'none';
        document.getElementById("fifth").style.display = 'none';
        document.getElementById("sixth").style.display = 'none';
        document.getElementById("seventh").style.display = 'none';
        document.getElementById("eighth").style.display = 'none';
        document.getElementById("ninth").style.display = 'none';
        document.getElementById("tenth").style.display = 'none';
        document.getElementById("eleventh").style.display = 'none';
        document.getElementById("twelth").style.display = 'none';
    }

    function myfunction(id) {
        displayNone();
        document.getElementById(id).style.display = 'block';
    }

    function inputTools(){
        window.open('https://www.google.com/inputtools/try/','_blank');
    }

     // Comment Save Using Ajax
     $(function () {
        $('#commentTo').submit(function (e) {
            var targetform = $('#commentTo');
            var murl = targetform.attr('action');
            var mdata = $("#commentTo").serialize();
            e.preventDefault();

            $.ajax({
                url: murl,
                type: "post",
                data: mdata,
                datatype: "json",
                success: function (mdata) {
                    Swal.fire(
                        'Good job!',
                        'You have Successfully given the Remark!',
                        'success'
                    )
                },
                error: function (error) {
                    alert(error);
                },
            });
        });
    });
    // Comment Save Using Ajax

</script>
@endsection
