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
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1"
                        aria-expanded="true">Shop List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2"
                        aria-expanded="false">Details</a>
                </li>
            </ul>
            <div class="tab-content px-1 pt-1">
                <!-- Shop List Tabs -->
                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                    <!-- DataTable -->
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>AlloteeName</th>
                                    <th>Shop</th>
                                    <th>Address</th>
                                    <th>ContactNo</th>
                                    <th>TradeLicense</th>
                                    <th>NoOfFloors</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shops as $shop)
                                <tr>
                                    <td><button class="btn btn-success btn-sm btnNext"
                                            onclick='detailPreview("{{$shop->id}}");'>Details</button></td>
                                    <td>{{$shop->Allotee}}</td>
                                    <td>{{$shop->ShopNo}}</td>
                                    <td>{{$shop->Address}}</td>
                                    <td>{{$shop->ContactNo}}</td>
                                    <td>{{$shop->TradeLicense}}</td>
                                    <td>{{$shop->NoOfFloors}}</td>
                                    <td>{{$shop->Latitude}}</td>
                                    <td>{{$shop->Longitude}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable -->
                </div>
                <!--\ Shop List Tabs -->
                <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                    <!-- -------------------------------------------------------------------------------- -->
                    <!-- Detail of Shops -->
                    <div class="col-md-9">
                        <div class="card-header card-bg">
                            <div class="card-title my-card-title">Details of Shop</div>
                        </div>
                        <!-- form -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="">
                             <input type="hidden" name="_method" value="put">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered">
                                    <tbody>
                                        <input type="hidden" value="">
                                        <tr>
                                            <td class="spin-label">Allotee <span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="allotee" class="allotee">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">ShopNo<span class="spin-separator spin-star">*</span>
                                            </td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="shopNo" name="shopNo">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Address<span
                                                    class="spin-separator spin-star">*</span>
                                            </td>
                                            <td class="spin-separator">:</td>

                                            <td>
                                                <input type="text" class="form-control" id="address" name="address">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Alloted Length(ft.)
                                                <span class="spin-separator spin-star">*</span>
                                            </td>
                                            <td class="spin-separator">:</td>

                                            <td>
                                                <input type="text" class="form-control" id="allLength" name="allLength">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Alloted Breadth(ft.)<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>

                                            <td>
                                                <input type="text" class="form-control" id="allBreadth"
                                                    name="allBreadth">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Alloted Height(ft.)<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="allHeight" name="allHeight">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Present Length(ft.)<span
                                                    class="spin-separator spin-star">*</span>
                                            </td>
                                            <td class="spin-separator">:</td>

                                            <td>
                                                <input type="text" class="form-control" id="preLength" name="preLength">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Present Breadth(ft.)<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="preBreadth"
                                                    name="preBreadth">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Present Height(ft.)<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="preHeight" name="preHeight">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">NoOfFloors<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="floors" name="floors">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Present Occupier<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="preOccu" name="preOccu">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Trade License<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <label
                                                        class="display-inline-block custom-control custom-radio ml-1">
                                                        <input type="radio" id="tradeLicense" name="tradeLicense"
                                                            class="custom-control-input" value="Yes">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description ml-0">Yes</span>
                                                    </label>
                                                    <label class="display-inline-block custom-control custom-radio">
                                                        <input type="radio" id="tradeLicense" name="tradeLicense" class="custom-control-input" value="No">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description ml-0">No</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Construction Type<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="constType" name="constType">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="spin-label">Water Connection<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <label
                                                        class="display-inline-block custom-control custom-radio ml-1">
                                                        <input type="radio" id="waterConnection" name="waterConnection"
                                                            class="custom-control-input" value="Yes">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description ml-0">Yes</span>
                                                    </label>
                                                    <label class="display-inline-block custom-control custom-radio">
                                                        <input type="radio" id="waterConnection" name="waterConnection"
                                                            class="custom-control-input" value="No">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description ml-0">No</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="spin-label">Electricity Connection<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <label
                                                        class="display-inline-block custom-control custom-radio ml-1">
                                                        <input type="radio" id="electricityConnection" name="electricityConnection"
                                                            class="custom-control-input" value="Yes">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description ml-0">Yes</span>
                                                    </label>
                                                    <label class="display-inline-block custom-control custom-radio">
                                                        <input type="radio" id="electricityConnection" name="electricityConnection"
                                                            class="custom-control-input" value="No">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description ml-0">No</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="spin-label">Sale Purchase</td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="salePurchase"
                                                    name="salePurchase">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="spin-label">Contact No<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="contact" name="contact">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="spin-label">Remarks</td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="remarks" name="remarks">
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="spin-label">Photograph Location<span
                                                    class="spin-separator spin-star">*</span></td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="photoLocation"
                                                    name="photoLocation">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="spin-label">Longitude</td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="longitude" name="longitude">
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="spin-label">Latitude</td>
                                            <td class="spin-separator">:</td>
                                            <td>
                                                <input type="text" class="form-control" id="latitude" name="latitude">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- form -->

                            <div class="form-actions center">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="icon-cross2"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- Detail of Shops -->
                    <!-- -------------------------------------------------------------------------------- -->
                    <!-- Help and Advisery -->
                    <div class="col-md-3">
                        <h4 class="card-title success">Help &amp; Advisory</h4>
                        <div class="alert alert-success">Please Note!!</div>
                        <p class="card-text">
                        </p>
                        <ul>
                            <li>Keep all the information handy before filling up the application form.
                            </li>
                            <li>You will have to visit RMC office for any correction regatding
                                application information.</li>
                            <li>Keep your address concise</li>
                            <li>Visit Market Section for further enquiry</li>
                        </ul>
                        <p></p>
                    </div>
                    <!-- Help and Advisory -->
                    <!-- -------------------------------------------------------------------------------- -->
                </div>
            </div>
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
    $(document).ready(function () {
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
            }
        });
        // add active class
        $("#shopActive").addClass('active');
    });

    function detailPreview(myid){
        $("#base-tab2").trigger("click");

        var mUrl="/rnc/getShops/"+ myid;

        $.ajax({
            url: mUrl,
            type: "GET",
            cache: false,
            contentType: "application/json;charset=utf-8",
            datatype: 'json',
            success: function(results){
                if(results==false){
                    alert("Result Not Found");
                }
                else{
                    $('#allotee').val(results.Allotee);
                    $('#shopNo').val(results.ShopNo);
                    $('#address').val(results.Address);
                    $('#allLength').val(results.Length1);
                    $('#allBreadth').val(results.Breadth1);
                    $('#allHeight').val(results.Height1);
                    $('#preLength').val(results.Length2);
                    $('#preBreadth').val(results.Breadth2);
                    $('#preHeight').val(results.Height2);
                    $('#floors').val(results.NoOfFloors);
                    $('#preOccu').val(results.PresentOccupier);
                    $('checkbox#tradeLicense').val(results.TradeLicense,'checked');
                    $('#constType').val(results.ConstructionType);
                    $('#waterConnection').val(results.WaterConnection);
                    $('#electricityConnection').val(results.ElectricityConnection);
                    $('#salePurchase').val(results.SalePurchase);
                    $('#contact').val(results.ContactNo);
                    $('#remarks').val(results.Remarks);
                    $('#photoLocation').val(results.PhotoLocation);
                    $('#longitude').val(results.Longitude);
                    $('#latitude').val(results.Latitude);
                }
            }
        })
    }

</script>
@endsection
