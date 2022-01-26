<?php
	include '/home/runner/realWebsite/general/datas.php';
	include '/home/runner/realWebsite/general/sqlConnection.php';
	
	if (isset($_POST["submit"])) {
		$id = count($authors);
		$nickname = $_POST["nickname"];
		$password = $_POST["password"];
		$name = $_POST["name"];
		$surname = $_POST["surname"];
		$date = $_POST["date"];
		$avatarName = "/images/avatar/default.png";
		

		if (strpos($password, "'") !== false or strpos($password, '"') !== false or strpos($password, ";") !== false) {
			$conn -> close();
			die("The password contains illegal characters");
		}
		if (strpos($nickname, "'") !== false or strpos($nickname, '"') !== false or strpos($nickname, ";") !== false or strpos($nickname, " ") !== false) {
			$conn -> close();
			die("The nickname contains illegal characters");
		}


		if (isset($_FILES["imageUploaded"]) and $_FILES["imageUploaded"]["name"] !== "") {
			$avatarName = "/images/avatar/".basename($_FILES["imageUploaded"]["name"]);
			
			if (getimagesize($_FILES["imageUploaded"]["tmp_name"]) === false) {
				$conn -> close();
				die("The uploaded image is not an actual image!");
			}

			if (file_exists($avatarName)) {
				$conn -> close();
				die("File already exist, change the name of the file and retry (I will fix this)");
			} 
			
			if ($_FILES["imageUploaded"]["size"] > 200000) {
				$conn -> close();
				die("The image is too large!");
			}
			
			if (!move_uploaded_file($_FILES["imageUploaded"]["tmp_name"], "/home/runner/realWebsite".$avatarName)) {
				$conn -> close();
				die("An error occurred while uploading your avatar");
			}

		}


		for ($i = 0; $i < count($authors); $i++) {
			if ($nickname == $authors[$i]["nickname"]) {
				$conn -> close();
				die("The nickname is already taken!");
			}
		}

		$result = $conn->query("INSERT INTO Authors (id, password, nickname, name, surname, date, image) VALUES ('".$id."', '".md5($password)."', '".$nickname."', '".$name."', '".$surname."', '".$date."', '".$avatarName."')");
	}

	$conn -> close();

	header("Location: /");
	die();
?>