<?php session_start(); 
require "../../logger.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <style>
    #chartdiv, #jobAnalysisChart {
        width: 100%;
        height: 500px;
        color: white;
        background-color: grey
    }
    g tspan{
        color: white
    }
    [aria-labelledby="id-66-title"],[aria-labelledby="id-411-title"] {
        display: none;
    }
    </style>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <?php include("navbar.php"); ?>
        <?php include("aside.php"); ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Visits</span>
                                    <span class="info-box-number">
                                        <?php 
                                            require "../../conn.php";
                                            $query = "SELECT Count(ip) as 'count' from `visitors`";
                                            $res = mysqli_query($conn,$query);
                                            if($res->num_rows > 0)
                                            {
                                                while($row = $res->fetch_assoc())
                                                {
                                                    echo $row["count"];
                                                }
                                            }
                                            else{
                                                echo "0";
                                            }
                                            
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i
                                        class="fas fa-briefcase"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Available Jobs</span>
                                    <span class="info-box-number">
                                        <?php 
                                            // require "../php/conn.php";
                                            $query = "SELECT count(jobId) as 'count' from `jobs`";
                                            $res = mysqli_query($conn,$query);
                                            if($res->num_rows > 0)
                                            {
                                                while($row = $res->fetch_assoc())
                                                {
                                                    echo $row["count"];
                                                }
                                            }
                                            else{
                                                echo "0";
                                            }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix hidden-md-up"></div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-briefcase"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Active Jobs</span>
                                    <span class="info-box-number">
                                        <?php 
                                            // require "../php/conn.php";
                                            date_default_timezone_set('Asia/Kolkata');
                                            $count=0;
                                            $date = date('m/d/Y', time());
                                            $query = "SELECT `jobId`, `lastDate` from `jobs`";
                                            $res = mysqli_query($conn,$query);
                                            $dateTimestamp1 = strtotime($date);
                                            if($res->num_rows > 0)
                                            {
                                                while($row = $res->fetch_assoc())
                                                {
                                                    $dateTimestamp2 = strtotime($row["lastDate"]);
                                                    if(!($dateTimestamp1 > $dateTimestamp2))
                                                    {
                                                        $count++;
                                                    }
                                                }
                                            }
                                            
                                            echo $count;
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Visitors</span>
                                    <span class="info-box-number">
                                        <?php 
                                            // require "../php/conn.php";
                                            $query = "SELECT Count(Distinct(ip)) as 'count' from `visitors`";
                                            $res = mysqli_query($conn,$query);
                                            if($res->num_rows>0)
                                            {
                                                while($row = $res->fetch_assoc())
                                                {
                                                    echo $row["count"];
                                                }
                                            }
                                            else{
                                                echo "0";
                                            }
                                            
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-default ">
                        <div class="card-header">
                            <h3 class="card-title">Visitors Analysis</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chartdiv"></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-default ">
                        <div class="card-header">
                            <h3 class="card-title">Job Analysis TOP(30)</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="jobAnalysisChart"></div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <?php require "footer.php" ?>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <script src="plugins/dropzone/min/dropzone.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<!-- <script src="dist/js/demo.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="dist/amcharts/core.js"></script>
    <script src="dist/amcharts/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script>
    $(".maintainance").on("click", function() {
        $.ajax({
            type: "POST",
            url: "../php/maintainanceStatus.php",
            data: {
                updateStatus: "updateStatus"
            },
            success: function(data) {
                $(".maintainanceMode").text(data)
            }
        })
    })
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "../php/maintainanceStatus.php",
            data: {
                getStatus: "getStatus"
            },
            success: function(data) {
                if (data == "YES")
                    $(".maintainanceMode").text("ON")
                else
                    $(".maintainanceMode").text("OFF")
            }
        })
        $.get("../php/getData.php", function(data) {
            data = JSON.parse(data)
            //console.log(data)
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.data = data;
            chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.valueY = "value";
            series.dataFields.dateX = "date";
            series.tooltipText = "Visits: {value}\n On  {date}"
            series.strokeWidth = 2;
            series.minBulletDistance = 15;
            series.tooltip.background.cornerRadius = 20;
            series.tooltip.background.strokeOpacity = 0;
            series.tooltip.pointerOrientation = "vertical";
            series.tooltip.label.minWidth = 40;
            series.tooltip.label.minHeight = 40;
            series.tooltip.label.textAlign = "middle";
            series.tooltip.label.textValign = "middle";
            var bullet = series.bullets.push(new am4charts.CircleBullet());
            bullet.circle.strokeWidth = 2;
            bullet.circle.radius = 4;
            bullet.circle.fill = am4core.color("#fff");
            var bullethover = bullet.states.create("hover");
            bullethover.properties.scale = 2;
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.behavior = "panXY";
            chart.cursor.xAxis = dateAxis;
            chart.cursor.snapToSeries = series;
            dateAxis.start = 0.79;
            dateAxis.keepSelection = false;
        })

        $.get("../php/getJobData.php", function(data) {

            data = JSON.parse(data)
            am4core.useTheme(am4themes_animated);
            //var chart = am4core.create("chartdiv", am4charts.XYChart);
            var chart = am4core.create("jobAnalysisChart", am4charts.XYChart3D);
            chart.paddingBottom = 30;
            chart.angle = 35;

            // Add data
            chart.data = data;

            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "JobName";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.inside = true;
            categoryAxis.renderer.grid.template.disabled = true;

            let labelTemplate = categoryAxis.renderer.labels.template;
            labelTemplate.rotation = -90;
            labelTemplate.horizontalCenter = "left";
            labelTemplate.verticalCenter = "middle";
            labelTemplate.dy = 10; // moves it a bit down;
            labelTemplate.inside =true;
            console.log(labelTemplate)

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.grid.template.disabled = true;

            // Create series
            var series = chart.series.push(new am4charts.ConeSeries());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "JobName";

            var columnTemplate = series.columns.template;
            columnTemplate.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            columnTemplate.adapter.add("stroke", function(stroke, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            $("text").attr("fill","#fff")
            $("tspan").attr("style","color:#fff")

        })
    })
    
    </script>
</body>

</html>