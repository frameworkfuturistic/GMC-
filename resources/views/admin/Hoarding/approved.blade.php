@extends('admin.app')

@section('pagecss')
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
@endsection

@section('heading')
Approved Hoarding
@endsection

@section('hoardingApprovedActive')
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
                            <th>ApplicationDate</th>
                            <th>HoardingNo</th>
                            <th>LicenseYear</th>
                            <th>Location</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th>Length</th>
                            <th>Width</th>
                            <th>MaterialType</th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($hoardings as $hoarding)
                          <tr>
                              <td>
                                  <button class="btn btn-success btn-sm" onclick="window.location.replace('rnc/hoarding-approved/{{$hoarding->HoardingID}}')"><i class="icon-pen"></i> Select</button>
                              </td>
                              <td>{{$hoarding->RenewalID}}</td>
                              <td>{{$hoarding->ApplicationDate}}</td>
                              <td>{{$hoarding->HoardingNo}}</td>
                              <td>{{$hoarding->LicenseYear}}</td>
                              <td>{{$hoarding->Location}}</td>
                              <td>{{$hoarding->Longitude}}</td>
                              <td>{{$hoarding->Latitude}}</td>
                              <td>{{$hoarding->Length}}</td>
                              <td>{{$hoarding->Width}}</td>
                              <td>{{$hoarding->MaterialType}}</td>
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
