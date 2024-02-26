<?php
$conn = mysqli_connect('localhost', 'root', '', 'payroll');
if (!$conn) {
  die("Database Connection Failed" . mysqli_error());
}
if (isset($_POST['submit']) != "") {
  $selected_employee = $_POST['employee'];
  $start_pay_period = $_POST['start_pay_period'];
  $end_pay_period = $_POST['end_pay_period'];
  $overtime_hours = $_POST['overtime_hours'];
  $bonus = $_POST['bonus'];

  $sql = mysqli_query($conn, "INSERT INTO account_info(employee_id, overtime_hours, bonus, start_pay_period, end_pay_period)VALUES('$selected_employee','$overtime_hours','$bonus', '$start_pay_period', '$end_pay_period')");

  if ($sql) {
    ?>
    <script>
      alert('Employee had been successfully added.');
      window.location.href = '../home/home_income.php';
    </script>
    <?php
  } else {
    ?>
    <script>
      alert('Invalid.');
      window.location.href = '../index.php';
    </script>
    <?php
  }
}
?>