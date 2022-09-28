@extends('admin.app')

@section('heading')
Rejected Hoarding
@endsection

@section('hoardingRejectedActive')
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
        <a class="nav-link active" id="active-pill" data-toggle="pill" href="#active" aria-expanded="true">Details of
            Hoarding</a>
    </li>
</ul>

<!-- CARD  -->
<div class="card">
    <div class="card-body">
        <div class="card-block">
            <!-- tab items -->
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
            <!-- tab-items -->
            <!-- TAB CONTENTS -->
            <div class="tab-content px-1 pt-1">
                <!-- ============================APPLATION DETAILS====================================== -->
                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">DETAILS OF HOARDING</div>
                            </div>
                            <!-- FORM -->
                            <form action="rnc/edit-hoarding/{{$hoardings->HoardingID}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">License Year <span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="spin-valuearea form-control" id="LicenseYear" name="LicenseYear">
                                                        <option value="">Select One</option>
                                                        <option value="{{$hoardings->LicenseYear}}" selected>
                                                            {{$hoardings->LicenseYear}}
                                                        </option>
                                                    </select>

                                                    <input type="hidden" id="renewalID" name="renewalID" value="{{$hoardings->RenewalID}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">License From <span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="date" class="form-control" id="licenseFrom" name="licenseFrom" value="{{$hoardings->PermissionFrom}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">License To <span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="date" id="licenseTo" name="licenseTo" class="form-control" value="{{$hoardings->PermissionTo}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Location<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="location" name="location" value="{{$hoardings->Location}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Longitude<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{$hoardings->Longitude}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Latitude<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="latitude" name="latitude" value="Latitude">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">LengthOfHoarding<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="number" class="form-control" id="lengthOfHoarding" name="lengthOfHoarding" value="{{$hoardings->Length}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">WidthOfHoarding<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="number" class="form-control" id="widthOfHoarding" name="widthOfHoarding" value="{{$hoardings->Width}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">AreaOfBoard<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="number" class="form-control" id="areaOfBoard" name="areaOfBoard" value="{{$hoardings->BoardArea}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Material Type<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select name="materialType" id="materialType" class="form-control">
                                                        <option value="">Select Material Type</option>
                                                        <option value="{{$hoardings->MaterialType}}" selected>
                                                            {{$hoardings->MaterialType}}
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Illumination<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select name="illumination" id="illumination" class="form-control">
                                                        <option value="">Select Illumination</option>
                                                        <option value="{{$hoardings->Illumination}}" selected>
                                                            {{$hoardings->Illumination}}
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Facing<span class="spin-separator spin-star">*</span>
                                                </td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select name="facing" id="facing" class="form-control">
                                                        <option value="">Select Facing</option>
                                                        <option value="{{$hoardings->Face}}" selected>
                                                            {{$hoardings->Face}}
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Landmark<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="landmark" name="landmark" value="{{$hoardings->Landmark}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Hoarding Type<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="hoardingType" name="hoardingType">
                                                        <option value="">Select Hoarding Type</option>
                                                        <option value="{{$hoardings->HoardingCategory}}" selected>
                                                            {{$hoardings->HoardingCategory}}
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Property Type<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select name="propertyType" id="propertyType" class="form-control">
                                                        <option value="">Select Property Type</option>
                                                        <option value="{{$hoardings->PropertyType}}" selected>
                                                            {{$hoardings->PropertyType}}
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Zone<span class="spin-separator spin-star">*</span>
                                                </td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select name="zone" id="zone" class="form-control">
                                                        <option value="">Select Zone</option>
                                                        <option value="{{$hoardings->Zone}}">{{$hoardings->Zone}}
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">License Fee<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="licenseFee" name="licenseFee" value="{{$hoardings->LicenseFee}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Amount<span class="spin-separator spin-star">*</span>
                                                </td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="amount" name="amount" value="{{$hoardings->Amount}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">GST<span class="spin-separator spin-star">*</span>
                                                </td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="gst" name="gst" value="{{$hoardings->GST}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Net Amount<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="netAmount" name="netAmount" value="{{$hoardings->NetAmount}}">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                            <!-- FORM -->
                        </div>
                        <!--  NOTICE -->
                        @include('admin.hoarding-help-advisory')
                        <!-- NOTICE -->
                    </div>
                    <!-- ============================APPLICATION DETATILS ENDS ============================= -->
                </div>
                <!-- ============================APPLATION DETAILS====================================== -->
                <!-- ============================ WORKFLOW ============================================= -->
                <div class="tab-pane" id="tab2" aria-labelledby="base-tab2" aria-expanded="false">
                    <div class="row">
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
                <!-- ============================ WORKFLOW ============================================= -->
                <!-- ============================ DOCUMENT ============================================= -->
                <div class="tab-pane" id="tab3" aria-labelledby="base-tab3" aria-expanded="false">
                    <div class="row">
                        <!-- photos -->
                        <div class="col-md-3">
                            @include('admin.Hoarding.upload-image')
                        </div>
                        <!-- photos -->
                    </div>
                </div>
                <!-- ============================ DOCUMENT ============================================= -->
            </div>
            <!-- TAB CONTENTS -->
        </div>
    </div>
</div>
<!-- CARD -->

@endsection

@section('pagescript')

@endsection

@section('script')
<script src="js/preview-pdf.js"></script>
<script>
    $(document).ready(function() {
        // add active class
        $("#hoardingRejected").addClass('active');
        $('#datatable').DataTable();
    });
</script>
@endsection