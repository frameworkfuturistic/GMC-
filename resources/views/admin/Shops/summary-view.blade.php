@extends('admin.app')

@section('pagecss')

@endsection

@section('heading')
Collection Summary
@endsection

@section('shopSummaryActive')
class="active"
@endsection

@section('app-content')
<div class="col-xl-4 col-lg-6 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="media">
                <div class="p-2 text-xs-center bg-pink bg-darken-2 media-left media-middle">
                    <i class="icon-banknote font-large-2 white"></i>
                </div>
                <div class="p-2 bg-pink white media-body">
                    <h5>Total Shop Collections</h5>
                    <h5 class="text-bold-400">{{$total_shop}} ₹</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        // add active class
        $("#shopSummaryActive").addClass('active');
    })
</script>
@endsection 