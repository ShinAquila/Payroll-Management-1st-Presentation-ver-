<?php 
	require('../db.php');
	
	$id=$_GET['emp_id'];
	$query = "DELETE FROM employee WHERE emp_id=$id"; 
	$result = mysqli_query($c, $query) or die ( mysqli_error());
	header("Location: ../home/home_employee.php"); 
 ?>