<?php
	session_start();
	include("dbconnect.php");
?>
<?php

		$check=$_SESSION["admin_e"];
			
		if(!empty($check)){
			$sql_a = "SELECT email FROM `admin` WHERE email LIKE \"$check\"";
			$sql1_a=$con->query($sql_a);
			$row_a=$sql1_a->fetch_assoc();
			$f_l_a=$row_a["email"];
			if(isset($f_l_a)){
				echo "Admin";
				$con->close();
			}
		}else{
				echo"wrong_A";
				header("location: home.php");
				$con->close();
			}
?>