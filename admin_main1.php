<?php session_start(); ?>
<?php
/*include('dbconnect.php');

	if(isset($_POST["city_id"])){

		$city = $_POST["city_id"];
		$_SESSION['city_id']=$city; 
	}
	$con->close();*/
?>
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
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
	<script src="js/modal.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<script type="text/javascript">
		/*function city(val)
		{
			$.ajax({
				type: 'post',
				url: 'admin_main1.php',
				data: {
					city_id:val },
					success: function () {
						 
					}
				});
		}*/
	</script>
	<script type="text/javascript">
		/*function brand(val)
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
		}*/
	</script>
		
</head>
<script type="text/javascript">
		$(document).ready(function(){
			$('#city').on('change',function(){
				var cityID = $(this).val();
				if(cityID){
					$.ajax({
						type:'POST',
						url:'SelectCityAjax.php',
						data:'city_id='+cityID,
						success:function(html){
							$('#area').html(html);
							
						}
					}); 
				}else{
					$('#area').html('<option value="">Select City first</option>');
					
				}
			});
			
			
		});
	</script>

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
				<form role="form" method="post" action="admin_main1.php" target="admin_main1.php">
					
						
						<?php 
																	
									

											//Fetch all the country data
											$query = $con->query("SELECT * FROM city ORDER BY city_name ASC");

											//Count total number of rows
											$rowCount = $query->num_rows;
											?>
											<select class ="form-control" name="citySelect" id="city">
											<option value="">Select City</option>
											<?php
											if($rowCount > 0){
												while($row = $query->fetch_assoc()){ 
													echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
												}
											}else{
												echo '<option value="">City not available</option>';
											}
											?>
										</select>

							

							<br>
										
							<div class=" "  data-wow-delay=""> 
							<select class="form-control" name="brandSelect" id="area">
												<option value="" disabled selected>Select City First</option>
											</select>
							</div>
							<br>
					<input class="btn btn-outline-primary" type="submit" name="s" value="SUBMIT">
				</form>
			</div>
		</div>	
	</div>
	<div class="col-md-9">
	<div  class="row">
		<?php
   //used for retrieving data from database , used by select.php ajax
   include ('dbconnect.php');

    if(isset($_POST['s'])) {

          $brand = $_POST['brandSelect'];
          //$city = $_POST["city_id"];

          if( !empty($brand) )
          { 


		            $sqlVehicle = "SELECT * FROM `vehicles` WHERE brand_id='$brand' ";
		            $result2 = mysqli_query($con, $sqlVehicle);
	            
		            while($row = mysqli_fetch_array($result2))
		            {
		              
		              $image_path = "uploads/";
		              $images=$image_path.$row['image_link'];
		              $vehicleid=$row['vehicle_id'];
		              $rent_price = $row['rent_price'];
		              $name = $row['vehicle_name'];
		              $_SESSION['v_id']=$vehicleid;
		              
		              echo "<div id='' class='col-md-4' style=''>";
		              echo "<div class='thumbnail'>";
		              
		              echo "<br>";
		              echo'&nbsp';
		              echo'&nbsp';
		              echo'&nbsp';
		              echo '<img class = "img-responsive" src="' . $images. '" height="160px"> ';
		              echo "<br>";
		              echo "<br>";
		              echo'&nbsp';
		              echo'&nbsp';
		              echo '' . $name. '';
		              echo "<br>";
		              echo'&nbsp';
		              echo'&nbsp';
		              echo "PRICE: " . $rent_price. ' BDT';
		              echo "<br>";
		              echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
		              echo "<a class='btn btn-outline-primary' href='passingvariable_admin.php?v_id=$vehicleid'>Edit</a>";
		?>            
		<?php
		              echo "<br>";
		              echo "<br>";
		              echo "</div>";
		              echo "</div>";
		            }
		       
		     

	                  
          }
          else{
          	echo "Please Select A Brand";
          }
          mysqli_close($con);
        }
?>				
	</div>
</div>

	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
</body>
</html>