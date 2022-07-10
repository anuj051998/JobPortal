<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include("aside.php"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add Job</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Job</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Add Job Details</h3>
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
                                    <form id="addJobForm">
                                        <div class="form-group">
                                            <label>Job ID</label>
                                            <textarea name="jobId" rows="1" placeholder="Enter Unique JobID"
                                                class="form-control"><?php 
                                                require "../php/conn.php";
                                                    $res_ = mysqli_query($conn, "SELECT max(jobId) as jobID from jobs");
                                                    while($r = $res_->fetch_assoc())
                                                    {
                                                        echo $r["jobID"]+1;
                                                    }
                                                 ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Job Title</label>
                                            <textarea name="jobName" rows="1" cols="10" placeholder="Enter Job Title"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Job Location</label>
                                            <textarea name="jobLocation" rows="1" placeholder="Enter Job Location"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Date to Apply</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    name="lastDate" data-target="#reservationdate"
                                                    placeholder="Last date to apply for job" />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Job Category</label>
                                                <select name="jobCategory"
                                                    class="form-control select2 select2-hidden-accessible"
                                                    style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option selected="selected" data-select2-id="3">Agriculture,
                                                        Food and
                                                        Natural Resources</option>
                                                    <option data-select2-id="47">Architecture and Construction
                                                    </option>
                                                    <option data-select2-id="48">Arts, Audio/Video Technology and
                                                        Communications</option>
                                                    <option data-select2-id="49">Business Management and
                                                        Administration
                                                    </option>
                                                    <option data-select2-id="50">Education and Training</option>
                                                    <option data-select2-id="51">Finance</option>
                                                    <option data-select2-id="52">Government and Public
                                                        Administration
                                                    </option>
                                                    <option data-select2-id="53">Health Science</option>
                                                    <option data-select2-id="54">Hospitality and Tourism</option>
                                                    <option data-select2-id="55">Human Services</option>
                                                    <option data-select2-id="56">Information Technology</option>
                                                    <option data-select2-id="57">Law, Public Safety, Corrections and
                                                        Security</option>
                                                    <option data-select2-id="58">Manufacturing</option>
                                                    <option data-select2-id="59">Marketing, Sales and Service
                                                    </option>
                                                    <option data-select2-id="60">Science, Technology, Engineering
                                                        and
                                                        Mathematics</option>
                                                    <option data-select2-id="61">Transportation, Distribution and
                                                        Logistics
                                                    </option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Job Image</label>
                                                <select name="jobPicture"
                                                    class="form-control select2 select2-hidden-accessible"
                                                    style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true">
                                                    <?php
                                                        $files = scandir("../uploads/");
                                                        $count = 1;
                                                        print_r($files);
                                                        foreach($files as $file)
                                                        {
                                                            if(strlen($file) > 2 && stripos($file,"."))
                                                            {
                                                    ?>
                                                    <option data-select2-id="<?php echo $count; ?>"><?php echo $file; ?></option>
                                                    <?php 
                                                    $count++;
                                                    } 
                                                    
                                                } ?>
                                                </select>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <input type="submit" value="Add Now" class="btn btn-success"
                                                style="float: right">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
        </div>
        </section>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php require "footer.php" ?>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
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
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="dist/toastr.min.js"></script>
    <link rel="stylesheet" href="dist/toastr.min.css" />
    <script src="dist/js/pages/dashboard2.js"></script>
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
    var dataTable = null
    $(function() {
      $(".active").removeClass("active")
      $(".jobs").addClass("active")
        dataTable = $("#example1").DataTable({
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        })
    });
    
    $("#addJobForm").on("submit", function(e) {
        e.preventDefault()
        $.ajax({
            type: "POST",
            url: "../php/addJob.php",
            data: $(this).serialize(),
            success: function(data) {
                if (data.includes("Successfully")) {
                    toastr.info(data)
                    $("#addJobForm").trigger("reset")
                } else {
                    toastr.error(data)
                }
            }
        })
    })
    $(function() {
        $('.select2').select2()
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    


    </script>
</body>

</html>