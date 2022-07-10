<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visitors</title>
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
    #chartdiv {
        width: 100%;
        height: 500px;
        background-color: grey
    }

    [aria-labelledby="id-66-title"] {
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
                            <h1 class="m-0">Visitors</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Visitors</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row table-responsive">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">All Visitors Details</h3>
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
                                    <table id="example1" class="table table-bordered table-striped table-responsive table-hover">
                                        <thead>
                                            <tr>
                                                <th>IP</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Country</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>ZipCode</th>
                                                <th>ISP</th>
                                                <th>Date of Visit</th>
                                                <th>Visit Count</th>
                                                <th>isBlocked</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            require "../php/conn.php";
                                            $query = "SELECT `ip`, count(`ip`) as count,`dateofVisit`, `city`, `state`,`isBlocked`, `country`, `latitude`, `longitude`, `zipCode`, `org` from `visitors` group by `ip` order by `dateOfVisit`";
                                            $res = mysqli_query($conn,$query);
                                            if($res->num_rows > 0)
                                            {
                                            while($row = $res->fetch_assoc())
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $row["ip"]; ?></td>
                                                <td><?php echo $row["city"]; ?></td>
                                                <td><?php echo $row["state"]; ?></td>
                                                <td><?php echo $row["country"]; ?></td>
                                                <td><?php echo $row["latitude"]; ?></td>
                                                <td><?php echo $row["longitude"]; ?></td>
                                                <td><?php echo $row["zipCode"]; ?></td>
                                                <td><?php echo $row["org"]; ?></td>
                                                <td><?php echo $row["dateofVisit"]; ?></td>
                                                <td><?php echo $row["count"]; ?></td>
                                                <td><a  ip='<?php echo $row["ip"]; ?>' class="block-btn"><?php echo $row["isBlocked"] == "NO"?"<i class='fas fa-ban'></i>":"<i class='fas fa-check'></i>" ?></a></td>
                                            </tr>
                                            <?php }} ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    <?php 
    require "footer.php";
    ?>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/chart.js/Chart.min.js"></script>
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
    
    <script src="dist/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="dist/js/pages/dashboard2.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script>
          $(".maintainance").on("click", function(){
            $.ajax({
                type:"POST",
                url:"../php/maintainanceStatus.php",
                data:{updateStatus:"updateStatus"},
                success:function(data){
                    $(".maintainanceMode").text(data)    
                }
            })
        })
    $(document).ready(function() {
        $.ajax({
            type:"POST",
            url:"../php/maintainanceStatus.php",
            data:{getStatus:"getStatus"},
            success:function(data){
                if(data=="YES")
                    $(".maintainanceMode").text("ON")
                else
                $(".maintainanceMode").text("OFF")
            }
        })
    })
    $(".active").removeClass("active")
    $(".visitors").addClass("active")
    var dataTable = null
    $(function() {
        dataTable = $("#example1").DataTable({
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "pageLength": 10
        })

    });
    
    $(".block-btn").on("click", function(){
        var ip = $(this).attr("ip")
        $.ajax({
            type:"POST",
            url:"../php/blockIP.php",
            data:{ip:ip},
            success:function(data){
                $("[ip='"+ip+"']").html(data)
                
            }
        })
    })
    </script>
</body>

</html>