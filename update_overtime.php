<?php
	
		require("db.php");
		
		@$id 			= $_POST['ot_id'];
		@$salary		= $_POST['rate'];


		$sql = mysqli_query($c,"UPDATE overtime SET rate='$salary' WHERE ot_id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Salary rate successfully changed...');
		            window.location.href='home_salary.php';
		        </script>
		    <?php 
		}
		else {
			echo "Not Successfull!"; 
		}
 ?>