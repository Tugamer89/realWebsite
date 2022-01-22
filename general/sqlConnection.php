<?php
	$dbServerName = getenv("dbServerName");
	$dbUsername = getenv("dbUsername");
	$dbPassword = getenv("dbPassword");
	$dbName = getenv("dbName");

	$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>