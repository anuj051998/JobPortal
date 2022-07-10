<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Job Details</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>
  <?php
        require "php/conn.php";
        $res = mysqli_query($conn,"select `maintainanceStatus` from `administrator`");
        $status = "";
            while($row = $res->fetch_assoc())
            {
                $status = $row["maintainanceStatus"];   
            }
        if($status == "ON")
        {
            echo "<script>window.location.href='maintainance.php'</script>";
        }
        else
        {

        
    
    ?>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Job Portal</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item active"><a class="nav-link" href="list-jobs.php">Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li> 
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <?php 
      require "php/conn.php";
      if(isset($_GET["Id"]))
      {
        $id = $_GET["Id"];
        $res = mysqli_query($conn, "select * from `jobs` where `jobId` = '$id'");

        mysqli_query($conn, "UPDATE `jobs` SET `viewCount` = viewCount+1 where `jobId` = '$id'");
        $val = null;
        while($row = $res->fetch_assoc())
        {
            $val = $row;
        }
      }
      else{
        header("location:index.php");
      }    
    ?>
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2><?php echo $val["JobName"] ?></h2>
              <h4><?php echo $val["jobCategory"] ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="products">
      <div class="container">
        <div class="row">
        <?php 
          $ciphering = "AES-128-CTR";
          $iv_length = openssl_cipher_iv_length($ciphering);
          $options = 0;
          $decryption_iv = '1234567891011121';
          $decryption_key = "anuj.av1999@gmail.com";
          $decryption=openssl_decrypt ($val["layout"], $ciphering, $decryption_key, $options, $decryption_iv);
          echo $decryption;
        ?>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2020 Job Portal</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>
<?php } ?>
</html>
