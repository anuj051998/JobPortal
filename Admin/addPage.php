<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Editors</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="plugins/simplemde/simplemde.min.css">
    <style>
    .note-editable {
        min-height: 100%
    }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include("navbar.php"); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include("aside.php"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Text Editors</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Job Details</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>select Job Name</label>
                  <form id="selectForm">
                    <select onchange="document.getElementById('selectForm').submit()" name="Id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                  
                  <?php
                  require "../php/conn.php";
                  $id = ' ';
                  if(isset($_GET['Id']))
                  {
                      $id = $_GET['Id'];
                  }
                    $res = mysqli_query($conn, "SELECT * from jobs where isAvailable='YES' order by lastDate");
                    if($res->num_rows<=1)
                    {
                        echo "<option>Select</option>";
                    }
                    while($row = $res->fetch_assoc())
                    {
                      ?>
                    <option  <?php if ($id == $row['jobId']) echo "selected='selected'" ?> value="<?php echo $row['jobId']; ?>"><?php echo $row['JobName']; ?></option>
                    <?php } ?>  
                  </select>
                  <form>
                </div>
              </div>
            </div>
            <span class="idHere" id="<?php if(isset($_GET["Id"])) echo $_GET["Id"]; else echo "-1";?>"></span>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Job Details Layout</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
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
                            <a href="#" class="text-success " onclick="save()">Save <i class="fas fa-save"></i></a>
                        </div>
                    </div>
        
    <!-- ./row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.1.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
        $(".note-editable > div").draggable()
        $(".note-editable > p").draggable()
        function save(){
            var id = $(".idHere").attr("id")
            if(id == -1)
            {
                alert("Select Job First")
            }
                
            var raw = $(".note-editable").html()
            $.ajax({
                type:"POST",
                url:"../php/addLayout.php",
                data:{raw:raw, id:id},
                success:function(){
                    toastr.info("Saved")
                }
            })
        }
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
    </script>
    <script>
      $(document).keydown(function(e) {
        if ((e.key == 's' || e.key == 'S' ) && (e.ctrlKey || e.metaKey))
        {
            e.preventDefault();
            save();
            return false;
        }
        return true;
    }); 

    $(document).ready(function(){
        $("table").attr("class","table-hover text-center")    
        $("thead").attr("style",$("thead").att("style")+"text-align: center")    
        $("table").attr("style",$("table").attr("style")+"width: 100%; text-align: center")    
    })
    
  </script>
</body>

</html>