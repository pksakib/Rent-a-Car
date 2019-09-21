<?php
	include("dbconnect.php");
?>
<?php
	if(isset($_POST["Register"])){
		
		$username = $_POST["Name"];
		$Email = $_POST["Email"];
		$Pass = $_POST["Pass"];
		$Pass2 = $_POST["PassR"];
		$Nid = $_POST["N_Id"];
		//$G = $_POST["Gender"];
		//$D_o_B = $_POST["D_o_B"];
		$Mobile = $_POST["Mobile"];
		
		if(!empty($Email) && !empty($Pass) && !empty($Pass2) && !empty($Nid) && !empty($Mobile)){
				
			$query= "INSERT INTO `user`(`username`,`email`, `password`, `nid`, `phone`) VALUES ('$username','$Email', '$Pass', '$Nid','$Mobile')";
			
			if($con->query($query) == TRUE){
				echo "<script>location.href='home.php';</script>";
				echo "Welcome!";
			}
			else{
				echo "Die";
			}
		} else {
			echo "All fields must be filled up";
		}
		$con->close();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>SignUp</title>
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
		<a class="navbar-brand" style="font-weight: 600;" href="home.php">Rent a Car</a>
		
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
			</ul>
		  </div> 
		</div> 
		</nav>
	</header>
	<div class="navbar navbar-expand-lg navbar-light">
		<form class="form" method="post" action="signup.php">
			<div class="form-row">
				<div class="form-group col-md-6">
			      <label for="username">Name</label>
			      <input type="text" class="form-control" name="Name" placeholder="Name">
			    </div>
			</div>	
			<div class="form-row">
				<div class="form-group col-md-6">
			      <label for="inputEmail4">Email</label>
			      <input type="email" class="form-control" name="Email" placeholder="Email">
			    </div>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="Pass">Password</label>
			      <input type="Password" class="form-control" name="Pass" placeholder="Password">
			    </div>
			 </div>
			 <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="PassR">Repeat Password</label>
			      <input type="Password" class="form-control" name="PassR" placeholder="Repeat Password">
			    </div>
			 </div>
			 <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="N_Id">National ID</label>
			      <input type="Id" class="form-control" name="N_Id" placeholder="National ID">
			    </div>
			 </div>
			 <!--
			 <div class="form-row">
			   <div class="form-group col-md-6">
			   	<label>Gender</label></br>
				 <div class="form-check form-check-inline">
	  				 <input class="form-check-input" type="radio" name="Gender" value="Male">
	  				 <label class="form-check-label" for="Gender">Male</label>
				 </div>
				 <div class="form-check form-check-inline">
	  				 <input class="form-check-input" type="radio" name="Gender" value="Female">
	  				 <label class="form-check-label" for="Gender">Female</label>
				 </div>
				 <div class="form-check form-check-inline">
	  				 <input class="form-check-input" type="radio" name="Gender" value="Others">
	  				 <label class="form-check-label" for="Gender">Others</label>
				 </div>
			   </div>
			 </div> 
			 <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputEmail4">Date of Birth</label>
			      <input type="Date" class="form-control" name="D_o_B" placeholder="Date of Birth">
			    </div>
			 </div>  -->
			 <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="mobile">Mobile No</label>
			      <input type="text" class="form-control" name="Mobile" placeholder="Mobile No">
			    </div>
			 </div>
			  <button type="submit" class="btn btn-primary" style="margin-left: 17%;" name="Register">Register</button> 	  
		</form>
	</div>

	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>