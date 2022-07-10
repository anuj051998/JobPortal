<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backup & Restore</title>
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

    #previews {}

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
                            <h1 class="m-0">Backup & Restore</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Backup & Restore</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">BackUp</h3>
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
                                    <div class="row">
                                        <div class="col-md-12 text-center b1" style="display: none">
                                            <div class="spinner-border text-info" role="status">
                                                <span class="visually-hidden"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center b2" style="display: none">
                                            <div class="spinner-border text-info" role="status">
                                                <span class="visually-hidden"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <a href="#" onclick="backup()" class='btn btn-success backup-btn'>Backup &
                                                Download</a>
                                        </div>
                                    </div>
                                    <hr>
                                 
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">Restore</h3>
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
                                    <div class="row">
                                        <div class="col-md-12 text-center b1" style="display: none">
                                            <div class="spinner-border text-info" role="status">
                                                <span class="visually-hidden"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center b2" style="display: none">
                                            <div class="spinner-border text-info" role="status">
                                                <span class="visually-hidden"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div id="actions" class="row">
                                                    <div class="col-lg-12">
                                                        <div class="btn-group w-10">
                                                            <span class="btn btn-success col fileinput-button">
                                                                <i class="fas fa-plus"></i>
                                                                <span>Add files</span>
                                                            </span>
                                                            <button type="submit" class="btn btn-primary col start">
                                                                <i class="fas fa-upload"></i>
                                                                <span>Start upload</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 d-flex align-items-center">
                                                        <div class="fileupload-process w-100">
                                                            <div id="total-progress"
                                                                class="progress progress-striped active"
                                                                role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                                aria-valuenow="0">
                                                                <div class="progress-bar progress-bar-success"
                                                                    style="width:0%;" data-dz-uploadprogress></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table table-striped files" id="previews">
                                                    <div id="template" class="row mt-2">
                                                        <div class="col-auto">
                                                            <span class="preview"><img src="data:," alt=""
                                                                    data-dz-thumbnail /></span>
                                                        </div>
                                                        <div class="col d-flex align-items-center">
                                                            <p class="mb-0">
                                                                <span class="lead" data-dz-name></span>
                                                                (<span data-dz-size></span>)
                                                            </p>
                                                            <strong class="error text-danger"
                                                                data-dz-errormessage></strong>
                                                        </div>
                                                        <div class="col-4 d-flex align-items-center">
                                                            <div class="progress progress-striped active w-100"
                                                                role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                                aria-valuenow="0">
                                                                <div class="progress-bar progress-bar-success"
                                                                    style="width:0%;" data-dz-uploadprogress></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto d-flex align-items-center">
                                                            <div class="btn-group">
                                                                <button class="btn btn-primary start">
                                                                    <i class="fas fa-upload"></i>
                                                                    <span>Start</span>
                                                                </button>
                                                                <button data-dz-remove class="btn btn-warning cancel">
                                                                    <i class="fas fa-times-circle"></i>
                                                                    <span>Cancel</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                                </div>


                                                <p id="error-list"></p>
                                            </div>
                                    
                                        <div class="col-md-6 text-center">
                                            <div class="row">
                                                <div class="spinner-border text-primary spinner-" role="status"
                                                    style="display: none">
                                                    <span class="sr-only"></span>
                                                </div>
                                                <button class="btn btn-primary query-btn" onclick="execute()">Exceute File
                                                    </button>

                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="card-footer">File name should be db-backup.sql only</div>
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
    function execute() {
        $(".spinner-").show()
        $(".query-btn").hide()
        $.ajax({
            type: "GET",
            url: "../php/extractQueries.php",
            success: function(data) {
                $(".spinner-").hide()
                $(".query-btn").show()
                $("#error-list").html(data)
            }
        })
    }
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
    })

    function backup() {
        $(".b1").show()
        $.ajax({
            type: "GET",
            url: "../php/backup.php",
            success: function(data) {
                $(".b1").hide()
                $(".backup-btn").text("Download")
                $(".backup-btn").attr("download")
                $(".backup-btn").attr("href", "../php/" + data)
            }
        })
    }

    $(".active").removeClass("active")
    $(".backup").addClass("active")

    var dataTable = null
    $(function() {
        $(".active").removeClass("active")
        $(".backup").addClass("active")
        dataTable = $("#example1").DataTable({
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "pageLength": 3
        })

    });
    $(".delete-btn").on("click", function() {
        var id = $(this).attr("deleteid")
        $.ajax({
            type: "POST",
            url: "../php/deleteJob.php",
            data: {
                id: id
            },
            success: function(data) {
                if (data == "1") {
                    $("#" + id).hide()
                    toastr.info("Deleted Successfully")
                } else
                    toastr.info(data)

            }
        })
    })
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
                    $("[name=jobId]").html(parseInt($("[name=jobId]").html()) + 1)
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
        $('[data-mask]').inputmask()
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });
        $('#reservation').daterangepicker()
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
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
        $('#timepicker').datetimepicker({
            format: 'LT'
        })
        $('.duallistbox').bootstrapDualListbox()
        $('.my-colorpicker1').colorpicker()
        $('.my-colorpicker2').colorpicker()
        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    })
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

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "../php/restore.php", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
            myDropzone.enqueueFile(file)
        }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    </script>
</body>

</html>