<?php
include("db.php"); //include auth.php file on all secure pages
include("auth.php");

$conn = mysqli_connect('localhost', 'root', '', 'payroll');
if (!$conn) {
  die("Database Connection Failed" . mysqli_error());
}

$query1 = mysqli_query($conn, "SELECT * from deductions WHERE deduction_id = 1");
while ($row = mysqli_fetch_array($query1)) {
  $id = $row['deduction_id'];
  $philhealth = $row['deduction_amount'];
}

$query2 = mysqli_query($conn, "SELECT * from deductions WHERE deduction_id = 2");
while ($row = mysqli_fetch_array($query2)) {
  $id = $row['deduction_id'];
  $BIR = $row['deduction_amount'];
}

$query3 = mysqli_query($conn, "SELECT * from deductions WHERE deduction_id = 3");
while ($row = mysqli_fetch_array($query3)) {
  $id = $row['deduction_id'];
  $GSIS = $row['deduction_amount'];
}

$query4 = mysqli_query($conn, "SELECT * from deductions WHERE deduction_id = 4");
while ($row = mysqli_fetch_array($query4)) {
  $id = $row['deduction_id'];
  $PAGIBIG = $row['deduction_amount'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
    content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
  <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

  <title>Pixel Foundry - View Account</title>
  <link href="assets/css/justified-nav.css" rel="stylesheet">


  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
  <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
  <link href="assets/css/search.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
  <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

</head>

<body>

  <div class="container">
    <div class="masthead">
      <h3>
        <b><a href="index.php">Payroll and Management System</a></b>
        <a data-toggle="modal" href="#colins" class="pull-right"><b>Admin</b></a>
      </h3>
      <nav>
        <ul class="nav nav-justified">
          <li class="active">
            <a href="">Employee</a>
          </li>
          <li>
            <a href="home_departments.php">Department</a>
          </li>
          <li>
            <a href="home_deductions.php">Deduction</a>
          </li>
          <li>
            <a href="home_salary.php">Income</a>
          </li>
        </ul>
      </nav>
    </div><br><br>



    <?php
    $id = $_REQUEST['emp_id'];
    $query = "SELECT * from employee where emp_id='" . $id . "'";
    $result = mysqli_query($c, $query) or die(mysqli_error());

    $query_deductions = mysqli_query($c, "SELECT * FROM deductions");
    $row_deductions = mysqli_fetch_assoc($query_deductions);

    $query = mysqli_query($c, "SELECT * from overtime");
    while ($row = mysqli_fetch_array($query)) {
      $rate = $row['rate'];
    }

    $query = mysqli_query($c, "SELECT * from salary");
    while ($row = mysqli_fetch_array($query)) {
      $salary = $row['salary_rate'];
    }

    while ($row = mysqli_fetch_assoc($result)) {
      $overtime_hours = $row['overtime_hours'] * $rate;
      $bonus = $row['bonus'];
      $deduction = $row['deduction'];
      $income = $overtime_hours + $bonus + $salary;
      $netpay = $income - $deduction;
      ?>

      <form class="form-horizontal" action="update_account.php" method="post" name="form">
        <input type="hidden" name="new" value="1" />
        <input name="id" type="hidden" value="<?php echo $row['emp_id']; ?>" />
        <div class="form-group">
          <label class="col-sm-5 control-label"></label>
          <div class="col-sm-4">
            <h2>
              <?php echo $row['lname']; ?>,
              <?php echo $row['fname']; ?>
            </h2>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label">Deductions:</label>
          <div class="col-sm-4">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="deduction[]"
                value="<?php echo $philhealth; ?>" <?php if ($philhealth > 0)
                     echo "checked"; ?>>
              <label class="form-check-label" for="deduction_philhealth">PhilHealth</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="deduction[]"
                value="<?php echo $BIR; ?>" <?php if ($BIR > 0)
                     echo "checked"; ?>>
              <label class="form-check-label" for="deduction_bir">BIR</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="deduction[]"
                value="<?php echo $GSIS; ?>" <?php if ($GSIS > 0)
                     echo "checked"; ?>>
              <label class="form-check-label" for="deduction_gsis">GSIS</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="deduction[]"
                value="<?php echo $PAGIBIG; ?>" <?php if ($PAGIBIG > 0)
                     echo "checked"; ?>>
              <label class="form-check-label" for="deduction_pagibig">PAG-IBIG</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label">Overtime :</label>
          <div class="col-sm-4">
            <input type="text" name="overtime" class="form-control" value="<?php echo $row['overtime_hours']; ?>"
              required="required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label">Bonus :</label>
          <div class="col-sm-4">
            <input type="text" name="bonus" class="form-control" value="<?php echo $row['bonus']; ?>" required="required">
          </div>
        </div><br><br>

        <div class="form-group">
          <label class="col-sm-5 control-label">Netpay :</label>
          <div class="col-sm-4">
            <?php echo $netpay; ?>.00
          </div>
        </div><br><br>
        <div class="form-group">
          <label class="col-sm-5 control-label"></label>
          <div class="col-sm-4">
            <input type="submit" name="submit" value="Update" class="btn btn-danger">
            <a href="home_employee.php" class="btn btn-primary">Cancel</a>
          </div>
        </div>
      </form>
      <?php
    }
    ?>

    <!-- this modal is for my Colins -->
    <div class="modal fade" id="colins" role="dialog">
      <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="padding:20px 50px;">
            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            <h3 align="center">You are logged in as <b>
                <?php echo $_SESSION['username']; ?>
              </b></h3>
          </div>
          <div class="modal-body" style="padding:40px 50px;">
            <div align="center">
              <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- <script src="assets/js/docs.min.js"></script> -->
  <script src="assets/js/search.js"></script>
  <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

  <!-- FOR DataTable -->
  <script>
    {
      $(document).ready(function () {
        $('#myTable').DataTable();
      });
    }
  </script>

  <!-- this function is for modal -->
  <script>
    $(document).ready(function () {
      $("#myBtn").click(function () {
        $("#myModal").modal();
      });
    });
  </script>

</body>

</html>