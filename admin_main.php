<?php
	//include("session_admin.php");
	include("dbconnect.php");
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
	<script type="text/javascript">
		function city(val)
		{
			$.ajax({
				type: 'post',
				url: 'admin_main1.php',
				data: {
					city_id:val },
					success: function () {
						 
					}
				});
		}
	</script>
	<script type="text/javascript">
		//function brand(val)
		{
			$.ajax({
				type: 'post',
				url: 'fetch_data.php',
				data: {
					brand:val },
					success: function (response) {
						document.getElementById("new_select").innerHTML=response; 
					}
				});
		}
	</script>
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
				<form role="form" method="post" action="admin_main.php">
					<select  class="btn btn-primary" onchange="city(this.value);">
						<option>City</option>
						<?php
							$query = "SELECT * FROM `city`";
							$stmt = mysqli_query($con, $query);
							while ($row = mysqli_fetch_array($stmt))
							{
								echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';

							}
						?>
					</select>
					<br/><br/>
					<a class="btn btn-outline-primary" href="admin_add.php">Add</a>
				</form>
				<div>
					<select  class="btn btn-primary" onchange="">
						<option>Brand</option>
						<?php
							//$city_id_for_brand=$_SESSION['city_id'];
							//unset($_SESSION['city_id']);
							$query = "SELECT * FROM `brand`";
							$stmt = mysqli_query($con, $query);
							while ($row = mysqli_fetch_array($stmt))
							{
								echo '<option value="'.$row['brand_id'].'">'.$row['brand_name'].'</option>';

							}
						?>
					</select>
				</div>
			</div>
		</div>	
	</div>
	<div  id='new_select'>
						
	</div>

	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>