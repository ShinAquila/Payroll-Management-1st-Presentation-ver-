<?php
$conn = mysqli_connect('localhost', 'root', '', 'payroll');
if (!$conn) {
    die("Database Connection Failed" . mysqli_error());
}
if (isset($_POST['submit']) != "") {
    $dept_name = $_POST['dept_name'];

    $sql = mysqli_query($conn, "INSERT into department(dept_name)VALUES('$dept_name')");

    if ($sql) {
        ?>
        <script>
            alert('Department had been successfully added.');
            window.location.href = 'home_departments.php?page=emp_list';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Invalid.');
            window.location.href = 'index.php';
        </script>
        <?php
    }
}
?>