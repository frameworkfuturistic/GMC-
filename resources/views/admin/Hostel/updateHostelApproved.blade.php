@extends('admin.app')

@section('heading')
Approved Hostel
@endsection

@section('hostelApprovedActive')
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
                                <div class="card-title my-card-title">HOSTEL/LODGE REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <form action="{{url('api/rnc/updatehostel/'.$hostel->id)}}" method="POST" enctype="multipart/form-data">
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
                                                            {{$comment->UserID}}</span> says : <i
                                                            class="pull-right"></i>
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
                            <div class="scroll">
                                <label for="">Lodge/Hostel Frontage Photograph</label>
                                <img src="{{$hostel->HostelFrontagePath}}" alt="" style="width:100%;" id="AadharPath"
                                    name="AadharPath" onclick="myfunction('first')">
                                <br>
                                <label for="">Aadhar Document Photo</label>
                                <img src="{{$hostel->AadharNoPath}}" alt="" style="width:100%;"
                                    id="TradeLicensePath" name="TradeLicensePath" onclick="myfunction('second')">
                                <br>
                                <label for="">Fire Extinguisher Photo</label>
                                <img src="{{$hostel->FireExtinguishersPath}}" alt="" style="width: 100%;" id="hostelPhotoPath"
                                    name="hostelPhotoPath" onclick="myfunction('third')">
                                <br>
                                <label for="">CCTV Camera Photo</label>
                                <img src="{{$hostel->CCTVCameraPath}}" alt="" style="width: 100%;" id="OwnerBookPath"
                                    name="OwnerBookPath" onclick="myfunction('forth')">
                                <br>
                                <label for="">Name Plate With Mobile Document Photo</label>
                                <img src="{{$hostel->NamePlatePath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath"
                                    name="GSTNoPhotoPath" onclick="myfunction('fifth')">
                                    <br>
                                    <label for="">Entry Exit Document Photo</label>
                                <img src="{{$hostel->EntryExitPath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath"
                                name="GSTNoPhotoPath" onclick="myfunction('sixth')">
                                <br>
                                <label for="">Building Plan Document Photo</label>
                                <img src="{{$hostel->BuildingPlanPath}}" alt="" style="width: 100%;" id="DrivingLicensePath"
                                    name="DrivingLicensePath" onclick="myfunction('seventh')">
                                <br>
                                <label for="">Solid Waste Usage Document Photo</label>
                                <img src="{{$hostel->SolidWastePath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath"
                                    name="GSTNoPhotoPath" onclick="myfunction('eighth')">
                                    <br>
                                    <label for="">Holding Tax Document Photo</label>
                                <img src="{{$hostel->HoldingTaxReceiptPath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath"
                                name="GSTNoPhotoPath" onclick="myfunction('ninth')">
                            </div>
                        </div>
                        <!-- photos -->
                        <!-- preview -->
                        <div class="col-md-9">
                            <div class="card-header card-bg mb-8">
                                <div class="card-title my-card-title">Preview</div>
                            </div>
                            <a href="{{$hostel->HostelFrontagePath}}" data-toggle="lightbox">
                                <img src="{{$hostel->HostelFrontagePath}}" alt="" id="first" href="#img1" style="width: 100%;">
                            </a>

                            <a href="{{$hostel->AadharNoPath}}" data-toggle="lightbox">
                                <img src="{{$hostel->AadharNoPath}}" alt="" style="width:100%;" id="second">
                            </a>
                            <a href="{{$hostel->FireExtinguishersPath}}" data-toggle="lightbox">
                                <img src="{{$hostel->FireExtinguishersPath}}" alt="" style="width: 100%;" id="third">
                            </a>

                            <a href="{{$hostel->CCTVCameraPath}}" data-toggle="lightbox">
                                <img src="{{$hostel->CCTVCameraPath}}" alt="" style="width: 100%;" id="forth">
                            </a>

                            <a href="{{$hostel->NamePlatePath}}" data-toggle="lightbox">
                                <img src="{{$hostel->NamePlatePath}}" alt="" style="width: 100%;" id="fifth">
                            </a>

                            <a href="{{$hostel->EntryExitPath}}" data-toggle="lightbox">
                                <img src="{{$hostel->EntryExitPath}}" alt="" style="width: 100%;" id="sixth">
                            </a>

                            <a href="{{$hostel->BuildingPlanPath}}" data-toggle="lightbox">
                                <img src="{{$hostel->BuildingPlanPath}}" alt="" style="width: 100%;" id="seventh">
                            </a>
                            <a href="{{$hostel->SolidWastePath}}" data-toggle="lightbox">
                                <img src="{{$hostel->SolidWastePath}}" alt="" style="width: 100%;" id="eighth">
                            </a>
                            <a href="{{$hostel->HoldingTaxReceiptPath}}" data-toggle="lightbox">
                                <img src="{{$hostel->HoldingTaxReceiptPath}}" alt="" style="width: 100%;" id="ninth">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"
    integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    $(document).ready(function () {
        $('#datatable').DataTable();
        displayNone();
        disableInputs();
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
    }

    function myfunction(id) {
        displayNone();
        document.getElementById(id).style.display = 'block';
    }

    function inputTools(){
        window.open('https://www.google.com/inputtools/try/','_blank');
    }

</script>
@endsection
