<div>
<?php
   //used for retrieving data from database , used by select.php ajax
   include ('dbconnect.php');

    if(isset($_POST['citySelect'])) {

          $citySelect = $_POST['citySelect'];

          if( !empty($citySelect) )
          {
            
            $sqlVehicle = "SELECT * FROM vehicle WHERE city_id = ".$citySelect." ";
            $result2 = mysqli_query($con, $sqlVehicle);
            
            while($row = mysqli_fetch_array($result2))
            {
              
              $image_path = "uploads/";
              $images=$image_path.$row['image_link'];
              $vehicleid=$row['vehicle_id'];
              $rent_price = $row['rent_price'];
              $name = $row['vehicle_name'];
              
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

              echo "<a class='btn btn-outline-primary' href='passingvariable_u.php?v_id=$vehicleid'>Rent</a>";
              echo "<br>";
              echo "<br>";
              echo "</div>";
            }         
          }
          mysqli_close($con);
        }
?>            
            