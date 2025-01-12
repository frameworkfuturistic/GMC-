@extends('admin.app')

@section('pagecss')
<link rel="stylesheet" href="css/dataTables.min.css">
@endsection

@section('heading')
Designation Entry
@endsection

@section('designations')
class="active"
@endsection

@section('app-content')
<ul class="nav nav-pills nav-justified mb-8">
    <li class="nav-item col-md-4">
        <a class="nav-link active" id="active-pill" data-toggle="pill" href="#active" aria-expanded="true">Manage
            Designations</a>
    </li>
</ul>
{{-- Error Messages --}}
@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x</span>
    </button>
    <ul class="list-unstyled">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{{-- Error Messages --}}
<!-- pending verifications -->
<div class="card">
    <div class="card-body">
        <div class="card-header">
            <div class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#default"><i
                        class="fa fa-plus-circle"></i> Add Designation</button>
            </div>
        </div>
        <div class="card-block">
            {{-- Tab Previews --}}
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1"
                        aria-expanded="true">Designation Entry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2"
                        aria-expanded="false">Details</a>
                </li>
            </ul>
            {{-- Tab Previews --}}
            <div class="mb-top">
                <div class="row">
                    {{-- grid-9 --}}
                    <div class="col-md-9">
                        {{-- Tab Contents --}}
                        <div class="tab-content">
                            {{-- Tab 1 --}}
                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true"
                                aria-labelledby="base-tab1">
                                <!-- table -->
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Designation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- table -->
                            </div>
                            {{-- Tab 1 --}}
                            {{-- Tab 2 --}}
                            <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                {{-- Form --}}
                                <form action="update-designation" id="updateDesignation" method="post">
                                    @csrf
                                    <table class="table table-hover">
                                        <tr>
                                            <td><label for="designationUpd">Designation</label></td>
                                            <input type="hidden" id="id" name="id">
                                            <td><input type="text" class="form-control" id="designationUpd"
                                                    name="designationUpd"></td>
                                            <td colspan="2"><button type="submit" class="btn btn-primary"><i
                                                        class="fa fa-edit"></i> Update</button></td>
                                        </tr>
                                    </table>
                                </form>
                                {{-- Form --}}
                            </div>
                            {{-- Tab 2 --}}
                        </div>
                        {{-- Tab Contents --}}
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

{{-- Preview Modal for Add New Designation --}}
<div class="modal fade text-xs-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel1"><i class="fa fa-plus-circle"></i> Add New Designation</h4>
            </div>
            {{-- form --}}
            <form action="add-designation" method="POST" id="addDesignation">
                @csrf
                <div class="modal-body">
                    <label for="designation">New Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Save changes</button>
                </div>
            </form>
            {{-- form --}}
        </div>
    </div>
</div>
{{-- Preview Modal for Add new Designation --}}

@section('script')
<script src="js/dataTables.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/custom-js/designation.js"></script>

<script>
    $(document).ready(function () {
        $("#designations").addClass('active');
        fetchData();
    });

    $('#addDesignation').submit(function (e) {
        saveDesignation(e);
    });

    $('#updateDesignation').submit(function (e) {
        updateDesignation(e);
    });

</script>
@endsection
