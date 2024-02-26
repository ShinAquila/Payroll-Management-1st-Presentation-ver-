<?php
require('../db.php');

$id = $_GET['dept_id'];

// $salary_query = mysqli_query($c, "SELECT * FROM salary WHERE salary_id='1'");
// $salary_row = mysqli_fetch_assoc($salary_query);
// $salary_rate = $salary_row['salary_rate'];

// Update account_info for all rows
$employee_query = mysqli_query($c, "SELECT * FROM employee WHERE dept='$id'");
while ($row = mysqli_fetch_assoc($employee_query)) {
    
    // Update each row in account_info
    $update_query = mysqli_query($c, "UPDATE employee SET dept=0 WHERE emp_id='{$row['emp_id']}'");
    if (!$update_query) {
        echo "Failed to update account info for ID: {$row['emp_id']}";
        exit;
    }
}

$query = "DELETE FROM department WHERE dept_id=$id";
$result = mysqli_query($c, $query) or die(mysqli_error());
header("Location: ../home/home_departments.php");
