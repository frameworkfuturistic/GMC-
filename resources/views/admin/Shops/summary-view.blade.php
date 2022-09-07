@extends('admin.app')

@section('pagecss')
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
@endsection

@section('heading')
Collection Summary
@endsection

@section('shopSummaryActive')
class="active"
@endsection

@section('app-content')

<!-- Pills -->
<ul class="nav nav-pills nav-justified">
    <li class="nav-item">
        <a class="nav-link active" id="active-pill" data-toggle="pill" href="#active" aria-expanded="true">Tolls</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="link-pill" data-toggle="pill" href="#link" aria-expanded="false">Shops</a>
    </li>
</ul>
<!-- Pills -->
<!-- Pills Components -->
<div class="tab-content px-1 pt-1">
    <div role="tabpanel" class="tab-pane active" id="active" aria-labelledby="active-pill" aria-expanded="true">
        {{-- Today Toll Collection --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="p-2 text-xs-center bg-pink bg-darken-2 media-left media-middle">
                            <i class="fa fa-inr font-large-2 white"></i>
                        </div>
                        <div class="p-2 bg-pink white media-body">
                            <h5>Today's Toll Collections</h5>
                            <h5 class="text-bold-400">{{$today_total_toll}} ₹</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Wise Search -->
        <!-- Search By Date Form -->
        <div class="col-md-6 mt-15">
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

                <div class="form-group col-md-5">
                    <label for="TollTo">To</label>
                    <div class="position-relative has-icon-left">
                        <input type="date" id="TollTo" name="TollTo" class="form-control" name="date">
                        <div class="form-control-position">
                            <i class="icon-calendar5"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-1" style="margin-top: 12px;">
                    <label for=""></label>
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="icon-eye"></i> See Collection
                    </button>
                </div>
            </form>
        </div>
        <!-- Search By Date form -->
        <!-- Form Wise Search -->
        {{-- Today Toll Collection --}}
        {{-- Toll Collection Between Dates --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <!-- Data Table Summary -->
                            <div class="table-responsive">
                                <table class="table table-hover" id="tollDataTable">
                                    <thead>
                                        <tr>
                                            <th>StallNo</th>
                                            <th>VendorName</th>
                                            <th>Area</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>PaymentDate</th>
                                            <th>Tax Collected By</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="8" style="text-align:right">Total:</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- Data Table Summary -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Toll Collection Summary Table -->

            <!-- Toll Collection Summary Table -->
        </div>
        {{-- Toll Collection Between Dates --}}
    </div>

    <!-- Shops -->
    <div class="tab-pane" id="link" role="tabpanel" aria-labelledby="link-pill" aria-expanded="false">
        {{-- Today Shop Collection --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="p-2 text-xs-center bg-green bg-darken-2 media-left media-middle">
                            <i class="fa fa-inr font-large-2 white"></i>
                        </div>
                        <div class="p-2 bg-green white media-body">
                            <h5>Today's Shop Collections</h5>
                            <h5 class="text-bold-400">{{$today_total_shop}} ₹</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Collection between Dates -->
        <div class="col-md-6 mt-15">
            <form action="shops/totalshopcollection" class="form" method="POST" id="TotalShopCollection">
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

                <div class="form-group col-md-5">
                    <label for="ShopTo">To</label>
                    <div class="position-relative has-icon-left">
                        <input type="date" id="ShopTo" name="ShopTo" class="form-control" name="date">
                        <div class="form-control-position">
                            <i class="icon-calendar5"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-1">
                    <button type="submit" class="btn btn-danger btn-sm" style="margin-top: 32px;">
                        <i class="icon-eye"></i> See Collection
                    </button>
                </div>
            </form>
        </div>
        {{-- Shop Collection between Dates --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <!-- Data Table Summary -->
                            <div class="table-responsive">
                                <table class="table table-hover" id="shopDataTable">
                                    <thead>
                                        <tr>
                                            <th>ShopNo</th>
                                            <th>Location</th>
                                            <th>Allottee</th>
                                            <th>PaidFrom</th>
                                            <th>PaidTo</th>
                                            <th>Amount</th>
                                            <th>Rate</th>
                                            <th>Months</th>
                                            <th>PaymentDate</th>
                                            <th>Tax Collected By</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="9" style="text-align:right">Total:</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- Data Table Summary -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Shop Collection between Dates --}}
    </div>
    <!-- Shops -->
</div>
<!-- Pills Components -->

@endsection

@section('pagescript')
<script src="js/custom-js/Shops/summary-view.js"></script>
<script src="js/datatable_buttons/dataTables.buttons.min.js"></script>
<script src="js/datatable_buttons/jszip.min.js"></script>
<script src="js/datatable_buttons/pdfmake.min.js"></script>
<script src="js/datatable_buttons/vfs_fonts.js"></script>
<script src="js/datatable_buttons/buttons.html5.min.js"></script>
<script src="js/datatable_buttons/buttons.print.min.js"></script>
<script type="text/javascript" src="js/sweetalert.min.js"></script>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // add active class
        $("#shopSummaryActive").addClass('active');

        $('#TollTotalCollection').on('submit', function(e) {
            showTotalTollCollection(e);
        });

        $('#TotalShopCollection').on('submit', function(e) {
            showTotalShopCollection(e);
        });
    });
</script>
<script>
</script>
@endsection