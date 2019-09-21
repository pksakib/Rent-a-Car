<?php
	session_start();
	include("dbconnect.php");
?>
<?php
		$check=$_SESSION["email"];
			
		if(!empty($check)){
			$sql = "SELECT email FROM `user` WHERE email LIKE \"$check\"";
			$sql1=$con->query($sql);
			$row=$sql1->fetch_assoc();
			$f_l=$row["email"];
			if(isset($f_l)){
				//echo "User";
				$con->close();
			}
		}else{
				echo "wrong_U";
				header("location: home.php");
				$con->close();
		}
?>