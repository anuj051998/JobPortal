<?php 

  if(!isset($_SESSION["userName"]))
  {
    echo "<script>window.location.href='index.php'</script>";
  }


?>


<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Dashboard.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="contacts.php" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline" id="searchForm">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar typeahead" id="topsearchbar"  type="search" placeholder="Search job Name" aria-label="Search" list="data">
              <datalist id="data">
              </datalist>
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">
          <?php 


          require "../../conn.php";
          $query = "SELECT count(id) as `count` from `contacts` where   `replied` = 'NO'";
          $res = mysqli_query($conn, $query);
          if($res->num_rows > 0)
          {
            while($row = $res->fetch_assoc())
            {
              echo $row["count"];
              break;
            }
          }
          
          
            ?>  
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <?php 

          // require "../php/conn.php";
          $query = "SELECT `name`,`subject`, `Date_Time`,`id` from `contacts` where `replied`='NO' order by `Date_Time` DESC LIMIT 5";
          $res = mysqli_query($conn, $query);
          while($row = $res->fetch_assoc())
          {
            ?>
            
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo $row["name"]; ?>
                  <span class="float-right text-sm r" ><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"><?php echo $row["subject"]; ?></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?php echo $row["Date_Time"]; ?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <?php
          }
        ?>
          <div class="dropdown-divider"></div>
          <a href="contacts.php" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script>
    $("#topsearchbar").on("input", function(){
      var query = $(this).val()
      $.get("../php/getJobNames.php",{query:query},function(data){
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
      var opts = document.getElementById('data').childNodes;
      for (var i = 0; i < opts.length; i++) {
          if (opts[i].value === val) {
            window.location.href=("edit.php?Id="+opts[i].getAttribute("data-value"))
            break;
          }
        }
    })
    
      

    
  </script>  
  