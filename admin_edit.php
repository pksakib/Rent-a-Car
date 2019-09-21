<?php
	session_start();
	//include("session_admin.php");
?>
<?php
	include("dbconnect.php");
	$v_id=$_SESSION['v_id_a'];
  	$query="SELECT `vehicle_name`, `rent_price`, `image_link` FROM vehicles WHERE vehicle_id = '$v_id' ";
  	$result = mysqli_query($con, $query);

  	while ($row = mysqli_fetch_array($result)) {
  		
  		$image_path = "uploads/";
  		$images=$image_path.$row['image_link'];
  		$rent_price = $row['rent_price'];
  		$name = $row['vehicle_name'];
  		//$Brand= $row['brand_id'];
  	}

  	if(isset($_POST['save'])) {

 	  $c_name = $_POST["c_name"];
      $c_brand = $_POST["c_brand"];
      $c_rent_price = $_POST["rent_price"];
      $path=$_FILES["image"]["name"];
      $target_dir = "uploads/";
	  $target_file = $target_dir.basename($_FILES["image"]["name"]);

	 if(!empty($c_name) && !empty($c_brand) && !empty($c_rent_price)){

        $query = "UPDATE `vehicles` SET `vehicle_name`='$c_name',`brand_id`='$c_brand', `rent_price`='$c_rent_price',`image_link`='$path' WHERE vehicle_id = '$v_id' ";
        if(mysqli_query($con, $query)){

          move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
          echo "<script> alert('Save Succesfully')</script>";
          header("location:admin_main1.php");

        }else{

          echo "Data Not Saved";
        }
      }else{

        echo "All field must be filled up";
      }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Car Edit</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/modal.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<!-- <script>
    function edit(id)
    {
      $.ajax({
        type: 'post',
        url: 'edit_data.php',
        data: {
          v_id:id },
          success: function (response) {
            document.getElementById("edit").innerHTML=response;
          }
        });
    }
  </script> -->
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
				<div id="edit">
					<form role="form" method="post" action="admin_edit.php" enctype="multipart/form-data" >
						<?php
						echo '<img class = "img-responsive" src="' . $images. '" height="160px"> ';
						echo "<br>";
						echo "<br>";
						echo'&nbsp';
						echo'&nbsp';
						?>
						<div class="form-group">
							<label for="c_name"><span class="glyphicon glyphicon-user"></span>Car Name</label>
							<input type="text" class="form-control" name="c_name" value="<?php echo $name; ?>">
						</div>
						<div>
							<select  class="btn btn-primary" name="c_brand">
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
						<div class="form-group">
							<label for="rent_price"><span class="glyphicon glyphicon-eye-open"></span>Car Rent Price</label>
							<input type="text" class="form-control" name="rent_price" value="<?php echo $rent_price; ?>">
						</div>
						<div class="form-group">
							<input type="file" name="image" id="image">
						</div>
							<input class="btn btn-success btn-block" name="save" value="save" type="submit">
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