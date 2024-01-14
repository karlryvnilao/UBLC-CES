<?php
    session_start();
    include "../connection/connection.php";
    include '../session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/bootstrap-5.3.2-dist/css/bootstrap.css">
  <link rel="stylesheet" href="../style/bootstrap-5.3.2-dist/css/sidebar.css">
  <link rel="stylesheet" href="../style/bootstrap-5.3.2-dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="../style/bootstrap-5.3.2-dist/css/line-awesome.min.css">
  <link rel="stylesheet" href="../style/bootstrap-5.3.2-dist/css/select2.min.css">
  <link rel="stylesheet" href="../style/morris/morris.css">
  <script src="https://kit.fontawesome.com/6b23de7647.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
  <!-- Main Wrapper -->
  <div class="main-wrapper">
		
    <!-- Header -->
          <?php include_once("includes/header.php");?>
    <!-- /Header -->
    
    <!-- Sidebar -->
          <?php include_once("includes/sidebar.php");?>
    <!-- /Sidebar -->
    
    <!-- Page Wrapper -->
          <div class="page-wrapper">
    
      <!-- Page Content -->
              <div class="content container-fluid">
      
        <!-- Page Header -->
        <div class="page-header">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="page-title">Clients</h3>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Clients</li>
              </ul>
            </div>
          </div>
        </div>
        <!-- /Page Header -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo $todaysCount;?></h3>

                                <p>Today's Reserve</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-calendar-day"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-purple">
                            <div class="inner">
                                <h3><?php echo $currentWeekCount;?></h3>

                                <p>Current Week</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-calendar-week"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-fuchsia text-reset">
                            <div class="inner">
                                <h3><?php echo $currentMonthCount;?></h3>

                                <p>Current Month</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-calendar"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-maroon text-reset">
                            <div class="inner">
                                <h3><?php echo $currentYearCount;?></h3>

                                <p>Current Year</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-injured"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        </div>
    <!-- /Page Wrapper -->
    
        </div>
    <script src="../style/bootstrap-5.3.2-dist/js/jquery-3.2.1.min.js"></script>
    <script src="../style/bootstrap-5.3.2-dist/js/popper.min.js"></script>
    <script src="../style/bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <script src="../style/bootstrap-5.3.2-dist/js/jquery.slimscroll.min.js"></script>
    <script src="../style/morris/morris.min.js"></script>
    <script src="../style/bootstrap-5.3.2-dist/js/nav.js"></script>
    <script src="../style/notification/notification.js"></script>

</body>
</html>