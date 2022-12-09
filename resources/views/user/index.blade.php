@extends('user.app')

@section('active')
active
@endsection

@section('app-content')
@if(session()->has('status'))
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{ session()->get('status') }}</strong>
</div>
@endif
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
                    <button data-toggle="modal" data-target="#exampleModal" onclick="showModal('Self Advertisement','rnc/user/selfAdvet');" type="button" type="button" class="btn btn-success"><i class="icon-check"></i> Apply Online</button>
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
                    <button data-toggle="modal" data-target="#exampleModal" onclick="showModal('Movable Vehicles','rnc/user/vehicle');" type="button" type="button" class="btn btn-success"><i class="icon-check"></i> Apply Online</button>
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
                    <button data-toggle="modal" data-target="#exampleModal" onclick="showModal('Private Land','rnc/user/land');" type="button" type="button" class="btn btn-success"><i class="icon-check"></i> Apply Online</button>
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
                    <button data-toggle="modal" data-target="#exampleModal" onclick="showModal('Agency Advertisement','rnc/user/agency');" type="button" type="button" class="btn btn-success"><i class="icon-check"></i> Apply Online</button>
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
                    <button data-toggle="modal" data-target="#exampleModal" onclick="showModal('Marriage/Banquet Hall','rnc/user/banquet');" type="button" type="button" class="btn btn-success"><i class="icon-check"></i> Apply Online</button>
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
                    <h4 class="card-title success">Lodge/Hostel</h4>
                    <p class="lead">Application</p>
                    <img src="content/img/hostel.png" alt="" class="font_img">
                    <h6 class="card-title success">You can apply for Lodge/ Hostel</h6>
                    <br>
                    <button data-toggle="modal" data-target="#exampleModal" onclick="showModal('Lodge/Hostel','rnc/user/hostel');" type="button" type="button" class="btn btn-success"><i class="icon-check"></i> Apply Online</button>
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
                    <h4 class="card-title success">Dharmasala</h4>
                    <p class="lead">Application</p>
                    <img src="content/img/multichannel.png" alt="" class="font_img">
                    <h6 class="card-title success">You can apply for Dharmasala</h6>
                    <br>
                    <button data-toggle="modal" data-target="#exampleModal" onclick="showModal('Dharmsala','rnc/user/dharmasala');" type="button" type="button" class="btn btn-success"><i class="icon-check"></i> Apply Online</button>
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
                                    <td><button type="submit" class="btn btn-success">Generate OTP</button></td>
                                </form>
                            </tr>
                            <tr>
                                <form action="user-authentication" method="POST">
                                    @csrf
                                    <input type="hidden" id="link" name="link" value="">
                                    <td><label for="otp">Enter OTP</label></td>
                                    <input type="hidden" id="mobile1" name="mobile1">
                                    <td><input type="text" class="form-control" id="otp" name="otp"></input></td>
                                    <td><button type="submit" class="btn btn-success">Submit</button></td>
                                </form>
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
        e.preventDefault();
        var mobile = document.getElementById('mobile').value;
        $('#mobile1').val(mobile);
        storeOTP(e);
    });
</script>
@endsection