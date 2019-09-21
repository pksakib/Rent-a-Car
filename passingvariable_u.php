<?php
	session_start();
	include('dbconnect.php');
?>

<?php
	if(isset($_GET['v_id'])){
	$vehicle_id= $_GET['v_id'];
	$_SESSION['v_id_u']=$vehicle_id;
	header("location: information.php"); 
}else{
	echo "<script>alert('variable not pass')</script>";
}
?>