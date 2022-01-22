<?php
	include '/home/runner/realWebsite/general/datas.php';

	$dbServerName = "sql11.freemysqlhosting.net";
	$dbUsername = "sql11467166";
	$dbPassword = "dT1rDL4IqC";
	$dbName = "sql11467166";

	$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$id = $_GET["id"];
	$value = $_GET["vote"];

	if ($value < 0 or $value > 10) {
		die("Vote out of range");
	}
	if ($id < 0 or $id > count($projects)) {
		die("Id out of range");
	}

	$newRate = ($projects[$id]["rate"] * $projects[$id]["Nrates"] + $value) / ($projects[$id]["Nrates"] + 1);

	$result = $conn->query("UPDATE Projects SET rate = ".floatval($newRate).", Nrates = ".intval($projects[$id]["Nrates"] + 1)." WHERE id = ".intval($id));


	header("Location: https://realwebsite.simonesaya.repl.co/projects");
	die();
?>