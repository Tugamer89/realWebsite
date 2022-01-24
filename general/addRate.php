<?php
	include '/home/runner/realWebsite/general/datas.php';
	include '/home/runner/realWebsite/general/sqlConnection.php';

	
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

	$conn -> close();

	header("Location: /projects");
	die();
?>
