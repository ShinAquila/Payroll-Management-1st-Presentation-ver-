<?php
include("auth.php"); //include auth.php file on all secure pages
include("add_employee.php");
?>

<?php

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

$query5 = mysqli_query($conn, "SELECT * from deductions WHERE deduction_id = 5");
while ($row = mysqli_fetch_array($query5)) {
  $id = $row['deduction_id'];
  $SSS = $row['deduction_amount'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Pixel Foundry - Deductions</title>

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
        <b><a href="../index.php">Home</a></b>
      </h3>
      <nav>
        <ul class="nav nav-justified">
          <li>
            <a href="home_employee.php">Employee</a>
          </li>
          <li>
            <a href="home_departments.php">Department</a>
          </li>
          <li class="active">
            <a href="">Deduction</a>
          </li>
          <li>
            <a href="home_salary.php">Income</a>
          </li>
        </ul>
      </nav>
    </div><br><br>

    <form class="form-horizontal" action="#" name="form">
      <div class="form-group">
        <label class="col-sm-5 control-label">PhilHealth :</label>
        <div class="col-sm-4">
          <?php echo $philhealth; ?>.00
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">BIR :</label>
        <div class="col-sm-4">
          <?php echo $BIR; ?>.00
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">GSIS :</label>
        <div class="col-sm-4">
          <?php echo $GSIS; ?>.00
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">PAG-IBIG :</label>
        <div class="col-sm-4">
          <?php echo $PAGIBIG; ?>.00
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">SSS :</label>
        <div class="col-sm-4">
          <?php echo $SSS; ?>.00
        </div>
      </div>
      <br><br>

      <div class="form-group">
        <label class="col-sm-5 control-label"><button type="button" data-toggle="modal" data-target="#deductions"
            class="btn btn-danger">Update</button></label>
      </div>
    </form>

    <!-- this modal is for update an DEDUCTIONS -->
    <div class="modal fade" id="deductions" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="padding:20px 50px;">
            <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
            <h3 align="center"><b>Deduction</b></h3>
          </div>
          <div class="modal-body" style="padding:40px 50px;">

            <form class="form-horizontal" action="../add/add_deductions.php" name="form" method="post">
              <div class="form-group">
                <label class="col-sm-4 control-label">PhilHealth</label>
                <div class="col-sm-8">
                  <input type="text" name="philhealth" class="form-control" required="required"
                    value="<?php echo $philhealth; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">BIR</label>
                <div class="col-sm-8">
                  <input type="text" name="bir" class="form-control" value="<?php echo $BIR; ?>" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">GSIS</label>
                <div class="col-sm-8">
                  <input type="text" name="gsis" class="form-control" value="<?php echo $GSIS; ?>" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">PAG-IBIG</label>
                <div class="col-sm-8">
                  <input type="text" name="pag_ibig" class="form-control" value="<?php echo $PAGIBIG; ?>"
                    required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">SSS</label>
                <div class="col-sm-8">
                  <input type="text" name="sss" class="form-control" value="<?php echo $SSS; ?>" required="required">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-4 control-label"></label>
                <div class="col-sm-8">
                  <input type="submit" name="submit" class="btn btn-success" value="Submit">
                </div>
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