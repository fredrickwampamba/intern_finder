<?php 
error_reporting(0);

$conn = new mysqli("localhost", "root", "", "intern_finder");

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
?>