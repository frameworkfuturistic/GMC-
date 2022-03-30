@extends('app')

@section('page_content')
<div style="background-image:url(img/bg1.png)">
    <div class="container page-color">
        <h1 class="unified">
            <br />
            <strong>(Unified portal for Advertisement Application for Jharkhand State ULBs)</strong>
            <br /><br />
        </h1>
        <div class="row">
            <div class="col-md-6">
                <!-- form -->
                <form action="" class="myform">
                    <div class="mb-3 row">
                        <label for="">To apply online please select an Urban Local Body</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="city" class="select2">
                                <option value=""></option>
                                <option value="Ranchi" selected>Ranchi</option>
                            </select>
                        </div>
                        <button class="col-sm-2 btn btn-success" type="button" id="apply"><i class="fa fa-forward fa-sm"></i>Apply</button>
                    </div>
                    <div class="mb-3 row">
                        <label for="">Select ULB to See Advertisement Tax Fees and Procedures</label>
                        <div class="col-sm-10">
                            <select class="form-control">
                                <option value=""></option>
                                <option value="Ranchi" selected>Ranchi</option>
                            </select>
                        </div>
                        <button class="col-sm-2 btn btn-primary" type="button"><i class="fa fa-eye fa-sm"></i>SeeDoc</button>
                    </div>
                </form>
                <!-- form -->
            </div>
            <div class="col-md-6">
                <img src="img/map.png" alt="img" style="width: 100%;">
            </div>
        </div>
        <br>
        <h1 class="unified">
            <br>
            <strong>Jharkhand State Urban Development Authority</strong>
            <br>
            <br>
        </h1>
    </div>
</div>
@endsection

@section('myscript')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function(){
        var $select2 = $(".select2");
        $select2.select2();
        $("#apply").click(function(event){
            event.preventDefault();
            Swal.fire({
                title: 'Login Form',
                html:`
                    <form action="generateOTP" method="POST">
                        @csrf
                        <input type="text" id="mobile" name="mobile" class="swal2-input" placeholder="Mobile No" required> <br>
                        <button class="swal2-confirm swal2-styled" id="OTP">Send OTP</button>
                    </form> 
                `,
                }).then((result) => {
                    Swal.fire({
                        html:`
                            <input type="text" class="swal2-input" placeholder="OTP" required>
                            <button class="swal2-confirm swal2-styled" onclick="location.replace('rnc/user/Dashboard')">Verify</button>
                        `,
                    })
                })
        });
    });
    </script>
@endsection
