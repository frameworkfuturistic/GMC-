@extends('admin.app')

@section('pagecss')
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
@endsection

@section('heading')
Shop Details
@endsection

@section('shopactive')
class="active"
@endsection

@section('app-content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Details Panel</h4>
    </div>
    <div class="card-body">
        <div class="card-block">
            <!-- Shop List Tabs -->
            <!-- DataTable -->
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>ShopNo</th>
                            <th>Circle</th>
                            <th>Allottee</th>
                            <th>Rate</th>
                            <th>Arrear</th>
                            <th>Address</th>
                            <th>ContactNo</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- DataTable -->
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="js/datatable_buttons/dataTables.buttons.min.js"></script>
<script src="js/datatable_buttons/jszip.min.js"></script>
<script src="js/datatable_buttons/pdfmake.min.js"></script>
<script src="js/datatable_buttons/vfs_fonts.js"></script>
<script src="js/datatable_buttons/buttons.html5.min.js"></script>
<script src="js/datatable_buttons/buttons.print.min.js"></script>

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
                        className: 'excelButton btn-padding',
                        action: function(e, dt, node, config) {
                            window.open('export/shops/shop-master').opener = null;
                        }
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
            ajax: "{{ route('shops.master') }}",
            columns: [{
                    data: 'ShopNo',
                    name: 'ShopNo'
                },
                {
                    data: 'Circle',
                    name: 'Circle'
                },
                {
                    data: 'Allottee',
                    name: 'Allottee'
                },
                {
                    data: 'Rate',
                    name: 'Rate'
                },
                {
                    data: 'Arrear',
                    name: 'Arrear'
                },
                {
                    data: 'Address',
                    name: 'Address'
                },
                {
                    data: 'ContactNo',
                    name: 'ContactNo'
                },
                {
                    data: 'Longitude',
                    name: 'Longitude'
                },
                {
                    data: 'Latitude',
                    name: 'Latitude'
                }
            ]
        });
        // add active class
        $("#shopActive").addClass('active');
    });
</script>
@endsection