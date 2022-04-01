@extends('app')

@section('page_content')
<div style="background-image:url(img/bg1.png)">
    <div class="container page-color">
        <h1 class="unified">
            <br />
            <strong>(Register Hoarding Survey)</strong>
            <br /><br />
        </h1>
        <div class="row">
            <div class="col-md-6">
                <!-- form -->
                <form action="{{ url('api/saveSurveyUser') }}" class="myform" method="POST">

                    @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if(Session::get('fail'))
                        <div class="alert alert-success">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    @csrf
                    <!-- login form -->
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                                aria-describedby="addon-wrapping" name="name" id="name">
                        </div>
                        <br>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-envelope"></i></span>
                            <input type="text" class="form-control" placeholder="Email" aria-label="Email"
                                aria-describedby="addon-wrapping" name="email" id="email">
                        </div>
                        <br>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-key"></i></span>
                            <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                                aria-describedby="addon-wrapping" name="password" id="password">
                        </div>
                        <br>
                        <button class="btn btn-success"><i class="fa fa-forward fa-sm"></i> Register</button>
                    <!-- login form -->
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
