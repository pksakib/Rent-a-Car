<?php
	//include("session_admin.php");
?>
<?php
	include("dbconnect.php");

    if(isset($_POST["save"])){
		
	  $city_name = $_POST["cityselect"];	
      $c_name = $_POST["c_name"];
      $c_brand = $_POST["c_brand"];
      $c_rent_price = $_POST["rent_price"];
      $path=$_FILES["image"]["name"];
      $target_dir = "uploads/";
	  $target_file = $target_dir.basename($_FILES["image"]["name"]);

      if(!empty($c_name) && !empty($c_brand) && !empty($c_rent_price)){

			$query = "INSERT INTO `vehicle`(`vehicle_name`, `vehicle_brand`, `rent_price`, `image_link`,`city_id`) VALUES ('$c_name','$c_brand','$c_rent_price','$path','$city_name')";
			if(mysqli_query($con, $query)){

			  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
			  echo "Save Succesfully";

			}else{

			  echo "Data Not Saved";
			}
      }else{

        echo "All field must be filled up";
      }
      $con->close();
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Main Page</title>
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
					<button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#add" aria-expanded="false" aria-controls="add">
						Add
					</button>
					<a class="btn btn-outline-primary" href="adminall.php">Back </a>
				</p>
				<div id="add" class="collapse">
					<form role="form" method="post" action="addvehicles.php" enctype="multipart/form-data">
						<div class="form-group">	
							<label for="city_name"><span class="glyphicon glyphicon-user"></span>City Name</label>
							<select class="form-control" id="" name="cityselect">
								<?php

									
									include("dbconnect.php");
									$sqlCity = "SELECT * FROM city";
									
									$result=mysqli_query($con, $sqlCity); 
									 
									while (($row = mysqli_fetch_array($result))){ 
									echo "<option value='" . $row['city_id'] ."'>" . $row['city_name'] ."</option>";
										
									}
									mysqli_close($con);
								
								?>
								
							</select>
						</div>
						
						<div class="form-group">
							<label for="c_name"><span class="glyphicon glyphicon-user"></span>Car Name</label>
							<input type="text" class="form-control" name="c_name" placeholder="Car Name">
						</div>
						<div class="form-group">
							<label for="c_brand"><span class="glyphicon glyphicon-eye-open"></span>Car Brand</label>
							<input type="text" class="form-control" name="c_brand" placeholder="Enter Car Brand">
						</div>
						<div class="form-group">
							<label for="rent_price"><span class="glyphicon glyphicon-eye-open"></span>Car Rent Price</label>
							<input type="text" class="form-control" name="rent_price" placeholder="Enter Rent Price">
						</div>
						
						<div class="form-group">
							<input type="file" name="image" id="image">
						</div>
							<button type="submit" class="btn btn-success btn-block" name="save">Save</button>
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