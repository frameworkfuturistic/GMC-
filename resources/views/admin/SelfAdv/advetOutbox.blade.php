@extends('admin.app')

@section('pagecss')
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
@endsection

@section('heading')
Outbox Self Advertisement
@endsection

@section('outboxActive')
class="active"
@endsection

@section('app-content')
<!-- tabs -->
<ul class="nav nav-pills nav-justified mb-8">
    <li class="nav-item col-md-4">
        <a class="nav-link active" id="active-pill" data-toggle="pill" href="#active" aria-expanded="true">Pending
            Verifications</a>
    </li>
</ul>
<!-- tabs -->
<!-- tab-content start here -->
<div class="tab-content">
    <!-- pending verifications -->
    <div role="tabpanel" class="tab-pane active" id="active" aria-labelledby="active-pill" aria-expanded="true">
        <div class="card">
            <div class="card-header card-bg">
                <div class="card-title my-card-title">Self Advertisement Outbox</div>
            </div>
            <div class="card-body">
                <div class="card-block">

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
                                                onclick="window.location.replace('rnc/updateadvetOutbox/{{$SelfAd->id}}')"
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
    </div>
    <!-- pending verifications -->
</div>
<!-- tab-content start here -->
@endsection

@section('pagescript')
<script src="js/datatable_buttons/dataTables.buttons.min.js"></script>
<script src="js/datatable_buttons/jszip.min.js"></script>
<script src="js/datatable_buttons/pdfmake.min.js"></script>
<script src="js/datatable_buttons/vfs_fonts.js"></script>
<script src="js/datatable_buttons/buttons.html5.min.js"></script>
<script src="js/datatable_buttons/buttons.print.min.js"></script>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: {
                buttons: [{
                        extend: 'pdf',
                        text: '<i class="icon-android-print"></i> Export PDF',
                        className: 'pdfButton btn-padding'
                    },
                    {
                        extend: 'copy',
                        text: '<i class="icon-android-print"></i> Copy',
                        className: 'copyButton btn-padding'
                    },
                    {
                        extend: 'csv',
                        text: '<i class="icon-android-print"></i> CSV',
                        className: 'csvButton btn-padding'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="icon-document-text"></i> Excel',
                        className: 'excelButton btn-padding'
                    },
                    {
                        extend: 'print',
                        text: '<i class="icon-android-print"></i> Print',
                        className: 'printButton btn-padding'
                    }
                ]
            }
        });
    });

</script>
@endsection
