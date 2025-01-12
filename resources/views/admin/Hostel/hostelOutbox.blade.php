@extends('admin.app')

@section('pagecss')
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
@endsection

@section('heading')
Outbox Hostel
@endsection

@section('hostelOutboxActive')
class="active"
@endsection

@section('app-content')
<ul class="nav nav-pills nav-justified mb-8">
    <li class="nav-item col-md-4">
        <a class="nav-link active" id="active-pill" data-toggle="pill" href="#active" aria-expanded="true">Pending
            Verifications</a>
    </li>
</ul>
<!-- UPDATE -->
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
                            <th>LicenseYear</th>
                            <th>Applicant</th>
                            <th>Father</th>
                            <th>EntityName</th>
                            <th>EntityAddress</th>
                            <th>CurrentUser</th>
                            <th>Initiator</th>
                            <th>Approver</th>
                            <th>ApplicationStatus</th>
                            <th>LisenceFee</th>
                            <th>GST</th>
                            <th>NetAmount</th>
                            <th>Bank</th>
                            <th>MRno</th>
                            <th>PaymentDate</th>
                            <th>AppDate</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- table -->
        </div>
    </div>
</div>
<!-- UPDATE -->
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
        $("#hostelOutbox").addClass('active');
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
            ajax: "{{ route('hostel.outbox') }}",
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
                    data: 'LicenseYear',
                    name: 'LicenseYear'
                },
                {
                    data: 'Applicant',
                    name: 'Applicant'
                },
                {
                    data: 'Father',
                    name: 'Father'
                },
                {
                    data: 'EntityName',
                    name: 'EntityName'
                },
                {
                    data: 'EntityAddress',
                    name: 'EntityAddress'
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
                    data: 'created_at',
                    name: 'created_at'
                }
            ]
        });

    });
</script>
<!-- datatable -->
@endsection