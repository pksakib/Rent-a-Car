<div>	
<?php
include('dbconnect.php');

	if(isset($_POST["request_id"])){

		$request_id = $_POST["request_id"];

		$query= "UPDATE `request` SET `status`='Rent Done' WHERE request_id='".$request_id."' ";
		//$result = mysqli_query($con, $query);

		if($con->query($query) == TRUE){
				echo"<div><script>alert('Done');</script></div>";
			}
			else{
				echo "<script>alert('Die');</script>";
			}
		$con->close();
	}
?>
