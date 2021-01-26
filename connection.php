<?php
	$con = mysqli_connect("localhost","root","","demo10");

	if(!$con)
	{
		die("connection error " . mysqli_connect_error());
	}
	else
	{
		echo "connection successfully";
	}

?>