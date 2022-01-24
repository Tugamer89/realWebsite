<?php
	session_start();
	include '/home/runner/realWebsite/general/datas.php';
	include '/home/runner/realWebsite/general/sqlConnection.php';
	
	if (isset($_POST["submit"])) {
		$id = $_SESSION["id"];
		$avatarName = $authors[$id]["image"];
		$nickname = $authors[$id]["nickname"];
		$password = $authors[$id]["password"];
		$passwordOld = $authors[$id]["passwordOld"];

		if ($authors[$id]["password"] === $passwordOld) {
			$conn -> close();
			die("The old password is incorrect!");
		}

		if (isset($_POST["nickname"]) and $_POST["nickname"] !== "") {
			$nickname = $_POST["nickname"];

			if (strpos($nickname, "'") !== false or strpos($nickname, '"') !== false or strpos($nickname, ";") !== false or strpos($nickname, " ") !== false) {
				$conn -> close();
				die("The nickname contains illegal characters");
			}
			
			for ($i = 0; $i < count($authors); $i++) {
				if ($nickname == $authors[$i]["nickname"]) {
					$conn -> close();
					die("The nickname is already taken!");
				}
			}
		}

		if (isset($_POST["password"]) and $_POST["password"] !== "") {
			$password = $_POST["password"];

			if (strpos($password, "'") !== false or strpos($password, '"') !== false or strpos($password, ";") !== false) {
				$conn -> close();
				die("The password contains illegal characters");
			}
		}


		if (isset($_FILES["imageUploaded"]) and $_FILES["imageUploaded"]["tmp_name"] !== "") {
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

			unlink('/home/runner/realWebsite'.$authors[$id]["image"]);
		}

		
		$result = $conn->query('UPDATE Authors SET nickname="'.$nickname.'", password="'.$password.'", image="'.$avatarName.'" WHERE id='.$id);
	}

	$conn -> close();

	header("Location: /");
	die();
?>