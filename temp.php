<?php

include("auth.php"); //include auth.php file on all secure pages
include("add/add_income.php");

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Foundry - Income</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/search.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.min.css">
    <link href="path/to/fontawesome-free-x.x.x/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom styles for this template */
        body {
            padding-top: 56px;
        }

        .masthead {
            background-color: #343a40;
            color: white;
            padding: 15px;
            margin-bottom: 30px;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            margin-right: 10px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><b>Pixel Foundry</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home/home_employee.php">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home/home_departments.php">Department</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home/home_deductions.php">Deduction</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="home/home_income.php">Income</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home/home_salary.php">Report</a>
                    </li>
                </ul>
                <div class="my-2 my-lg-0">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#colins">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <header class="masthead text-center text-white">
        <div class="container">
            <h3>Welcome
                <?php echo $_SESSION['username']; ?>!
            </h3>
            <p class="lead">Pixel Foundry - Manage Income</p>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Manage Income
                        <div class="float-right">
                            <button type="button" data-toggle="modal" data-target="#overtime"
                                class="btn btn-primary">Modify Overtime
                                Rate</button>
                            <button type="button" data-toggle="modal" data-target="#salary"
                                class="btn btn-primary">Modify Salary
                                Rate</button>
                            <button type="button" data-toggle="modal" data-target="#addAccountIncome"
                                class="btn btn-success">Add
                                New</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <table class="table table-bordered table-hover table-condensed" id="myTable">
                                <!-- <h3><b>Ordinance</b></h3> -->
                                <thead>
                                    <tr class="info">
                                        <th>
                                            <p align="center">Name</p>
                                        </th>
                                        <th>
                                            <p align="center">Start Pay Period</p>
                                        </th>
                                        <th>
                                            <p align="center">End Pay Period</p>
                                        </th>
                                        <th>
                                            <p align="center">Overtime (hrs)</p>
                                        </th>
                                        <th>
                                            <p align="center">Bonus</p>
                                        </th>
                                        <th>
                                            <p align="center">Deductions</p>
                                        </th>
                                        <th>
                                            <p align="center">Gross Pay</p>
                                        </th>
                                        <th>
                                            <p align="center">Net Pay</p>
                                        </th>
                                        <th>
                                            <p align="center">Action</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $conn = mysqli_connect('localhost', 'root', '', 'payroll');
                                    if (!$conn) {
                                        die("Database Connection Failed" . mysqli_error());
                                    }

                                    $query = mysqli_query($conn, "SELECT * FROM employee JOIN account_info ON employee.emp_id = account_info.employee_id ORDER BY emp_id ASC") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['emp_id'];
                                        $lname = $row['lname'];
                                        $fname = $row['fname'];
                                        $overtime_hours = $row['overtime_hours'];
                                        $bonus = $row['bonus'];
                                        $benefits_deduction = $row['benefits_deduction'];
                                        $total_gross_pay = $row['total_gross_pay'];
                                        $total_net_pay = $row['total_net_pay'];
                                        $start_pay_period = $row['start_pay_period'];
                                        $end_pay_period = $row['end_pay_period'];
                                        ?>

                                        <tr>
                                            <td align="center">
                                                <?php echo $row['lname'] ?>,
                                                <?php echo $row['fname'] ?>
                                                </a>
                                            </td>
                                            <td align="center">
                                                <?php echo $start_pay_period ?>
                                                </a>
                                            </td>
                                            <td align="center">
                                                <?php echo $end_pay_period ?>
                                                </a>
                                            </td>
                                            <td align="center">
                                                <?php echo $overtime_hours ?>
                                                </a>
                                            </td>
                                            <td align="center">
                                                <b>
                                                    <?php echo $bonus ?>
                                                </b><small>.00</small>
                                                </a>
                                            </td>
                                            <td align="center">
                                                <b>
                                                    <?php echo $benefits_deduction ?>
                                                </b><small>.00</small>
                                                </a>
                                            </td>
                                            <td align="center">
                                                <b>
                                                    <?php echo $total_gross_pay ?>
                                                </b><small>.00</small>
                                                </a>
                                            </td>
                                            <td align="center">
                                                <b>
                                                    <?php echo $total_net_pay ?>
                                                </b><small>.00</small>
                                                </a>
                                            </td>
                                            <td align="center">
                                                <a class="btn btn-primary"
                                                    href="../view/view_account.php?acc_info_id=<?php echo $row["acc_info_id"]; ?>">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>

                                <tr class="info">
                                    <th>
                                        <p align="center">Name</p>
                                    </th>
                                    <th>
                                        <p align="center">Start Pay Period</p>
                                    </th>
                                    <th>
                                        <p align="center">End Pay Period</p>
                                    </th>
                                    <th>
                                        <p align="center">Overtime (hrs)</p>
                                    </th>
                                    <th>
                                        <p align="center">Bonus</p>
                                    </th>
                                    <th>
                                        <p align="center">Deductions</p>
                                    </th>
                                    <th>
                                        <p align="center">Gross Pay</p>
                                    </th>
                                    <th>
                                        <p align="center">Net Pay</p>
                                    </th>
                                    <th>
                                        <p align="center">Action</p>
                                    </th>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- this modal is for ADDING an AccountIncome -->
        <div class="modal fade" id="addAccountIncome" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:20px 50px;">
                        <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                        <h3 align="center"><b>Add Account Income</b></h3>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">

                        <form class="form-horizontal" action="#" name="form" method="post">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Employee</label>
                                <div class="col-sm-8">
                                    <select name="employee" class="form-control" placeholder="Employee" required>
                                        <option value="">Employee</option>

                                        <?php
                                        require_once('../db.php');

                                        $sql = "SELECT emp_id, lname, fname FROM employee";
                                        $result = mysqli_query($c, $sql);

                                        if (!$result) {
                                            die("Error fetching employees: " . mysqli_error($c));
                                        }

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['emp_id'] . "'>" . $row['lname'], ", ", $row['fname'] . "</option>";
                                        }

                                        mysqli_close($c);
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Start Pay Period</label>
                                <div class="col-sm-8">
                                    <input type="date" name="start_pay_period" class="form-control"
                                        placeholder="Start Pay Period" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">End Pay Period</label>
                                <div class="col-sm-8">
                                    <input type="date" name="end_pay_period" class="form-control"
                                        placeholder="End Pay Period" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Overtime Hours</label>
                                <div class="col-sm-8">
                                    <input type="text" name="overtime_hours" class="form-control"
                                        placeholder="Overtime Hours" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Bonus</label>
                                <div class="col-sm-8">
                                    <input type="text" name="bonus" class="form-control" placeholder="Bonus"
                                        required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label"></label>
                                <div class="col-sm-8">
                                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                                    <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
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

                        <form class="form-horizontal" action="../update/update_overtime.php" name="form" method="post">
                            <div class="form-group">
                                <input type="text" name="rate" class="form-control" value="<?php echo $rate; ?>"
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

                        <form class="form-horizontal" action="../update/update_salary.php" name="form" method="post">
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