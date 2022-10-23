@extends('admin.app')

@section('heading')
Rejected Hostel
@endsection

@section('hostelRejectedActive')
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
                                <div class="card-title my-card-title">HOSTEL/LODGE REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <form action="{{url('rnc/updatehostel/'.$hostel->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">Applicant<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="Applicant" name="Applicant" value="{{$hostel->Applicant}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Father<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="Father" name="Father" type="text" value="{{$hostel->Father}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">E-mail<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="email" name="email" type="email" value="{{$hostel->Email}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Residence Address<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="ResidenceAddress" name="ResidenceAddress" type="text" value="{{$hostel->ResidenceAddress}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo" name="WardNo">
                                                        <option value="{{$hostel->WardNo}}">{{$hostel->WardNo}}</option>
                                                        <option value="">Select One</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Permanent Address<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="PermanentAddress" name="PermanentAddress" type="text" value="{{$hostel->PermanentAddress}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo1" name="WardNo1">
                                                        <option value="{{$hostel->WardNo1}}">{{$hostel->WardNo1}}</option>
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
                                <div class="card-title my-card-title">HOSTEL/LODGE REGISTRATION
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
                                                <input type="hidden" value="{{$hostel->id}}" id="id" name="id">
                                                <select class="form-control" id="LicenseYear" name="LicenseYear">
                                                    <option value="{{$hostel->LicenseYear}}">{{$hostel->LicenseYear}}</option>
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
                                                <input type="text" class="form-control" id="EntityName" name="EntityName" value="{{$hostel->EntityName}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Entity Address<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="EntityAddress" name="EntityAddress" value="{{$hostel->EntityAddress}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Holding No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="HoldingNo" name="HoldingNo" value="{{$hostel->HoldingNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Trade License No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="LicenseNo" name="LicenseNo" value="{{$hostel->LicenseNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Longitude<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="Longitude" name="Longitude" value="{{$hostel->Longitude}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="Latitude" name="Latitude" value="{{$hostel->Latitude}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Organization Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="OrganizationType" name="OrganizationType">
                                                    <option value="{{$hostel->OrganizationType}}">{{$hostel->OrganizationType}}</option>
                                                    <option value="">Select One</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Land Deed Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="LandDeedType" name="LandDeedType">
                                                    <option value="{{$hostel->LandDeedType}}">{{$hostel->LandDeedType}}</option>
                                                    <option value="">Select One</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Water Supply Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="WaterSupplyType" name="WaterSupplyType">
                                                    <option value="{{$hostel->WaterSupplyType}}">{{$hostel->WaterSupplyType}}</option>
                                                    <option value="">Select One</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Electricity Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="ElectricityType" name="ElectricityType">
                                                    <option value="{{$hostel->ElectricityType}}">{{$hostel->ElectricityType}}</option>
                                                    <option value="">Select One</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Security Type<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="form-control" id="SecurityType" name="SecurityType">
                                                    <option value="{{$hostel->SecurityType}}">{{$hostel->SecurityType}}</option>
                                                    <option value="">Select One</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of CCTV Camera<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="number" id="CCTVCameraNo" name="CCTVCameraNo" value="{{$hostel->CCTVCameraNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Beds<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" id="NoOfBeds" name="NoOfBeds" value="{{$hostel->NoOfBeds}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Rooms<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" id="NoOfRooms" name="NoOfRooms" value="{{$hostel->NoOfRooms}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Fire Extinguishers<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="number" id="NoOfFireExtinguishers" name="NoOfFireExtinguishers" value="{{$hostel->NoOfFireExtinguishers}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Entry Gates<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="EntryGatesNo" name="EntryGatesNo" value="{{$hostel->NoOfEntryGate}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Exit Gates<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="NoOfExitGate" name="NoOfExitGate" value="{{$hostel->NoOfExitGate}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Two Wheelers Parking Space<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="NoOfTwoWheelersParking" name="NoOfTwoWheelersParking" value="{{$hostel->NoOfTwoWheelersParking}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No of Four Wheelers Parking Space<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="NoOfFourWheelersParking" name="NoOfFourWheelersParking" value="{{$hostel->NoOfFourWheelersParking}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aadhar Card No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="AadharNo" name="AadharNo" value="{{$hostel->AadharNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>PAN Card No<span class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input class="form-control" type="text" id="PANNo" name="PANNo" value="{{$hostel->PANNo}}">
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
                            @include('admin.Hostel.upload-images')
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
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    $(document).ready(function() {
        // add active class
        $("#hostelRejected").addClass('active');
        $('#datatable').DataTable();
    });

    function inputTools() {
        window.open('https://www.google.com/inputtools/try/', '_blank');
    }
</script>
@endsection