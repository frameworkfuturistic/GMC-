@extends('admin.app')

@section('pagecss')
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
@endsection

@section('heading')
TC Collections
@endsection

@section('tcCollectionsActive')
class="active"
@endsection

@section('app-content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">
            <!-- Form -->
            <div class="col-md-6">
                <form action="{{route('shops.getTcCollections')}}" method="POST" id="formData">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="From">From</label>
                            <input type="date" class="form-control" name="from" id="from" required>
                        </div>
                        <div class="col-md-4">
                            <label for="From">To</label>
                            <input type="date" class="form-control" name="to" id="to" required>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-danger mt-33"><i class="fa fa-file"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Form -->
        </h4>
    </div>
    <div class="card-body">
        <div class="card-block">
            <!-- DataTable -->
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile No</th>
                            <th>Designation</th>
                            <th>Gender</th>
                            <th>Collection</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todayCollections as $todayCollection)
                        <tr>
                            <td>{{$todayCollection->name}}</td>
                            <td>{{$todayCollection->mobile}}</td>
                            <td>{{$todayCollection->designation}}</td>
                            <td>{{$todayCollection->gender}}</td>
                            <td>{{$todayCollection->collection}}</td>
                        </tr>
                        @endforeach
                    </tbody>
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
        let currentDate = new Date().toJSON().slice(0, 10);
        $('#from').val(currentDate);
        $('#to').val(currentDate);

        $('#dataTable').dataTable();
        // add active class
        $("#tcCollectionsActive").addClass('active');
    });

    function showData(mdata) {
        $('#dataTable').DataTable().destroy();
        $('#dataTable').DataTable({
            "data": mdata,
            "processing": true,
            "method": "POST",
            columns: [{
                    data: 'name',
                    name: 'Name'
                },
                {
                    data: 'mobile',
                    name: 'Mobile No'
                },
                {
                    data: 'designation',
                    name: 'Designation'
                },
                {
                    data: 'gender',
                    name: 'Gender'
                },
                {
                    data: 'collection',
                    name: 'Collection'
                }
            ]
        });
    }

    $('#formData').submit(function(e) {
        var targetform = $('#formData');
        var murl = targetform.attr('action');
        var mdata = $("#formData").serialize();
        e.preventDefault();

        $.ajax({
            url: murl,
            type: "post",
            data: mdata,
            datatype: "json",
            success: function(mdata) {
                $('#dataTable').DataTable().destroy();
                showData(mdata);
            },

            error: function(error) {
                var mError = JSON.stringify(error.responseJSON.errors);
            },
        });
    });
</script>
@endsection