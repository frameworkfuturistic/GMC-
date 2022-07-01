@extends('admin.agencyDash.app')

@section('heading')
Hoarding Payments
@endsection

@section('activeHoardingPayment')
active
@endsection

@section('app-content')
<div class="card">
    <div class="card-block">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form class="form">
                    <div class="form-body">
                        <h4 class="form-section"><i class="icon-head"></i> Hoarding Payments</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">Bank Name</label>
                                    <input type="text" id="projectinput1" class="form-control" placeholder="First Name"
                                        name="fname">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2">MR No</label>
                                    <input type="text" id="projectinput2" class="form-control" placeholder="Last Name"
                                        name="lname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput3">E-mail</label>
                                    <input type="text" id="projectinput3" class="form-control" placeholder="E-mail"
                                        name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput4">Contact Number</label>
                                    <input type="text" id="projectinput4" class="form-control" placeholder="Phone"
                                        name="phone">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1">
                            <i class="icon-cross2"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="icon-check2"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
