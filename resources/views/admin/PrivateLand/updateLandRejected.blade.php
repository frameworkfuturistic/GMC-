@extends('admin.app')

@section('heading')
Rejected Private Land
@endsection

@section('LandRejectedActive')
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
                                <div class="card-title my-card-title">PRIVART LAND REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <form>
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">Applicant<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="applicant" name="applicant" value="{{$land->applicant}}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Father<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input type="text" class="form-control" id="father" name="father" value="{{$land->father}}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">E-mail<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input type="text" class="form-control" id="email" name="email" value="{{$land->email}}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Residence Address<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="ResidenceAddress" name="ResidenceAddress" type="text" value="{{$land->ResidenceAddress}}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo" name="WardNo" required>
                                                        <option value="{{$land->WardNo}}">{{$land->WardNo}}</option>
                                                        <option value="">Select One</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Permanent Address<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="PermanentAddress" name="PermanentAddress" type="text" value="{{$land->PermanentAddress}}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo1" name="WardNo1" value="{{$land->WardNo1}}" required>
                                                        <option value="{{$land->WardNo1}}">{{$land->WardNo1}}</option>
                                                        <option value="">Select</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Mobile<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="MobileNo" name="MobileNo" type="text" value="{{$land->MobileNo}}" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Aadhar No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="AadharNo" name="AadharNo" type="text" value="{{$land->AadharNo}}" required>
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
                        <div class="col-md-12">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">PRIVATE LAND REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="spin-label">License From<span class="spin-separator spin-star">*</span></td>
                                            <td>
                                                <input type="date" class="form-control" id="LicenseFrom" name="LicenseFrom" value="{{$land->LicenseFrom}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">License To<span class="spin-separator spin-star">*</span></td>
                                            <td>
                                                <input type="date" class="form-control" id="LicenseTo" name="LicenseTo" value="{{$land->LicenseTo}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Holding No<span class="spin-separator spin-star">*</span></td>
                                            <td>
                                                <input type="text" class="form-control" id="HoldingNo" name="HoldingNo" value="{{$land->HoldingNo}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Trade License No <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="TradeLicenseNo" name="TradeLicenseNo" value="{{$land->TradeLicenseNo}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">GST No <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="GSTNo" name="GSTNo" value="{{$land->GSTNo}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Entity Name <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="EntityName" name="EntityName" value="{{$land->EntityName}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Entity Address <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="EntityAddress" name="EntityAddress" value="{{$land->EntityAddress}}" required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="spin-label">Brand Display Name <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="BrandDisplayName" name="BrandDisplayName" value="{{$land->BrandDisplayName}}" required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="spin-label">Brand Display Address <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="BrandDisplayAddress" name="BrandDisplayAddress" value="{{$land->BrandDisplayAddress}}" required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="spin-label">Holding No of Brand Display Address <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="HoldingNo" name="HoldingNo" value="" required>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="spin-label">Entity Ward No <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select class="form-control" id="EntityWardNo" name="EntityWardNo" value="{{$land->EntityWardNo}}">
                                                    <option value="">Select One</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Total Display Area <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="DisplayArea" name="DisplayArea" value="{{$land->DisplayArea}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Display Type <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select name="DisplayType" id="DisplayType" class="form-control" required>
                                                    <option value="{{$land->DisplayType}}">{{$land->DisplayType}}</option>
                                                    <option value="">Select One</option>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="spin-label">No of Hoardings <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="NoOfHoarding" name="NoOfHoarding" value="{{$land->NoOfHoarding}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Longitude <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="Longitude" name="Longitude" value="{{$land->Longitude}}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Latitude <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="Latitude" name="Latitude" value="{{$land->Latitude}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Installation Location <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select class="form-control" id="InstallationLocation" name="InstallationLocation">
                                                    <option value="{{$land->InstallationLocation}}">{{$land->InstallationLocation}}</option>
                                                    <option value="">Select One</option>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- form -->
                        </div>
                        <!-- Shop/Establishment Details of Applicant -->
                        <!-- Upload Documents -->

                        <!-- Upload Documents -->
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
                            @include('admin.PrivateLand.photo-uploads')
                        </div>
                        <!-- photos -->
                        <!-- preview -->
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
<script src="js/preview-pdf.js"></script>
<script>
    $(document).ready(function() {
        $("#landRejectedActive").addClass('active');
        $('#datatable').DataTable();
        disableInputs();
    });

    function inputTools() {
        window.open('https://www.google.com/inputtools/try/', '_blank');
    }
</script>
@endsection