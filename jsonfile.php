<?php

// object form

	$age = array('apple'=>12,'banana'=>23,'mango'=>30);

	echo json_encode($age);

	$de = json_encode($age);

	$den = json_decode($de);

	echo $den->apple;


// for array form

	$denn = json_decode($de,true);
	echo $denn['banana'];
?>