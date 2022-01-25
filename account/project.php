<?php session_start(); include '/home/runner/realWebsite/general/datas.php';?>

<html>
	<head>
		<link rel="stylesheet" href="/general/style.css">
		<link rel="icon" href="/images/favicon.png">
		<title>Tuga's forum - Add project</title>
	</head>
	<body>
		<center>
			<hT>Add a project</hT>
			<?php 
				include '/home/runner/realWebsite/general/autoLogin.php';

				if ($disabled != "") {
					echo '<meta http-equiv="refresh" content="0;url=/">';
				}
			?>
			<br><br><br>

			<table> <td> <form action="/general/addProject.php" method="post" enctype="multipart/form-data">
			
				<label>Title: </label>
				<input type="text" name="title" required>
				<br> <br>
				<label>Descritpion: </label>
				<input type="text" name="description" required>
				<br> <br>
				<label>Full description: </label>
				<input type="text" name="fullDescription" required></input>
				<br> <br>
				<label>Photo: </label>
				<input type="file" accept="image/*" id="imageUploaded" name="imageUploaded" required>
				<br> <br>
				<label>Code: </label>
				<input type="file" id="codeUploaded" name="codeUploaded">
				<br> <br> <br> <br>
				<center> <input type="submit" name="submit" value="Add"> </center>
			</form> </td> </table>

		</center>
	</body>
</html>
