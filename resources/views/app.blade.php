<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUDA Advertisement Applications</title>
    <base href="/">
    <!-- bootstrap css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- google font anton -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <!-- open sans -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&display=swap" rel="stylesheet">
    <!-- open sans -->
    <!-- patua one -->
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    <!-- patue ones -->
    <!-- font awesome css -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- font awesome css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Latest compiled and minified CSS -->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- mycss -->
    @yield('mycss')

</head>

<body>
    <!-- header -->
    <!-- navbar  -->
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-button" style="background: #007050;height: 65px;">
        <div class="container"><a class="navbar-brand" href="/">Government of Jharkhand</a><button
                class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1"><span
                    class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div id="navcol-1" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto"></ul>
                <span class="navbar-text actions">
                    <a class="btn btn-light action-button" role="button" href="{{ Route('login')}}"><i
                            class="fa fa-sign-in fa-sm"></i> Login</a>
                </span>
            </div>
        </div>
    </nav>
    <!-- navbar -->
    <div class="container header">
        <div>
            <div class="row">
                <div class="col-md-2">
                    <img src="http://rmchams.com/Content/assets1/img/Jharkhand_emblem.png" class="img-fluid">
                </div>

                <div class="col-md-10">
                    <h2 class="heading-text">
                        Urban Development and Housing Department
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- header -->
    <!-- body -->
    @yield('page_content')
    <!-- body -->
    <!-- footer-dark -->
    <footer class="footer-dark" data-aos="fade-up">
        <div class="container">
            <h3 class style="text-align: center;font-size: 20px;"><br />Application Status for Jharkhand ULBs<br /></h3>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5 class="text-center">Self Advertisement</h5>
                    <ul>
                        <li style="text-align: center;">No of Applications <span class="badge bg-success">42</span><span
                                class="badge bg-success" style="background: var(--bs-blue);"></span></li>
                        <li style="text-align: center;">Approved <span class="badge bg-success">42</span></li>
                        <li style="text-align: center;">Rejected <span class="badge bg-success">42</span></li>
                        <li style="text-align: center;">Pending <span class="badge bg-success">42</span></li>
                    </ul>
                    <ul class="list-group"></ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-center">Vehicle</h5>
                    <ul style="text-align: center;">
                        <li style="text-align: center;">No of Applications  <span class="badge bg-success">42</span>
                        </li>
                        <li>Approved  <span class="badge bg-success">42</span></li>
                        <li>Rejected  <span class="badge bg-success">42</span></li>
                        <li>Pending  <span class="badge bg-success">42</span></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h1 style="text-align: center;font-size: 20.4px;">Private Land</h1>
                    <ul>
                        <li style="text-align: center;">No of Applications <span class="badge bg-success">42</span></li>
                        <li style="text-align: center;">Approved <span class="badge bg-success">42</span><br /></li>
                        <li style="text-align: center;">Rejected <span class="badge bg-success">42</span><br /></li>
                        <li style="text-align: center;">Pending <span class="badge bg-success">42</span><br /></li>
                    </ul>
                </div>
                <div class="col-md-3" style="text-align: center;">
                    <h1 style="text-align: center;font-size: 20.4px;">Hoarding</h1>
                    <ul>
                        <li>No of Applications <span class="badge bg-success">42</span><br /></li>
                        <li>Approved <span class="badge bg-success">42</span><br /></li>
                        <li>Rejected <span class="badge bg-success">42</span><br /></li>
                        <li>Pending <span class="badge bg-success">42</span><br /></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <p class="copyright">Company Name © 2022</p>
        </div>
    </footer>
    <!-- footer-dark -->
</body>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- select js -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- mycss -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- jquery select2 -->
<!-- jquery cdn -->
@yield('myscript')

</html>
