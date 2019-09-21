<?php
include('dbconnect.php');

	if(isset($_POST["a_city"])){

		$city = $_POST["a_city"];

		$query= "INSERT INTO `city`(`city_name`) VALUES ('$city')";

		if($con->query($query) == TRUE){
				echo"<div><script>alert('Saved');</script></div>";
			}
			else{
				echo "<script>alert('Die');</script>";
			}
		$con->close();
	}
?>
