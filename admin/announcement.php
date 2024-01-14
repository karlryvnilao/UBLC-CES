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
            
        <form method="post" id="comment_form">
        <div class="form-group">
        <label>Enter Subject</label>
        <input type="text" name="subject" id="subject" class="form-control">
        </div>
        <div class="form-group">
        <label>Enter Comment</label>
        <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
        <input type="submit" name="post" id="post" class="btn btn-info" value="Post" />
        </div>
      </form>
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
<script>
  $(document).ready(function () {
    $('#comment_form').on('submit', function (event) {
      event.preventDefault();
      if ($('#subject').val() != '' && $('#comment').val() != '') {
        var form_data = $(this).serialize();
        $.ajax({
          url: "insert.php",
          method: "POST",
          data: form_data,
          success: function (data) {
            $('#comment_form')[0].reset();
            load_unseen_notification();
          }
        });
      } else {
        alert("Both Fields are Required");
      }
    });
  });
</script>

</body>
</html>