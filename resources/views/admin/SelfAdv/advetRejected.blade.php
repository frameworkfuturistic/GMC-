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
        <a class="nav-link active" id="active-pill" data-toggle="pill" href="#active" aria-expanded="true">Rejected Self Advertisement Applications</a>
    </li>
</ul>
<!-- tabs -->
<!-- tab-content start here -->
<div class="tab-content px-1 pt-1">
    <!-- pending verifications -->
    <div role="tabpanel" class="tab-pane active" id="active" aria-labelledby="active-pill" aria-expanded="true">
        <div class="card">
            <div class="card-header card-bg">
                <div class="card-title my-card-title">List of Rejected Applications</div>
            </div>
            <div class="card-body">
                <div class="mb-top">
                    <!-- table -->
                    <div class="container table-responsive">
                        <table class="table table-responsive mb-0 display" id="datatable">
                                    <thead class="">
                                        <tr>
                                            <th>Action</th>
                                            <th>RenewalID</th>
                                            <th>LicenseYear</th>
                                            <th>EntityName</th>
                                            <th>EntiryAddress</th>
                                            <th>EntityWard</th>
                                            <th>TradeLicenseNo</th>
                                            <th>MobileNo</th>
                                            <th>Applicant</th>
                                            <th>Father</th>
                                            <th>CurrentUser</th>
                                            <th>Initiator</th>
                                            <th>Approver</th>
                                            <th>ApplicationStatus</th>
                                            <th>LisenceFee</th>
                                            <th>GST</th>
                                            <th>NetAmount</th>
                                            <th>PmtAmount</th>
                                            <th>Bank</th>
                                            <th>MRno</th>
                                            <th>PaymentDate</th>
                                            <th>AppDate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($SelfAds as $SelfAd)
                                        <tr>
                                            <td scope="row">
                                                <button
                                                    onclick="window.location.replace('rnc/updateadvetRejected/{{$SelfAd->id}}')"
                                                    class="btn btn-success btn-sm"><i class="icon-pen"></i>
                                                    Details
                                                </button>
                                            </td>
                                            <td>{{$SelfAd->RenewalID}}</td>
                                            <td>{{$SelfAd->LicenseYear}}</td>
                                            <td>{{$SelfAd->EntityName}}</td>
                                            <td>{{$SelfAd->EntityAddress}}</td>
                                            <td>{{$SelfAd->WardNo}}</td>
                                            <td>{{$SelfAd->TradeLicense}}</td>
                                            <td>{{$SelfAd->MobileNo}}</td>
                                            <td>{{$SelfAd->Applicant}}</td>
                                            <td>{{$SelfAd->Father}}</td>
                                            <td>{{$SelfAd->CurrentUser}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$SelfAd->TradeLicense}}</td>
                                            <td>{{$SelfAd->GSTNo}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                    <!-- table -->
                </div>
            </div>
        </div>
    </div>
    <!-- pending verifications -->
</div>
<!-- tab-content start here -->
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $("#advetRejectedActive").addClass('active');
        $('#datatable').DataTable();
    } );
</script>
@endsection
