<?php session_start(); ?>
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
    var dataTable = null
    $(function() {
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
    </script>