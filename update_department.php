<?php

include("db.php");
include("auth.php");

$id = $_POST['id'];
$dept_name = $_POST['dept_name'];

$sql = mysqli_query($c, "UPDATE department SET dept_name='$dept_name' WHERE dept_id='$id'");

if ($sql) {
    ?>
    <script>
        alert('Department successfully updated.');
        window.location.href = 'home_departments.php';
    </script>
    <?php
} else {
    ?>
    <script>
        alert('Invalid action.');
        window.location.href = 'home_departments.php';
    </script>
    <?php
}
?>