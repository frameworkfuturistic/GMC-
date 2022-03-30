@extends('user.app')

@section('agencyactive')
active
@endsection

@section('app-content')
<!-- success msg -->
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message') }}
    </div>
@endif
<!-- success msg -->
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
                                <div class="card-title my-card-title">AGENCY REGISTRATION
                                    APPLICATION</div>
                            </div>
                            <!-- form tag -->

                            <!-- form -->
                            <form action="{{ url('api/rnc/addAgency' )}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
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
                                                        @foreach($entityTypes as $entityType)
                                                            <option value="{{$entityType->StringParameter}}">{{$entityType->StringParameter}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Entity Name</td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="entityName"
                                                        name="entityName">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Address<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="address" name="address">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Mobile No<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="number" class="form-control" id="mobile" name="mobile">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Official Telephone<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="telephone"
                                                        name="telephone">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">FAX<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="fax" name="fax">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">Email<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="email" class="form-control" id="email" name="email">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">PAN No.<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="pan" name="pan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="spin-label">GST No.<span
                                                        class="spin-separator spin-star">*</span></td>
                                                <td class="spin-separator">:</td>
                                                <td>
                                                    <input type="text" class="form-control" id="gstNo" name="gstNo">
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
                                                <input type="checkbox" id="blacklisted" name="blacklisted" value="-1">
                                            </td>
                                            <td>
                                                <input type="checkbox" id="pendingCourtCase" name="pendingCourtCase"
                                                    value="-1">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="0.00" id="pendingAmount"
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
                                                    name="director1Name">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="director1Mobile"
                                                    name="director1Mobile">
                                            </td>
                                            <td>
                                                <input type="email" class="form-control" id="director1Email"
                                                    name="director1Email">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id="director2Name"
                                                    name="director2Name">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="director2Mobile"
                                                    name="director2Mobile">
                                            </td>
                                            <td>
                                                <input type="email" class="form-control" id="director2Email"
                                                    name="director2Email">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id="director3Name"
                                                    name="director3Name">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="director3Mobile"
                                                    name="director3Mobile">
                                            </td>
                                            <td>
                                                <input type="email" class="form-control" id="director3Email"
                                                    name="director3Email">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id="director4Name"
                                                    name="director4Name">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="director4Mobile"
                                                    name="director4Mobile">
                                            </td>
                                            <td>
                                                <input type="email" class="form-control" id="director4Email"
                                                    name="director4Email">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- form-table -->
                            <!-- DIRECTOR INFORMATION -->
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
                                                    GST Photograph</span>
                                                <input type="file" style="width:100%;" id="gstPhoto" name="gstPhoto">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    IT Return Photograph for Last Financial Year</span><input
                                                    type="file" style="width:100%;" id="itReturnPhoto1"
                                                    name="itReturnPhoto1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    IT Return Photograph for Previous to Last Financial
                                                    Year</span><input type="file" style="width:100%;"
                                                    id="itReturnPhoto2" name="itReturnPhoto2">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Office Address Photograph</span><input type="file"
                                                    style="width:100%;" id="officeAddress" name="officeAddress">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    PAN No. Photograph</span><input type="file" style="width:100%;"
                                                    id="panNo" name="panNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Director1 Aadhar Photo</span><input type="file" style="width:100%;"
                                                    id="director1Aadhar" name="director1Aadhar">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Director2 Aadhar Photo</span><input type="file" style="width:100%;"
                                                    id="director2Aadhar" name="director2Aadhar">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Director3 Aadhar Photo</span><input type="file" style="width:100%;"
                                                    id="director3Aadhar" name="director3Aadhar">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Director4 Aadhar Photo</span><input type="file" style="width:100%;"
                                                    id="director4Aadhar" name="director4Aadhar">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="spin-label" style="width:100%;"><span>Upload
                                                    Affidifit Photo(You are required to submit the original copy to
                                                    RMC)</span><input type="file" style="width:100%;"
                                                    id="affidifitPhoto" name="affidifitPhoto">
                                            </td>
                                        </tr>
                                        <tr colspan="4" class="spin-label">
                                            <td><button type="submit" class="btn btn-success"><i
                                                        class="icon-file-archive-o"></i>
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
