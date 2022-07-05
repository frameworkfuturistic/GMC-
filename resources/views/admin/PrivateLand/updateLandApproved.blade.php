@extends('admin.app')

@section('heading')
Approved Private Land
@endsection

@section('LandApprovedActive')
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
                                <div class="card-title my-card-title">PRIVART LAND REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <form action="{{url('rnc/updatePrivateLand/'.$land->id)}}" method="POST"
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
                                                    <input class="form-control" id="applicant" name="applicant"
                                                        value="{{$land->applicant}}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Father<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input type="text" class="form-control" id="father" name="father"
                                                        value="{{$land->father}}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">E-mail<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input type="text" class="form-control" id="email" name="email"
                                                        value="{{$land->email}}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Residence Address<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="ResidenceAddress"
                                                        name="ResidenceAddress" type="text"
                                                        value="{{$land->ResidenceAddress}}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo" name="WardNo" required>
                                                        <option value="{{$land->WardNo}}">{{$land->WardNo}}</option>
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
                                                        value="{{$land->PermanentAddress}}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo1" name="WardNo1"
                                                        value="{{$land->WardNo1}}" required>
                                                        <option value="{{$land->WardNo1}}">{{$land->WardNo1}}</option>
                                                        <option value="">Select</option>
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
                                                        type="text" value="{{$land->MobileNo}}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Aadhar No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="AadharNo" name="AadharNo"
                                                        type="text" value="{{$land->AadharNo}}" required>
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
                                <div class="card-title my-card-title">PRIVATE LAND REGISTRATION
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
                                                    name="LicenseFrom" value="{{$land->LicenseFrom}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">License To<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td>
                                                <input type="date" class="form-control" id="LicenseTo" name="LicenseTo"
                                                    value="{{$land->LicenseTo}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Holding No<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td>
                                                <input type="text" class="form-control" id="HoldingNo" name="HoldingNo"
                                                    value="{{$land->HoldingNo}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Trade License No <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="TradeLicenseNo"
                                                    name="TradeLicenseNo" value="{{$land->TradeLicenseNo}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">GST No <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="GSTNo" name="GSTNo"
                                                    value="{{$land->GSTNo}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Entity Name <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="EntityName"
                                                    name="EntityName" value="{{$land->EntityName}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Entity Address <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="EntityAddress"
                                                    name="EntityAddress" value="{{$land->EntityAddress}}" required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="spin-label">Brand Display Name <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="BrandDisplayName"
                                                    name="BrandDisplayName" value="{{$land->BrandDisplayName}}"
                                                    required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="spin-label">Brand Display Address <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="BrandDisplayAddress"
                                                    name="BrandDisplayAddress" value="{{$land->BrandDisplayAddress}}"
                                                    required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="spin-label">Entity Ward No <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select class="form-control" id="EntityWardNo" name="EntityWardNo"
                                                    value="{{$land->EntityWardNo}}">
                                                    <option value="">Select One</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Total Display Area <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="DisplayArea"
                                                    name="DisplayArea" value="{{$land->DisplayArea}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Display Type <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select name="DisplayType" id="DisplayType" class="form-control"
                                                    required>
                                                    <option value="{{$land->DisplayType}}">{{$land->DisplayType}}
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
                                            <td class="spin-label">No of Hoardings <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="NoOfHoarding"
                                                    name="NoOfHoarding" value="{{$land->NoOfHoarding}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Longitude <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="Longitude" name="Longitude"
                                                    value="{{$land->Longitude}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Latitude <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="Latitude" name="Latitude"
                                                    value="{{$land->Latitude}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Installation Location <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select class="form-control" id="InstallationLocation"
                                                    name="InstallationLocation">
                                                    <option value="{{$land->InstallationLocation}}">
                                                        {{$land->InstallationLocation}}</option>
                                                    <option value="">Select One</option>
                                                    @foreach($locations as $location)
                                                    <option value="{{$location->StringParameter}}">
                                                        {{$location->StringParameter}}</option>
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
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>
                                                    Upload Photograph with GPS Mapped Camera
                                                </span><input name="GPSPhotoPath" id="GPSPhotoPath" type="file"
                                                    accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>
                                                    Upload Holding No. Photograph
                                                </span><input id="HoldingNoPath" name="HoldingNoPath" type="file"
                                                    accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    GST No. Photograph</span><input id="GSTNoPath" name="GSTNoPath"
                                                    type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>
                                                    Upload Brand Display Permission
                                                </span><input id="BrandDisplayPath" name="BrandDisplayPath" type="file"
                                                    accept="application/pdf,image/*" style="width:100%;">
                                            </td>
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
                            <form action="{{url('rnc/LandInboxComment/'.$land->id)}}" method="POST" id="commentTo">
                                @method('POST')
                                @csrf
                                <div class="form-group mb-top">
                                    <input type="hidden" value="{{$land->RenewalID}}" id="RenewalID" name="RenewalID">
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
                                <img src="{{$land->AadharPath}}" alt="" style="width:100%;" id="AadharPath"
                                    name="AadharPath" onclick="myfunction('first')">
                                <br>
                                <label for="">Trade License Document Photo</label>
                                <img src="{{$land->TradeLicensePath}}" alt="" style="width:100%;" id="TradeLicensePath"
                                    name="TradeLicensePath" onclick="myfunction('second')">
                                <br>
                                <label for="">GPS Photo Path Document Photo</label>
                                <img src="{{$land->GPSPhotoPath}}" alt="" style="width: 100%;" id="GPSPhotoPath"
                                    name="GPSPhotoPath" onclick="myfunction('third')">
                                <br>
                                <label for="">Holding No Path Document Photo</label>
                                <img src="{{$land->HoldingNoPath}}" alt="" style="width: 100%;" id="HoldingNoPath"
                                    name="HoldingNoPath" onclick="myfunction('forth')">
                                <br>
                            </div>
                        </div>
                        <!-- photos -->
                        <!-- preview -->
                        <div class="col-md-9">
                            <div class="card-header card-bg mb-8">
                                <div class="card-title my-card-title">Preview</div>
                            </div>
                            <a href="{{$land->AadharPath}}" data-toggle="lightbox">
                                <img src="{{$land->AadharPath}}" alt="" id="first" href="#img1" style="width: 100%;">
                            </a>

                            <a href="{{$land->TradeLicensePath}}" data-toggle="lightbox">
                                <img src="{{$land->TradeLicensePath}}" alt="" style="width:100%;" id="second">
                            </a>
                            <a href="{{$land->GPSPhotoPath}}" data-toggle="lightbox">
                                <img src="{{$land->GPSPhotoPath}}" alt="" style="width: 100%;" id="third">
                            </a>

                            <a href="{{$land->HoldingNoPath}}" data-toggle="lightbox">
                                <img src="{{$land->HoldingNoPath}}" alt="" style="width: 100%;" id="forth">
                            </a>

                            <a href="{{$land->GSTPath}}" data-toggle="lightbox">
                                <img src="{{$land->GSTPath}}" alt="" style="width: 100%;" id="fifth">
                            </a>

                            <a href="{{$land->Proceeding1Photo}}" data-toggle="lightbox">
                                <img src="{{$land->Proceeding1Photo}}" alt="" style="width: 100%;" id="sixth">
                            </a>

                            <a href="{{$land->Proceeding2Photo}}" data-toggle="lightbox">
                                <img src="{{$land->Proceeding2Photo}}" alt="" style="width: 100%;" id="seventh">
                            </a>

                            <a href="{{$land->Proceeding3Photo}}" data-toggle="lightbox">
                                <img src="{{$land->Proceeding3Photo}}" alt="" style="width: 100%;" id="eighth">
                            </a>

                            <a href="{{$land->extraDoc1}}" data-toggle="lightbox">
                                <img src="{{$land->extraDoc1}}" alt="" style="width: 100%;" id="ninth">
                            </a>

                            <a href="{{$land->extraDoc2}}" data-toggle="lightbox">
                                <img src="{{$land->extraDoc2}}" alt="" style="width: 100%;" id="tenth">
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
        $("#landApprovedActive").addClass('active');
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
    }

    function myfunction(id) {
        displayNone();
        document.getElementById(id).style.display = 'block';
    }

    function inputTools() {
        window.open('https://www.google.com/inputtools/try/', '_blank');
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
