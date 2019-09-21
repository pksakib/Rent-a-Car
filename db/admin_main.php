<?php
	//include("session_admin.php");
?>
<?php
	include("dbconnect.php");

    if(isset($_POST["save"])){

      $c_name = $_POST["c_name"];
      $c_brand = $_POST["c_brand"];
      $c_rent_price = $_POST["rent_price"];
      $c_image = $_POST["c_image"];
      
      if(!empty($c_name) && !empty($c_brand) && !empty($c_rent_price) && !empty($c_image)){
        $query = "INSERT INTO `vehicles`(`v_model`, `v_brand_name`, `v_rent_price`, `v_image`) VALUES ('$c_name','$c_brand','$c_rent_price','$c_image')";
        
        if($con->query($query) == TRUE){
          echo "ok";
        }else{
          echo "The Car Has Been Stored ";
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
		function fetch_select(val)
		{
			$.ajax({
				type: 'post',
				url: 'db/fetch_data.php',
				data: {
					get_option:val },
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
					<select  class="btn btn-primary" onchange="fetch_select(this.value);">
						<option>Model</option>
						<?php
							$query = "SELECT * FROM `vehicles`";
							$stmt = mysqli_query($con, $query);
							while ($row = mysqli_fetch_array($stmt))
							{
								//echo "<option>".$row['v_model']."</option>";
								echo '<option value="'.$row['vehicles_id'].'">'.$row['v_model'].'</option>';

							}
						?>
					</select>
					<br/><br/>
					<table  id='new_select' class='table table-hover table-responsive table-bordered'>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Brand</th>
							<th>Rent Price</th>
							<th>Image</th>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</table>
				
				</form>
			</div>
		</div>	
	</div>
	<div class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<div>
				<p>
					<button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#add" aria-expanded="false" aria-controls="add">
						Add
					</button>
				</p>
				<div id="add" class="collapse">
					<form role="form" method="post" action="admin_main.php">
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
							<label for="c_image"><span class="glyphicon glyphicon-eye-open"></span>Car Image</label>
							<input type="text" class="form-control" name="c_image" placeholder="choose file">
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