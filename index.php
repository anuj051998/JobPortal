<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Job Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <?php
        require "../conn.php";
        
        $res = mysqli_query($conn,"select `maintainanceStatus` from administrator");
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
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
        
    </div>
    
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <h2>Job Portal</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="jobs.php">All Jobs</a></li>
                        

                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01">
                <div class="text-content">
                    <h4>Find your Dream Job today!</h4>
                    <h2>Get Started</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->
    
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Featured Jobs</h2>
                        <a href="jobs.php">view more <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <?php 
            // require "phpconn.php";
            $res = mysqli_query($conn,"select `JobName`, `jobPic`,`jobLocation`, `jobCategory`, `lastDate`, `jobId` from `jobs` where `isAvailable`='YES' and `lastDate` > CURDATE() order by `lastDate`,`dateAdded` desc LIMIT 10");
            if($res->num_rows > 0)
            {
                while($row = $res->fetch_assoc())
                {?>
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="uploads/<?php echo $row['jobPic']; ?>" alt=""></a>
                        <div class="down-content">
                            <a href="job-details.php?Id=<?php echo $row["jobId"]; ?>">
                                <h4><?php echo $row["JobName"]; ?></h4>
                            </a>

                            <h4><small><i class="fa fa-briefcase"></i> <?php echo $row["jobCategory"]; ?><br> <strong><i
                                            class="fa fa-building"></i> <?php echo $row["jobLocation"]; ?></strong></small></h4>
                                            Last Date to apply<br>
                            <small>
                                <strong title="Posted on"><i class="fa fa-calendar"></i> <?php echo $row["lastDate"]; ?></strong>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <!-- <strong title="Type"><i class="fa fa-file"></i> Contract</strong>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <strong title="Location"><i class="fa fa-map-marker"></i> London</strong> -->
                                
                            </small>
                            <br><br>
                            <div class="card-footer">
                            <strong><a href="job-details.php?Id=<?php echo $row["jobId"]; ?>" target="_blank" class="text-success">Apply Now</a></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
            }
            else{
              echo "<h3 class='text-danger'>No Jobs Available</h3><br><br><br><br><br>";
            }
          ?>
            </div>
        </div>
    </div>

    

    <div class="services" style="background-image: url(assets/images/other-image-fullscren-1-1920x900.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest JOBS</h2>

                        <a href="job.php">find more <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <?php 
            // require "php/conn.php";
            $res = mysqli_query($conn,"SELECT `JobName`, `jobLocation`, `jobCategory`, `lastDate`, `jobId` from `jobs` where `isAvailable`='YES' and `lastDate` > CURDATE() order by `lastDate` desc LIMIT 3");
            if($res->num_rows > 0)
            {
                while($row = $res->fetch_assoc())
                {?>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">

                        <div class="down-content">
                            <h4><a href="#"><?php echo $row["JobName"]; ?></a></h4>

                            <p style="margin: 0;"> <?php echo $row["jobCategory"]; ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php echo $row["lastDate"]; ?>
                                &nbsp;&nbsp;|&nbsp;&nbsp; <?php echo $row["jobLocation"]; ?></p>
                        </div>
                    </div>
                </div>
               <?php } }
               else{
                echo "<h5 class='text-success'>No Latest Jobs Available</h5  ><br><br><br><br><br>";
              }
               ?>
            </div>
        </div>
    </div>

    <!-- <div class="happy-clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Happy Clients</h2>

                        <a href="testimonials.html">read more <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-clients owl-carousel text-center">
                        <div class="service-item">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="down-content">
                                <h4>John Doe</h4>
                                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque,
                                        corporis nulla at quia quaerat."</em></p>
                            </div>
                        </div>

                        <div class="service-item">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="down-content">
                                <h4>Jane Smith</h4>
                                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque,
                                        corporis nulla at quia quaerat."</em></p>
                            </div>
                        </div>

                        <div class="service-item">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="down-content">
                                <h4>Antony Davis</h4>
                                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque,
                                        corporis nulla at quia quaerat."</em></p>
                            </div>
                        </div>

                        <div class="service-item">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="down-content">
                                <h4>John Doe</h4>
                                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque,
                                        corporis nulla at quia quaerat."</em></p>
                            </div>
                        </div>

                        <div class="service-item">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="down-content">
                                <h4>Jane Smith</h4>
                                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque,
                                        corporis nulla at quia quaerat."</em></p>
                            </div>
                        </div>

                        <div class="service-item">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="down-content">
                                <h4>Antony Davis</h4>
                                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque,
                                        corporis nulla at quia quaerat."</em></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Having any Queries</h4>
                                <p>Contact us now</p>
                            </div>
                            <div class="col-lg-4 col-md-6 text-right">
                                <a href="contact.php" class="filled-button">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright © 2020 Job Portal </p>
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
    <script>
    $(document).ready(function(){
    $.get("https://ipapi.co/json/", function(data){
      $.ajax({
        type:"POST",
        url:"php/addVisitor.php",
        data:data,
        success:function(data){
            if(data == "YES")
            {
                alert("You have been blocked by admin ")
                window.history.back()
            }
        }
      })
    })
  })
    </script>
</body>

</html>
<?php } ?>