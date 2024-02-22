<?php 
	require('db.php');
	
	$id=$_GET['dept_id'];
	$query = "DELETE FROM department WHERE dept_id=$id"; 
	$result = mysqli_query($c, $query) or die ( mysqli_error());
	header("Location: home_departments.php"); 
 ?>