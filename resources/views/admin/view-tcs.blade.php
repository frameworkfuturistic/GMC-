@extends('admin.app')

@section('heading')
Generate Illigal Notice
@endsection

@section('pagecss')

@endsection

@section('activeDash')
class="active"
@endsection

@section('app-content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-block">
                <!-- Table -->
                <div class="">
                    <table class="table table-stripe table-responsive mb-0 display" id="datatable">
                        <thead class="">
                            <tr>
                                <th>#</th>
                                <th>TC Name</th>
                                <th>Occupied Location</th>
                                <th>Mobile No</th>
                            </tr>
                            @foreach($tcs as $key=>$tc)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$tc->name}}</td>
                                <td>{{$tc->location}}</td>
                                <td>{{$tc->mobile_no}}</td>
                            </tr>
                            @endforeach
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- Table -->
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
    $(document).ready(function() {
        $("#dash2Active").addClass('active');
    })
</script>
@endsection