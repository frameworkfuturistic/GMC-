@extends('admin.app')

@section('pagecss')
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
@endsection

@section('heading')
Rejected Agency
@endsection

@section('agencyRejectedActive')
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
                            <th>Bank</th>
                            <th>MRno</th>
                            <th>PaymentDate</th>
                            <th>DraftDate</th>
                        </tr>
                    </thead>
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
        $("#agencyRejected").addClass('active');
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
            },
            "processing": true,
            "serverSide": true,
            "language": {
                processing: '<i class="fas fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
            },
            ajax: "{{ route('agency.rejected') }}",
            columns: [{
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'RenewalID',
                    name: 'RenewalID'
                },
                {
                    data: 'ApplicationDate',
                    name: 'ApplicationDate'
                },
                {
                    data: 'RegistrationNo',
                    name: 'RegistrationNo'
                },
                {
                    data: 'EntityName',
                    name: 'EntityName'
                },
                {
                    data: 'EntityType',
                    name: 'EntityType'
                },
                {
                    data: 'Address',
                    name: 'Address'
                },
                {
                    data: 'MobileNo',
                    name: 'MobileNo'
                },
                {
                    data: 'Telephone',
                    name: 'Telephone'
                },
                {
                    data: 'Email',
                    name: 'Email'
                },
                {
                    data: 'PANNo',
                    name: 'PANNo'
                },
                {
                    data: 'GSTNo',
                    name: 'GSTNo'
                },
                {
                    data: 'RegistrationFee',
                    name: 'RegistrationFee'
                },
                {
                    data: 'Blacklisted',
                    name: 'Blacklisted'
                },
                {
                    data: 'PendingAmount',
                    name: 'PendingAmount'
                },
                {
                    data: 'PendingCourtCase',
                    name: 'PendingCourtCase'
                },
                {
                    data: 'CurrentUser',
                    name: 'CurrentUser'
                },
                {
                    data: 'Initiator',
                    name: 'Initiator'
                },
                {
                    data: 'Approver',
                    name: 'Approver'
                },
                {
                    data: 'ApprovalDate',
                    name: 'ApprovalDate'
                },
                {
                    data: 'Paid',
                    name: 'Paid'
                },
                {
                    data: 'RejectionReason',
                    name: 'RejectionReason'
                },
                {
                    data: 'ApplicationStatus',
                    name: 'ApplicationStatus'
                },
                {
                    data: 'LicenseFee',
                    name: 'LicenseFee'
                },
                {
                    data: 'GST',
                    name: 'GST'
                },
                {
                    data: 'NetAmount',
                    name: 'NetAmount'
                },
                {
                    data: 'Bank',
                    name: 'Bank'
                },
                {
                    data: 'MRNo',
                    name: 'MRNo'
                },
                {
                    data: 'PaymentDate',
                    name: 'PaymentDate'
                },
                {
                    data: 'DraftDate',
                    name: 'DraftDate'
                }
            ]
        });
    });
</script>
<!-- datatable -->
@endsection