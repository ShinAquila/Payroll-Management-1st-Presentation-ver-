<?php

include("../db.php");
include("../auth.php");

$id = $_POST['id'];
$overtime_hours = $_POST['overtime'];
$bonus = $_POST['bonus'];
$deduction_sum = 0;


if (isset($_POST['benefits_deduction'])) {
  foreach ($_POST['benefits_deduction'] as $selected_deduction) {
    $deduction_sum += $selected_deduction;
  }
}

$salary_query = mysqli_query($c, "SELECT * FROM salary WHERE salary_id='1'");
$salary_row = mysqli_fetch_assoc($salary_query);
$salary_rate = $salary_row['salary_rate'];

$overtime_query = mysqli_query($c, "SELECT * FROM overtime WHERE ot_id='1'");
$overtime_row = mysqli_fetch_assoc($overtime_query);
$overtime = $overtime_hours* $overtime_row['rate'];

$update_account_query = mysqli_query($c, "SELECT * FROM account_info WHERE acc_info_id='$id'");
$row = mysqli_fetch_assoc($update_account_query);


$total_gross_pay = $overtime + $bonus + $salary_rate;
$new_total_net_pay = $total_gross_pay - $deduction_sum;

$sql = mysqli_query($c, "UPDATE account_info SET benefits_deduction='$deduction_sum', total_gross_pay = '$total_gross_pay', total_net_pay='$new_total_net_pay', overtime_hours='$overtime_hours', bonus='$bonus' WHERE acc_info_id='$id'");

if ($sql) {
  ?>
  <script>
    alert('Account successfully updated.');
    window.location.href = '../home/home_income.php';
  </script>
  <?php
} else {
  echo "Invalid";
}

?>
