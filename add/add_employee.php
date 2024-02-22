<?php
$conn = mysqli_connect('localhost', 'root', '', 'payroll');
if (!$conn) {
  die("Database Connection Failed" . mysqli_error());
}
if (isset($_POST['submit']) != "") {
  $lname = $_POST['lname'];
  $fname = $_POST['fname'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $selected_dept_id = $_POST['department'];

  $sql = mysqli_query($conn, "INSERT into employee(lname, fname, gender, email, dept, deduction, overtime_hours, bonus, total_gross_pay, total_net_pay)VALUES('$lname','$fname','$gender', '$email', '$selected_dept_id', 0, 0, 0, 0, 0)");

  if ($sql) {
    ?>
    <script>
      alert('Employee had been successfully added.');
      window.location.href = '../home/home_employee.php?page=emp_list';
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