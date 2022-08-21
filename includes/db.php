<?php

	// include : if file not found - return error and continue script execution
	// include_once : same, but if file already connected it will skip itself
	// require : if file not found - return fatal error and stop script execution
	// require_once : same, but if file already connected it will skip itself

	require_once "config.php";

	$connection = mysqli_connect(
		$config['db']['server'],
		$config['db']['username'],
		$config['db']['password'],
		$config['db']['name'],
	);

	if (!$connection) {
		echo "<h1>Connection error</h1>";
		echo mysqli_connect_error();
		exit();
	}




