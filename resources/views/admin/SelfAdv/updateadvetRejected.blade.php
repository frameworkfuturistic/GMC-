@extends('admin.app')

@section('heading')
Rejected Self Advertisement
@endsection 

@section('rejectedActive')
class="active"
@endsection

@section('app-content')
<!-- tabs -->
<ul class="nav nav-pills nav-justified mb-8">
    <li class="nav-item col-md-4">
        <a class="nav-link active" id="link-pill" data-toggle="pill" href="#link" aria-expanded="false">Details Panel</a>
    </li>
</ul>
<!-- tabs -->
<!-- tab-content start here -->
<div class="tab-content px-1 pt-1">
    <!-- Update Panel -->
        <div class="card">
            <div class="card-body">
                <!-- tabs -->
                <div class="card-block">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1"
                                href="#tab1" aria-expanded="true">Application Details</a>
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
                        <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true"
                            aria-labelledby="base-tab1">
                            <div class="row">
                                <!-- data form -->
                                <div class="col-md-9">
                                    <div class="card-header card-bg">
                                        <div class="card-title my-card-title">Details Of Application</div>
                                    </div>
                                    <!-- form -->
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-bordered">
                                            <tbody>
                                                <input type="hidden" value="{{$SelfAds->id}}">
                                                <tr>
                                                    <td class="spin-label">License Year <span
                                                            class="spin-separator spin-star">*</span></td>
                                                    <td class="spin-separator">:</td>
                                                    <td>
                                                        <select class="spin-valuearea form-control" id="LicenseYear"
                                                            name="LicenseYear">
                                                            <option value="{{$SelfAds->LicenseYear}}" selected>
                                                                {{$SelfAds->LicenseYear}}</option>
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
                                                        <input class="spin-valuearea form-control text-box single-line"
                                                            id="Applicant" name="Applicant" type="text"
                                                            value="{{$SelfAds->Applicant}}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="spin-label">Father<span
                                                            class="spin-separator spin-star">*</span></td>
                                                    <td class="spin-separator">:</td>

                                                    <td>
                                                        <input class="spin-valuearea form-control text-box single-line"
                                                            value="{{$SelfAds->Father}}" id="Father" name="Father">
                                                        <span class="field-validation-valid text-danger"
                                                            data-valmsg-for="Father" data-valmsg-replace="true"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="spin-label">E-mail<span
                                                            class="spin-separator spin-star">*</span></td>
                                                    <td class="spin-separator">:</td>

                                                    <td>
                                                        <input class="spin-valuearea form-control text-box single-line"
                                                            id="email" name="Email" type="Email"
                                                            value="{{$SelfAds->Email}}">
                                                        <span class="field-validation-valid text-danger"
                                                            data-valmsg-for="Email" data-valmsg-replace="true"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="spin-label">Residence Address<span
                                                            class="spin-separator spin-star">*</span></td>
                                                    <td class="spin-separator">:</td>

                                                    <td>
                                                        <input class="spin-valuearea form-control text-box single-line"
                                                            id="ResidenceAddress" name="ResidenceAddress" type="text"
                                                            value="{{$SelfAds->ResidenceAddress}}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="spin-label">Ward No<span
                                                            class="spin-separator spin-star">*</span></td>
                                                    <td class="spin-separator">:</td>
                                                    <td>
                                                        <select class="spin-valuearea form-control" id="WardNo"
                                                            name="WardNo">
                                                            <option value="{{$SelfAds->WardNo}}">{{$SelfAds->WardNo}}
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="spin-label">Permanent Address<span
                                                            class="spin-separator spin-star">*</span></td>
                                                    <td class="spin-separator">:</td>
                                                    <td>
                                                        <input class="spin-valuearea form-control text-box single-line"
                                                            id="PermanentAddress" name="PermanentAddress" type="text"
                                                            value="{{$SelfAds->PermanentAddress}}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="spin-label">Ward No<span
                                                            class="spin-separator spin-star">*</span></td>
                                                    <td class="spin-separator">:</td>
                                                    <td>
                                                        <select class="spin-valuearea form-control required" id="WardNo1"
                                                            name="WardNo1">
                                                            <option value="{{$SelfAds->WardNo}}">{{$SelfAds->WardNo1}}
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="spin-label">Mobile<span
                                                            class="spin-separator spin-star">*</span></td>
                                                    <td class="spin-separator">:</td>

                                                    <td>
                                                        <input class="spin-valuearea form-control text-box single-line"
                                                            id="MobileNo" name="MobileNo" type="text"
                                                            value="{{$SelfAds->MobileNo}}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="spin-label">Aadhar No<span
                                                            class="spin-separator spin-star">*</span></td>
                                                    <td class="spin-separator">:</td>
                                                    <td>
                                                        <input class="spin-valuearea form-control text-box single-line"
                                                            id="AadharNo" name="AadharNo" type="text"
                                                            value="{{$SelfAds->AadharNo}}">
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
                                <div class="col-md-12">
                                    <div class="card-header card-bg">
                                        <div class="card-title my-card-title">Shop/Establishment Details of Applicant</div>
                                    </div>
                                    <!-- form -->
                                    <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">Entity Name <span
                                                        class="spin-separator spin-star">*</span></td>

                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="{{$SelfAds->EntityName}}" id="Entityname"
                                                        name="EntityName">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Entity Address <span
                                                        class="spin-separator spin-star">*</span></td>

                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="{{$SelfAds->EntityAddress}}" id="EntityAddress"
                                                        name="EntityAddress">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span
                                                        class="spin-separator spin-star">*</span></td>

                                                <td>
                                                    <select class="spin-valuearea form-control" id="WardNo"
                                                        name="WardNo">
                                                        <option value="{{$SelfAds->WardNo}}">{{$SelfAds->WardNo}}
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Installation Location<span
                                                        class="spin-separator spin-star">*</span></td>

                                                <td>
                                                    <select class="spin-valuearea form-control"
                                                        id="InstallationLocation" name="InstallationLocation">
                                                        <option value="{{$SelfAds->InstallLocation}}">
                                                            {{$SelfAds->InstallLocation}}</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Brand Display Name <span
                                                        class="spin-separator spin-star">*</span></td>

                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="{{$SelfAds->BrandDisplay}}" id="BrandDisplay"
                                                        name="BrandDisplay">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Holding No <span
                                                        class="spin-separator spin-star">*</span></td>

                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="{{$SelfAds->HoldingNo}}" id="HoldingNo" name="HoldingNo">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Trade License No <span
                                                        class="spin-separator spin-star">*</span></td>

                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="{{$SelfAds->TradeLicense}}" id="TradeLicense"
                                                        name="TradeLicense">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">GST No. <span
                                                        class="spin-separator spin-star">*</span></td>

                                                <td>
                                                    <input type="text" class="form-control" value="{{$SelfAds->GSTNo}}"
                                                        id="GSTNo" name="GSTNo">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Display Type <span
                                                        class="spin-separator spin-star">*</span></td>

                                                <td>
                                                    <select class="spin-valuearea form-control" id="DisplayType"
                                                        name="DisplayType">
                                                        <option value="{{$SelfAds->DisplayType}}">
                                                            {{$SelfAds->DisplayType}}
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Display Area<span
                                                        class="spin-separator spin-star">*</span></td>

                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="{{$SelfAds->DisplayArea}}" id="DisplayArea"
                                                        name="DisplayArea">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Longitude<span
                                                        class="spin-separator spin-star">*</span></td>

                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="{{$SelfAds->Longitude}}" id="Longitude" name="Longitude">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Latitude<span
                                                        class="spin-separator spin-star">*</span></td>

                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="{{$SelfAds->Latitude}}" id="Latitude" name="Latitude">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Zone<span
                                                        class="spin-separator spin-star">*</span>
                                                </td>

                                                <td>
                                                    <input type="text" class="form-control" id="zone" name="zone">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Amount<span
                                                        class="spin-separator spin-star">*</span>
                                                </td>

                                                <td>
                                                    <input type="text" class="form-control" id="amount" name="amount">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">GST<span
                                                        class="spin-separator spin-star">*</span>
                                                </td>

                                                <td>
                                                    <input type="text" class="form-control" id="GST" name="GST">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Total<span
                                                        class="spin-separator spin-star">*</span>
                                                </td>

                                                <td>
                                                    <input type="text" class="form-control" id="total" name="total">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                    <!-- form -->
                                </div>
                                <!-- Shop/Establishment Details of Applicant -->
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
                                    <label for="">Aadhar no Document Photo</label>
                                    <img src="{{$SelfAds->AadharPath}}" alt="" style="width:100%;" id="AadharPath"
                                        name="AadharPath" onclick="myfunction('first')">
                                    <br>
                                    <label for="">Trade License Document Photo</label>
                                    <img src="{{$SelfAds->TradeLicensePath}}" alt="" style="width:100%;"
                                        id="TradeLicensePath" name="TradeLicensePath" onclick="myfunction('second')">
                                    <br>
                                    <label for="">GPS Photo Path Document Photo</label>
                                    <img src="{{$SelfAds->GPSPhotoPath}}" alt="" style="width: 100%;" id="GPSPhotoPath"
                                        name="GPSPhotoPath" onclick="myfunction('third')">
                                    <br>
                                    <label for="">Holding No Path Document Photo</label>
                                    <img src="{{$SelfAds->HoldingNoPath}}" alt="" style="width: 100%;"
                                        id="HoldingNoPath" name="HoldingNoPath" onclick="myfunction('forth')">
                                    <br>
                                    <label for="">GST Path Document Photo</label>
                                    <img src="{{$SelfAds->GSTPath}}" alt="" style="width: 100%;" id="GSTPath"
                                        name="GSTPath" onclick="myfunction('fifth')">
                                    <br>
                                    <label for="">Proceeding1Photo</label>
                                    <img src="{{$SelfAds->Proceeding1Photo}}" alt="" style="width: 100%;"
                                        id="Proceeding1Photo" name="Proceeding1Photo" onclick="myfunction('sixth')">
                                    <br>
                                    <label for="">Proceeding2Photo</label>
                                    <img src="{{$SelfAds->Proceeding2Photo}}" alt="" style="width: 100%;"
                                        id="Proceeding2Photo" name="Proceeding1Photo" onclick="myfunction('seventh')">
                                    <br>
                                    <label for="">Proceeding3Photo</label>
                                    <img src="{{$SelfAds->Proceeding3Photo}}" alt="" style="width: 100%;"
                                        id="Proceeding3Photo" name="Proceeding1Photo" onclick="myfunction('eighth')">
                                    <br>
                                    <label for="">extraDoc1</label>
                                    <img src="{{$SelfAds->extraDoc1}}" alt="" style="width: 100%;" id="extraDoc1"
                                        name="extraDoc1" onclick="myfunction('ninth')">
                                    <br>
                                    <label for="">extraDoc2</label>
                                    <img src="{{$SelfAds->extraDoc2}}" alt="" style="width: 100%;" id="extraDoc2"
                                        name="extraDoc2" onclick="myfunction('tenth')">
                                </div>
                            </div>
                            <!-- photos -->
                            <!-- preview -->
                            <div class="col-md-9">
                                <div class="card-header card-bg mb-8">
                                    <div class="card-title my-card-title">Preview</div>
                                </div>
                                <a href="{{$SelfAds->AadharPath}}" data-toggle="lightbox">
                                    <img src="{{$SelfAds->AadharPath}}" alt="" id="first" href="#img1"
                                        style="width: 100%;">
                                </a>

                                <a href="{{$SelfAds->TradeLicensePath}}" data-toggle="lightbox">
                                    <img src="{{$SelfAds->TradeLicensePath}}" alt="" style="width:100%;" id="second">
                                </a>
                                <a href="{{$SelfAds->GPSPhotoPath}}" data-toggle="lightbox">
                                    <img src="{{$SelfAds->GPSPhotoPath}}" alt="" style="width: 100%;" id="third">
                                </a>

                                <a href="{{$SelfAds->HoldingNoPath}}" data-toggle="lightbox">
                                    <img src="{{$SelfAds->HoldingNoPath}}" alt="" style="width: 100%;" id="forth">
                                </a>

                                <a href="{{$SelfAds->GSTPath}}" data-toggle="lightbox">
                                    <img src="{{$SelfAds->GSTPath}}" alt="" style="width: 100%;" id="fifth">
                                </a>

                                <a href="{{$SelfAds->Proceeding1Photo}}" data-toggle="lightbox">
                                    <img src="{{$SelfAds->Proceeding1Photo}}" alt="" style="width: 100%;" id="sixth">
                                </a>

                                <a href="{{$SelfAds->Proceeding2Photo}}" data-toggle="lightbox">
                                    <img src="{{$SelfAds->Proceeding2Photo}}" alt="" style="width: 100%;" id="seventh">
                                </a>

                                <a href="{{$SelfAds->Proceeding3Photo}}" data-toggle="lightbox">
                                    <img src="{{$SelfAds->Proceeding3Photo}}" alt="" style="width: 100%;" id="eighth">
                                </a>

                                <a href="{{$SelfAds->extraDoc1}}" data-toggle="lightbox">
                                    <img src="{{$SelfAds->extraDoc1}}" alt="" style="width: 100%;" id="ninth">
                                </a>

                                <a href="{{$SelfAds->extraDoc2}}" data-toggle="lightbox">
                                    <img src="{{$SelfAds->extraDoc2}}" alt="" style="width: 100%;" id="tenth">
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
    <!-- Update Panel -->
</div>
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

    $(document).ready(function() {
        $('#datatable').DataTable();
        disableInputs();
        displayNone();
        $("#advetRejectedActive").addClass('active');
    } );

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
</script>
@endsection
