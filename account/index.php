<?php session_start(); include '/home/runner/realWebsite/general/datas.php';?>

<html>
	<head>
		<link rel="stylesheet" href="/general/style.css">
		<link rel="icon" href="/images/favicon.png">
		<title>Tuga's forum - Profile</title>
	</head>
	<body>
		<center>
			<hT>Profile options</hT>
			<?php 
				include '/home/runner/realWebsite/general/autoLogin.php';

				if ($disabled != "") {
					echo '<meta http-equiv="refresh" content="0;url=/">';
				}
			?>
			<br> <br>
			

			<table> <td> <form action="/general/account.php" method="post" enctype="multipart/form-data">
			
				<label>New nickname: </label>
				<input type="text" name="nickname">
				<br> <br>
				<label>New password: </label>
				<input type="password" name="password">
				<br> <br>
				<label>Old password: </label>
				<input type="password" name="passwordOld" required>
				<br> <br>
				<label>Avatar: </label>
				<input type="file" accept="image/*" id="imageUploaded" name="imageUploaded">
				<br> <br> <br> <br>
				<center> <input type="submit" name="submit" value="Update"> </center>
			</form> </td> </table>

			<br> <br>

			<button type="button" onclick="addProject()">Add a project</button>
		</center>

		<h id="rights">Copyright ©2022 All rights reserved | Made by: <a href="https://linktr.ee/tugamer" target="_blank">Tuga</a></h>

		<script>
			function addProject() {
				window.location.href=("/account/project.php");
			}
		</script>
	</body>
</html>
