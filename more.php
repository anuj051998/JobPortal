<?php require 'records.php'; ?>
<!DOCTYPE html>
<html>

<head>
<script data-ad-client="ca-pub-6173806387940866" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <link href="assets/img/favicon.png" rel="icon">
    <title>A2Softech Online Portal</title>
    <meta charset="utf-8">
    <meta name="description" content="Best Portal For Latest Government Jobs Information.">
    <meta name="keywords"
        content="A2softech,a2kash, anuj, 7489646229,a2softech.org.in,website designer, aakash pawar,best govt job information,railway job,admit card,result,mponline, pan card, driving license, railway ticket, passport application,mobile recharge, dth recharge, dth,mobile,mponline near me, ashoka garden , sunder nagar, subhash colony, shop, online portal , portal, ">
    <meta name="author" content="Aakash Pawar">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css//bootstrap.min.css">
    <!--<link rel="stylesheet" href="assets/css/font-awesome.min.css">-->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <style type="text/css">
    section {
        margin-top: 100px
    }

    .ast-comment-data-wrap,
    iframe,
    .code-block code-block-5,
    .code-block,
    .entry-meta,
    .wp-block-image,
    .post-thumb-img-content {
        display: none
    }
    </style>
</head>
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">

            <img src="assets/img/icons/topbar.png" />
        </div>
        <div class="d-flex align-items-center">
            <a href="https://api.whatsapp.com/send?phone=+917489646229&text=Hiy A2softech, " target="_blank"
                style="color: white">&nbsp;<i class="icofont-whatsapp"></i>Chat now ||</a>&nbsp;&nbsp;&nbsp;
            <a href="tel:+917489646229" target="_blank" style="color: white">&nbsp;<i class="icofont-phone"></i> Call
                now +91 7489 646229</a>
        </div>
    </div>
</div>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <a href="index.php" class="logo mr-auto">A2Softech<br><small class="text-muted" style="font-size: 50%">online
                portal</small> </a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="logo mr-auto"><a href="index.html">Medicio</a></h1> -->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a id="prev" href="index.php"> <img src="assets/img/icons/reply-arrow.png" />&nbsp;
                        Return </a> </li>


            </ul>
        </nav>

    </div>
</header><!-- End Header -->

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>A2kash</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <style type="text/css">
    article {
        border: solid 1px;
        border-color: grey
    }

    .aakash {
        padding: 2px
    }

    [role="button"] {
        outline: none
    }

    .cat-post-item {
        list-style: none;
        text-decoration: none;
        color: black
    }

    .cat-post-title {
        color: black;
        text-decoration: none;
        font-family: sans-serif;
    }

    a {
        color: red;
        text-decoration: none
    }
    </style>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <section>





        <?php 
	include('simple_html_dom.php');
	$html = file_get_html('https://allgovernmentjobs.in/jobs-in-madhya-pradesh');
echo "<div class='container-fluid container-md' id='inner'>";
	foreach($html->find('article') as $element){
		echo str_replace('https://allgovernmentjobs.in/', '#',$element);
}
echo '</div>';

?>
    </section>
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>A2Softech</h3>
                            <p>
                                Subhash Colony <br>
                                Ashoka Garden Bhopal<br><br>
                                <strong>Phone:</strong> +91 7489646229<br>
                                <strong>Email:</strong> a2kashpawar@gmail.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="https://twitter.com/a2softech" class="twitter"><i
                                        class="bx bxl-twitter"></i></a>
                                <a href="https://facebook.com/a2kashp" class="facebook"><i
                                        class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/a2kashp" class="instagram"><i
                                        class="bx bxl-instagram"></i></a>
                                <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
                                <a href="https://www.linkedin.com/in/aakash-pawar-a1522015b" class="linkedin"><i
                                        class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#tab-1">Govt Job</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#tab-2">Admit Card</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#tab-3">Result</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="../../web">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="../../web">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Subscribe to our news letter to get latest updates.</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>A2Softech</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
                Designed by <a href="https://a2softech.org.in">Anuj</a>
            </div>
        </div>
    </footer>
</body>

</html>
<script type="text/javascript">
$(document).ready(function() {
    $('[style="background-color:transparent"]').hide()
})

function anuj(i) {
    var link = "https://allgovernmentjobs.in/jobs-in-madhya-pradesh/page/" + i
    //console.log(link)
    $.ajax({
        type: "POST",
        url: "more_.php",
        target: "_blank",
        data: {
            page: link
        },
        success: function(data) {
            $('#inner').append(data)
        }
    })
}
$('table').attr('class', 'table table-bordered')

for (var i = 1; i <= 6; i++) {
    anuj(i)
}


setTimeout(function() {
    $('.btn-sm').attr('class', 'btn btn-sm m-0 btn-outline-primary waves-effect float-right btn-success')
    $('.btn').css('color', 'white')
}, 3000)



$(document).on('click', '.btn-sm', function() {
    var link = $(this).attr('href')

    $(this).attr('href', 'inner.php?nlink=' + link.replace('#', ''))
    $.ajax({
        type: "GET",
        url: "inner.php",
        target: "_blank",
        data: {
            nlink: link
        }
    })

})
</script>
