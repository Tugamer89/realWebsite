<?php
	session_start();
	include '/home/runner/realWebsite/general/datas.php';
	include '/home/runner/realWebsite/general/sqlConnection.php';
	
	if (isset($_POST["submit"])) {
		$idProject = count($projects);
		$id = $_SESSION["id"];
		$title = $_POST["title"];
		$description = $_POST["description"];
		$fullDescription = $_POST["fullDescription"];
		$code = "";
		
		$noExt = array("exe", "cmd", "ps");	


		if (strpos($title, '"') !== false or strpos($title, ";") !== false) {
			$conn -> close();
			die("The title contains illegal characters");

		} elseif (strpos($title, "'") !== false) {
			for ($i = 0; $i < strlen($title); $i++) {
				if ($title[$i] == "'") {
					$title[$i] = "&#39;";
				}
			}
		}

		if (strpos($description, '"') !== false or strpos($description, ";") !== false) {
			$conn -> close();
			die("The description contains illegal characters");

		} elseif (strpos($description, "'") !== false) {
			for ($i = 0; $i < strlen($description); $i++) {
				if ($description[$i] == "'") {
					$description[$i] = "&#39;";
				}
			}
		}

		if (strpos($fullDescription, '"') !== false or strpos($fullDescription, ";") !== false) {
			$conn -> close();
			die("The description contains illegal characters");

		} elseif (strpos($fullDescription, "'") !== false) {
			for ($i = 0; $i < strlen($fullDescription); $i++) {
				if ($fullDescription[$i] == "'") {
					$fullDescription[$i] = "&#39;";
				}
			}
		}



		if (isset($_FILES["imageUploaded"]) and $_FILES["imageUploaded"]["name"] !== "") {
			$photo = "/images/project/".basename($_FILES["imageUploaded"]["name"]);
			
			if (getimagesize($_FILES["imageUploaded"]["tmp_name"]) === false) {
				$conn -> close();
				die("The uploaded image is not an actual image!");
			}

			if (file_exists($photo)) {
				$conn -> close();
				die("File already exist, change the name of the file and retry (I will fix this)");
			} 
			
			if ($_FILES["imageUploaded"]["size"] > 200000) {
				$conn -> close();
				die("The image is too large!");
			}
			
			if (!move_uploaded_file($_FILES["imageUploaded"]["tmp_name"], "/home/runner/realWebsite".$photo)) {
				$conn -> close();
				die("An error occurred while uploading your avatar");
			}
		}


		if (isset($_FILES["codeUploaded"]) and $_FILES["codeUploaded"]["name"] !== "") {
			$code = "/projects/codes/".basename($_FILES["codeUploaded"]["name"]);

			if (file_exists($code)) {
				$conn -> close();
				die("File already exist, change the name of the file and retry (I will fix this)");
			} 
			
			if (in_array(pathinfo($_FILES["codeUploaded"]["name"], PATHINFO_EXTENSION), $noExt)) {
				$conn -> close();
				die("File extension not valid");
			}

			if ($_FILES["codeUploaded"]["size"] > 1200000) {
				$conn -> close();
				die("The code is too large!");
			}
			
			if (!move_uploaded_file($_FILES["codeUploaded"]["tmp_name"], "/home/runner/realWebsite".$code)) {
				$conn -> close();
				die("An error occurred while uploading your code");
			}
		}



		for ($i = 0; $i < count($projects); $i++) {
			if ($title == $projects[$i]["title"]) {
				$conn -> close();
				die("The title is already taken!");
			}
		}


		$result = $conn->query("INSERT INTO Projects (id, title, description, fullDescription, rate, Nrates, image, idAuthor, code) VALUES ('".$idProject."', '".$title."', '".$description."', '".$fullDescription."', 0, 1, '".$photo."', '".$id."', '".$code."')");
		
		$result = $conn->query("UPDATE Authors SET projects='".$authors[$id]["projects"].strval($idProject)."-' WHERE id=".$id);
	}

	$conn -> close();

	header("Location: /");
	die();
?>