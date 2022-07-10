<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Layout</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
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
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
    <link rel="stylesheet" href="plugins/simplemde/simplemde.min.css">
    <style>
    .note-editable {
        min-height: 100%
    }
    </style>
</head>

<body class="hold-transition sidebar-mini light-mode">
    <div class="wrapper">
        <?php include("navbar.php"); ?>
        <?php include("aside.php"); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Layout Editor</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Layout</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <div class="row">
                                            <div class="col-md-6">

                                            </div>
                                        </div>
                                    </h3>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <form id="selectForm">
                                                    <select onchange="document.getElementById('selectForm').submit()"
                                                        name="Id" class="form-control select2 select2-hidden-accessible"
                                                        style="width: 100%; outline: none; border: none"
                                                        data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                        <?php
                                                            require "../php/conn.php";
                                                            $id = ' ';
                                                            if(isset($_GET['Id']))
                                                            {
                                                                $id = $_GET['Id'];
                                                            }
                                                            $count=1;
                                                            $res = mysqli_query($conn, "SELECT * from `jobs` order by `lastDate`");
                                                            echo "<option>Select job name</option>";
                                                            while($row = $res->fetch_assoc())
                                                            {
                                                            ?>
                                                        <option
                                                            <?php if ($id == $row['jobId']) echo "selected='selected'" ?>
                                                            value="<?php echo $row['jobId']; ?>">
                                                            <?php echo $row['JobName']; ?></option>
                                                        <?php } ?>
                                                        <!-- <option <?php if ($id == $row['jobId']) echo "selected='selected'" ?> value="<?php echo $row['jobId']; ?>" data-select2-id="<?php echo $count; ?>">
                                                            <?php echo $row['JobName'];  $count = $count + 1;?>
                                                        </option> -->

                                                    </select>
                                                    <form>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-sm-6"></div>
                                                <div class="col-sm-6">

                                                    <a href="#" title="ctrl + s" class="text-success" onclick="save()"><i
                                                            class="fas fa-save"></i></a>&nbsp;&nbsp;&nbsp;
                                                    <a href="#" title="ctrl + r" class="text-info reset" onclick="clean()"><i
                                                            class="fas fa-trash-restore"></i></a>&nbsp;&nbsp;&nbsp;
                                                    <a href="#" title="ctrl + z" class="text-info" onclick="undo()"><i
                                                            class="fas fa-undo"></i></a>&nbsp;&nbsp;&nbsp;
                                                    <a href="#" title="ctrl + y" class="text-info" onclick="redo()"><i
                                                            class="fas fa-redo"></i></a>&nbsp;&nbsp;&nbsp;
                                                    <a href="#" title="ctrl + l" data-toggle="modal" data-target="#modal-default"
                                                        class="text-primary link"><i class="fas fa-link"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <span class="idHere"
                                    id="<?php if(isset($_GET["Id"])) echo $_GET["Id"]; else echo "-1";?>"></span>
                                <div class="card-body">
                                    <textarea id="summernote" placeholder="start from here">
                                <?php 
                                if(isset($_GET['Id']))
                                {
                                    $ciphering = "AES-128-CTR";
                                    $iv_length = openssl_cipher_iv_length($ciphering);
                                    $options = 0;
                                    $decryption_iv = '1234567891011121';
                                    $decryption_key = "anuj.av1999@gmail.com";
                                    $id = $_GET['Id'];
                                    $res = mysqli_query($conn, "SELECT * from jobs where jobId='$id'");
                                    while($row = $res->fetch_assoc())
                                    {
                                        $decryption=openssl_decrypt ($row["layout"], $ciphering, $decryption_key, $options, $decryption_iv);
                                        echo $decryption;
                                    }
                                }
                                      ?>
                                  
                        
                        </textarea>
                                </div>
                                <div class="card-footer">
                                    <p class='text-info'>Shortcuts: Save -> ctrl + s, ctrl + r -> reset, ctrl + l ->
                                        fetch Link</p>
                                </div>
                            </div>

                            <!-- ./row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require "footer.php"; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <div class="modal fade" id="modal-default" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Enter url to fetch data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="url" id="url" class="form-control">
                    <br>
                    <input type="button" class="btn btn-primary" value="Fetch" onclick="addURL()">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- CodeMirror -->
    <script src="plugins/codemirror/codemirror.js"></script>
    <script src="plugins/codemirror/mode/css/css.js"></script>
    <script src="plugins/codemirror/mode/xml/xml.js"></script>
    <script src="plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
    //     $(document).ready(function(){
    //         var editor = CodeMirror.fromTextArea($(".note-editable"), {
    //     lineNumbers: true,
    //     mode: "htmlmixed"
    //   });
    // var totalLines = editor.lineCount();
    // var totalChars = editor.getTextArea().value.length;
    // editor.autoFormatRange({line:0, ch:0}, {line:totalLines, ch:totalChars});

    //     })
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

    function clean() {
        $(".note-editable").html("")
    }
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
    $(".active").removeClass("active")
    $(".layout").addClass("active")
    $(".note-editable > div").draggable()
    $(".note-editable > p").draggable()

    function addURL() {
        $.ajax({
            type: "POST",
            url: "fetchLinks.php",
            data: {
                url: $("#url").val()
            },
            success: function(data) {
                $("#modal-default").modal("hide")
                //$(".note-editable").html(data)
                $('#summernote').summernote('pasteHTML', data);
                $("table").addClass("table-hover table table-bordered")
                $("table").attr("style", $("table").attr("style") + "width: 100%;")
            }

        })
    }

    function save() {
        var id = $(".idHere").attr("id")
        if (id == "Select job name") {
            alert("Select Job First")
        } else {
            var raw = $(".note-editable").html()
            $.ajax({
                type: "POST",
                url: "../php/addLayout.php",
                data: {
                    raw: raw,
                    id: id
                },
                success: function() {
                    toastr.info("Saved")
                }
            })
        }

    }

    $.ajax({
        url: 'https://api.github.com/emojis',
        async: false
    }).then(function(data) {
        window.emojis = Object.keys(data);
        window.emojiUrls = data;
    });;
    $(function() {
        $('#summernote').summernote({
            focus: true,
            height: 300,
            codemirror: {
                theme: 'monokai'
            },
            placeholder: 'Start adding you layout',
            hint: {
                match: /:([\-+\w]+)$/,
                search: function(keyword, callback) {
                    callback($.grep(emojis, function(item) {
                        return item.indexOf(keyword) === 0;
                    }));
                },
                template: function(item) {
                    var content = emojiUrls[item];
                    return '<img src="' + content + '" width="20" /> :' + item + ':';
                },
                content: function(item) {
                    var url = emojiUrls[item];
                    if (url) {
                        return $('<img />').attr('src', url).css('width', 20)[0];
                    }
                    return '';
                }
            }
        })

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
    </script>
    <script>
    $(document).keydown(function(e) {
        if ((e.key == 's' || e.key == 'S') && (e.ctrlKey || e.metaKey)) {
            e.preventDefault();
            save();
            return false;
        }
        return true;
    });

    $(document).keydown(function(e) {
        if ((e.key == 'l' || e.key == 'L') && (e.ctrlKey || e.metaKey)) {
            e.preventDefault();
            $(".link").click()
            return false;
        }
        return true;
    });
    $(document).keydown(function(e) {
        if ((e.key == 'r' || e.key == 'R') && (e.ctrlKey || e.metaKey)) {
            e.preventDefault();
            $(".reset").click()
            return false;
        }
        return true;
    });
function undo(){
    $('#summernote').summernote('undo');
}

function redo(){
    $('#summernote').summernote('redo');
}
    $(document).keydown(function(e) {
        if ((e.key == 'z' || e.key == 'Z') && (e.ctrlKey || e.metaKey)) {
            e.preventDefault();
            $('#summernote').summernote('undo');
            return false;
        }
        return true;
    });

    $(document).keydown(function(e) {
        if ((e.key == 'y' || e.key == 'Y') && (e.ctrlKey || e.metaKey)) {
            e.preventDefault();
            $('#summernote').summernote('redo');
            return false;
        }
        return true;
    });





    $(document).ready(function() {
        $("table").attr("class", "table-hover ")
        //$("thead").attr("style",$("thead").att("style")+"text-align: center")    
        $("table").attr("style", $("table").attr("style") + "width: 100%;")
    })

    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        // $('[data-mask]').inputmask()

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
    </script>


</body>

</html>