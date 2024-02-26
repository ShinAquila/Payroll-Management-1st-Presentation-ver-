<?php 
	require('../db.php');
	
	$id=$_GET['acc_info_id'];
	$query = "DELETE FROM account_info WHERE acc_info_id=$id"; 
	$result = mysqli_query($c, $query) or die ( mysqli_error());
	header("Location: ../home/home_income.php"); 
 ?>