@extends('admin.app')

@section('heading')
Rejected Vehicle
@endsection

@section('VehicleRejectedActive')
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
                                <div class="card-title my-card-title">MOVABLE VEHICLE REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <form action="{{url('rnc/updateVehicle/'.$vehicle->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">Applicant<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="hidden" value="{{$vehicle->id}}" id="id" name="id">
                                                    <input type="text" class="form-control" id="applicant" name="applicant" required="" value="{{$vehicle->applicant}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Father<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input type="text" class="form-control" id="father" name="father" required="" value="{{$vehicle->father}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">E-mail<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input type="email" class="form-control" id="email" name="email" required="" value="{{$vehicle->email}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Residence Address<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input type="text" class="form-control" id="ResidenceAddress" name="ResidenceAddress" required="" value="{{$vehicle->ResidenceAddress}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo" name="WardNo" required>
                                                        <option value="{{$vehicle->WardNo}}">{{$vehicle->WardNo}}</option>
                                                        <option value="">Select One</option>
                                                    </select>
                                                    <span class="field-validation-valid text-danger" data-valmsg-for="WardNo" data-valmsg-replace="true"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Permanent Address<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="PermanentAddress" name="PermanentAddress" required="" value="{{$vehicle->PermanentAddress}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="WardNo1" name="WardNo1" required="">
                                                        <option value="{{$vehicle->WardNo}}">{{$vehicle->WardNo1}}</option>
                                                        <option value="">Select One</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Mobile<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="form-control" id="MobileNo" name="MobileNo" type="text" required="" value="{{$vehicle->MobileNo}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Aadhar No<span class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="form-control" id="AadharNo" name="AadharNo" type="text" value="{{$vehicle->AadharNo}}" required="">
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
                                <div class="card-title my-card-title">MOVABLE VEHICLE REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="spin-label">License From<span class="spin-separator spin-star">*</span></td>
                                            <td>
                                                <input type="date" class="form-control" id="LicenseFrom" name="LicenseFrom" required="" value="{{$vehicle->LicenseFrom}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">License To<span class="spin-separator spin-star">*</span></td>
                                            <td>
                                                <input type="date" class="form-control" id="LicenseTo" name="LicenseTo" required="" value="{{$vehicle->LicenseTo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Entity Name <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="EntityName" name="EntityName" required="" value="{{$vehicle->EntityName}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Trade License No <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="TradeLicenseNo" name="TradeLicenseNo" required="" value="{{$vehicle->TradeLicenseNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">GST No <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="GSTNo" name="GSTNo" required="" value="{{$vehicle->GSTNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Vehicle No <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="VehicleNo" name="VehicleNo" required="" value="{{$vehicle->VehicleNo}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Vehicle Name <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="VehicleName" name="VehicleName" required="" value="{{$vehicle->VehicleName}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Vehicle Type <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select name="VehicleType" id="VehicleType" class="form-control" required="">
                                                    <option value="{{$vehicle->VehicleType}}">{{$vehicle->VehicleType}}</option>
                                                    <option value="">Select One</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Brand Displayed in Vehicle <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="BrandDisplay" name="BrandDisplay" required="" value="{{$vehicle->BrandDisplay}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Front Area(Sq ft) <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="number" class="form-control" id="FrontArea" name="FrontArea" required="" value="{{$vehicle->FrontArea}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Rear Area(Sq ft) <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="number" class="form-control" id="RearArea" name="RearArea" required="" value="{{$vehicle->RearArea}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Side 1 Area(Sq ft) <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="number" class="form-control" id="Side1Area" name="Side1Area" required="" value="{{$vehicle->Side1Area}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Top Area(Sq ft) <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="number" class="form-control" id="TopArea" name="TopArea" required="" value="{{$vehicle->TopArea}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Display Type <span class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select name="DisplayType" id="DisplayType" class="form-control" required="">
                                                    <option value="{{$vehicle->DisplayType}}">{{$vehicle->DisplayType}}</option>
                                                    <option value="">Select One</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Zone<span class="spin-separator spin-star">*</span>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control" id="zone" name="zone">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Amount<span class="spin-separator spin-star">*</span>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control" id="amount" name="amount">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">GST<span class="spin-separator spin-star">*</span>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control" id="GST" name="GST">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Total<span class="spin-separator spin-star">*</span>
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
                            @include('admin.Vehicle.upload-images')
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
        $('#datatable').DataTable();
        // add active class
        $("#vehicleRejected").addClass('active');
        disableInputs();
    });

    function inputTools() {
        window.open('https://www.google.com/inputtools/try/', '_blank');
    }
</script>
@endsection