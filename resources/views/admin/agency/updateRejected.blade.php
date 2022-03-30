@extends('admin.app')

@section('heading')
Rejected Agency
@endsection

@section('agencyRejectedActive')
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
                                <div class="card-title my-card-title">AGENCY REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form -->
                            <form action="{{url('api/rnc/updateAgency/'.$agency->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="spin-label">Entity Type<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <select class="form-control" id="entityType" name="entityType">
                                                        <option value="">Select One</option>
                                                        <option value="{{$agency->EntityType}}" selected>
                                                            {{$agency->EntityType}}</option>
                                                        @foreach($entityTypes as $entityType)
                                                        <option value="{{$entityType->StringParameter}}">
                                                            {{$entityType->StringParameter}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Entity Name</td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="entityName"
                                                        name="entityName" value="{{$agency->EntityName}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Address<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="address" name="address" value="{{$agency->Address}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Mobile No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="number" class="form-control" id="mobile" name="mobile" value="{{$agency->MobileNo}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Official Telephone<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="telephone"
                                                        name="telephone" value="{{$agency->Telephone}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">FAX<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="fax" name="fax" value="{{$agency->Fax}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Email<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{$agency->Email}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">PAN No.<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="pan" name="pan" value="{{$agency->PANNo}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">GST No.<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="gstNo" name="gstNo" value="{{$agency->GSTNo}}">
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
                                <div class="card-title my-card-title">OTHER INFORMATION</div>
                            </div>
                            <!-- OTHER INFORMATION -->
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Blacklisted in RMC</th>
                                            <th>Pending Court Case</th>
                                            <th>Pending Amount (If any)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                @if($agency->Blacklisted=='-1')
                                                    <input type="checkbox" id="blacklisted" name="blacklisted" value="-1" checked>
                                                @else
                                                    <input type="checkbox" id="blacklisted" name="blacklisted" value="-1">
                                                @endif
                                            </td>
                                            <td>
                                                @if($agency->PendingCourtCase=='-1')
                                                    <input type="checkbox" id="pendingCourtCase" name="pendingCourtCase"
                                                        value="-1" checked>
                                                @else
                                                    <input type="checkbox" id="pendingCourtCase" name="pendingCourtCase"
                                                    value="-1">
                                                @endif
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="{{$agency->PendingAmount}}" id="pendingAmount"
                                                    name="pendingAmount">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- OTHER INFORMATIONS -->
                            <br>
                            <!-- DIRECTOR INFORMATION  -->
                            <div class="card-header card-bg">
                                <div class="card-title my-card-title">DIRECTORS INFORMATION</div>
                            </div>
                            <!-- form table -->
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Director Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id="director1Name"
                                                    name="director1Name" value="{{$agency->Director1Name}}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="director1Mobile"
                                                    name="director1Mobile" value="{{$agency->Director1Mobile}}">
                                            </td>
                                            <td>
                                                <input type="email" class="form-control" id="director1Email"
                                                    name="director1Email" value="{{$agency->Director1Email}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id="director2Name"
                                                    name="director2Name" value="{{$agency->Director2Name}}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="director2Mobile"
                                                    name="director2Mobile" value="{{$agency->Director2Mobile}}">
                                            </td>
                                            <td>
                                                <input type="email" class="form-control" id="director2Email"
                                                    name="director2Email" value="{{$agency->Director2Email}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id="director3Name"
                                                    name="director3Name" value="{{$agency->Director3Name}}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="director3Mobile"
                                                    name="director3Mobile" value="{{$agency->Director3Mobile}}">
                                            </td>
                                            <td>
                                                <input type="email" class="form-control" id="director3Email"
                                                    name="director3Email" value="{{$agency->Director3Email}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id="director4Name"
                                                    name="director4Name" value="{{$agency->Director4Name}}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="director4Mobile"
                                                    name="director4Mobile" value="{{$agency->Director4Mobile}}">
                                            </td>
                                            <td>
                                                <input type="email" class="form-control" id="director4Email"
                                                    name="director4Email" value="{{$agency->Director4Email}}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- form-table -->
                            <!-- DIRECTOR INFORMATION -->
                        </div>
                        <!-- Shop/Establishment Details of Applicant -->
                        </form>
                    </div>
                </div>
                <!-- application details tab -->
                <!-- workflow tab -->
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
                <!-- workflow tab -->
                <!-- documents tab -->
                <div class="tab-pane" id="tab3" aria-labelledby="base-tab3" aria-expanded="false">
                    <div class="row">
                        <!-- photos -->
                        <div class="col-md-3">
                            <div class="scroll">
                                <label for="">GST Photo</label>
                                <img src="{{$agency->GSTPath}}" alt="" style="width:100%;" id="AadharPath"
                                    name="AadharPath" onclick="myfunction('first')">
                                <br>
                                <label for="">IT Return 1</label>
                                <img src="{{$agency->ITReturnPath1}}" alt="" style="width:100%;" id="TradeLicensePath"
                                    name="TradeLicensePath" onclick="myfunction('second')">
                                <br>
                                <label for="">IT Return 2</label>
                                <img src="{{$agency->ITReturnPath2}}" alt="" style="width: 100%;"
                                    id="agencyPhotoPath" name="agencyPhotoPath" onclick="myfunction('third')">
                                <br>
                                <label for="">PAN No</label>
                                <img src="{{$agency->PANNoPath}}" alt="" style="width: 100%;"
                                    id="OwnerBookPath" name="OwnerBookPath" onclick="myfunction('forth')">
                                <br>
                                <label for="">Director 1 Aadhar</label>
                                <img src="{{$agency->Director1AadharPath}}" alt="" style="width: 100%;"
                                    id="DrivingLicensePath" name="DrivingLicensePath" onclick="myfunction('fifth')">
                                <br>
                                <label for="">Director 2 Aadhar</label>
                                <img src="{{$agency->Director2AadharPath}}" alt="" style="width: 100%;"
                                    id="InsurancePhotoPath" name="InsurancePhotoPath" onclick="myfunction('sixth')">
                                <br>
                                <label for="">Director 3 Aadhar</label>
                                <img src="{{$agency->Director3AadharPath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath"
                                    name="GSTNoPhotoPath" onclick="myfunction('seventh')">
                                <br>
                                <label for="">Director 4 Aadhar</label>
                                <img src="{{$agency->Director4AadharPath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath"
                                    name="GSTNoPhotoPath" onclick="myfunction('eighth')">
                                <br>
                                <br>
                                <label for="">Affidifit Path</label>
                                <img src="{{$agency->AffidavitPath}}" alt="" style="width: 100%;" id="GSTNoPhotoPath"
                                    name="GSTNoPhotoPath" onclick="myfunction('ninth')">
                            </div>
                        </div>
                        <!-- photos -->
                        <!-- preview -->
                        <div class="col-md-9">
                            <div class="card-header card-bg mb-8">
                                <div class="card-title my-card-title">Preview</div>
                            </div>
                            <a href="{{$agency->GSTPath}}" data-toggle="lightbox">
                                <img src="{{$agency->GSTPath}}" alt="" id="first" href="#img1"
                                    style="width: 100%;">
                            </a>

                            <a href="{{$agency->ITReturnPath1}}" data-toggle="lightbox">
                                <img src="{{$agency->ITReturnPath1}}" alt="" style="width:100%;" id="second">
                            </a>
                            <a href="{{$agency->ITReturnPath2}}" data-toggle="lightbox">
                                <img src="{{$agency->ITReturnPath2}}" alt="" style="width: 100%;" id="third">
                            </a>

                            <a href="{{$agency->PANNoPath}}" data-toggle="lightbox">
                                <img src="{{$agency->PANNoPath}}" alt="" style="width: 100%;" id="forth">
                            </a>

                            <a href="{{$agency->Director1AadharPath}}" data-toggle="lightbox">
                                <img src="{{$agency->Director1AadharPath}}" alt="" style="width: 100%;" id="fifth">
                            </a>

                            <a href="{{$agency->Director2AadharPath}}" data-toggle="lightbox">
                                <img src="{{$agency->Director2AadharPath}}" alt="" style="width: 100%;" id="sixth">
                            </a>

                            <a href="{{$agency->Director3AadharPath}}" data-toggle="lightbox">
                                <img src="{{$agency->Director3AadharPath}}" alt="" style="width: 100%;" id="seventh">
                            </a>
                            <a href="{{$agency->Director4AadharPath}}" data-toggle="lightbox">
                                <img src="{{$agency->Director4AadharPath}}" alt="" style="width: 100%;" id="eighth">
                            </a>
                            <a href="{{$agency->AffidavitPath}}" data-toggle="lightbox">
                                <img src="{{$agency->AffidavitPath}}" alt="" style="width: 100%;" id="ninth">
                            </a>
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

    function inputTools() {
        window.open('https://www.google.com/inputtools/try/', '_blank');
    }

</script>
@endsection
