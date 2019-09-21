<?php
	//include("session_admin.php");
	include("dbconnect.php");
?>
<?php
											
		
	

				if(!empty($_POST["city_id"])){
				//Fetch all area data
				$query = $con->query("SELECT * FROM brand WHERE city_id = ".$_POST['city_id']." ");
				
				//Count total number of rows
				$rowCount = $query->num_rows;
				
				//area option list
				if($rowCount > 0){
					
					//echo '<select class="form-control" name="areaSelect1a" id="areaa">';
					echo '<option value="">Select Brand</option>';
					while($row = $query->fetch_assoc()){ 

						echo "asas";
						
						echo '<option value="'.$row['brand_id'].'">'.$row['brand_name'].'</option>';
						
					}
					//echo '</select>';
				}else{
					echo '<option value="">Brand not available</option>';
				}
			}
?>