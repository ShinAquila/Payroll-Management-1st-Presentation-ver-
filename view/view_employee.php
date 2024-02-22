<?php
include("../db.php"); //include auth.php file on all secure pages
include("../auth.php");

$sql = mysqli_query($c, "SELECT * from deductions");
while ($row = mysqli_fetch_array($sql)) {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Pixel Foundry - View Employee</title>
  <link href="../assets/css/justified-nav.css" rel="stylesheet">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/search.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.min.css">

</head>

<body>

  <div class="container">
    <div class="masthead">
      <h3>
        <b><a href="../index.php">Payroll and Management System</a></b>
        <a data-toggle="modal" href="#colins" class="pull-right"><b>Admin</b></a>
      </h3>
      <nav>
        <ul class="nav nav-justified">
          <li class="active">
            <a href="">Employee</a>
          </li>
          <li>
            <a href="../home/home_departments.php">Department</a>
          </li>
          <li>
            <a href="../home/home_deductions.php">Deduction</a>
          </li>
          <li>
            <a href="../home/home_salary.php">Income</a>
          </li>
        </ul>
      </nav>
    </div><br><br>

    <?php
    $id = $_REQUEST['emp_id'];
    $query = "SELECT * from employee where emp_id='" . $id . "'";
    $result = mysqli_query($c, $query) or die(mysqli_error());

    while ($row = mysqli_fetch_assoc($result)) {

      ?>

      <form class="form-horizontal" action="../update/update_employee.php" method="post" name="form">
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
          <label class="col-sm-5 control-label">Last Name :</label>
          <div class="col-sm-4">
            <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>" required="required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label">First Name :</label>
          <div class="col-sm-4">
            <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>" required="required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label">Gender :</label>
          <div class="col-sm-4">
            <select name="gender" class="form-control" required>
              <option value="<?php echo $row['gender']; ?>">
                <?php echo $row['gender']; ?>
              </option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label">Email :</label>
          <div class="col-sm-4">
            <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>" required="required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label">Department :</label>
          <div class="col-sm-4">
            <select name="department" class="form-control" placeholder="Department" required>
              <option value="">Department</option>

              <?php
              require_once('../db.php');

              $sql = "SELECT dept_id, dept_name FROM department";
              $result = mysqli_query($c, $sql);

              if (!$result) {
                die("Error fetching departments: " . mysqli_error($c));
              }

              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['dept_id'] . "'>" . $row['dept_name'] . "</option>";
              }

              mysqli_close($c);
              ?>

            </select>
          </div>
        </div>
        <br><br>

        <div class="form-group">
          <label class="col-sm-5 control-label"></label>
          <div class="col-sm-4">
            <input type="submit" name="submit" value="Update" class="btn btn-danger">
            <a href="../home/home_employee.php" class="btn btn-primary">Cancel</a>
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
              <a href="../logout.php" class="btn btn-block btn-danger">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/search.js"></script>
  <script type="text/javascript" charset="utf-8" language="javascript" src="../assets/js/dataTables.min.js"></script>

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