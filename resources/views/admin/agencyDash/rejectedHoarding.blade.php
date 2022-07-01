@extends('admin.agencyDash.app')

@section('heading')
Current Hoarding
@endsection

@section('pagecss')
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
@endsection

@section('activeRejectedHoarding')
active
@endsection

@section('app-content')
<div class="card">
    <div class="card-header">
        <div class="card-title my-card-title">Rejected Hoarding</div>
    </div>
    <div class="card-body">
        <div class="container-fluid table-responsive mb-top">
            <table class="table table-responsive table-hover table-striped display" id="datatable">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>TempID</th>
                        <th>AppDate</th>
                        <th>Lic.Year</th>
                        <th>Location</th>
                        <th>Length</th>
                        <th>Width</th>
                        <th>Area</th>
                        <th>Landmark</th>
                        <th>Face</th>
                        <th>Illumination</th>
                        <th>PropertyType</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <button class="btn btn-success btn-sm"><i class="icon-pen"></i>
                                Details
                            </button>
                        </td>
                        <td>RMC/0001</td>
                        <td>10-09-2020</td>
                        <td>2018</td>
                        <td>Ranchi</td>
                        <td>20</td>
                        <td>20</td>
                        <td>400</td>
                        <td>Near SBI ATM</td>
                        <td>NORTH</td>
                        <td>YES</td>
                        <td>Public</td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-success btn-sm"><i class="icon-pen"></i>
                                Details
                            </button>
                        </td>
                        <td>RMC/0001</td>
                        <td>10-09-2020</td>
                        <td>2018</td>
                        <td>Ranchi</td>
                        <td>20</td>
                        <td>20</td>
                        <td>400</td>
                        <td>Near SBI ATM</td>
                        <td>NORTH</td>
                        <td>YES</td>
                        <td>Public</td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-success btn-sm"><i class="icon-pen"></i>
                                Details
                            </button>
                        </td>
                        <td>RMC/0001</td>
                        <td>10-09-2020</td>
                        <td>2018</td>
                        <td>Ranchi</td>
                        <td>20</td>
                        <td>20</td>
                        <td>400</td>
                        <td>Near SBI ATM</td>
                        <td>NORTH</td>
                        <td>YES</td>
                        <td>Public</td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-success btn-sm"><i class="icon-pen"></i>
                                Details
                            </button>
                        </td>
                        <td>RMC/0001</td>
                        <td>10-09-2020</td>
                        <td>2018</td>
                        <td>Ranchi</td>
                        <td>20</td>
                        <td>20</td>
                        <td>400</td>
                        <td>Near SBI ATM</td>
                        <td>NORTH</td>
                        <td>YES</td>
                        <td>Public</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('pagescript')
<script src="js/datatable_buttons/dataTables.buttons.min.js"></script>
@endsection

@section('script')
<script>
    $('#datatable').DataTable();
</script>
@endsection