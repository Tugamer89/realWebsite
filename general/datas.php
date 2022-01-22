<?php
	include '/home/runner/realWebsite/general/sqlConnection.php';
	
	$result = $conn->query("SELECT * FROM Projects");
	
	if ($result->num_rows > 0) {
		$i = 0;
		while ($row = $result->fetch_assoc()) {
			$projects[$i++] = array(
				"id" => utf8_encode($row["id"]),
				"title" => ($row["title"]),
				"description" => utf8_encode($row["description"]),
				"fullDescription" => utf8_encode($row["fullDescription"]),
				"rate" => utf8_encode($row["rate"]),
				"Nrates" => utf8_encode($row["Nrates"]),
				"image" => utf8_encode($row["image"]),
				"idAuthor" => utf8_encode($row["idAuthor"]),
				"code" => utf8_encode($row["code"])
			);
		}
	} else {
		echo "Projects empty!";
	}


	$result = $conn->query("SELECT * FROM Authors");
	
	if ($result->num_rows > 0) {
		$i = 0;
		while ($row = $result->fetch_assoc()) {
			$authors[$i++] = array(
				"id" => utf8_encode($row["id"]),
				"nickname" => utf8_encode($row["nickname"]),
				"name" => utf8_encode($row["name"]),
				"surname" => utf8_encode($row["surname"]),
				"date" => utf8_encode($row["date"]),
				"projects" => utf8_encode($row["projects"]),
				"image" => utf8_encode($row["image"])
			);
		}
	} else {
		echo "Authors empty!";
	}
?>
