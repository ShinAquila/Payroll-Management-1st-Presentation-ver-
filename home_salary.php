<?php
include("auth.php"); //include auth.php file on all secure pages

?>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'payroll');
$query = mysqli_query($conn, "SELECT * from overtime");
while ($row = mysqli_fetch_array($query)) {
  @$rate = $row['rate'];
}

$query = mysqli_query($conn, "SELECT * from salary");
while ($row = mysqli_fetch_array($query)) {
  @$salary = $row['salary_rate'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Pixel Foundry - Salary</title>
  <link href="assets/css/justified-nav.css" rel="stylesheet">


  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/search.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

</head>

<body>

  <div class="container">
    <div class="masthead">
      <h3>
        Pixel Foundry<br><br>
        <b><a href="index.php">Home</a></b>
      </h3>
      <nav>
        <ul class="nav nav-justified">
          <li>
            <a href="home_employee.php">Employee</a>
          </li>
          <li>
            <a href="home_departments.php">Department</a>
          </li>
          <li>
            <a href="home_deductions.php">Deduction</a>
          </li>
          <li class="active">
            <a href="">Income</a>
          </li>
        </ul>
      </nav>
    </div>

    <br>
    <div class="well bs-component">
      <form class="form-horizontal">
        <fieldset>
          <button type="button" data-toggle="modal" data-target="#overtime" class="btn btn-success">Modify Overtime
            Rate</button>
          <button type="button" data-toggle="modal" data-target="#salary" class="btn btn-primary">Modify Salary
            Rate</button>
          <p class="pull-right">Overtime rate per hour: <big><b>
                <?php echo $rate; ?>.00
              </b></big></p><br>
          <p class="pull-right">Salary rate: <big><b>
                <?php echo $salary; ?>.00
              </b></big></p>
          <p align="center"><big><b>Account</b></big></p>
          <div class="table-responsive">
            <form method="post" action="">
              <table class="table table-bordered table-hover table-condensed" id="myTable">
                <!-- <h3><b>Ordinance</b></h3> -->
                <thead>
                  <tr class="info">
                    <th>
                      <p align="center">Name</p>
                    </th>
                    <th>
                      <p align="center">Overtime Hours</p>
                    </th>
                    <th>
                      <p align="center">Bonus</p>
                    </th>
                    <th>
                      <p align="center">Gross Pay</p>
                    </th>
                    <th>
                      <p align="center">Total Deductions</p>
                    </th>
                    <th>
                      <p align="center">Net Pay</p>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($conn, "SELECT * from overtime");
                  while ($row = mysqli_fetch_array($query)) {
                    $rate = $row['rate'];
                  }

                  $query = mysqli_query($conn, "SELECT * from salary");
                  while ($row = mysqli_fetch_array($query)) {
                    $salary_rate = $row['salary_rate'];
                  }

                  $query = mysqli_query($conn, "SELECT * from employee");
                  while ($row = mysqli_fetch_array($query)) {
                    $lname = $row['lname'];
                    $fname = $row['fname'];
                    $deduction = $row['deduction'];
                    $overtime_hours = $row['overtime_hours'];
                    $bonus = $row['bonus'];

                    $over_t = $overtime_hours * $rate;

                    $gross_pay = $over_t + $bonus + $salary_rate;
                    $netpay = $gross_pay - $deduction;

                    $update_gp_query = mysqli_query($conn, "UPDATE employee SET total_net_pay = $netpay WHERE emp_id = " . $row['emp_id']);
                    $update_np_query = mysqli_query($conn, "UPDATE employee SET total_gross_pay = $gross_pay WHERE emp_id = " . $row['emp_id']);

                    $total_net_pay_query = mysqli_query($conn, "SELECT total_net_pay FROM employee WHERE emp_id = " . $row['emp_id']);
                    $total_net_pay_row = mysqli_fetch_array($total_net_pay_query);
                    $total_net_pay = $total_net_pay_row['total_net_pay'];

                    $total_gross_pay_query = mysqli_query($conn, "SELECT total_gross_pay FROM employee WHERE emp_id = " . $row['emp_id']);
                    $total_gross_pay_row = mysqli_fetch_array($total_gross_pay_query);
                    $total_gross_pay = $total_gross_pay_row['total_gross_pay'];

                    ?>
                    <tr>
                      <td align="center">
                        <?php echo $lname ?>,
                        <?php echo $fname ?>
                      </td>
                      <td align="center"><big><b>
                            <?php echo $overtime_hours ?>
                          </b></big> hrs</td>
                      <td align="center"><big><b>
                            <?php echo $bonus ?>
                          </b></big>.00</td>
                      <td align="center"><big><b>
                            <?php echo $total_gross_pay ?>
                          </b></big>.00</td>
                      <td align="center"><big><b>
                            <?php echo $deduction ?>
                          </b></big>.00</td>
                      <td align="center"><big><b>
                            <?php echo $total_net_pay ?>
                          </b></big>.00</td>
                    </tr>
                  <?php } ?>
                </tbody>

                <tr class="info">
                  <th>
                    <p align="center">Name</p>
                  </th>
                  <th>
                    <p align="center">Overtime Hours</p>
                  </th>
                  <th>
                    <p align="center">Bonus</p>
                  </th>
                  <th>
                    <p align="center">Gross Pay</p>
                  </th>
                  <th>
                    <p align="center">Total Deductions</p>
                  </th>
                  <th>
                    <p align="center">Net Pay</p>
                  </th>
                </tr>
              </table>
            </form>
          </div>
        </fieldset>
      </form>
    </div>

    <!-- this modal is for OVERTIME -->
    <div class="modal fade" id="overtime" role="dialog">
      <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="padding:20px 50px;">
            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            <h3 align="center">Enter the amount of <big><b>Overtime</b></big> rate per hour.</h3>
          </div>
          <div class="modal-body" style="padding:40px 50px;">

            <form class="form-horizontal" action="update_overtime.php" name="form" method="post">
              <div class="form-group">
                <input type="text" name="rate" class="form-control" value="<?php echo $rate; ?>" required="required">
              </div>

              <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="Submit">
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!-- this modal is for SALARY -->
    <div class="modal fade" id="salary" role="dialog">
      <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="padding:20px 50px;">
            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            <h3 align="center">Enter the amount of <big><b>Salary</b></big> rate.</h3>
          </div>
          <div class="modal-body" style="padding:40px 50px;">

            <form class="form-horizontal" action="update_salary.php" name="form" method="post">
              <div class="form-group">
                <input type="text" name="salary_rate" class="form-control" value="<?php echo $salary; ?>"
                  required="required">
              </div>

              <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success" value="Submit">
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

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