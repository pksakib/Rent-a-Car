<?php
	session_start();
	//include("session.php");
	//include("session_admin.php");
	include("dbconnect.php");
?>
<?php

	if(isset($_POST["request"])){
		
		$user_id = $_SESSION["user_id"];
		$start_hour = $_POST["start_hour"];
		$hour = $_POST["hour"];
		$arrival_date = $_POST["arrival_date"];
		$bkash_trx = $_POST["bkash_trx"];
		$address = $_POST["address"];
		$vehicle_id=$_SESSION["v_id_u"];

		
		if(!empty($vehicle_id) && !empty($start_hour) && !empty($hour) && !empty($arrival_date) && !empty($bkash_trx) && !empty($address)){
				
			$query= "INSERT INTO `request`(`vehicle_id`,`user_id`, `start_hour`, `hour`, `arrival_date`, `bkash_trx`, `address`,`status`) VALUES ('$vehicle_id', '$user_id', '$start_hour','$hour','$arrival_date','$bkash_trx','$address','queue')";
			
			if($con->query($query) == TRUE){
				header("location:home.php");
				echo "<script>alert('Welcome!')</script>";
			}
			else{
				echo "<script>alert('Die')</script>";
			}
		} else {
			echo "<script>alert('All fields must be filled up')</script>";
		}
		$con->close();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rent Information</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/modal.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
	<header>
		<!-- heading website name in navbar-->
		<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom box-shadow border-bottom box-shadow">
			<a class="navbar-brand" style="font-weight: 600;" href="#">Rent a Car</a>
			<div>
										<?php
											
											echo "&nbsp &nbsp &nbsp &nbsp";
											echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
											echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";				
											echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
											echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
											echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
											echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
											echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
											echo "Hello  ";
											echo $_SESSION['user_name']; 
											echo "  :) ";
										?>
			</div>

			<!-- 2nd part of navigation -->
			<div class="ml-auto order-0">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarContent">

					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" style="font-weight: 600;" href="home.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" style="font-weight: 600;" href="#">Contact</a>
						</li>
						<li>
							<a class="btn btn-outline-primary" style="font-weight: 600;" href="logout.php">LogOut</a>
						</li>
					</ul>
				</div> 
			</div> 
		</nav>
	</header>

	<div class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<div>
				<p>
					<button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#info" aria-expanded="false" aria-controls="info">
						Information
					</button>
				</p>
				<div id="info" class="collapse">
					<form role="form" method="post" action="information.php">
						<div class="form-group">
							<label >From</label>
							<input type="text" class="form-control" name="address" placeholder="Start From">
						</div>
						<div class="form-group">
							<label >Start Hour</label>
							<input type="Time" class="form-control" name="start_hour" placeholder="Hour">
						</div>
						<div class="form-group">
							<label >Arrival Date</label>
							<input type="Date" class="form-control" name="arrival_date" placeholder="Arrival Date">
						</div>
						<div class="form-group">
							<label >Hour</label>
							<input type="text" class="form-control" name="hour" placeholder="Hour">
						</div>
						<div class="form-group">
							<label >TRX ID</label>
							<input type="Id" class="form-control" name="bkash_trx" placeholder="Trx ID">
						</div>
							<button type="submit" class="btn btn-success btn-block" name="request">Sent Requst</button>
					</form>
				</div>
			</div>	
		</div>

		<script src="js/jquery-slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.min.js"></script>
	</body>
	</html>