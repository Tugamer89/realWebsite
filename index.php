<?php session_start(); include '/home/runner/realWebsite/general/datas.php';?>

<html>
	<head>
		<link rel="stylesheet" href="/general/style.css">
		<link rel="icon" href="/images/favicon.png">
		<title>Tuga's forum</title>
	</head>
	<body>
		<center>
			<hT>Tuga's forum</hT> 
			<?php include '/home/runner/realWebsite/general/autoLogin.php';?>
			<br> <br>
			
			<p>Here are all projects of overworked childrens from my school</p>
			<br> <br>

			<button type="button" id="projects" onclick="window.location.href='/projects'">Projects</button>
			<button type="button" id="authors" onclick="window.location.href='/authors'">Authors</button>
			<button type="button" id="scoreboard" onclick="window.location.href='/scoreboard'">Scoreboard</button>
		</center>

		<h id="rights">Copyright ©2022 All rights reserved | Made by: <a href="https://linktr.ee/tugamer" target="_blank">Tuga</a></h>
	</body>
</html>
