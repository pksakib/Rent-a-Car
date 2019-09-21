<?php
	session_start();
	
	if(session_destroy())
	{
		header("Location: home.php");
	}
?>
<html>
	<head>
		<form method="POST" action="logout.php"></form>
	</head>
</html>