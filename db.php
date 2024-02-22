<?php
	$c= mysqli_connect('localhost', 'root', '','payroll');

	if (!$c)
	{
		die("Database Connection Failed" . mysqli_error());
	}

?>