<?php
session_start();
include "../../connection/connection.php";
include '../../session.php';

if(isset($_POST['submit'])){
    $project_title = $_POST["project_title"];
    $timeframe = $_POST["timeframe"];
    $activity = $_POST["activity"];
    $departments = $_POST["departments"];
    $person_incharged = $_POST["person_incharged"];
    $prepared_by = $_POST["prepared_by"];
    $total_expensed = $_POST["total_expensed"];
    $data = $_POST["data"];
    $status = $_POST["status"];
    
    // Perform SQL insertion
    $sql = "INSERT INTO project_plan (project_title, timeframe, activity, departments, person_incharged, prepared_by, total_expensed, data, status)
            VALUES ('$project_title', '$timeframe', '$activity', '$departments', '$person_incharged', '$prepared_by', '$total_expensed', '$data', '$status')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
    
// Close the connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../style/bootstrap-5.3.2-dist/css/bootstrap.css">
<link rel="stylesheet" href="../../style/bootstrap-5.3.2-dist/css/sidebar.css">
<link rel="stylesheet" href="./../style/bootstrap-5.3.2-dist/css/font-awesome.min.css">
<link rel="stylesheet" href="../../style/bootstrap-5.3.2-dist/css/line-awesome.min.css">
<link rel="stylesheet" href="../../style/bootstrap-5.3.2-dist/css/select2.min.css">
<link rel="stylesheet" href="../../style/morris/morris.css">
<script src="https://kit.fontawesome.com/6b23de7647.js" crossorigin="anonymous"></script>
<title>Document</title>
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper">
        <?php include_once("includes/header.php");?>
        <?php include_once("includes/sidebar.php");?>
        <div class="page-wrapper">
    

        <div class="content container-fluid">
      
        <!-- Page Header -->
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

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card card-outline card-primary rounded-0 shadow">
                <div class="card-header">
                    <h3 class="card-title text-center">Community Extension Project Plan 2022/2023</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
                                <label>Project Title</label>
                                <input type="hidden" class="form-control" id="data" name="data" value="1" required />
                                <input type="hidden" class="form-control" id="departments" name="departments" value="CITEC" required />
                                <input type="hidden" class="form-control" id="status" name="status" value="ONGOING" required />
                                <input type="text" name="project_title" id="project_title" required="required"
                                       class="form-control form-control-sm rounded-0"/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
                                <label>TimeFrame</label>
                                <input type="text" id="timeframe" name="timeframe" required="required"
                                       class="form-control form-control-sm rounded-0"/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
                                <label>Activity</label>
                                <input type="text" id="activity" name="activity" required="required"
                                       class="form-control form-control-sm rounded-0"/>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
                                <label>Person Incharged</label>
                                <input type="text" id="person_incharged" name="person_incharged" required="required"
                                       class="form-control form-control-sm rounded-0"/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
                                <label>Prepared By</label>
                                <input type="text" id="prepared_by" name="prepared_by" required="required"
                                       class="form-control form-control-sm rounded-0"/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
                                <label>Total Expensed</label>
                                <input type="number" id="total_expensed" name="total_expensed" required="required"
                                       class="form-control form-control-sm rounded-0"/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10 mt-4">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
                            

                            
        </section>

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
            <col width="5%">
            <col width="10%">
            <col width="10%">
            <col width="25%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
          </colgroup>
          <thead>
            <tr>
            <th class="p-1 text-center">Project Title</th>
             <th class="p-1 text-center">Timeframe</th>
             <th class="p-1 text-center">Departments</th>
             <th class="p-1 text-center">Activity</th>
             <th class="p-1 text-center">Person Incharged</th>
             <th class="p-1 text-center">Prepared By</th>
             <th class="p-1 text-center">Total Expensed</th>
             <th class="p-1 text-center">Status</th>
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
                $sql = "SELECT * FROM `project_plan` WHERE departments = 'CITEC'";
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
                        $status = $row["status"];
                        $count++;
                        $_SESSION['allCount'] = $count;
                        echo "<tr>
                        <td class='text-center'>$project_title</td>
                        <td class='text-center'>$timeframe</td>
                        <td class='text-center'>$departments</td>
                        <td class='text-center'>$activity</td>
                        <td class='text-center'>$personIncharged</td>
                        <td class='text-center'>$preparedBy</td>
                        <td class='text-center'>$totalExpensed</td>
                        <td class='text-center'>$status</td>
                        <td class='text-center'>
                        <a href='#' class='btn btn-warning' data-toggle='modal' data-target='#updateModal'><i class='fas fa-edit'></i></a>
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

        <!--UPDATE MODAL-->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="updateForm">
      <div class="modal-body">
            
        <div class="form-group">
            <label for="updateProjectTitle">Project Title:</label>
            <input type="text" class="form-control" id="updateProjectTitle" name="updateProjectTitle" value="<?php echo "$project_title"; ?>" required>
        </div>

        <div class="form-group">
            <label for="updateTimeframe">Timeframe:</label>
            <input type="text" class="form-control" id="updateTimeframe" name="updateTimeframe" value="<?php echo "$timeframe"; ?>" required>
        </div>
        <div class="form-group">
            <label for="updateDepartments">Activity:</label>
            <input type="text" class="form-control" id="updateActivity" name="updateActivity"value="<?php echo "$activity"; ?>" required>
        </div>
        <div class="form-group">
            <label for="updateDepartments">Departments:</label>
            <input type="text" class="form-control" id="updateDepartments" name="updateDepartments" value="<?php echo "$departments"; ?>" required>
        </div>
        <div class="form-group">
            <label for="updateDepartments">Person Incharged:</label>
            <input type="text" class="form-control" id="updateIncharged" name="updateIncharged" value="<?php echo "$person_incharged"; ?>" required>
        </div>
        <div class="form-group">
            <label for="updateDepartments">Prepared By:</label>
            <input type="text" class="form-control" id="updatePrepared" name="updatePrepared" value="<?php echo "$prepared_by"; ?>" required>
        </div>
        <div class="form-group">
            <label for="updateDepartments">Total Expensed:</label>
            <input type="text" class="form-control" id="updateExpensed" name="updateExpensed" value="<?php echo "$total_expensed"; ?>" required>
        </div>
        <div class="form-group">
            <label for="updateDepartments">Status:</label>
            <input type="text" class="form-control" id="updateStatus" name="updateStatus" value="<?php echo "$status"; ?>" required>
        </div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
        

            
    <!-- /Page Wrapper -->
    
      </div>
        </div>
</div>

<footer>
  <?php
  include 'includes/footer.php';
  ?>
</footer>
    <script src="../../style/bootstrap-5.3.2-dist/js/jquery-3.2.1.min.js"></script>
    <script src="../../style/bootstrap-5.3.2-dist/js/popper.min.js"></script>
    <script src="../../style/bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <script src="../../style/bootstrap-5.3.2-dist/js/jquery.slimscroll.min.js"></script>
    <script src="../../style/morris/morris.min.js"></script>
    <script src="../../style/bootstrap-5.3.2-dist/js/nav.js"></script>
    <script src="../../style/notification/notification.js"></script>

    
<script>
function saveChanges() {
    // Fetch form data
    var projectTitle = $('#updateProjectTitle').val();
    var timeframe = $('#updateTimeframe').val();
    var departments = $('#updateDepartments').val();
    var activity = $('#updateActivity').val();
    var incharged = $('#updateIncharged').val();
    var prepared = $('#updatePrepared').val();
    var expensed = $('#updateExpensed').val();
    var status = $('#updateStatus').val();

    // Perform AJAX request to update data in the database
    $.ajax({
      url: 'update_project.php',  // Replace with the actual URL for your update script
      method: 'POST',
      data: {
        projectTitle: projectTitle,
        timeframe: timeframe,
        departments: departments,
        activity: activity,
        incharged: incharged,
        prepared: prepared,
        expensed: expensed,
        status: status,
        // Add more data fields as needed
      },
      success: function(response) {
        // Handle success, e.g., show a success message or reload the table
        console.log('Update successful');
        // Optionally, you can reload the table or update the specific row in the table.
        // Example: $('#all_users').DataTable().ajax.reload();
      },
      error: function(error) {
        // Handle error, e.g., show an error message
        console.error('Error during update:', error);
      }
    });

    // Close the modal after saving changes
    $('#updateModal').modal('hide');
  }
                </script>
</body>

</html>