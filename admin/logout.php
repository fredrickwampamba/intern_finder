<?php 
	session_start();
	unset($_SESSION['userID']);
	session_unset();
	session_destroy();
	header("Location:index.php");
 ?>