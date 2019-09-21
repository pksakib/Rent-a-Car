<div>	
<?php
include('dbconnect.php');

	if(isset($_POST["request_id"])){

		$request_id = $_POST["request_id"];

		$query= "UPDATE `request` SET `status`='booked' WHERE request_id='".$request_id."' ";
		//$result = mysqli_query($con, $query);

		if($con->query($query) == TRUE){
				echo"<div><script>alert('Approved');</script></div>";
			}
			else{
				echo "<script>alert('Die');</script>";
			}
		$con->close();
	}
?>
