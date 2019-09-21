<table  class='table table-hover table-responsive table-bordered'>
<tr>
   <th>ID</th>
   <th>Name</th>
   <th>Brand</th>
   <th>Rent Price</th>
   <th>Image</th>
</tr>
<?php
   //used for retrieving data from database , used by select.php ajax
   include ('dbconnect.php');


   if(isset($_POST['get_option']))
   {
     $v_id = $_POST['get_option'];
     $query = "SELECT  * FROM `vehicles` WHERE vehicles_id LIKE '$v_id'";//display all the school in selector 
     $stmt = mysqli_query($con, $query);
   
     while ($row = mysqli_fetch_array($stmt))
     { 
                 echo"<tr>";
                   echo "<td>".$row['vehicles_id']."</td>";
                   echo "<td>".$row['v_model']."</td>";
                   echo "<td>".$row['v_brand_name']."</td>"; 
                   echo "<td>".$row['v_rent_price']."</td>";
				   echo "<td>".$row['v_image']."</td>";
                   echo"</tr>";
                   echo"<table>";                
     }
    
     $con->close();
    }
?>