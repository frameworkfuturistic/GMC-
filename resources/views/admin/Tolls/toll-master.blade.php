@extends('admin.app')

@section('pagecss')
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
@endsection

@section('heading')
Toll Masters
@endsection

@section('tollMasterActive')
class="active"
@endsection

@section('app-content')
<div class="card">
    <div class="card-block">
        <div class="card-body">
            <!-- DataTable -->
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>VendorID</th>
                            <th>AreaName</th>
                            <th>VendorName</th>
                            <th>Address</th>
                            <th>Rate</th>
                            <th>Location</th>
                            <th>Mobile</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- DataTable -->
        </div>
    </div>
</div>
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
    $(document).ready(function() {
        $('#dataTable').DataTable({
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
            processing: true,
            serverSide: true,
            "language": {
                processing: '<i class="fas fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
            },
            ajax: "{{ route('toll.master') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'AreaName',
                    name: 'AreaName'
                },
                {
                    data: 'VendorName',
                    name: 'VendorName'
                },
                {
                    data: 'Address',
                    name: 'Address'
                },
                {
                    data: 'Rate',
                    name: 'Rate'
                },
                {
                    data: 'Location',
                    name: 'Location'
                },
                {
                    data: 'Mobile',
                    name: 'Mobile'
                }
            ]
        });

        $("#tollMasterActive").addClass('active');
    });
</script>
@endsection