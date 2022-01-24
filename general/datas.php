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
		$year = date("Y");
		$month = date("m");
		$day = date("d");

		while ($row = $result->fetch_assoc()) {
			$dateofbirth = utf8_encode($row["date"])."-";
			$dates = array();
			
			for ($j = 0; $j < strlen($dateofbirth); $j++) {
				if ($dateofbirth[$j] != "-") {
					$date .= $dateofbirth[$j];
				} else {
					$dates[] = $date;
					$date = "";
				}
			}

			$age = intval($year) - intval($dates[0]);
			
			if (intval($day) < intval($dates[2])) {
				if (intval($month) < intval($dates[1])) {
					$age -= 1;
				}
			}

			$projectS = utf8_encode($row["projects"]);
			$projectA = array();
			$rating = 0;
			for ($j = 0; $j < strlen($projectS); $j++) {
				if ($projectS[$j] != "-") {
					$num .= $projectS[$j];

				} else {
					$projectA[] = array(
						"id" => intval($num),
						"title" => $projects[intval($num)]["title"],
						"description" => $projects[intval($num)]["description"],
						"rate" => $projects[intval($num)]["rate"],
						"image" => $projects[intval($num)]["image"]
					);

					$rating += $projects[intval($num)]["rate"];

					$num = "";
				}
			}

			if (count($projectA) != 0) {
				$rating /= count($projectA);
			}
			

			$authors[$i++] = array(
				"id" => utf8_encode($row["id"]),
				"nickname" => utf8_encode($row["nickname"]),
				"password" => utf8_encode($row["password"]),
				"name" => utf8_encode($row["name"]),
				"surname" => utf8_encode($row["surname"]),
				"projects" => utf8_encode($row["projects"]),
				"image" => utf8_encode($row["image"]),
				"dateOfBirth" => utf8_encode($row["date"]),
				"age" => $age,
				"rating" => $rating,
				"projectsA" => $projectA
			);
		}

	} else {
		echo "Authors empty!";
	}

	$conn -> close
?>
