
<?php 
// this code is for redirecting to different pages if the credentials are correct.
   session_start();
   include 'connection/connection.php';
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
         //admin
      	if ($_SESSION['role'] == 'admin'){
			header("Location: admin/admin_dashboard.php");
      	 }
		 //teacher
		 else if ($_SESSION['role'] == 'citec'){
			header("Location: departments/citec/citec_dashboard.php");
      	} 
		//student
		  else if ($_SESSION['role'] == 'ceas'){
			header("Location: departments/citec/citec_dashboard.php");
		}
		//parent
		else if ($_SESSION['role'] == 'cenar'){
			header("Location: pages/parent.php");
		}
		else if ($_SESSION['role'] == 'cmt'){
			header("Location: pages/parent.php");
		}
		else if ($_SESSION['role'] == 'ccje'){
			header("Location: departments/ccje/ccje_dashboard.php");
		}
 }
else{
	header("Location:index.php");
} ?>
