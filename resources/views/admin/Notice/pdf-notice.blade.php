<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JNAC</title>

    <base href="/">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @media print {
            .print_watermark {
                background-repeat: no-repeat !important;
                background-position: center !important;
                -webkit-print-color-adjust: exact;
                z-index: 999;
            }
        }

        .back-img {
            float: left;
            width: 100%;
            text-align: center;
            position: absolute;
            opacity: 0.3;
            top: 250px;
        }

        .print_watermark {
            background-color: #FFFFFF;
            background-repeat: no-repeat;
            background-position: center;
            z-index: 999;
        }

        #para {
            color: #000;
        }
    </style>
</head>

<body>
    <div id="content-container" class="container">
        <div id="page-content">
            <div class="panel panel-bordered panel-mint">
                <div class="panel-body" style="position: relative;">
                    <div class="col-sm-12 noprint text-right">
                        <button class="btn btn-mint btn-icon" onclick="print();"><i class="fa fa-print"></i></button>
                    </div>
                    <div class="back-img">
                        <img class="" src="img/JNAC.png" alt="" width="400">
                    </div>
                    <div class="print_watermark">
                        <div class="row">
                            <div class="col-md-12" style="text-align: center;">
                                <img style="height:80px;width:80px; border-radius: 50px;" src='img/JNAC.png'>
                                <br>
                                <label style="color:#000;">
                                    <strong style="font-size:24px;">कार्यालय: <?php //echo  $ulb_details['ulb_name_hindi']; 
                                                                                ?></strong><br />
                                    <strong>
                                        <small>(राजस्व शाखा)</small><br>
                                        <small>कचहरी रोड, रांची, पिन नंबर -834001</small>
                                        <br>
                                        <small>E-mail ID - <span style="border-bottom:1.5px dotted black;">
                                                9939anshu@gmail.com
                                        </small>
                                    </strong>
                                </label><br />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mar-lft">
                                <label style="font-size:14px; font-weight: bold;">पत्रांक : </label>
                            </div>
                            <div class="col-md-3">
                                <label style="font-size:14px; font-weight: bold;">दिनांक : <span style="border-bottom:1.5px dotted black;"><?php //echo  date('d-m-y')   
                                                                                                                                            ?></span></label>
                            </div>
                            <div class="col-md-12" style="text-align: center;">
                                <label style="font-weight: bold; font-size:20px;text-decoration: underline;">सूचना</label> <br />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>
                                    <label style="font-size:14px;">श्री / श्रीमती /मेसर्स :
                                        <span style="border-bottom:1.5px dotted black;">
                                            Anshu Kumar
                                        </span>
                                    </label>
                                </strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>
                                    <label style="font-size:14px;">पिता/पति का नाम :
                                        <span style="border-bottom:1.5px dotted black;">
                                            Anshu Kumar
                                        </span>
                                    </label>
                                </strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>
                                    <label style="font-size:14px;">होल्डिंग नंबर :
                                        <span style="border-bottom:1.5px dotted black;">
                                            asdfadsf
                                        </span>
                                    </label>
                                </strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>
                                    <label style="font-size:14px;">पता :
                                        <span style="border-bottom:1.5px dotted black;">
                                            asdfafds
                                        </span>
                                    </label>
                                </strong>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <p id="para" style="text-align: justify;">
                                    झारखण्ड नगरपालिका अधिनियम 2011 की धारा 590 द्वारा प्रदत्त शक्तियों का प्रयोग करते हुए झारखण्ड के राज्यपाल नगर विकास एवं आवास विभाग, झारखण्ड, राँची की अधिसूचना 1511 दिनांक 29.04.2022 के अनुसार झारखण्ड नगरपालिका सम्पत्ति कर (निर्धारण, संग्रहण और वसूली) में संशोधन किया गया है. इस संशोधन के अनुसार झारखण्ड राज्य के सभी नगर निगम, परिषद और पंचायत में रहने वाले आम नागिरिकों और व्यवसायियों को सुचित किया जाता है कि अब से होल्डिंग टैक्स कि वसुली सर्किलरेट के लिए नियमों के आधार पर वित्तीय वर्ष 2022 के अप्रैल महीने से की जाएगी.
                                </p>
                            </div>

                            <div class="col-md-12">
                                <p id="para" style="text-align: justify;">
                                    {{$data['description']}}
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://gestion.vitas.com.ar/ui/assets/images/signature.png" alt="">
                            </div>
                            <div class="col-md-12">
                                <label for=""><strong>Digital Signature</strong></label>
                            </div>
                        </div>
                        <br>
                        <div class="row" style="text-align: center;">
                            <label for="">
                                <div class="alert alert-success">This is a computer-generated document. No signature is required</div>
                            </label>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </div>
</body>

</html>