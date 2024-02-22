<?php

require("db.php");

$conn = mysqli_connect('localhost', 'root', '', 'payroll');
if (!$conn) {
  die("Database Connection Failed" . mysqli_error());
}

$query1 = mysqli_query($conn, "SELECT * from deductions WHERE deduction_id = 1");
while ($row = mysqli_fetch_array($query1)) {
  $id = $row['deduction_id'];
  $philhealth = $_POST['philhealth'];
}

$query2 = mysqli_query($conn, "SELECT * from deductions WHERE deduction_id = 2");
while ($row = mysqli_fetch_array($query2)) {
  $id = $row['deduction_id'];
  $BIR = $_POST['bir'];
}

$query3 = mysqli_query($conn, "SELECT * from deductions WHERE deduction_id = 3");
while ($row = mysqli_fetch_array($query3)) {
  $id = $row['deduction_id'];
  $GSIS = $_POST['gsis'];
}

$query4 = mysqli_query($conn, "SELECT * from deductions WHERE deduction_id = 4");
while ($row = mysqli_fetch_array($query4)) {
  $id = $row['deduction_id'];
  $PAGIBIG = $_POST['pag_ibig'];
}

$sql1 = mysqli_query($c, "UPDATE deductions SET deduction_amount='$philhealth' WHERE deduction_id = 1");
$sql2 = mysqli_query($c, "UPDATE deductions SET deduction_amount='$BIR' WHERE deduction_id = 2");
$sql3 = mysqli_query($c, "UPDATE deductions SET deduction_amount='$GSIS' WHERE deduction_id = 3");
$sql4 = mysqli_query($c, "UPDATE deductions SET deduction_amount='$PAGIBIG' WHERE deduction_id = 4");

if ($sql1 && $sql2 && $sql3 && $sql4) {
	?>
	<script>
		alert('Deductions successfully updated...');
		window.location.href = 'home_deductions.php';
	</script>
<?php
} else {
	echo "Not Successfull!";
}
?>