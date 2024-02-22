<?php
include("../db.php"); //include auth.php file on all secure pages
include("../auth.php");

$sql = mysqli_query($c, "SELECT * from department");
while ($row = mysqli_fetch_array($sql)) {
    $dept_name = $row['dept_name'];
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
                    <li>
                        <a href="../home/home_employee.php">Employee</a>
                    </li>
                    <li class="active">
                        <a href="">Department</a>
                    </li>
                    <li>
                        <a href="../home/home_deductions.php">Deduction/s</a>
                    </li>
                    <li>
                        <a href="../home/home_salary.php">Income</a>
                    </li>
                </ul>
            </nav>
        </div><br><br>

        <?php
        $id = $_REQUEST['dept_id'];
        $query = "SELECT * from department where dept_id='" . $id . "'";
        $result = mysqli_query($c, $query) or die(mysqli_error());

        while ($row = mysqli_fetch_assoc($result)) {

            ?>

            <form class="form-horizontal" action="../update/update_department.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $row['dept_id']; ?>" />
                <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                        <h2>
                            <?php echo $row['dept_name']; ?>
                        </h2>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label">Department Name :</label>
                    <div class="col-sm-4">
                        <input type="text" name="dept_name" class="form-control" value="<?php echo $row['dept_name']; ?>"
                            required="required">
                    </div>
                </div>
                <br><br>

                <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                        <input type="submit" name="submit" value="Update" class="btn btn-danger">
                        <a href="../home/home_departments.php" class="btn btn-primary">Cancel</a>
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