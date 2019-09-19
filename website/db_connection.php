<?php

	$servername = "classmysql.engr.oregonstate.edu";
	$username = "cs340_lacconeb";
	$password = "3956";
	$dbname = "cs340_lacconeb";

		// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 


?>