@extends('admin.app')

@section('heading')
Inbox Dharmasala
@endsection

@section('dharmasalaInboxActive')
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
                    <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Application Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Workflow</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">Documents</a>
                </li>
            </ul>
            <div class="tab-content px-1 pt-1">
                <!-- application details tab -->
                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                    <div class="row">
                        <!-- data form -->
                        <div class="col-md-9">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">DHARMASALA/MARRIAGE REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <form action="{{url('rnc/updatedharmasala/'.$dharmasala->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">Applicant<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="Applicant" name="Applicant" value="{{$dharmasala->Applicant}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Father<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="Father" name="Father" type="text" value="{{$dharmasala->Father}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">E-mail<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="email" name="email" type="email" value="{{$dharmasala->Email}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Residence Address<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="ResidenceAddress" name="ResidenceAddress" type="text" value="{{$dharmasala->ResidenceAddress}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo" name="WardNo">
                                                        <option value="{{$dharmasala->WardNo}}">{{$dharmasala->WardNo}}
                                                        </option>
                                                        <option value="">Select One</option>
                                                        @foreach($wards as $ward)
                                                        <option value="{{$ward->StringParameter}}">
                                                            {{$ward->StringParameter}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Permanent Address<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="PermanentAddress" name="PermanentAddress" type="text" value="{{$dharmasala->PermanentAddress}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo1" name="WardNo1">
                                                        <option value="{{$dharmasala->WardNo1}}">
                                                            {{$dharmasala->WardNo1}}
                                                        </option>
                                                        <option value="">Select One</option>
                                                        @foreach($wards as $ward)
                                                        <option value="{{$ward->StringParameter}}">
                                                            {{$ward->StringParameter}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="WardNo1" data-valmsg-replace="true"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- form -->
                        </div>
                        <!-- data form -->
                        <!-- Help & Advisory -->
                        @include('admin.help-and-advisory')
                        <!-- Help & Advisory -->
                        <!-- Shop/Establishment Details of Applicant -->
                        <div class="col-md-6">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">DHARMASALA/MARRIAGE REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="spin-label">License Year<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="hidden" value="{{$dharmasala->id}}" id="id" name="id">
                                                <select class="form-control" id="LicenseYear" name="LicenseYear">
                                                    <option value="{{$dharmasala->LicenseYear}}">
                                                        {{$dharmasala->LicenseYear}}
                                                    </option>
                                                    <option value="">Select One</option>
                                                    <option value="2018-19">2018-19</option>
                                                    <option value="2019-20">2019-20</option>
                                                    <option value="2020-21">2020-21</option>
                                                    <option value="2021-22">2021-22</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Entity Name<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="EntityName" name="EntityName" value="{{$dharmasala->EntityName}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Entity Address<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="EntityAddress" name="EntityAddress" value="{{$dharmasala->EntityAddress}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Holding No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="HoldingNo" name="HoldingNo" value="{{$dharmasala->HoldingNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Trade License No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="LicenseNo" name="LicenseNo" value="{{$dharmasala->LicenseNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Longitude<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="Longitude" name="Longitude" value="{{$dharmasala->Longitude}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="Latitude" name="Latitude" value="{{$dharmasala->Latitude}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Organization Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="OrganizationType" name="OrganizationType">
                                                    <option value="{{$dharmasala->OrganizationType}}">
                                                        {{$dharmasala->OrganizationType}}
                                                    </option>
                                                    <option value="">Select One</option>
                                                    @foreach($organizeTypes as $organizeType)
                                                    <option value="{{$organizeType->StringParameter}}">
                                                        {{$organizeType->StringParameter}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Land Deed Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="LandDeedType" name="LandDeedType">
                                                    <option value="{{$dharmasala->LandDeedType}}">
                                                        {{$dharmasala->LandDeedType}}
                                                    </option>
                                                    <option value="">Select One</option>
                                                    @foreach($deedTypes as $deedType)
                                                    <option value="{{$deedType->StringParameter}}">
                                                        {{$deedType->StringParameter}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Water Supply Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="WaterSupplyType" name="WaterSupplyType">
                                                    <option value="{{$dharmasala->WaterSupplyType}}">
                                                        {{$dharmasala->WaterSupplyType}}
                                                    </option>
                                                    <option value="">Select One</option>
                                                    @foreach($supplyTypes as $supplyType)
                                                    <option value="{{$supplyType->StringParameter}}">
                                                        {{$supplyType->StringParameter}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Electricity Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="ElectricityType" name="ElectricityType">
                                                    <option value="{{$dharmasala->ElectricityType}}">
                                                        {{$dharmasala->ElectricityType}}
                                                    </option>
                                                    <option value="">Select One</option>
                                                    @foreach($electricityTypes as $electricityType)
                                                    <option value="{{$electricityType->StringParameter}}">
                                                        {{$electricityType->StringParameter}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Security Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="SecurityType" name="SecurityType">
                                                    <option value="{{$dharmasala->SecurityType}}">
                                                        {{$dharmasala->SecurityType}}
                                                    </option>
                                                    <option value="">Select One</option>
                                                    @foreach($organizeTypes as $organizeType)
                                                    <option value="{{$organizeType->StringParameter}}">
                                                        {{$organizeType->StringParameter}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of CCTV Camera<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="number" id="CCTVCameraNo" name="CCTVCameraNo" value="{{$dharmasala->CCTVCameraNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Beds<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" id="NoOfBeds" name="NoOfBeds" value="{{$dharmasala->NoOfBeds}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Rooms<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" id="NoOfRooms" name="NoOfRooms" value="{{$dharmasala->NoOfRooms}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Fire Extinguishers<span class="spin-separator spin-star">*</span>
                                            </td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="number" id="NoOfFireExtinguishers" name="NoOfFireExtinguishers" value="{{$dharmasala->NoOfFireExtinguishers}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Entry Gates<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="EntryGatesNo" name="EntryGatesNo" value="{{$dharmasala->NoOfEntryGate}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Exit Gates<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="NoOfExitGate" name="NoOfExitGate" value="{{$dharmasala->NoOfExitGate}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Two Wheelers Parking Space<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="NoOfTwoWheelersParking" name="NoOfTwoWheelersParking" value="{{$dharmasala->NoOfTwoWheelersParking}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Four Wheelers Parking Space<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="NoOfFourWheelersParking" name="NoOfFourWheelersParking" value="{{$dharmasala->NoOfFourWheelersParking}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aadhar Card No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="AadharNo" name="AadharNo" value="{{$dharmasala->AadharNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PAN Card No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="PANNo" name="PANNo" value="{{$dharmasala->PANNo}}">
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
                                                    Lodge/dharmasala Frontage Photograph</span>
                                                <input type="file" style="width:100%;" id="dharmasalaFrontagePath" name="dharmasalaFrontagePath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Aadhar
                                                    No Photograph</span>
                                                <input type="file" style="width:100%;" id="AadharNoPath" name="AadharNoPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Fire
                                                    Extinguishers Photograph</span>
                                                <input type="file" style="width:100%;" id="FireExtinguishersPath" name="FireExtinguishersPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload CCTV
                                                    Camera Photograph</span>
                                                <input type="file" style="width:100%;" id="CCTVCameraPath" name="CCTVCameraPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Name
                                                    Plate With Mobile No Photograph</span>
                                                <input type="file" style="width:100%;" id="NamePlatePath" name="NamePlatePath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Entry
                                                    and Exit Photograph</span>
                                                <input type="file" style="width:100%;" id="EntryExitPath" name="EntryExitPath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Building
                                                    Plan Photograph</span>
                                                <input type="file" style="width:100%;" id="BuildingPlanPath" name="BuildingPlanPath">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Solid
                                                    Waste Photograph</span>
                                                <input type="file" style="width:100%;" id="SolidWastePath" name="SolidWastePath">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Holding
                                                    Tax Receipt Photograph</span>
                                                <input type="file" style="width:100%;" id="HoldingTaxReceiptPath" name="HoldingTaxReceiptPath">
                                            </td>
                                        </tr>
                                        <tr colspan="4" class="spin-label">
                                            <td>
                                                @if($dharmasala->CurrentUser==$workflowInitiator->Initiator)
                                                <button class="btn btn-success"><i class="icon-file-archive-o"></i>
                                                    Submit</button>
                                                @endif
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
                            <form action="{{url('rnc/dharmasalaInboxComment/'.$dharmasala->id)}}" method="POST" id="commentTo">
                                @method('POST')
                                @csrf
                                <div class="form-group mb-top">
                                    <input type="hidden" value="{{$dharmasala->RenewalID}}" id="RenewalID" name="RenewalID">
                                    <label for="complaintinput5">Comments</label>
                                    <textarea id="comments" name="comments" rows="5" class="form-control round" placeholder="comments"></textarea>
                                    <button type="submit" class="btn btn-success mb-top" id="commentTo">
                                        <i class="icon-check2"></i> Comment
                                    </button>

                                    <button type="button" class="btn btn-info mb-top" onclick="inputTools();">
                                        <i class="icon-pen"></i> Hindi Input Tools
                                    </button>
                                </div>
                            </form>
                            <!-- comments -->
                            <!-- form -->
                            <form class="form mb-top" method="POST" action="{{url('rnc/dharmasalaWorkflow/'.$dharmasala->id)}}" id="forwardTo1">
                                @method('PUT')
                                @csrf
                                <div class="form-body">
                                    <input type="hidden" value="{{$dharmasala->id}}" id="id" name="id">

                                    <div class="form-group">
                                        <label for="complaintinput1">Forward To</label>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <select class="form-control" id="forward" name="forward">
                                                    <option value="">Select One</option>
                                                    @foreach($workflows as $workflow)
                                                    <option value="{{$workflow->UserID}}">{{$workflow->UserID}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="icon-check2"></i> Forward
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="complaintinput2">Application Status</label>
                                        <input type="text" class="form-control" id="AppStatus" name="AppStatus" value="{{$dharmasala->ApplicationStatus}}">
                                    </div>

                                    @if($dharmasala->CurrentUser==$workflowInitiator->Finisher)
                                    <div class="form-group">
                                        <label for="complaintinput2">Update Status</label>
                                        <select class="form-control" id="UpdateStatus" name="UpdateStatus">
                                            @if($dharmasala->Approved=='-1')
                                            <option value="Approved" selected>Approve</option>
                                            @endif
                                            @if($dharmasala->Rejected=='-1')
                                            <option value="Rejected" selected>Reject</option>
                                            @endif
                                            @if($dharmasala->Pending=='-1')
                                            <option value="Pending" selected>Pending</option>
                                            @endif
                                            <option value="">Select</option>
                                            <option value="Approved">Approve</option>
                                            <option value="Rejected">Reject</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                    @endif

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="icon-check2"></i> Update Status
                                        </button>
                                    </div>

                                </div>
                            </form>
                            <!-- form -->
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
                                                    <span class="CommentUser"><i class="icon-android-contact"></i>
                                                        {{$comment->UserID}}</span> says : <i class="pull-right"></i>
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
                            @include('admin.Dharmasala.upload-image')
                        </div>
                        <!-- photos -->
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

@section('pagescript')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('script')
<script src="js/preview-pdf.js"></script>
<script>
    $(document).ready(function() {
        // add active class
        $("#dharmInbox").addClass('active');
        $('#datatable').DataTable();
    });

    function inputTools() {
        window.open('https://www.google.com/inputtools/try/', '_blank');
    }

    // Forward User using Ajax
    $(function() {
        $('#forwardTo1').submit(function(e) {
            var targetform = $('#forwardTo1');
            var murl = targetform.attr('action');
            var mdata = $("#forwardTo1").serialize();
            e.preventDefault();
            $('#loaderbody').show();

            $.ajax({
                url: murl,
                type: "post",
                data: mdata,
                datatype: "json",
                success: function(mdata) {
                    $('#loaderbody').hide();
                    // alert("Data Successfully Added");
                    Swal.fire(
                        'Good job!',
                        'You Successfully Updated The Data!',
                        'success'
                    )
                },
                error: function(error) {
                    alert(error);
                },
            });
        });
    });
    // Forward User Using Ajax
    // Comment Save Using Ajax
    $(function() {
        $('#commentTo').submit(function(e) {
            var targetform = $('#commentTo');
            var murl = targetform.attr('action');
            var mdata = $("#commentTo").serialize();
            e.preventDefault();

            $.ajax({
                url: murl,
                type: "post",
                data: mdata,
                datatype: "json",
                success: function(mdata) {
                    // alert("Data Successfully Added");
                    Swal.fire(
                        'Good job!',
                        'You have Successfully given the Remark!',
                        'success'
                    )
                },
                error: function(error) {
                    alert(error);
                },
            });
        });
    });
    // Comment Save Using Ajax
</script>
@endsection