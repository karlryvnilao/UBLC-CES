<?php
session_start();
include "../connection/connection.php";
include '../session.php';
include 'includes/notification.php';


$sql = "SELECT id,title, start, end FROM events";
$result = $conn->query($sql);
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
        <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-header ">
        <div class="d-flex justify-content-between">
            <h3 class="card-title mt-1">Add User</h3>
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
                    Add New Event
            </button>
            <!-- Modal -->
                        <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form to add new event -->
                                            <form action="components/process.php" method="post">
                                                <div class="mb-3">
                                                    <label for="eventName" class="form-label">Event Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="eventDate" class="form-label">Start Date</label>
                                                    <input type="datetime-local" id="start" name="start" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="eventDate" class="form-label">End Date</label>
                                                    <input type="datetime-local" id="end" name="end" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Add Event</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
             <th class="p-1 text-center">Title</th>
             <th class="p-1 text-center">Start Date</th>
             <th class="p-1 text-center">End Date</th>
             <th class="p-1 text-center">Action</th>
           </tr>
         </thead>

         <tbody>
          <?php
          $serial = 0;
          while ($row = $result->fetch_assoc()) {
              $serial++;
        ?>
        <tr>
            <td class="px-2 py-1 align-middle text-center"><?php echo $serial;?></td>
            <td class="px-2 py-1 align-middle"><?php echo $row['title'];?></td>
            <td class="px-2 py-1 align-middle"><?php echo $row['start'];?></td>
            <td class="px-2 py-1 align-middle"><?php echo $row['end'];?></td>
            <td class="px-2 py-1 align-middle text-center">
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editEventModal<?php echo $row['id'];?>">
                    Edit
                </button>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEventModal<?php echo $row['id'];?>">
                    Delete
                </button>
            </td>

            <!-- Inside the while loop -->
            <div class="modal fade" id="editEventModal<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form to edit event -->
                            <form action="components/edit.php" method="post">
                                <!-- Add necessary input fields with current event details pre-filled -->
                                <input type="hidden" name="event_id" value="<?php echo $row['id'];?>">
                                <div class="mb-3">
                                    <label for="editEventName" class="form-label">Event Name</label>
                                    <input type="text" class="form-control" id="editEventName" name="editEventName" value="<?php echo $row['title'];?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editEventDate" class="form-label">Start Date</label>
                                    <input type="datetime-local" id="dateTimeInput" name="dateTimeInput" value="<?php echo $row['start'];?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editEventDate" class="form-label">End Date</label>
                                    <input type="datetime-local" id="dateTimeInput" name="dateTimeInput" value="<?php echo $row['end'];?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inside the while loop -->
            <div class="modal fade" id="deleteEventModal<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteEventModalLabel">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this event?</p>
                            <!-- Add form to handle the delete action -->
                            <form action="components/delete.php" method="post">
                                <input type="hidden" name="event_id" value="<?php echo $row['id'];?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </tr>
    <?php } ?>
    </tbody>
</table>
</div>
</div>
        </section>
    
        </div>
    
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