@extends('user.app')

@section('active')
active
@endsection

@section('app-content')
<div class="row">
    <!-- menu-links -->
    <!-- self advertisement -->
    <div class="col-md-4">
        <div class="card text-xs-center">
            <div class="card-body">
                <div class="card-block">
                    <h4 class="card-title success">Self Advertisement</h4>
                    <p class="lead">License Application</p>
                    <img src="content/img/self.png" alt="">
                    <h6 class="card-title success">You can get license to advertise your business name on your shop</h6>
                    <button data-toggle="modal" data-target="#exampleModal" onclick="showModal('Self Advertisement');" type="button" type="button" class="btn btn-success"><i class="icon-check"></i> Apply Online</button>
                </div>
            </div>
        </div>
    </div>
    <!-- self advertisement -->
    <!-- Movable Vehicle -->
    <div class="col-md-4">
        <div class="card text-xs-center">
            <div class="card-body">
                <div class="card-block">
                    <h4 class="card-title success">Movable Vehicle</h4>
                    <p class="lead">License Application</p>
                    <img src="content/img/vehicle.jpg" alt="" class="font_img">
                    <h6 class="card-title success">You can get license to advertise your business name on your shop</h6>
                    <button data-toggle="modal" data-target="#exampleModal" onclick="showModal('Movable Vehicles');" type="button" type="button" class="btn btn-success"><i class="icon-check"></i> Apply Online</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Movable Vehicle -->
    <!-- Private Land -->
    <div class="col-md-4">
        <div class="card text-xs-center">
            <div class="card-body">
                <div class="card-block">
                    <h4 class="card-title success">Private Land</h4>
                    <p class="lead">License Application</p>
                    <img src="content/img/building.png" alt="" class="font_img">
                    <h6 class="card-title success">You can get license to advertise your business name on your shop</h6>
                    <a href="rnc/user/land" class="btn btn-success"><i class="icon-check"></i> Apply Online</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Private Land -->
    <!-- Agency Advertisement -->
    <div class="col-md-4">
        <div class="card text-xs-center">
            <div class="card-body">
                <div class="card-block">
                    <h4 class="card-title success">Agency Advertisement</h4>
                    <p class="lead">License Application</p>
                    <img src="content/img/citihall.png" alt="" class="font_img">
                    <h6 class="card-title success">Advertisement Agencies can apply to get License</h6>
                    <a href="rnc/user/agency" class="btn btn-success"><i class="icon-check"></i> Apply Online</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Agency Advertisement -->
    <!-- Banquet/Marriage Hall -->
    <div class="col-md-4">
        <div class="card text-xs-center">
            <div class="card-body">
                <div class="card-block">
                    <h4 class="card-title success">Banquet/Marriage Hall</h4>
                    <p class="lead">License Application</p>
                    <img src="content/img/citihall.png" alt="" class="font_img">
                    <h6 class="card-title success">Advertisement Agencies can apply to get License</h6>
                    <a href="rnc/user/banquet" class="btn btn-success"><i class="icon-check"></i> Apply Online</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Banquet/Marriage Hall -->
    <!-- New Lodge/Hostel -->
    <div class="col-md-4">
        <div class="card text-xs-center">
            <div class="card-body">
                <div class="card-block">
                    <h4 class="card-title success">New Lodge/Hostel</h4>
                    <p class="lead">Application</p>
                    <img src="content/img/hostel.png" alt="" class="font_img">
                    <h6 class="card-title success">You can apply for Lodge/ Hostel</h6>
                    <br>
                    <a href="rnc/user/hostel" class="btn btn-success"><i class="icon-check"></i> Apply Online</a>
                </div>
            </div>
        </div>
    </div>
    <!-- New Lodge/Hostel -->
    <!-- New Dharmasala -->
    <div class="col-md-4">
        <div class="card text-xs-center">
            <div class="card-body">
                <div class="card-block">
                    <h4 class="card-title success">New Dharmasala</h4>
                    <p class="lead">Application</p>
                    <img src="content/img/multichannel.png" alt="" class="font_img">
                    <h6 class="card-title success">You can apply for Dharmasala</h6>
                    <br>
                    <a href="rnc/user/dharmasala" class="btn btn-success"><i class="icon-check"></i> Apply Online</a>
                </div>
            </div>
        </div>
    </div>
    <!-- New Dharmasala -->
    <!-- menu-links -->

    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table">
                        <table class="table table-responsive">
                            <tr>
                                <form action="otp-master" id="otp-master" method="POST">
                                    @csrf
                                    <td><label for="mobile">Mobile No</label></td>
                                    <td><input type="text" class="form-control" id="mobile" name="mobile"></input></td>
                                    <td><button type="submit" class="btn btn-success">Send OTP</button></td>
                                </form>
                            </tr>
                            <tr>
                                <td><label for="otp">Enter OTP</label></td>
                                <td><input type="text" class="form-control" id="otp" name="otp"></input></td>
                                <td><button type="button" class="btn btn-success">Submit</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
</div>
@endsection

@section('script')
<script src="js/custom-js/apply-advertisements.js"></script>
<script src="js/sweetalert.min.js"></script>
<script>
    $('#otp-master').submit(function(e) {
        storeOTP(e);
    });
</script>
@endsection