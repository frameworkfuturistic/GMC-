@extends('admin.app')

@section('pagecss')
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
@endsection

@section('heading')
Inbox Agency
@endsection

@section('agencyInboxActive')
class="active"
@endsection

@section('app-content')
<ul class="nav nav-pills nav-justified mb-8">
    <li class="nav-item col-md-4">
        <a class="nav-link active" id="active-pill" data-toggle="pill" href="#active" aria-expanded="true">Pending
            Verifications</a>
    </li>
</ul>
<!-- pending verifications -->
<div class="card">
    <div class="card-body">
        <div class="card-block">
        </div>
        <div class="mb-top">
            <!-- table -->
            <div class="container table-responsive">
                <table class="table table-responsive mb-0 display" id="datatable">
                    <thead class="">
                        <tr>
                            <th>Action</th>
                            <th>RenewalID</th>
                            <th>UniqueID</th>
                            <th>ApplicantDate</th>
                            <th>RegistrationNo</th>
                            <th>EntityName</th>
                            <th>EntityType</th>
                            <th>EntityAddress</th>
                            <th>MobileNo</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>PANNo</th>
                            <th>GSTNo</th>
                            <th>RegistrationFee</th>
                            <th>Blacklisted</th>
                            <th>PendingAmount</th>
                            <th>PendingCourtCase</th>
                            <th>CurrentUser</th>
                            <th>Initiator</th>
                            <th>Approver</th>
                            <th>ApprovalDate</th>
                            <th>Paid</th>
                            <th>RejectionReason</th>
                            <th>ApplicationStatus</th>
                            <th>LisenceFee</th>
                            <th>GST</th>
                            <th>NetAmount</th>
                            <th>PmtAmount</th>
                            <th>Bank</th>
                            <th>MRno</th>
                            <th>PaymentDate</th>
                            <th>DraftDate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agencies as $agency)
                        <tr>
                            <td scope="row">
                                <button onclick="window.location.replace('rnc/updateInbox/{{$agency->id}}')" class="btn btn-success btn-sm"><i class="icon-pen"></i>
                                    Details
                                </button>
                            </td>
                            <td>{{$agency->RenewalID}}</td>
                            <td>{{$agency->UniqueID}}</td>
                            <td>{{$agency->ApplicationDate}}</td>
                            <td>{{$agency->RegistrationNo}}</td>
                            <td>{{$agency->EntityName}}</td>
                            <td>{{$agency->EntityType}}</td>
                            <td>{{$agency->Address}}</td>
                            <td>{{$agency->MobileNo}}</td>
                            <td>{{$agency->Telephone}}</td>
                            <td>{{$agency->Email}}</td>
                            <td>{{$agency->PANNo}}</td>
                            <td>{{$agency->GSTNo}}</td>
                            <td>{{$agency->RegistrationFee}}</td>
                            <td>@if($agency->Blacklisted=='-1')
                                True
                                @else
                                False
                                @endif
                            </td>
                            <td>{{$agency->PendingAmount}}</td>
                            <td>
                                @if($agency->PendingCourtCase=='-1')
                                True
                                @else
                                False
                                @endif
                            </td>
                            <td>{{$agency->CurrentUser}}</td>
                            <td>{{$agency->Initiator}}</td>
                            <td>{{$agency->Approver}}</td>
                            <td>{{$agency->ApprovalDate}}</td>
                            <td>{{$agency->Paid}}</td>
                            <td>{{$agency->RejectionReason}}</td>
                            <td>{{$agency->ApplicationStatus}}</td>
                            <td>{{$agency->LicenseFee}}</td>
                            <td>{{$agency->GST}}</td>
                            <td>{{$agency->NetAmount}}</td>
                            <td>{{$agency->PmtMode}}</td>
                            <td>{{$agency->Bank}}</td>
                            <td>{{$agency->MRNo}}</td>
                            <td>{{$agency->PaymentDate}}</td>
                            <td>{{$agency->DraftDate}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- table -->
        </div>
    </div>
</div>
<!-- pending verifications -->
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
<!-- datatable -->
<script>
    $(document).ready(function() {
        // add active class
        $("#agencyInbox").addClass('active');
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
<!-- datatable -->
@endsection