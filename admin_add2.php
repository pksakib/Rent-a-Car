<?php session_start(); ?>
<?php
include('dbconnect.php');

	if(isset($_POST["a_brand"])){

		$brand = $_POST["a_brand"];
		$city = $_SESSION["city"];

		$query= "INSERT INTO `brand`(`city_id`, `brand_name`) VALUES ('$city','$brand')";

		if($con->query($query) == TRUE){
				echo"<div><script>alert('Saved');</script></div>";
			}
			else{
				echo "<script>alert('Die');</script>";
			}
		$con->close();
	}
?>
