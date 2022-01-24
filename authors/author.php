<?php
	session_start();
	include '/home/runner/realWebsite/general/datas.php';

	$id = $_GET["id"];

	
	if (isset($id) and $id >= 0 and $id < count($authors)) {
		$nickname = $authors[$id]["nickname"];
		$name = $authors[$id]["name"];
		$surname = $authors[$id]["surname"];
		$photo = $authors[$id]["image"];
		$projectS = $authors[$id]["projects"];
		$rating = $authors[$id]["rating"];
		$age = $authors[$id]["age"];
		$projectA = $authors[$id]["projectsA"];

	} else {
		$nickname = "";
		$name = "";
		$surname = "";
		$age = "";
		$rating = 0;
		$projectA = array();
	}
?>

<html>
	<head>
		<link rel="stylesheet" href="/general/style.css">
		<link rel="icon" href="/images/favicon.png">
		<title>Tuga's forum - <?php echo $nickname; ?></title>
	</head>

	<body>
		<center>
			<hT><?php echo $nickname; ?></hT> 
			<?php include '/home/runner/realWebsite/general/autoLogin.php';?>
			<br> <br> <br>

			<table>
				<tr>
					<img src="<?php echo $photo;?>">
				</tr>

				<tr>
					<p>Name: <?php echo $name; ?></p>
					<p>Surname: <?php echo $surname; ?></p>
					<p>Age: <?php echo $age; ?></p>
					<p>Rating: <?php echo $rating;?>/10</p>
				</tr>
			</table>
			
			<br> <br> <br> <br> <br>


			<?php
				if (count($projectA) > 0) {
					echo "<position>Projects:</position>";
				}
			?>

			<table>
			<?php
				for ($i = 0; $i < count($projectA); $i++) {
					echo '
					<tr>
						<td> 
							<img src="'.$projectA[$i]["image"].'" style="width:150px;height:150px;">
							&emsp;&emsp;&emsp;&emsp;
						</td>

						<td> 
							<table>
								<tr><td><h>Title: '.$projectA[$i]["title"].'</h></td></tr>
								<tr><td><h>Description: '.$projectA[$i]["description"].'</h></td></tr>
								<tr><td><h>Rate: '.strval($projectA[$i]["rate"]).'/10</h></td></tr>
							</table>
							
						</td>

						<td>
							&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
							<button id="project'.strval($projectA[$i]["id"]).'" onclick="redirect('.strval($projectA[$i]["id"]).')">Visit project</button>
						</td>
					</tr>
					';
				}
			?>
			</table>			
		</center>

		<script src="/general/scripts.js"></script>

		<h id="rights">Copyright ©2022 All rights reserved | Made by: <a href="https://linktr.ee/tugamer" target="_blank">Tuga</a></h>
	</body>
</html>
