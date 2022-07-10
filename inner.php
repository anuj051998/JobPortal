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
<style type="text/css">
  
	section{
		margin-top: 100px
	}
	.ast-comment-data-wrap, iframe,.code-block code-block-5,.code-block,.entry-meta,.wp-block-image,.post-thumb-img-content,.adsbygoogle,.code-block,#aswift_2_anchor{
		display: none
	}

  .social-share,body > section > div > div > div > center{
    display: none
  }


    .aakash{
      padding: 2px
    }
    [role="button"]{
      outline: none
    }
    .cat-post-item{
      list-style: none;
      text-decoration: none;
      color: black
    }
    .cat-post-title{
    color: black;
      text-decoration: none ;
      font-family: sans-serif;
    }
    a{
      color: red;
      text-decoration: none
    }
  </style>
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

  <!-- =======================================================
  * Template Name: Medicio - v2.0.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

            <a href="index.php" class="logo mr-auto">A2Softech<br><small class="text-muted" style="font-size: 50%">online portal</small> </a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Medicio</a></h1> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#" onclick="window.history.back();"> <img src="assets/img/icons/reply-arrow.png"/>&nbsp; Return </a> </li>
          

        </ul>
      </nav>

    </div>
  </header><!-- End Header -->
  </head>
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
          <img src="assets/img/icons/topbar.png"/>
      </div>
      <div class="d-flex align-items-center">
        <a href="https://api.whatsapp.com/send?phone=+917489646229&text=Hiy A2softech, " target="_blank" style="color: white">&nbsp;<i class="icofont-whatsapp"></i>Chat now ||</a>&nbsp;&nbsp;&nbsp;
        <a href="tel:+917489646229" target="_blank"  style="color: white">&nbsp;<i class="icofont-phone"></i> Call now +91 7489 646229</a>
      </div>
    </div>
  </div>
	<section>
    <a id="share-link" href='#'> <img src="assets/img/icons/share.png" width="80px" style="float: right; padding-right: 20px; cursor: pointer;" class="share-btn"></a>
   

<?php 

if(isset($_GET['nlink']))
{
  
  $link1 = $_GET['nlink'];
  include('simple_html_dom.php');
  if(!stripos($link1, 'https'))
    $link1 = "https://allgovernmentjobs.in/".$link1;
  echo "<input type='hidden'  id='link-text' value='".str_replace('https://www.emitra.net/', 'inner.php?link=',$link1)."'>";
  $html = file_get_html($link1);
echo "<div class='container-fluid container-md'>";
  foreach($html->find('div[class="center-box"]') as $element){
    if(!strpos($element,'nlink=')){
      echo str_replace('https://allgovernmentjobs.in/', 'inner.php?nlink=',$element);
    }
    
  }
        echo '</div>';
}



if(isset($_GET['link']))
{
	
	$link = $_GET['link'];
	include('simple_html_dom.php');
	if(!stripos($link, 'https'))
		$link = "https://www.emitra.net/".$link;
  echo "<input type='hidden'  id='link-text' value='".str_replace('https://www.emitra.net/', 'inner.php?link=',$link)."'>";
	$html = file_get_html($link);
echo "<div class='container-fluid container-md'>";
	foreach($html->find('article') as $element){
		echo str_replace('https://www.emitra.net/', 'inner.php?link=',$element);
    foreach($element->find('a') as $img){
      if(strpos($img, 'jpg')){
        echo "<img id='image' width='100%' height='100%'>".$img."</>";
      }
    }
		
	}
				echo '</div>';
}
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
	$(document).ready(function(){
	$('[style="background-color:transparent"]').hide()
	})

	$('table').attr('class','table table-bordered table-responsive')
	
  var link = $('[rel="noopener"]').last().attr('href')
  
  //$('[rel="noopener"]').hide()
  //console.log("HERE:" + $("#image").find("a").attr("href"))
  $('#image').attr('src',link)
</script>
<script type="text/javascript">
$(document).bind("cut copy paste",function(e) {
     e.preventDefault();
 });
</script>
<script type="text/javascript">
  $(document).on('click','.share-btn', function(){
      var title = $('.entry-title').text()
      //alert(title)
    if (navigator.share) {
    navigator.share({
      title: 'a2softech.org.in/portal',
      text: title,
      url: $('#link-text').val()
    }).then(() => {
      console.log('Thanks for sharing!');
    })
    .catch(console.error);
  } else {
    // fallback
  }
  })
</script>