<?php session_start(); include '/home/runner/realWebsite/general/datas.php'; ?>

<html>
	<head>
		<link rel="stylesheet" href="/general/style.css">
		<link rel="icon" href="/images/favicon.png">
		<title>Tuga's forum - Authors</title>
	</head>

	<body>
		<center>
			<hT>Authors</hT>
			<?php include '/home/runner/realWebsite/general/autoLogin.php';?>
			<br> <br> <br>

			<table>
				<?php
					for ($i = 0; $i < count($authors); $i++) {
						echo "
						<tr>
							<td>
								<img src='".$authors[$i]["image"]."' style='width:150px;height:150px;'>
								&emsp;&emsp;&emsp;&emsp;
							</td>

							<td>
								<a href='/authors/author.php?id=".strval($authors[$i]["id"])."'>".$authors[$i]["nickname"]."</a><br>
							</td>
						</tr>
						";
					}
				?>
			</table>
		</center>

		<h id="rights">Copyright ©2022 All rights reserved | Made by: <a href="https://linktr.ee/tugamer" target="_blank">Tuga</a></h>
	</body>
</html>
