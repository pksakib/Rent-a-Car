<?php
	//include("session_admin.php");
?>
<?php
	include("dbconnect.php");

    if(isset($_POST["save"])){

      $city_name = $_POST["city_name"];
      

		if(!empty($city_name)){

         $query = "INSERT INTO `city`(`city_name`) VALUES ('$city_name')";
			if(mysqli_query($con, $query)){

				echo '<script language="javascript">';
				echo 'alert("City Added")';
				echo '</script>';

			}else{

				echo '<script language="javascript">';
				echo 'alert("This City Has Been Added")';
				echo '</script>';
			}
		}else{
	
			echo '<script language="javascript">';
			echo 'alert("Insert City Name")';
			echo '</script>';
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
				
					<form role="form" method="post" action="addcity.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="city_name"><span class="glyphicon glyphicon-user"></span>City Name</label>
							<input type="text" class="form-control" name="city_name" placeholder="City Name">
						</div>
						
						
							<button type="submit" class="btn btn-success btn-block" name="save">Save</button>
							<a class="btn btn-success btn-block" href="adminall.php">Back </a>
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