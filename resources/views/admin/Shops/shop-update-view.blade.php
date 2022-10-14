@extends('admin.app')

@section('heading')
Shop Details
@endsection

@section('shopactive')
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
    <div class="card-header">
        <div class="card-title">Update Shops</div>
    </div>
    <div class="card-body">
        <div class="card-block">
            <div class="offset-md-2 col-md-6">
                <form action="rnc/editShops" method="post">
                    @csrf
                    <label for="ShopNo">ShopNo</label>
                    <input type="hidden" id="id" name="id" value="{{$shop->ID}}">
                    <input type="text" class="form-control" value="{{$shop->ShopNo}}" disabled>
                    <br>
                    <label for="address">Address</label>
                    <input type="text" class="form-control" value="{{$shop->Address}}" disabled>
                    <br>
                    <label for="allottee">Allotte</label>
                    <input type="text" class="form-control" value="{{$shop->Allottee}}" id="allottee" name="allottee">
                    <br>

                    <label for="rate">Rate</label>
                    <input type="number" class="form-control" value="{{$shop->Rate}}" id="rate" name="rate" step="any">

                    <br>

                    <label for="arrear">Arrear</label>
                    <input type="number" class="form-control" value="{{$shop->Arrear}}" id="arrear" name="arrear" step="any">

                    <br>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // add active class
    $("#shopActive").addClass('active');
</script>
@endsection