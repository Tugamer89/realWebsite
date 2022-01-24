<?php
	session_start();
	include '/home/runner/realWebsite/general/datas.php';

	if (isset($_POST["submit"])) {
		$nickname = $_POST["nickname"];
		$password = $_POST["password"];

		$existNickname = false;
		for ($i = 0; $i < count($authors); $i++) {
			if ($authors[$i]["nickname"] == $nickname) {
				$id = $i;
				$existNickname = true;
				break;
			}
		}

		if ($existNickname) {
			if ($authors[$id]["password"] === $password) {
				$_SESSION["id"] = $id;
				
				if (isset($_POST["rememberMe"])) {
					setcookie("nickname", $nickname, time() + (86400 * 7), "/");
					setcookie("password", $password, time() + (86400 * 7), "/");
				} else {
					setcookie("nickname", "", time() + (86400 * 7), "/");
					setcookie("password", "", time() + (86400 * 7), "/");
				}
			} else {
				//todo unsuccess
			}

		} else {
			die("Nickname not found");
		}
	}
	
	header("Location: /");
	die();
?>