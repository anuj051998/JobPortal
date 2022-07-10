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

    <title>All Jobs</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <style>
    .panel-footer {
        padding: 10px 15px;
        background-color: #f5f5f5;
        border-top: 1px solid #ddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    main,
    menu,
    nav,
    section,
    summary {
        display: block;
    }

    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
        list-style-type: disc;
        list-style-type: disc;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
    }

    

    .pagination>li {
        display: inline;

    }


    .pagination>.disabled>a,
    .pagination>.disabled>a:focus,
    .pagination>.disabled>a:hover,
    .pagination>.disabled>span,
    .pagination>.disabled>span:focus,
    .pagination>.disabled>span:hover {
        color: #777;
        cursor: not-allowed;
        background-color: #fff;
        border-color: #ddd;
    }

    .pagination>li>a,
    .pagination>li>span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    .pagination>.active>a,
    .pagination>.active>a:focus,
    .pagination>.active>a:hover,
    .pagination>.active>span,
    .pagination>.active>span:focus,
    .pagination>.active>span:hover {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }
    .suggestions{
        padding: 30px;
        margin: 100px
    }
    </style>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
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
                <a class="navbar-brand" href="index.php">
                    <h2>Job Portal</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                    </ul>
                
                </div>
        </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text"
        style="background-image: url(assets/images/heading-6-1920x500.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>All Available</h4>
                        <h2>Jobs</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="">
                        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                            <div class="input-group">
                                <input type="search" id="searchbar" placeholder="What're you searching for?"
                                    aria-describedby="button-addon1" class="form-control border-0 bg-light" name="key"
                                    style="outline: none; border: none" autocomplete="off" list="data">
                                    <datalist id="data"></datalist>
                                <div class="input-group-append">
                                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="row pages">
                        <?php 
            
              if(isset($_GET["key"]))
              {
                $key = $_GET["key"];
                $query = "SELECT * FROM `jobs` where `JobName` LIKE '%{$key}%' or `jobCategory` LIKE '%{$key}%' or `jobLocation` LIKE '%{$key}%' order by `dateAdded`";
              }
              else{
                $query = "SELECT * FROM `jobs` where `isAvailable` = 'YES' and `lastDate` > CURDATE() Order by `lastDate`,`viewCount`,`dateAdded`";
              }
                require "php/conn.php";
                $flag = 0;
                $res = mysqli_query($conn,$query);
                if($res->num_rows <= 0)
                {
                  echo "<span style='color: red; width: 80%; margin: auto; text-align: center'>No Jobs found with keyword: <u class='text-success'>".$key."</u></span>";
                  $flag = 1;
                }
                while($row= $res->fetch_assoc())
                {
                  
                  ?>

                        <div class="col-md-4">
                            <div class="product-item">
                                <a href="#"><img src="uploads/<?php echo $row['jobPic']; ?>" alt=""></a>
                                <div class="down-content">
                                    <a href="job-details.php?Id=<?php echo $row['jobId']; ?>">
                                        <h4><?php echo $row["JobName"]; ?></h4>
                                    </a>
                                    <h4>
                                        <small>
                                            <i class="fa fa-briefcase"></i> <?php echo $row["jobCategory"]; ?> <br>
                                            <strong><i class="fa fa-building"></i>
                                                <?php echo $row["jobLocation"]; ?>
                                            </strong>
                                        </small>
                                    </h4>
                                    <small>
                                        <strong title="Posted on"><i class="fa fa-calendar"></i>
                                            <?php echo $row["lastDate"]; ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                    </small>
                                    <br><br>
                                    <div class="card-footer">
                                        <a href="job-details.php?Id=<?php echo $row['jobId']; ?>" class="text-success"
                                            style="font-size: 13px">Apply Now </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
             
              }
            ?>


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
    <script type="text/javascript" src="paginathing.js"></script>
    <script>
    var words = []
    $.ajax({
        type: "POST",
        url: "php/getJobNames.php",
        success: function(data) {
            //console.log(data)
            data = JSON.parse(data)
            for (var i = 0; i < data.length; i++) {
                words.push(data[i]["JobName"])
            }
        }
    })
    <?php if($flag == 0) {?>
    $(document).ready(function() {
        $('.pages').paginathing({
            perPage: 18,
            limitPagination: 5,
            containerClass: 'panel-footer',
            pageNumbers: true
        })
    })
<?php } ?>
    </script>
<script>
    $("#searchbar").on("input", function(){
      var query = $(this).val()
      $.get("php/getJobNames.php",{query:query},function(data){
        data = JSON.parse(data)
        var raw = ""
        data.forEach(element => {
            raw+="<option class='suggestions' data-value='"+element.jobId+"'>"+element.JobName+"</option>"
        });
         $("#data").html(raw)
      })
    })
    $("#searchForm").on("submit", function(e){
      e.preventDefault()
      var val = document.getElementById("topsearchbar").value;
      window.location.href=("jobs.php?key="+val)
    })
    
      

    
  </script>  

    <script src="assets/js/pagination.js"></script>

</body><?php } ?>

</html>