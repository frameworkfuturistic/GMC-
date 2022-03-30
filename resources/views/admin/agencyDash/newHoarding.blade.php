@extends('admin.agencyDash.app')

@section('heading')
Apply New Hoarding
@endsection

@section('pagecss')
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
@endsection

@section('activeNewHoarding')
active
@endsection


@section('app-content')
<div class="card">
    <div class="card-body">
        <div class="card-block">
            <!-- tabs -->
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="pill" href="#home"
                        aria-expanded="true">Pending Applications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="pill" href="#profile" aria-expanded="false">Apply
                        New</a>
                </li>
            </ul>
            <!-- tabs -->
            <!-- tab-content -->
            <div class="tab-content px-1 pt-1">
                <!-- PENDING APPLICATIONS -->
                <div role="tabpanel" class="tab-pane active" id="home" aria-labelledby="home-tab" aria-expanded="true">
                    <div class="table-responsive">
                        <table class="table table-responsive table-hover table-striped display" id="datatable">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>TempID</th>
                                    <th>AppDate</th>
                                    <th>Lic.Year</th>
                                    <th>Location</th>
                                    <th>Length</th>
                                    <th>Width</th>
                                    <th>Area</th>
                                    <th>Landmark</th>
                                    <th>Face</th>
                                    <th>Illumination</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <button class="btn btn-success btn-sm"><i class="icon-pen"></i>
                                            Details
                                        </button>
                                    </td>
                                    <td>RMC/0001</td>
                                    <td>10-09-2020</td>
                                    <td>2018</td>
                                    <td>Ranchi</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>400</td>
                                    <td>Near SBI ATM</td>
                                    <td>NORTH</td>
                                    <td>YES</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="btn btn-success btn-sm"><i class="icon-pen"></i>
                                            Details
                                        </button>
                                    </td>
                                    <td>RMC/0002</td>
                                    <td>10-09-2020</td>
                                    <td>2018</td>
                                    <td>Ranchi</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>400</td>
                                    <td>Near SBI ATM</td>
                                    <td>NORTH</td>
                                    <td>YES</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="btn btn-success btn-sm"><i class="icon-pen"></i>
                                            Details
                                        </button>
                                    </td>
                                    <td>RMC/0003</td>
                                    <td>10-09-2020</td>
                                    <td>2018</td>
                                    <td>Ranchi</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td>400</td>
                                    <td>Near SBI ATM</td>
                                    <td>NORTH</td>
                                    <td>YES</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- PENDING APPLICATIONS -->
                <!-- APPLY NEW HOARDING -->
                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">APPLY FOR NEW HOARDING</div>
                            </div>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="spin-label">License Year <span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="spin-valuearea form-control" id="LicenseYear"
                                                    name="LicenseYear">
                                                    <option value="">Select One</option>
                                                    <option value="2018-19">2018-19</option>
                                                    <option value="2019-20">2019-20</option>
                                                    <option value="2020-21">2020-21</option>
                                                    <option value="2021-22">2021-22</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Hoarding Category<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select class="spin-valuearea form-control" id="LicenseYear"
                                                    name="LicenseYear">
                                                    <option value="">Select One</option>
                                                    <option value="2018-19">2018-19</option>
                                                    <option value="2019-20">2019-20</option>
                                                    <option value="2020-21">2020-21</option>
                                                    <option value="2021-22">2021-22</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Location<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="location" name="location">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Latitude<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="latitude" name="latitude">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">LengthOfHoarding<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" id="lengthOfHoarding"
                                                    name="lengthOfHoarding" value="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">WidthOfHoarding<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" id="widthOfHoarding"
                                                    name="widthOfHoarding" value="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">AreaOfBoard<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" id="areaOfBoard"
                                                    name="areaOfBoard" value="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Landmark<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="number" class="form-control" id="landmark" name="landmark">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Property Type<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select name="propertyType" id="propertyType" class="form-control">
                                                    <option value=""></option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">OwnerName (If Property Type is Private)<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="ownerName"
                                                    class="ownerName">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">OwnerAddress (If Property Type is Private)<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="ownerAddress"
                                                    class="ownerAddress">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">OwnerCity (If Property Type is Private)<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="ownerCity"
                                                    class="ownerCity">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">OwnerPhone (If Property Type is Private)<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="ownerPhone"
                                                    class="ownerPhone">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">OwnerWhatsappNo (If Property Type is Private)<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="ownerPhone"
                                                    class="ownerPhone">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Facing<span class="spin-separator spin-star">*</span>
                                            </td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select name="facing" id="facing" class="form-control">
                                                    <option value=""></option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Material Type<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select name="materialType" id="materialType" class="form-control">
                                                    <option value=""></option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Illumination<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <select name="illumination" id="illumination" class="form-control">
                                                    <option value=""></option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- NOTICE -->
                        <div class="col-md-3">
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
                        <!-- NOTICE -->
                        <!-- UPLOAD DOCUMENTS -->
                        <div class="col-md-9">
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">UPLOAD DOCUMENTS</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Building Permit Path</span>
                                                <input type="file" id="buildingPermitPath" name="buildingPermitPath"
                                                    accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload Site Photograph Path</span>
                                                <input name="sitePhotographPath" id="sitePhotographPath" type="file"
                                                    accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Engineer Certificate Path</span>
                                                <input name="engineerCertificatePath" id="engineerCertificatePath" type="file"
                                                    accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Agreement Path</span>
                                                <input id="agreementPath" name="agreementPath" type="file"
                                                    accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;">
                                                <span>Upload GPS Photograph Path</span><input id="GPSPath" name="GPSPath"
                                                    type="file" accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;">
                                                <span>Upload Sketch Plan Path</span>
                                                <input id="sketchPlanPath" name="sketchPlanPath" type="file"
                                                    accept="application/pdf,image/*" style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Pending Dues Path</span><input id="pendingDuesPath"
                                                    name="pendingDuesPath" type="file" accept="application/pdf,image/*"
                                                    style="width:100%;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Architectural Drawing Path</span><input id="architecturalDrawingPath"
                                                    name="architecturalDrawingPath" type="file" accept="application/pdf,image/*"
                                                    style="width:100%;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <!-- updation for initiator -->
                                                <button class="btn btn-success"><i class="icon-file-archive-o"></i>
                                                    Submit</button>
                                                <!-- updation for initiator -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- UPLOAD DOCUMENTS -->
                    </div>
                </div>
                <!-- APPLY NEW HOARDING -->
            </div>
            <!-- tab-content -->
        </div>
    </div>
</div>
@endsection

@section('pagescript')
<script src="js/datatable_buttons/dataTables.buttons.min.js"></script>
@endsection

@section('script')
<script>
    $('#datatable').DataTable();

</script>
@endsection
