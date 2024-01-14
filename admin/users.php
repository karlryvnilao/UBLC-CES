<?php
session_start();
include "../connection/connection.php";
include '../session.php';
include 'includes/notification.php';

if (isset($_POST['save_user'])) {
    // Retrieve form data
    $display_name = $_POST["name"];
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];
    $department = $_POST["role"];

    // Insert data into the database
    $sql = "INSERT INTO users (name, user_name, password, role)
            VALUES ('$display_name', '$user_name', '$password', '$department')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection


$queryUsers = "SELECT `id`, `username`, `name`, `password`,
`role` FROM `users`
ORDER BY `name` ASC;";
$stmtUsers = '';

try {
    $stmtUsers = $conn->prepare($queryUsers);
    $stmtUsers->execute();

} catch(PDOException $ex) {
      echo $ex->getTraceAsString();
      echo $ex->getMessage();
      exit;
    }

$conn->close();
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
        <!-- Default box -->
        <div class="card card-outline card-primary rounded-0 shadow">
          <div class="card-header">
            <h3 class="card-title">Add User</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
             <div class="row">

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
                <label>Display Name</label>
                <input type="text" id="name" name="name" required="required"
                class="form-control form-control-sm rounded-0" />
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
                <label>Username</label>
                <input type="text" id="username" name="username" required="required"
                class="form-control form-control-sm rounded-0" />
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
                <label>Password</label>
                <input type="password" id="password"
                name="password" required="required"
                class="form-control form-control-sm rounded-0" />
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
                <label>Role</label>
                <select class="form-select" aria-label="Default select example" id="role" name="role">
                <option selected>Select Role</option>
                <option value="user">user</option>
                <option value="admin">admin</option>
                </select>
              </div>

              <div class="col-lg-1 col-md-2 col-sm-2 col-xs-2 mt-4">
                <label>&nbsp;</label>
                <button type="submit"
                name="save_user" class="btn btn-primary btn-sm btn-flat btn-block">Save</button>
              </div>
            </div>
          </form>
        </div>

      </div>
      <!-- /.card -->
    </section>
    <section class="content">
      <!-- Default box -->
      
      <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-header">
          <h3 class="card-title">All Users</h3>

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
            <col width="5%">
            <col width="10%">
            <col width="50%">
            <col width="25%">
            <col width="10%">
          </colgroup>
          <thead>
            <tr>
             <th class="p-1 text-center">S.No</th>
             <th class="p-1 text-center">Display Name</th>
             <th class="p-1 text-center">Username</th>
             <th class="p-1 text-center">Action</th>
             <th class="p-1 text-center">Department</th>
           </tr>
         </thead>

         <tbody>
          <?php
          $serial = 0;
          while($row = $stmtUsers->fetch(PDO::FETCH_ASSOC)) {
           $serial++;
        ?>
        <tr>
            <td class="px-2 py-1 align-middle text-center"><?php echo $serial;?></td>
            
            <td class="px-2 py-1 align-middle"><?php echo $row['name'];?></td>
            <td class="px-2 py-1 align-middle"><?php echo $row['username'];?></td>
            <td class="px-2 py-1 align-middle"><?php echo $row['password'];?></td>

            <td class="px-2 py-1 align-middle text-center">
                <a href="update_user.php?user_id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm btn-flat">
                <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div>
</div>

<!-- /.card-footer-->
</div>

<!-- /.card -->

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
<script>

</script>

</body>
</html>