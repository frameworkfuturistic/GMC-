@extends('admin.app')

@section('heading')
Rejected Dharmasala
@endsection

@section('dharmasalaRejectedActive')
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
                                <div class="card-title my-card-title">DHARMASALA REGISTRATION
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
                        <div class="col-md-9">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">DHARMASALA REGISTRATION
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
                        </form>
                    </div>
                </div>
                <!-- application details tab -->
                <!-- workflow tab -->
                <div class="tab-pane" id="tab2" aria-labelledby="base-tab2" aria-expanded="false">
                    <div class="card-header card-bg">
                        <div class="card-title my-card-title">Office Communication Workflow</div>
                    </div>
                    <div class="card-body">
                        <!-- comments -->
                        <div class="bootstrap snippets bootdey mb-top">
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
                        <!-- comments -->
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

@section('script')
<script src="js/preview-pdf.js"></script>
<script>
    $(document).ready(function() {
        // add active class
        $("#dharmRejected").addClass('active');
        $('#datatable').DataTable();
        disableInputs();
    });

    function inputTools() {
        window.open('https://www.google.com/inputtools/try/', '_blank');
    }
</script>
@endsection