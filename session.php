<?php

include "connection/connection.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
}else{
	header("Location: ../index.php");
}
?>