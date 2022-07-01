@extends('admin.app')

@section('heading')
Add Users
@endsection

@section('usersActive')
class="active"
@endsection

@section('app-content')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session()->get('success') }}
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session()->get('error') }}
</div>
@endif

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <form class="form" action="rnc/store-users" id="submit" method="POST">
                        @csrf
                        <div class="form-body">
                            <h4 class="form-section"><i class="icon-head"></i> Personal Info</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" placeholder="Name"
                                            name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input type="email" id="email" class="form-control" placeholder="Email"
                                            name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">User Role</label>
                                        <select name="userType" id="userType" class="form-control" required>
                                            <option value="">Select User Role</option>
                                            <option value="0">User</option>
                                            <option value="2">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Password</label>
                                        <input type="password" id="pass" name="pass" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="CPass">Confirm Password</label>
                                        <input type="password" id="Cpass" name="Cpass" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions center">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="icon-cross2"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagescript')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('script')
<script>
    $('#submit').submit(function () {
        var getPass = document.getElementById('pass').value;
        var getPass1 = document.getElementById('Cpass').value;
        if (getPass != getPass1) {
            Swal.fire(
                'Oops!',
                'Password not Matched!',
                'error'
            )
            return false;
        } else {
            return true;
        }
    });

</script>
@endsection
