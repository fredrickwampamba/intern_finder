<?php 
	session_start();
	unset($_SESSION['CID']);
	session_unset();
	session_destroy();
	header("Location:index.php");
 ?>