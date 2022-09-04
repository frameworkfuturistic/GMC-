@extends('admin.app')

@section('pagecss')

@endsection

@section('heading')
Shop Bill Payments
@endsection

@section('shopPaymentActive')
class="active"
@endsection

@section('app-content')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session()->get('message') }}
</div>
@endif
<div class="card">
    <div class="card-body collapse in">
        <div class="card-block">
            <form class="form" action="shops/payments/bill-payments" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <h4 class="form-section"><i class="fa fa-shop"></i> Shop Payment Entry</h4>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="shopNo">Shop No</label>
                            <input type="text" id="shopNo" class="form-control" placeholder="Shop No" name="shopNo" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" id="amount" class="form-control" placeholder="Amount" name="amount" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="from">From</label>
                            <input type="month" id="from" class="form-control" placeholder="From" name="from" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="to">To</label>
                            <input type="month" id="to" class="form-control" placeholder="to" name="to" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rate">Rate</label>
                            <input type="text" id="rate" class="form-control" placeholder="rate" name="rate" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="paymentDate">Payment Date</label>
                            <input type="date" id="paymentDate" class="form-control" placeholder="Payment Date" name="paymentDate" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="photoUpload">Receipt Upload <strong class="note">(jpg,jpeg,png)</strong></label>
                            <input type="file" id="photoUpload" class="form-control" name="photoUpload">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <input type="text" class="form-control" id="remarks" name="remarks">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="collectedBy">Collected By</label>
                            <select name="collectedBy" id="collectedby" class="form-control" required>
                                <option value="">-- Select Users --</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
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
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#shopPaymentActive').addClass('active');
    })
</script>
@endsection