<?php
	
		require("../db.php");
		
		@$id 			= $_POST['salary_id'];
		@$salary		= $_POST['salary_rate'];


		$sql = mysqli_query($c,"UPDATE salary SET salary_rate='$salary' WHERE salary_id='1'");

		$philhealth = $salary * 0.05;
		$GSIS = $salary * 0.09;
		$PAGIBIG = $salary * 0.02;
		$SSS = $salary * 0.14;

		$sql_philhealth = mysqli_query($c,"UPDATE deductions SET deduction_amount='$philhealth' WHERE deduction_id='1'");
		$sql_gsis = mysqli_query($c,"UPDATE deductions SET deduction_amount='$GSIS' WHERE deduction_id='3'");
		$sql_pagibig = mysqli_query($c,"UPDATE deductions SET deduction_amount='$PAGIBIG' WHERE deduction_id='4'");
		$sql_sss = mysqli_query($c,"UPDATE deductions SET deduction_amount='$SSS' WHERE deduction_id='5'");

		if($sql && $sql_philhealth && $sql_gsis && $sql_pagibig && $sql_sss)
		{
			?>
		        <script>
		            alert('Salary rate successfully changed...');
		            window.location.href='../home/home_salary.php';
		        </script>
		    <?php 
		}
		else {
			echo "Not Successfull!"; 
		}
 ?>