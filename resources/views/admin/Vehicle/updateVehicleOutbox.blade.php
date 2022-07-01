@extends('admin.app')

@section('heading')
Outbox Vehicle
@endsection

@section('VehicleOutboxActive')
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
                                <div class="card-title my-card-title">MOVABLE VEHICLE REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <form action="{{url('rnc/updateVehicle/'.$vehicle->id)}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">Applicant<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="hidden" value="{{$vehicle->id}}" id="id" name="id">
                                                    <input type="text" class="form-control" id="applicant"
                                                        name="applicant" required="" value="{{$vehicle->applicant}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Father<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input type="text" class="form-control" id="father" name="father"
                                                        required="" value="{{$vehicle->father}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">E-mail<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        required="" value="{{$vehicle->email}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Residence Address<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input type="text" class="form-control" id="ResidenceAddress"
                                                        name="ResidenceAddress" required=""
                                                        value="{{$vehicle->ResidenceAddress}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo" name="WardNo" required>
                                                        <option value="{{$vehicle->WardNo}}">{{$vehicle->WardNo}}
                                                        </option>
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
                                                    <input type="text" class="form-control" id="PermanentAddress"
                                                        name="PermanentAddress" required=""
                                                        value="{{$vehicle->PermanentAddress}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo1" name="WardNo1"
                                                        required="">
                                                        <option value="{{$vehicle->WardNo}}">{{$vehicle->WardNo1}}
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
                                                <td class="spin-label">Mobile<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="MobileNo" name="MobileNo"
                                                        type="text" required="" value="{{$vehicle->MobileNo}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Aadhar No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="AadharNo" name="AadharNo"
                                                        type="text" value="{{$vehicle->AadharNo}}" required="">
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
                                <div class="card-title my-card-title">MOVABLE VEHICLE REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="spin-label">License From<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td>
                                                <input type="date" class="form-control" id="LicenseFrom"
                                                    name="LicenseFrom" required="" value="{{$vehicle->LicenseFrom}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">License To<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td>
                                                <input type="date" class="form-control" id="LicenseTo" name="LicenseTo"
                                                    required="" value="{{$vehicle->LicenseTo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Entity Name <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="EntityName"
                                                    name="EntityName" required="" value="{{$vehicle->EntityName}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Trade License No <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="TradeLicenseNo"
                                                    name="TradeLicenseNo" required=""
                                                    value="{{$vehicle->TradeLicenseNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">GST No <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="GSTNo" name="GSTNo"
                                                    required="" value="{{$vehicle->GSTNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Vehicle No <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="VehicleNo" name="VehicleNo"
                                                    required="" value="{{$vehicle->VehicleNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Vehicle Name <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="VehicleName"
                                                    name="VehicleName" required="" value="{{$vehicle->VehicleName}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Vehicle Type <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select name="VehicleType" id="VehicleType" class="form-control"
                                                    required="">
                                                    <option value="{{$vehicle->VehicleType}}">{{$vehicle->VehicleType}}
                                                    </option>
                                                    <option value="">Select One</option>
                                                    @foreach($vehicletypes as $vehicletype)
                                                    <option value="{{$vehicletype->StringParameter}}">
                                                        {{$vehicletype->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Brand Displayed in Vehicle <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="BrandDisplay"
                                                    name="BrandDisplay" required="" value="{{$vehicle->BrandDisplay}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Front Area(Sq ft) <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="number" class="form-control" id="FrontArea"
                                                    name="FrontArea" required="" value="{{$vehicle->FrontArea}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Rear Area(Sq ft) <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="number" class="form-control" id="RearArea" name="RearArea"
                                                    required="" value="{{$vehicle->RearArea}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Side 1 Area(Sq ft) <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="number" class="form-control" id="Side1Area"
                                                    name="Side1Area" required="" value="{{$vehicle->Side1Area}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Top Area(Sq ft) <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="number" class="form-control" id="TopArea" name="TopArea"
                                                    required="" value="{{$vehicle->TopArea}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Display Type <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select name="DisplayType" id="DisplayType" class="form-control"
                                                    required="">
                                                    <option value="{{$vehicle->DisplayType}}">{{$vehicle->DisplayType}}
                                                    </option>
                                                    <option value="">Select One</option>
                                                    @foreach($DisplayTypes as $DisplayType)
                                                    <option value="{{$DisplayType->StringParameter}}">
                                                        {{$DisplayType->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Amount<span class="spin-separator spin-star">*</span>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control" id="amount" name="amount" value="{{$vehicle->Amount}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">GST<span class="spin-separator spin-star">*</span>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control" id="GST" name="GST" value="{{$vehicle->GST}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Net Amount<span class="spin-separator spin-star">*</span>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control" id="total" name="total" value="{{$vehicle->NetAmount}}">
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
                                                    Aadhar Document</span><input type="file" id="AadharPath"
                                                    name="AadharPath" accept="application/pdf,image/*"
                                                    style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Municipal Trade License Document</span><input
                                                    name="TradeLicensePath" id="TradeLicensePath" type="file"
                                                    accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Vehicle
                                                    Photograph</span><input name="VehiclePhotoPath"
                                                    id="VehiclePhotoPath" type="file" accept="application/pdf,image/*"
                                                    style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Owner Book</span><input id="OwnerBookPath" name="OwnerBookPath"
                                                    type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;">
                                                <span>Upload Driving License</span><input id="DrivingLicensePath"
                                                    name="DrivingLicensePath" type="file"
                                                    accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;">
                                                <span>Upload Insurance Photo</span><input id="InsurancePhotoPath"
                                                    name="InsurancePhotoPath" type="file"
                                                    accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    GST No Photograph</span><input id="GSTNoPhotoPath"
                                                    name="GSTNoPhotoPath" type="file" accept="application/pdf,image/*"
                                                    style="width:100%;"></td>
                                        </tr>
                                        <tr colspan="4" class="spin-label">
                                            <td>
                                                <!-- UPDATION FOR INITIATOR -->
                                                @if(auth()->user()->user_type=='2')
                                                <button class="btn btn-success"><i class="icon-file-archive-o"></i>
                                                    Submit
                                                </button>
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
                            <form action="{{url('rnc/VehicleInboxComment/'.$vehicle->id)}}" method="POST"
                                id="commentTo">
                                @method('POST')
                                @csrf
                                <div class="form-group mb-top">
                                    <input type="hidden" value="{{$vehicle->RenewalID}}" id="RenewalID"
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
                            <div class="scroll">
                                <label for="">Aadhar no Document Photo</label>
                                <img src="{{$vehicle->AadharPath}}" alt="" style="width:100%;" id="AadharPath"
                                    name="AadharPath" onclick="myfunction('first')">
                                <br>
                                <label for="">Trade License Document Photo</label>
                                <img src="{{$vehicle->TradeLicensePath}}" alt="" style="width:100%;"
                                    id="TradeLicensePath" name="TradeLicensePath" onclick="myfunction('second')">
                                <br>
                                <label for="">Vehicle Document Photo</label>
                                <img src="{{$vehicle->VehiclePhotoPath}}" alt="" style="width: 100%;"
                                    id="VehiclePhotoPath" name="VehiclePhotoPath" onclick="myfunction('third')">
                                <br>
                                <label for="">Owner Book Document Photo</label>
                                <img src="{{$vehicle->OwnerBookPath}}" alt="" style="width: 100%;" id="OwnerBookPath"
                                    name="OwnerBookPath" onclick="myfunction('forth')">
                                <br>
                                <label for="">Driving License Document Photo</label>
                                <img src="{{$vehicle->DrivingLicensePath}}" alt="" style="width: 100%;"
                                    id="DrivingLicensePath" name="DrivingLicensePath" onclick="myfunction('fifth')">
                                <br>
                                <label for="">Insurance Document Photo</label>
                                <img src="{{$vehicle->InsurancePhotoPath}}" alt="" style="width: 100%;"
                                    id="InsurancePhotoPath" name="InsurancePhotoPath" onclick="myfunction('sixth')">
                                <br>
                                <label for="">GST No Document Photo</label>
                                <img src="{{$vehicle->GSTNoPhotoPath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath"
                                    name="GSTNoPhotoPath" onclick="myfunction('seventh')">
                            </div>
                        </div>
                        <!-- photos -->
                        <!-- preview -->
                        <div class="col-md-9">
                            <div class="card-header card-bg mb-8">
                                <div class="card-title my-card-title">Preview</div>
                            </div>
                            <a href="{{$vehicle->AadharPath}}" data-toggle="lightbox">
                                <img src="{{$vehicle->AadharPath}}" alt="" id="first" href="#img1" style="width: 100%;">
                            </a>

                            <a href="{{$vehicle->TradeLicensePath}}" data-toggle="lightbox">
                                <img src="{{$vehicle->TradeLicensePath}}" alt="" style="width:100%;" id="second">
                            </a>
                            <a href="{{$vehicle->VehiclePhotoPath}}" data-toggle="lightbox">
                                <img src="{{$vehicle->VehiclePhotoPath}}" alt="" style="width: 100%;" id="third">
                            </a>

                            <a href="{{$vehicle->OwnerBookPath}}" data-toggle="lightbox">
                                <img src="{{$vehicle->OwnerBookPath}}" alt="" style="width: 100%;" id="forth">
                            </a>

                            <a href="{{$vehicle->DrivingLicensePath}}" data-toggle="lightbox">
                                <img src="{{$vehicle->DrivingLicensePath}}" alt="" style="width: 100%;" id="fifth">
                            </a>

                            <a href="{{$vehicle->InsurancePhotoPath}}" data-toggle="lightbox">
                                <img src="{{$vehicle->InsurancePhotoPath}}" alt="" style="width: 100%;" id="sixth">
                            </a>

                            <a href="{{$vehicle->GSTNoPhotoPath}}" data-toggle="lightbox">
                                <img src="{{$vehicle->GSTNoPhotoPath}}" alt="" style="width: 100%;" id="seventh">
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
                    // alert("Data Successfully Added");
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
