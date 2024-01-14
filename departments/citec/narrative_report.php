<?php
session_start();
    include '../../connection/connection.php';
    include '../../session.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Assuming you have a form field named 'description'
        $description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : '';
    
        // Perform the SQL query to insert data
        $sql = "INSERT INTO citec (content) VALUES ('$description')";
    
        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
    // Close the database connection when done
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../style/bootstrap-5.3.2-dist/css/sidebar.css">
    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
    <script src="https://kit.fontawesome.com/6b23de7647.js" crossorigin="anonymous"></script>
    <title>Text Editor</title>
    <style>
    </style>
</head>
<body>
    <!-- Main Wrapper -->
  <div class="main-wrapper">
		
              <?php 
              include_once("includes/header.php");
              include_once("includes/sidebar.php");
              ?>

              <div class="page-wrapper">
                  <div class="content container-fluid">
            <div class="page-header">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="page-title">Community Extension Project Plan 2022/2023</h3>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Clients</li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- /Page Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            
        <section class="content">
            <!-- Default box -->
            <div class="card card-outline card-primary rounded-0 shadow">
                <div class="card-header">
                    <h3 class="card-title">Add Narrative Report</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    <form method="post">
                    <div class="mb-3">
                                <label>Big Description</label>
                                <textarea name="description" id="your_summernote" class="form-control" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            
                    </form>
                    </div>
                    
                </div>
            </div>
            </section>
                </div>
      </div>
	  <footer>
  <?php
  include 'includes/footer.php';
  ?>
</footer>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../style/bootstrap-5.3.2-dist/js/jquery-3.2.1.min.js"></script>
    <script src="../../style/bootstrap-5.3.2-dist/js/popper.min.js"></script>
    <script src="../../style/bootstrap-5.3.2-dist/js/jquery.slimscroll.min.js"></script>
    <script src="../../style/morris/morris.min.js"></script>
    <script src="../../style/bootstrap-5.3.2-dist/js/nav.js"></script>
    <script src="../../style/notification/notification.js"></script>

    <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#your_summernote").summernote();
            $('.dropdown-toggle').dropdown();
        });
        
    </script>
            

</body>
</html>
