<?php session_start(); include '/home/runner/realWebsite/general/datas.php';?>

<html>
	<head>
		<link rel="stylesheet" href="/general/style.css">
		<link rel="icon" href="/images/favicon.png">
		<title>Tuga's forum - Register</title>
	</head>
	<body>
		<center>
			<hT>Register an account</hT>
			<?php 
				include '/home/runner/realWebsite/general/autoLogin.php';

				if ($disabled == "") {
					echo '<meta http-equiv="refresh" content="0;url=/">';
				}
			?>
			<br><br><br><br><br>

			<table> <td> <form action="/general/register.php" method="post" enctype="multipart/form-data">
			
				<label>Nickname: </label>
				<input type="text" name="nickname" required>
				<br> <br>
				<label>Password: </label>
				<input type="password" name="password" required>
				<br> <br>
				<label>Name: </label>
				<input type="text" name="name" required></input>
				<br> <br>
				<label>Surname: </label>
				<input type="text" name="surname" required>
				<br> <br>
				<label>Date of birth: </label>
				<input type="date" name="date" required max="<?php echo date("Y");?>-<?php echo date("m");?>-<?php echo date("d");?>">
				<br> <br>
				<label>Avatar: </label>
				<input type="file" accept="image/*" id="imageUploaded" name="imageUploaded">
				<br> <br> <br> <br>
				<center> <input type="submit" name="submit" value="Register"> </center>
			</form> </td> </table>

		</center>
	</body>
</html>
