@extends('admin.app')

@section('pagecss')
<link rel="stylesheet" href="css/dataTables.min.css">
@endsection

@section('heading')
Manage Permission
@endsection

@section('permission')
class="active"
@endsection

@section('app-content')
<ul class="nav nav-pills nav-justified mb-8">
    <div class="row">
        <li class="nav-item col-md-4">
            <a class="nav-link active" id="active-pill" data-toggle="pill" href="#active" aria-expanded="true">Permissions</a>
        </li>
    
        <li class="nav-item col-md-4">
            <select name="" id="" class="form-control">
                <option value="">Select Designation</option>
                <option value="AMC">AMC</option>
                <option value="Tax Collector">Tax Collector</option>
                <option value="Collector">Collector</option>
            </select>
        </li>

        <li class="nav-item col-md-4">
            <select name="" id="" class="form-control">
                <option value="">Select Role</option>
                <option value="AMC">AMC</option>
                <option value="Tax Collector">Tax Collector</option>
                <option value="Collector">Collector</option>
            </select>
        </li>

    </div>
</ul>
<!-- pending verifications -->
<div class="card">
    <div class="card-body">
        <div class="card-block">
            <div class="mb-top">
                <div class="row">
                    {{-- grid-9 --}}
                    <div class="col-md-9">
                        <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true"
                            aria-labelledby="base-tab1">
                            <!-- table -->
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Menu String</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Self Advertisement Inbox</td>
                                            <td><input type="checkbox" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Self Advertisement Outbox</td>
                                            <td><input type="checkbox" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Self Advertisement Approved</td>
                                            <td><input type="checkbox" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Self Advertisement Rejected</td>
                                            <td><input type="checkbox" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- table -->
                        </div>
                    </div>
                    {{-- grid-9 --}}
                    {{-- grid-3 --}}
                    @include('admin.help-and-advisory')
                    {{-- grid-3 --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- pending verifications -->
@endsection


@section('script')
<script src="js/dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $("#permission").addClass('active');
        $('#dataTable').DataTable();
    });

</script>
@endsection
