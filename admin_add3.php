<?php session_start(); ?>
<?php
include('dbconnect.php');

	if(isset($_POST["city"])){

		$city = $_POST["city"];
		$_SESSION['city']=$city; 
	}
	$con->close();
?>
