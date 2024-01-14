<?php  

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "ublc_ces";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection Failed!";
	exit();
}