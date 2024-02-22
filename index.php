<?php
include("auth.php"); //include auth.php file on all secure pages
include("add/add_employee.php");
?>

<?php

$conn = mysqli_connect('localhost', 'root', '', 'payroll');
if (!$conn) {
  die("Database Connection Failed" . mysqli_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Pixel Foundry - Homepage</title>

  <link href="assets/css/justified-nav.css" rel="stylesheet">


  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/search.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

</head>

<body>

  <div class="container">
    <div class="masthead">
      <h3>
        <b>Pixel Foundry</b><br>
        Welcome
        <?php echo $_SESSION['username']; ?>!<br><br>
        <b><a href="../index.php">Home</a></b>
        <a data-toggle="modal" href="#colins" class="pull-right"><b>
            Logout
          </b></a>
      </h3>
      <nav>
        <ul class="nav nav-justified">
          <li><a href="home/home_employee.php">Employee</a></li>
          <li><a href="home/home_departments.php">Department</a></li>
          <li><a href="home/home_deductions.php">Deduction</a></li>
          <li><a href="home/home_salary.php">Income</a></li>
        </ul>
      </nav>
    </div><br>

    <!-- Jumbotron -->
    <div class="jumbotron">
      <h1>Pixel Foundry</h1>
      <p class="lead">This is the homepage</p>
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