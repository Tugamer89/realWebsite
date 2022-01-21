<?php
	include '/home/runner/realWebsite/general/datas.php';

	array_multisort(array_column($projects, "rate"), SORT_DESC, $projects);
?>

<html>
	<head>
		<link rel="stylesheet" href="/general/style.css">
		<link rel="icon" href="/general/favicon.png">
		<title>Tuga's forum - Scoreboard</title>
	</head>

	<body>
		<center>
			<hT>Scoreboard</hT> <br> <br> <br>

			<table>
				<?php
					for ($i = 0; $i < count($projects); $i++) {
						echo '
						<tr>
							<td>
								<position>'.strval($i+1).'</position>
								&emsp;&emsp;
							</td>

							<td> 
								<img src="'.$projects[$i]["image"].'" style="width:150px;height:150px;">
								&emsp;&emsp;&emsp;&emsp;
							</td>

							<td> 
								<table>
									<tr><td><h>Title: '.$projects[$i]["title"].'</h></td></tr>
									<tr><td><h>Description: '.$projects[$i]["description"].'</h></td></tr>
									<tr><td><h>Author: <a href="/authors/author.php?id='.strval($projects[$i]["idAuthor"]).'">'.$projects[$i][2].'</a></h></td></tr>
									<tr><td><h>Rate: '.strval($projects[$i]["rate"]).'/10</h></td></tr>
								</table>
							</td>

							<td>
								&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
								<button id="project'.strval($projects[$i]["id"]).'" onclick="redirect('.strval($projects[$i]["id"]).')">Visit project</button>
							</td>
						</tr>
						';
					}
				?>
			</table>
		</center>

		<script>
			function redirect(id) {
				window.location.href=("/projects/project.php?id=" + id);
			}
		</script>

		<h id="rights">Copyright ©2022 All rights reserved | Made by: <a href="https://linktr.ee/tugamer" target="_blank">Tuga</a></h>
	</body>
</html>
