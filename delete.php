<div>
<?php
include('dbconnect.php');

	if(isset($_POST["request_id"])){

		$request_id = $_POST["request_id"];

				
			$query1= "DELETE FROM `request` WHERE request_id='$request_id'";
			
			if($con->query($query1) == TRUE){
				echo "<script>alert('Deleted');</script>"
			}
			else{
				echo"<div>Die</div>";
			}
		$con->close();
	}
?>
