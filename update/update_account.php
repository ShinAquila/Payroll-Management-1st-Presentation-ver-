<?php

include("../db.php");
include("../auth.php");

$id = $_POST['id'];
$deduction_sum = 0;


// Retrieve selected deductions with amounts and add them to $deduction_sum
if (isset($_POST['deduction'])) {
  foreach ($_POST['deduction'] as $selected_deduction) {
    $deduction_sum += $selected_deduction;
  }
}

$sql = mysqli_query($c, "UPDATE employee SET deduction='$deduction_sum', overtime_hours='" . $_POST['overtime'] . "', bonus='" . $_POST['bonus'] . "' WHERE emp_id='$id'");

if ($sql) {
  ?>
  <script>
    alert('Account successfully updated.');
    window.location.href = '../home/home_employee.php';
  </script>
  <?php
} else {
  echo "Invalid";
}

?>