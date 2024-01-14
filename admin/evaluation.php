<?php
session_start();
include "../connection/connection.php";
include '../session.php';
include 'includes/notification.php';


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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://kit.fontawesome.com/6b23de7647.js" crossorigin="anonymous"></script>
  <title>Document</title>
  <style>
    .dropdown-menu-announcements {
        width: 300px;
        max-height: 300px;
        overflow-y: auto;
    }
    .announcement {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
</style>
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
            
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-header">
          <h3 class="card-title">All Project</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
        <div class="card-body">
         <div class="row table-responsive">

          <table id="all_users" 
          class="table table-striped dataTable table-bordered dtr-inline" 
          role="grid" aria-describedby="all_users_info">
          <colgroup>
            <col width="10%">
            <col width="10%">
            <col width="25%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
          </colgroup>
          <thead>
            <tr>`
            <th class="p-1 text-center">Project Title</th>
            <th class="p-1 text-center">Timeframe</th>
            <th class="p-1 text-center">Departments</th>
            <th class="p-1 text-center">Activity</th>
            <th class="p-1 text-center">Person Incharged</th>
            <th class="p-1 text-center">Prepared By</th>
            <th class="p-1 text-center">Total Expenses</th>
            <th class="p-1 text-center">Status</th>
            <th class="p-1 text-center">Evaluation</th>
            <th class="p-1 text-center">Action</th>
          </tr>
        </thead>

        <tbody>
        <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "ublc_ces";
                            
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                            
                if(!$conn){
                    die("Connection failed"). mysqli_connect_error();
                }
                //$user = $_SESSION['user'];
                $count = 0;
                $sql = "SELECT * FROM `project_plan`";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $project_title =  $row["project_title"];
                        $timeframe = $row["timeframe"];
                        $departments = $row["departments"];
                        $activity = $row["activity"];
                        $personIncharged = $row["person_incharged"];
                        $preparedBy = $row["prepared_by"];
                        $totalExpensed = $row["total_expensed"];
                        $count++;
                        echo "<tr>
                        <td class='text-center'>$project_title</td>
                        <td class='text-center'>$timeframe</td>
                        <td class='text-center'>$departments</td>
                        <td class='text-center'>$activity</td>
                        <td class='text-center'>$personIncharged</td>
                        <td class='text-center'>$preparedBy</td>
                        <td class='text-center'>$totalExpensed</td>
                        <td class='text-center'>$totalExpensed</td>
                        <td class='text-center'>
                        <a href='evaluation.php?id={$row['id']}' class='btn btn-info'><i class='fas fa-check'></i></a>
                        </td>
                        <td class=' d-flex justify-content-around align-items-center'>
                        <a href='delete.php?id={$row['id']}' class='btn btn-danger'><i class='fas fa-trash'></i></a>
                        </td>
                        </tr>";
                    }
                }
            ?>
    </tbody>
</table>
</div>
</div>

<!-- /.card-footer-->
</div>
        </section>
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