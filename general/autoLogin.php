<?php
	$disabled = "disabled";

	if (isset($_SESSION["id"])) {		//use session
		$idL = $_SESSION["id"];
		echo '<a href="/account" id="acc">'.$authors[$idL]["nickname"].'</a>';
		$disabled = "";

	} elseif (isset($_COOKIE["nickname"]) and isset($_COOKIE["password"])) {	//use cookies
		$nicknameL = $_COOKIE["nickname"];
		$passwordL = $_COOKIE["password"];

		for ($i = 0; $i < count($authors); $i++) {
			if ($authors[$i]["nickname"] === $nicknameL) {
				$idL = $i;
				
				if (md5($authors[$idL]["password"]) === md5($passwordL)) {
					$_SESSION["id"] = $idL;
					echo '<a href="/account" id="acc">'.$authors[$idL]["nickname"].'</a>';
					$disabled = "";
				} else {
					//todo unset cookies without errors
				}

				break;
			}
		}

	} else {
		echo '<h id ="acc"><a href="/login">Login</a> or <a href="/register">Register</a></h>';
	}
?>