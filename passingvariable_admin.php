<?php
	session_start();
	
?>

<?php
	include('dbconnect.php');
	if(isset($_GET['v_id'])){
	$vehicle_id= $_GET['v_id'];
	$_SESSION['v_id_a']=$vehicle_id;
	header("location: admin_edit.php"); 
}else{
	echo "<script>alert('variable not pass')</script>";
}
?>