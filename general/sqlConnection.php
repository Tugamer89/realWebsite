<?php
	$dbServerName = "sql11.freemysqlhosting.net";
	$dbUsername = "sql11467166";
	$dbPassword = getenv("dbPassword");
	$dbName = "sql11467166";

	$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>