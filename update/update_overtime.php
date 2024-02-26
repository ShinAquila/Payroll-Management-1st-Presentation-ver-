<?php

require("../db.php");

$id = $_POST['ot_id'];
$overtime_rate = $_POST['rate'];


$sql = mysqli_query($c, "UPDATE overtime SET rate='$overtime_rate' WHERE ot_id='1'");

// Fetch the updated salary rate
$salary_query = mysqli_query($c, "SELECT salary_rate FROM salary WHERE salary_id='1'");
$salary_row = mysqli_fetch_assoc($salary_query);
$salary_rate = $salary_row['salary_rate'];

// Update account_info for all rows
$account_query = mysqli_query($c, "SELECT * FROM account_info");
while ($row = mysqli_fetch_assoc($account_query)) {
    $total_gross_pay = ($row['overtime_hours'] * $overtime_rate) + $row['bonus'] + $salary_rate;
    $new_total_net_pay = $total_gross_pay - $row['benefits_deduction'];
    
    // Update each row in account_info
    $update_query = mysqli_query($c, "UPDATE account_info SET total_gross_pay='$total_gross_pay', total_net_pay='$new_total_net_pay' WHERE acc_info_id='{$row['acc_info_id']}'");
    if (!$update_query) {
        echo "Failed to update account info for ID: {$row['acc_info_id']}";
        exit;
    }
}

if ($sql) {
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