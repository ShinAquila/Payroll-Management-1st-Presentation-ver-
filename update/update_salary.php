<?php

require("../db.php");

@$id = $_POST['salary_id'];
@$salary = $_POST['salary_rate'];


$sql = mysqli_query($c, "UPDATE salary SET salary_rate='$salary' WHERE salary_id='1'");

$overtime_query = mysqli_query($c, "SELECT * FROM overtime WHERE ot_id='1'");
$overtime_row = mysqli_fetch_assoc($overtime_query);
$overtime_rate = $overtime_row['rate'];

// Update account_info for all rows
$account_query = mysqli_query($c, "SELECT * FROM account_info");
while ($row = mysqli_fetch_assoc($account_query)) {
	$total_gross_pay = ($row['overtime_hours'] * $overtime_rate) + $row['bonus'] + $salary;
	$new_total_net_pay = $total_gross_pay - $row['benefits_deduction'];

	// Update each row in account_info
	$update_query = mysqli_query($c, "UPDATE account_info SET total_gross_pay='$total_gross_pay', total_net_pay='$new_total_net_pay' WHERE acc_info_id='{$row['acc_info_id']}'");
	if (!$update_query) {
		echo "Failed to update account info for ID: {$row['acc_info_id']}";
		exit;
	}
}

$philhealth = $salary * 0.05;
$GSIS = $salary * 0.09;
$PAGIBIG = $salary * 0.02;
$SSS = $salary * 0.14;

$sql_philhealth = mysqli_query($c, "UPDATE deductions SET deduction_amount='$philhealth' WHERE deduction_id='1'");
$sql_gsis = mysqli_query($c, "UPDATE deductions SET deduction_amount='$GSIS' WHERE deduction_id='3'");
$sql_pagibig = mysqli_query($c, "UPDATE deductions SET deduction_amount='$PAGIBIG' WHERE deduction_id='4'");
$sql_sss = mysqli_query($c, "UPDATE deductions SET deduction_amount='$SSS' WHERE deduction_id='5'");

if ($sql && $sql_philhealth && $sql_gsis && $sql_pagibig && $sql_sss) {
	?>
	<script>
		alert('Salary rate successfully changed...');
		window.location.href = '../home/home_income.php';
	</script>
	<?php
} else {
	echo "Not Successfull!";
}
?>