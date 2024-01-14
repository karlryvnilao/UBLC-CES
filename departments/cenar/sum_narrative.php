<?php
session_start();
    include '../../connection/connection.php';
    include '../../session.php';
    
    $rowsPerPage = 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $rowsPerPage;

// Perform the SQL query to select data with pagination
$sql = "SELECT * FROM citec LIMIT $offset, $rowsPerPage";
$result = mysqli_query($conn, $sql);

// Check if there are rows in the result set
if (mysqli_num_rows($result) > 0) {
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
        body {
            font-family: Arial, sans-serif;
        }

        #editor {
            border: 1px solid #ccc;
            min-height: 300px;
            padding: 10px;
        }

        .toolbar {
            margin-bottom: 10px;
        }

        .toolbar button {
            margin-right: 5px;
        }
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
            <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['content'] . '</td>';
                    echo '<td>' . $row['created_at'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php
                // Calculate total pages
                $totalPages = ceil(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM citec")) / $rowsPerPage);

                // Previous page
                $prevPage = $page - 1;
                echo '<li class="page-item ' . ($page <= 1 ? 'disabled' : '') . '"><a class="page-link" href="?page=' . $prevPage . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';

                // Page numbers
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }

                // Next page
                $nextPage = $page + 1;
                echo '<li class="page-item ' . ($page >= $totalPages ? 'disabled' : '') . '"><a class="page-link" href="?page=' . $nextPage . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                ?>
            </ul>
        </nav>
    </div>
            </div>
            </section>
                </div>
            </div>

            <script src="../../style/bootstrap-5.3.2-dist/js/jquery-3.2.1.min.js"></script>
    <script src="../../style/bootstrap-5.3.2-dist/js/popper.min.js"></script>
    <script src="../../style/bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <script src="../../style/bootstrap-5.3.2-dist/js/jquery.slimscroll.min.js"></script>
    <script src="../../style/morris/morris.min.js"></script>
    <script src="../../style/bootstrap-5.3.2-dist/js/nav.js"></script>
    <script src="../../style/notification/notification.js"></script>

</body>
</html>
<?php
} else {
    echo "No records found";
}

// Close the database connection when done
mysqli_close($conn);
?>

