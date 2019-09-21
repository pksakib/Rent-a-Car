<?php
//session_start();
	//include("session_admin.php");
?>
<?php
include("dbconnect.php");

if(isset($_POST["save"])){

	$c_brand = $_POST["brand_id"];
	$c_name = $_POST["c_name"];
	$c_rent_price = $_POST["rent_price"];
	$quantity = $_POST["quantity"];
	$c_i= $_POST["city_id"];
	$path=$_FILES["image"]["name"];
	$target_dir = "uploads/";
	$target_file = $target_dir.basename($_FILES["image"]["name"]);

	if(!empty($c_name) && !empty($c_rent_price)){

		$query = "INSERT INTO `vehicles`(`brand_id`, `vehicle_name`, `rent_price`, `image_link`, `quantity`) VALUES ('$c_brand','$c_name','$c_rent_price','$path', '$quantity ')";

		if(mysqli_query($con, $query)){

			move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
			echo "<script>alert('Save Succesfully');</script>";
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
	<script type="text/javascript">
		function addCity()
		{
			var city = document.getElementById("add_city").value;
			$.ajax({
				type: 'post',
				url: 'admin_add1.php',
				data: {
					a_city:city },
					success: function () {
						location.reload();
						alert("Save");
					}
				});
		}
	</script>
	<script type="text/javascript">
		function set()
		{
			var city= document.getElementById("cityforbrand").value;
				$.ajax({
				type: 'post',
				url: 'admin_add3.php',
				data: {
					city:city},
					success: function () {

					}
				});
		}
	</script>
	<script type="text/javascript">
		function addBrand()
		{
			var brand= document.getElementById("add_brand").value;
				$.ajax({
				type: 'post',
				url: 'admin_add2.php',
				data: {
					a_brand:brand},
					success: function () {
						location.reload();
						alert("Save");
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
				<p>
					<button role="button" type="button" class="btn btn-outline-primary" data-toggle="collapse" aria-expanded="false" data-target="#brand">Add Brand</button>
					<button role="button" type="button" class="btn btn-outline-primary" data-toggle="collapse" aria-expanded="false" data-target="#city">Add City</button>
					<button role="button" class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#data_add" aria-expanded="false">Add</button>
				</p>
				<div class="row">
					<div class="col">
						<div class="collapse multi-collapse" id="brand">
							</br>
							<div>
								<select  class="btn btn-primary" id="cityforbrand" onchange="set();">
									<option>Select City</option>
									<?php
									$query = "SELECT * FROM `city`";
									$stmt = mysqli_query($con, $query);
									while ($row = mysqli_fetch_array($stmt))
									{
										echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';

									}
									?>
								</select>
							</div>
							</br>
							<input type="text" id="add_brand" placeholder="Add New Brand">
							<button type="button" class="btn btn-success" onclick="addBrand();">Add</button>
						</div>
					</div>
					<div class="col">
						<div class="collapse multi-collapse" id="city">
							</br>
							<input type="text" id="add_city" placeholder="Add New City">
							<button type="button" class="btn btn-success" onclick="addCity();">Add</button>
						</div>
					</div>
					<div class="col">
						<div class="collapse multi-collapse" id="data_add">
							<form role="form" method="post" action="admin_add.php" enctype="multipart/form-data">
									<div class="form-group">
										<label for="c_name"><span class="glyphicon glyphicon-user"></span>Car Name</label>
										<input type="text" class="form-control" name="c_name" placeholder="Car Name">
									</div>
									<div>
										<select  class="btn btn-primary" id="add" name="city_id">
											<option value="">Select City</option>
											<?php
											$query = "SELECT * FROM `city`";
											$stmt = mysqli_query($con, $query);
											while ($row = mysqli_fetch_array($stmt))
											{
												echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';

											}
											?>
										</select>
									</div>
									</br>
									<div>
										<select  class="btn btn-primary" name="brand_id"> 
											<option value="">Select Brand</option>
											<?php
											$query = "SELECT * FROM `brand`";
											$stmt = mysqli_query($con, $query);
											while ($row = mysqli_fetch_array($stmt))
											{
												echo '<option value="'.$row['brand_id'].'">'.$row['brand_name'].'</option>';

											}
											?>
										</select>
									</div>
								</br>
								<div class="form-group">
									<label for="rent_price"><span class="glyphicon glyphicon-eye-open"></span>Car Rent Price</label>
									<input type="text" class="form-control" name="rent_price" placeholder="Enter Rent Price">
								</div>
								<div class="form-group">
									<label for="quantity"><span class="glyphicon glyphicon-eye-open"></span>Quantity</label>
									<input type="text" class="form-control" name="quantity" placeholder="Quantity">
								</div>
								<div class="form-group">
									<input type="file" name="image" id="image">
								</div>
								<button type="submit" class="btn btn-success btn-block" name="save">Save</button>
							</form>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>

<script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
</body>
</html>