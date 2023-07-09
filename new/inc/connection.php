<?php 

	$connection = mysqli_connect('localhost', 'root', '', 'infinity_movies');

	if (mysqli_connect_errno()) {
		die('Database connection failed' . mysqli_connect_errno());
	} else {
		// echo "Connection successful";
	}

?>