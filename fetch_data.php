<?php 
 session_start();
?>
<div>
<?php
   //used for retrieving data from database , used by select.php ajax
   include ('dbconnect.php');

    if(isset($_POST['brand'])) {

          $brand = $_POST['brand'];
          $city = $_SESSION["city_id"];

          if( !empty($brand) )
          {
            
            $sqlVehicle = "SELECT * FROM `all_vehicles` WHERE city_id='$city' AND brand_id='$brand' ";
            $result2 = mysqli_query($con, $sqlVehicle);
            
            while($row = mysqli_fetch_array($result2))
            {
              
              $image_path = "uploads/";
              $images=$image_path.$row['image_link'];
              $vehicleid=$row['vehicles_id'];
              $rent_price = $row['rent_price'];
              $name = $row['vehicle_name'];
              $_SESSION['v_id']=$vehicleid;
              
              echo "<div id='' class='col-md-3' style=''>";
              
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
              echo '<a class="btn btn-outline-primary" href="admin_edit.php">Edit</a>';
?>            
<?php
              echo "<br>";
              echo "<br>";
              echo "</div>";
            }         
          }
          mysqli_close($con);
        }
?>