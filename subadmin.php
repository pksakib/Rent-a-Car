<?php
  //include("session.php");
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
    function rent_done(val)
    {
      $.ajax({
        type: 'post',
        url: 'rent_done.php',
        data: {
          request_id:val },
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

<div class="navbar navbar-expand-lg navbar-light"></div>
  <div style="padding-right: 100px; padding-left: 100px;">
    <table  class='table'>
      <thead class="thead-dark">
        <tr>
          <th scope="col">User Name</th>
        <th scope="col">Address</th>
      <th scope="col">Start Hour</th>
      <th scope="col">Hour</th>
      <th scope="col">Arrival date</th>
      <th scope="col">Bkash TRX ID</th>
      <th scope="col">Approved</th>
        </tr>
     </thead>
    <?php

      $query="SELECT * FROM request where status = 'booked' ";
      $result = mysqli_query($con, $query);

      while ($row = mysqli_fetch_array($result)) {
        $request_id=$row['request_id'];
        $user_id=$row['user_id'];
        $query1="SELECT username FROM user where user_id='$user_id' ";
        $result1= mysqli_query($con, $query1);
        while ($row1=mysqli_fetch_array($result1)) {
          $username=$row1["username"];
        }
    ?>
    <tbody>
      <tr>
      <?php
          echo "<td >".$username."</td>";
          echo "<td >".$row['address']."</td>";
          echo "<td >".$row['start_hour']."</td>";
          echo "<td >".$row['hour']."</td>";
          echo "<td >".$row['arrival_date']."</td>";
          echo "<td >".$row['bkash_trx']."</td>";
      ?>
          <td><button class='btn-outline-primary' onclick="approved('<?php echo $request_id ?>');">&#128504;</button> <button class='btn-outline-primary' onclick="delete_req('<?php echo $request_id ?>');">&#10008;</button></td>
      </tr>

    <?php

        
      }
        $con->close();
    ?>
    </tbody>
    </table>
    </div>
    <div  id='new_select'>
            
  </div>
</div>

  <script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
</body>
</html>