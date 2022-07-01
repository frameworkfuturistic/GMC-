@extends('user.app')

@section('advetactive')
active
@endsection

@section('app-content')

@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('message') }}
    </div>
@endif

<!-- form -->
<div class="card">
    <div class="card-body">
        <!-- tabs -->
        <div class="card-block">
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
                            <!-- form tag -->

                            <!-- form -->
                            <form action="{{ url('rnc/addSelfAdvet') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">License Year <span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="spin-valuearea form-control" id="LicenseYear" name="LicenseYear">
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
                                                    <input class="spin-valuearea form-control text-box single-line" id="Applicant" name="Applicant" type="text" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Father<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="spin-valuearea form-control text-box single-line" id="Father" name="Father" type="text" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">E-mail<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="spin-valuearea form-control text-box single-line" id="Email" name="Email" type="email" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Residence Address<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="spin-valuearea form-control text-box single-line" id="ResidenceAddress" name="ResidenceAddress" type="text"
                                                        value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="spin-valuearea form-control" id="WardNo" name="WardNo">
                                                        <option value="">Select One</option>
                                                        @foreach($wards as $ward)
                                                            <option value="{{$ward->StringParameter}}">{{$ward->StringParameter}}</option>
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
                                                    <input class="spin-valuearea form-control text-box single-line" id="PermanentAddress" name="PermanentAddress" type="text"
                                                        value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Ward No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="spin-valuearea form-control required" id="WardNo1" name="WardNo1">
                                                        <option value="">Select One</option>
                                                        @foreach($wards as $ward)
                                                            <option value="{{$ward->StringParameter}}">{{$ward->StringParameter}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="field-validation-valid text-danger"
                                                        data-valmsg-for="WardNo1" data-valmsg-replace="true"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Mobile<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>

                                                <td>
                                                    <input class="spin-valuearea form-control text-box single-line" id="MobileNo" name="MobileNo" type="text" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Aadhar No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input class="spin-valuearea form-control text-box single-line"
                                                        id="AadharNo"
                                                        name="AadharNo" type="text" value="">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- form -->
                        </div>
                        <!-- data form -->
                        <!-- Help & Advisory -->
                        <div class="col-md-3 advisory">
                            <h4 class="card-title success">Help &amp; Advisory</h4>
                            <div class="alert alert-success">Please Note!!</div>
                            <p class="card-text">
                            </p>
                            <ul>
                                <li>Keep all the information handy before filling up the application form.
                                </li>
                                <li>You will have to visit RMC office for any correction regatding
                                    application information.</li>
                                <li>Keep your address concise</li>
                                <li>Visit Market Section for further enquiry</li>
                            </ul>
                            <p></p>
                        </div>
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
                                            <td class="spin-label">Entity Name <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="EntityName" name="EntityName">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Entity Address <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="EntityAddress" name="EntityAddress">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Ward No<span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select class="spin-valuearea form-control" id="WardNo" name="WardNo">
                                                    <option value="">Select One</option>
                                                    @foreach($wards as $ward)
                                                            <option value="{{$ward->StringParameter}}">{{$ward->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Installation Location<span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <select class="spin-valuearea form-control" id="InstallLocation" name="InstallLocation">
                                                    <option value="">Select One</option>
                                                    @foreach($InstallLocations as $InstallLocation)
                                                            <option value="{{$InstallLocation->StringParameter}}">{{$InstallLocation->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Brand Display Name <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="BrandDisplay" name="BrandDisplay">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Holding No <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="HoldingNo" name="HoldingNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Trade License No <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="TradeLicense" name="TradeLicense">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">GST No. <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="GSTNo" name="GSTNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Display Type <span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                            <select class="spin-valuearea form-control" id="InstallLocation" name="InstallLocation">
                                                    <option value="">Select One</option>
                                                    @foreach($DisplayTypes as $DisplayType)
                                                            <option value="{{$DisplayType->StringParameter}}">{{$DisplayType->StringParameter}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Display Area<span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="DisplayArea" name="DisplayArea">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Longitude<span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="Longitude" name="Longitude">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Latitude<span
                                                    class="spin-separator spin-star">*</span></td>

                                            <td>
                                                <input type="text" class="form-control" id="Latitude" name="Latitude">
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
                                                    <input type="file" id="AadharPath"
                                                    name="AadharPath" accept="application/pdf,image/*"
                                                    style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Municipal Trade License Document</span>
                                                    <input name="TradeLicensePath" id="TradeLicensePath" type="file"
                                                    accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Photograph with GPS</span>
                                                    <input name="GPSPhotoPath"
                                                    id="GPSPhotoPath" type="file" accept="application/pdf,image/*"
                                                    style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Holding No</span>
                                                    <input id="HoldingNoPath" name="HoldingNoPath"
                                                    type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;">
                                                <span>Upload GST Document Photo</span><input id="GSTPath" name="GSTPath"
                                                    type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;">
                                                <span>Upload Proceeding1 Photo</span>
                                                <input id="Proceeding1Photo"
                                                    name="Proceeding1Photo" type="file" accept="application/pdf,image/*"
                                                    style="width:100%;">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Proceeding2 Photo</span><input id="Proceeding2Photo"
                                                    name="Proceeding2Photo" type="file"
                                                    accept="application/pdf,image/*" style="width:100%;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Proceeding3 Photo</span><input id="Proceeding3Photo" name="Proceeding3Photo"
                                                    type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Extra Document1</span><input id="ExtraDoc1" name="ExtraDoc1"
                                                    type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Extra Document2</span><input id="ExtraDoc2" name="ExtraDoc2"
                                                    type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr colspan="4" class="spin-label">
                                        <tr>
                                            <td><button class="btn btn-success"><i class="icon-file-archive-o"></i>
                                                    Submit</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- form -->
                        </div>
                        <!-- Upload Documents -->
                        </form>
                        <!-- form tag -->
                    </div>
                </div>
                <!-- application details tab -->
            </div>
        </div>
        <!-- tabs -->
    </div>
</div>
<!-- form -->
@endsection
