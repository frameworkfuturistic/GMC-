<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SUDA Advertisement Applications</title>
    <link rel="stylesheet" href="Landing/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Landing/https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="Landing/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="Landing/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="Landing/assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="Landing/assets/css/style.css">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Tai+Heritage+Pro:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <!-- GOOGLE FONTS -->
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-success" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-start" href="/">
                <img src="Landing/assets/img/RMC_LOGO.png" alt="" class="logo-top">
                GOVERNMENT OF&nbsp; JHARKHAND</a>
            <a href="{{ route('login') }}" class="btn btn-primary" type="button">Login</a>
        </div>
    </nav>

    <!-- ===================================== HEADER ============================================= -->
    <header class="masthead" style="background-image:url('Landing/assets/img/header1-bg.jpg');">
        <div class="container">
                <div class="intro-text">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="Landing/assets/img/Jharkhand_emblem.png" class="logo-slider" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="intro-heading text-uppercase"><span data-aos="fade-up">Urban developement and housing department</span></div>
                        </div>
                    </div>
            </div>
        </div>
    </header>
    <!-- ===================================== HEADER ============================================= -->

    <!-- ==================================PAGE SECTION ============================================ -->
    @yield('page-section')
    <!-- =====================================PAGE SECTION =========================================== -->
    <!-- =================================== FOOTER ============================================= -->
    <footer class="footer-dark" data-aos="fade-up">
        <div class="container">
            <h3 class="" style="text-align: center;font-size: 20px;"><br>Application Status for Jharkhand ULBs<br></h3>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5 class="text-center">Self Advertisement</h5>
                    <ul>
                        <li style="text-align: center;">No of Applications&nbsp;<span class="badge bg-success">42</span><span class="badge bg-success" style="background: var(--bs-blue);"></span></li>
                        <li style="text-align: center;">Approved&nbsp;<span class="badge bg-success">42</span></li>
                        <li style="text-align: center;">Rejected&nbsp;<span class="badge bg-success">42</span></li>
                        <li style="text-align: center;">Pending&nbsp;<span class="badge bg-success">42</span></li>
                    </ul>
                    <ul class="list-group"></ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-center">Vehicle</h5>
                    <ul style="text-align: center;">
                        <li style="text-align: center;">No of Applications&nbsp;&nbsp;<span class="badge bg-success">42</span>
                        </li>
                        <li>Approved&nbsp;&nbsp;<span class="badge bg-success">42</span></li>
                        <li>Rejected&nbsp;&nbsp;<span class="badge bg-success">42</span></li>
                        <li>Pending&nbsp;&nbsp;<span class="badge bg-success">42</span></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h1 style="text-align: center;font-size: 20.4px;">Private Land</h1>
                    <ul>
                        <li style="text-align: center;">No of Applications&nbsp;<span class="badge bg-success">42</span></li>
                        <li style="text-align: center;">Approved&nbsp;<span class="badge bg-success">42</span><br></li>
                        <li style="text-align: center;">Rejected&nbsp;<span class="badge bg-success">42</span><br></li>
                        <li style="text-align: center;">Pending&nbsp;<span class="badge bg-success">42</span><br></li>
                    </ul>
                </div>
                <div class="col-md-3" style="text-align: center;">
                    <h1 style="text-align: center;font-size: 20.4px;">Hoarding</h1>
                    <ul>
                        <li>No of Applications&nbsp;<span class="badge bg-success">42</span><br></li>
                        <li>Approved&nbsp;<span class="badge bg-success">42</span><br></li>
                        <li>Rejected&nbsp;<span class="badge bg-success">42</span><br></li>
                        <li>Pending&nbsp;<span class="badge bg-success">42</span><br></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <p class="copyright">Copyright RMC © 2022</p>
        </div>
    </footer>
    <!-- =================================== FOOTER ============================================== -->
    <script src="Landing/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="Landing/assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="Landing/assets/js/agency.js"></script>
</body>

</html>