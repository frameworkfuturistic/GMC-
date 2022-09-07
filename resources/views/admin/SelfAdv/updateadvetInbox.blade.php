@extends('admin.app')

@section('heading')
Inbox Self Advertisement
@endsection

@section('active')
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
                                <div class="card-title my-card-title">SELF ADVERTISEMENT REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <form action="{{url('rnc/updateSelfAdvet/'.$SelfAds->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <input type="hidden" value="{{$SelfAds->id}}">
                                            <tr>
                                                <td class="spin-label">License Year <span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="spin-valuearea form-control" id="LicenseYear" name="LicenseYear">
                                                        <option value="{{$SelfAds->LicenseYear}}" selected>
                                                            {{$SelfAds->LicenseYear}}
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
                                                <td class="spin-label">Applicant<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="spin-valuearea form-control text-box single-line" id="Applicant" name="Applicant" type="text" value="{{$SelfAds->Applicant}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Father<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="spin-valuearea form-control text-box single-line" value="{{$SelfAds->Father}}" id="Father" name="Father">
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="Father" data-valmsg-replace="true"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">E-mail<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="spin-valuearea form-control text-box single-line" id="email" name="Email" type="Email" value="{{$SelfAds->Email}}">
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Residence Address<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="spin-valuearea form-control text-box single-line" id="ResidenceAddress" name="ResidenceAddress" type="text" value="{{$SelfAds->ResidenceAddress}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="spin-valuearea form-control" id="WardNo" name="WardNo">
                                                        <option value="{{$SelfAds->WardNo}}">{{$SelfAds->WardNo}}
                                                        </option>
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
                                                    <input class="spin-valuearea form-control text-box single-line" id="PermanentAddress" name="PermanentAddress" type="text" value="{{$SelfAds->PermanentAddress}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="spin-valuearea form-control required" id="WardNo1" name="WardNo1">
                                                        <option value="{{$SelfAds->WardNo}}">{{$SelfAds->WardNo1}}
                                                        </option>
                                                        @foreach($wards as $ward)
                                                        <option value="{{$ward->StringParameter}}">
                                                            {{$ward->StringParameter}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Mobile<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="spin-valuearea form-control text-box single-line" id="MobileNo" name="MobileNo" type="text" value="{{$SelfAds->MobileNo}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Aadhar No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="spin-valuearea form-control text-box single-line" id="AadharNo" name="AadharNo" type="text" value="{{$SelfAds->AadharNo}}">
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
                                <div class="card-title my-card-title">SELF ADVERTISEMENT REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="spin-label">Entity Name <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" value="{{$SelfAds->EntityName}}" id="Entityname" name="EntityName">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Entity Address <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" value="{{$SelfAds->EntityAddress}}" id="EntityAddress" name="EntityAddress">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Ward No<span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select class="spin-valuearea form-control" id="WardNo" name="WardNo">
                                                    <option value="{{$SelfAds->WardNo}}">{{$SelfAds->WardNo}}</option>
                                                    @foreach($wards as $ward)
                                                    <option value="{{$ward->StringParameter}}">
                                                        {{$ward->StringParameter}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Installation Location<span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select class="spin-valuearea form-control" id="InstallLocation" name="InstallLocation">
                                                    <option value="{{$SelfAds->InstallLocation}}">
                                                        {{$SelfAds->InstallLocation}}
                                                    </option>
                                                    @foreach($locations as $location)
                                                    <option value="{{$location->StringParameter}}">
                                                        {{$location->StringParameter}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Brand Display Name <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" value="{{$SelfAds->BrandDisplay}}" id="BrandDisplay" name="BrandDisplay">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Holding No <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" value="{{$SelfAds->HoldingNo}}" id="HoldingNo" name="HoldingNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Trade License No <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" value="{{$SelfAds->TradeLicense}}" id="TradeLicense" name="TradeLicense">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">GST No. <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" value="{{$SelfAds->GSTNo}}" id="GSTNo" name="GSTNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Display Type <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select class="spin-valuearea form-control" id="DisplayType" name="DisplayType">
                                                    <option value="{{$SelfAds->DisplayType}}">{{$SelfAds->DisplayType}}
                                                    </option>
                                                    @foreach($DisplayTypes as $DisplayType)
                                                    <option value="{{$DisplayType->StringParameter}}">
                                                        {{$DisplayType->StringParameter}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Display Area<span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" value="{{$SelfAds->DisplayArea}}" id="DisplayArea" name="DisplayArea">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Longitude<span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" value="{{$SelfAds->Longitude}}" id="Longitude" name="Longitude">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Latitude<span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" value="{{$SelfAds->Latitude}}" id="Latitude" name="Latitude">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Amount<span class="spin-separator spin-star">*</span>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control" id="amount" name="amount" value="{{$SelfAds->Amount}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">GST<span class="spin-separator spin-star">*</span>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control" id="GST" name="GST" value="{{$SelfAds->GST}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Net Amount<span class="spin-separator spin-star">*</span>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control" id="total" name="total" value="{{$SelfAds->NetAmount}}">
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
                                                    Aadhar Document</span>
                                                <input type="file" id="AadharPath" name="AadharPath" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Municipal Trade License Document</span>
                                                <input name="TradeLicensePath" id="TradeLicensePath" type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Photograph with GPS</span>
                                                <input name="GPSPhotoPath" id="GPSPhotoPath" type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Holding No</span>
                                                <input id="HoldingNoPath" name="HoldingNoPath" type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;">
                                                <span>Upload GST Document Photo</span><input id="GSTPath" name="GSTPath" type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;">
                                                <span>Upload Proceeding1 Photo</span>
                                                <input id="Proceeding1Photo" name="Proceeding1Photo" type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Proceeding2 Photo</span><input id="Proceeding2Photo" name="Proceeding2Photo" type="file" accept="application/pdf,image/*" style="width:100%;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Proceeding3 Photo</span><input id="Proceeding3Photo" name="Proceeding3Photo" type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Extra Document1</span><input id="ExtraDoc1" name="ExtraDoc1" type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Extra Document2</span><input id="ExtraDoc2" name="ExtraDoc2" type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr colspan="4" class="spin-label">
                                        <tr>
                                            <td>
                                                <!-- updation for initiator -->
                                                @if($SelfAds->CurrentUser==$workflowInitiator->Initiator)
                                                <button class="btn btn-success"><i class="icon-file-archive-o"></i>
                                                    Submit</button>
                                                @endif
                                                <!-- updation for initiator -->
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
                            <form action="{{url('rnc/inboxComment/'.$SelfAds->id)}}" method="POST" id="commentTo">
                                @method('POST')
                                @csrf
                                <div class="form-group mb-top">
                                    <input type="hidden" value="{{$SelfAds->RenewalID}}" id="RenewalID" name="RenewalID">
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
                            <form class="form mb-top" method="POST" action="{{url('rnc/InboxWorkflow/'.$SelfAds->id)}}" id="forwardTo1">
                                @method('PUT')
                                @csrf
                                <div class="form-body">
                                    <input type="hidden" value="{{$SelfAds->id}}" id="id" name="id">

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
                                                <button type="submit" class="btn btn-primary" id="forwardTo">
                                                    <i class="icon-check2"></i> Forward
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="complaintinput2">Application Status</label>
                                        <input type="text" class="form-control" id="AppStatus" name="AppStatus">
                                    </div>

                                    @if($SelfAds->CurrentUser==$workflowInitiator->Finisher)
                                    <div class="form-group">
                                        <label for="complaintinput2">Update Status</label>
                                        <select class="form-control" id="UpdateStatus" name="UpdateStatus">
                                            @if($SelfAds->Approved=='-1')
                                            <option value="Approved" selected>Approve</option>
                                            @endif
                                            @if($SelfAds->Rejected=='-1')
                                            <option value="Rejected" selected>Reject</option>
                                            @endif
                                            @if($SelfAds->Pending=='-1')
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
                                <label for="">Aadhar no Document Photo</label>
                                <img src="{{$SelfAds->AadharPath}}" alt="" style="width:100%;" id="AadharPath" name="AadharPath" onclick="myfunction('first')">
                                <br>
                                <label for="">Trade License Document Photo</label>
                                <img src="{{$SelfAds->TradeLicensePath}}" alt="" style="width:100%;" id="TradeLicensePath" name="TradeLicensePath" onclick="myfunction('second')">
                                <br>
                                <label for="">GPS Photo Path Document Photo</label>
                                <img src="{{$SelfAds->GPSPhotoPath}}" alt="" style="width: 100%;" id="GPSPhotoPath" name="GPSPhotoPath" onclick="myfunction('third')">
                                <br>
                                <label for="">Holding No Path Document Photo</label>
                                <img src="{{$SelfAds->HoldingNoPath}}" alt="" style="width: 100%;" id="HoldingNoPath" name="HoldingNoPath" onclick="myfunction('forth')">
                                <br>
                                <label for="">GST Path Document Photo</label>
                                <img src="{{$SelfAds->GSTPath}}" alt="" style="width: 100%;" id="GSTPath" name="GSTPath" onclick="myfunction('fifth')">
                                <br>
                                <label for="">Proceeding1Photo</label>
                                <img src="{{$SelfAds->Proceeding1Photo}}" alt="" style="width: 100%;" id="Proceeding1Photo" name="Proceeding1Photo" onclick="myfunction('sixth')">
                                <br>
                                <label for="">Proceeding2Photo</label>
                                <img src="{{$SelfAds->Proceeding2Photo}}" alt="" style="width: 100%;" id="Proceeding2Photo" name="Proceeding1Photo" onclick="myfunction('seventh')">
                                <br>
                                <label for="">Proceeding3Photo</label>
                                <img src="{{$SelfAds->Proceeding3Photo}}" alt="" style="width: 100%;" id="Proceeding3Photo" name="Proceeding1Photo" onclick="myfunction('eighth')">
                                <br>
                                <label for="">extraDoc1</label>
                                <img src="{{$SelfAds->extraDoc1}}" alt="" style="width: 100%;" id="extraDoc1" name="extraDoc1" onclick="myfunction('ninth')">
                                <br>
                                <label for="">extraDoc2</label>
                                <img src="{{$SelfAds->extraDoc2}}" alt="" style="width: 100%;" id="extraDoc2" name="extraDoc2" onclick="myfunction('tenth')">
                            </div>
                        </div>
                        <!-- photos -->
                        <!-- preview -->
                        <div class="col-md-9">
                            <div class="card-header card-bg mb-8">
                                <div class="card-title my-card-title">Preview</div>
                            </div>
                            <a href="{{$SelfAds->AadharPath}}" data-toggle="lightbox">
                                <img src="{{$SelfAds->AadharPath}}" alt="" id="first" href="#img1" style="width: 100%;">
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
<!-- update -->
<!-- tab-content start here -->
@endsection

@section('pagescript')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    $(document).ready(function() {
        $('#datatable').DataTable();
        displayNone();
        $("#advetInboxActive").addClass('active');
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
                    $('#loaderbody').hide();
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