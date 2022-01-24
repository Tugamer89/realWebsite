<html>
	<head>
		<link rel="stylesheet" href="/general/style.css">
		<link rel="icon" href="/images/favicon.png">
		<title>Tuga's forum</title>
	</head>
	<body>
		<center>
			<hT>Login</hT>
			<?php 
				include '/home/runner/realWebsite/general/autoLogin.php';

				if ($disabled != "") {
					echo '<meta http-equiv="refresh" content="0;url=/">';
				}
			?>
			<br> <br>
			
			<table> <td> <form action="/general/login.php" method="post" enctype="multipart/form-data">
			
				<label>Nickname: </label>
				<input type="text" name="nickname" required>
				<br> <br>
				<label>Password: </label>
				<input type="password" name="password" required>
				<br> <br>
				<center>
					<input type="checkbox" name="rememberMe" value="justBecauseItsNeeded">
					<label>Remember me</label>
				</center>
				<br> <br> <br> <br>
				<center> <input type="submit" name="submit" value="Login"> </center>
			</form> </td> </table>
			
		</center>

		<h id="rights">Copyright ©2022 All rights reserved | Made by: <a href="https://linktr.ee/tugamer" target="_blank">Tuga</a></h>
	</body>
</html>
