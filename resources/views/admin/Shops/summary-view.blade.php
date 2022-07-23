@extends('admin.Shops.app')

@section('pagecss')

@endsection

@section('heading')
Collection Summary
@endsection

@section('shopSummaryActive')
class="active"
@endsection

@section('app-content')
{{-- Today Toll Collection --}}
<div class="col-xl-4 col-lg-6 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="media">
                <div class="p-2 text-xs-center bg-pink bg-darken-2 media-left media-middle">
                    <i class="icon-banknote font-large-2 white"></i>
                </div>
                <div class="p-2 bg-pink white media-body">
                    <h5>Today's Toll Collections</h5>
                    <h5 class="text-bold-400">{{$today_total_toll}} ₹</h5>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Today Shop Collection --}}
<div class="col-xl-4 col-lg-6 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="media">
                <div class="p-2 text-xs-center bg-green bg-darken-2 media-left media-middle">
                    <i class="icon-banknote font-large-2 white"></i>
                </div>
                <div class="p-2 bg-green white media-body">
                    <h5>Today's Shop Collections</h5>
                    <h5 class="text-bold-400">{{$today_total_shop}} ₹</h5>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Toll Collection Between Dates --}}
<div class="col-xl-6 col-lg-6 col-xs-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Toll Collections</div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <div class="media">

                    <form action="tollcollection" class="form" method="POST" id="TollTotalCollection">
                        @csrf 
                        <div class="form-group col-md-6">
                            <label for="TollFrom">From</label>
                            <div class="position-relative has-icon-left">
                                <input type="date" id="TollFrom" name="TollFrom" class="form-control" name="date">
                                <div class="form-control-position">
                                    <i class="icon-calendar5"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="TollTo">To</label>
                            <div class="position-relative has-icon-left">
                                <input type="date" id="TollTo" name="TollTo" class="form-control" name="date">
                                <div class="form-control-position">
                                    <i class="icon-calendar5"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="icon-eye"></i> See Collection
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Toll Collection Between Dates --}}

{{-- Shop Collection between Dates --}}
<div class="col-xl-6 col-lg-6 col-xs-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Shop Collections</div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <div class="media">

                    <form action="totalshopcollection" class="form" method="POST" id="TotalShopCollection">
                        @csrf 

                        <div class="form-group col-md-6">
                            <label for="ShopFrom">From</label>
                            <div class="position-relative has-icon-left">
                                <input type="date" id="ShopFrom" name="ShopFrom" class="form-control" name="date">
                                <div class="form-control-position">
                                    <i class="icon-calendar5"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ShopTo">To</label>
                            <div class="position-relative has-icon-left">
                                <input type="date" id="ShopTo" name="ShopTo" class="form-control" name="date">
                                <div class="form-control-position">
                                    <i class="icon-calendar5"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="icon-eye"></i> See Collection
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Shop Collection between Dates --}}

@endsection

@section('script')
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){
        // add active class
        $("#shopSummaryActive").addClass('active');

        $('#TollTotalCollection').on('submit',function(e){
            showTotalTollCollection(e);
        });

        $('#TotalShopCollection').on('submit',function(e){
            showTotalShopCollection(e);
        });
    });
</script>
<script>
    // Total Toll Collection
    function showTotalTollCollection(e){
        var targetform = $('#TollTotalCollection');
        var murl = targetform.attr('action');
        var mdata = $("#TollTotalCollection").serialize();
        e.preventDefault();

        $.ajax({
            url: murl,
            type: "post",
            data: mdata,
            datatype: "json",
            success: function (mdata) {
                swal({
                 title: mdata + "₹",
                 text: "Total Toll Collection",
                 icon: "success",
                 button: "Ok!",
             });
            },

            error: function (error) {
                alert(error);
            },
        });
    }

    // Total Shop Collection
    function showTotalShopCollection(e){
        var targetform = $('#TotalShopCollection');
        var murl = targetform.attr('action');
        var mdata = $("#TotalShopCollection").serialize();
        e.preventDefault();

        $.ajax({
            url: murl,
            type: "post",
            data: mdata,
            datatype: "json",
            success: function (mdata) {
                swal({
                 title: mdata + "₹",
                 text: "Total Shop Collection",
                 icon: "success",
                 button: "Ok!",
             });
            },

            error: function (error) {
                alert(error);
            },
        });
    }
</script>
@endsection 