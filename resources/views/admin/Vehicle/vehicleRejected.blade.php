@extends('admin.app')

@section('pagecss')
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
@endsection

@section('heading')
Rejected Vehicle
@endsection

@section('VehicleRejectedActive')
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
                            <th>From</th>
                            <th>To</th>
                            <th>EntityName</th>
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
                        @foreach($vehicles as $vehicle)
                        <tr>
                            <td scope="row">
                                <button onclick="window.location.replace('rnc/updateVehicleRejected/{{$vehicle->id}}')"
                                    class="btn btn-success btn-sm"><i class="icon-pen"></i>
                                    Details
                                </button>
                            </td>
                            <td>{{$vehicle->RenewalID}}</td>
                            <td>{{$vehicle->LicenseFrom}}</td>
                            <td>{{$vehicle->LicenseTo}}</td>
                            <td>{{$vehicle->EntityName}}</td>
                            <td>{{$vehicle->WardNo}}</td>
                            <td>{{$vehicle->TradeLicenseNo}}</td>
                            <td>{{$vehicle->MobileNo}}</td>
                            <td>{{$vehicle->applicant}}</td>
                            <td>{{$vehicle->father}}</td>
                            <td>{{$vehicle->CurrentUser}}</td>
                            <td>{{$vehicle->Initiator}}</td>
                            <td></td>
                            <td>{{$vehicle->ApplicationStatus}}</td>
                            <td>{{$vehicle->LicenseFee}}</td>
                            <td>{{$vehicle->GSTNo}}</td>
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
<!-- datatable -->
@endsection
