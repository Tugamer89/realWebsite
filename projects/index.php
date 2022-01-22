<?php include '/home/runner/realWebsite/general/datas.php'; ?>

<html>
	<head>
		<link rel="stylesheet" href="/general/style.css">
		<link rel="icon" href="/general/favicon.png">
		<title>Tuga's forum - Projects</title>
	</head>

	<body>
		<center><hT>Projects</hT></center>
    	<br> <br>
		
		<table>
			<?php
				for ($i = 0; $i < count($projects); $i++) {
					echo '
					<tr>
						<td> 
							<img src="'.$projects[$i]["image"].'" style="width:150px;height:150px;">
							&emsp;&emsp;&emsp;&emsp;
						</td>

						<td> 
							<table>
								<tr><td><h>Title: '.$projects[$i]["title"].'</h></td></tr>
								<tr><td><h>Description: '.$projects[$i]["description"].'</h></td></tr>
								<tr><td><h>Author: <a href="/authors/author.php?id='.strval($projects[$i]["idAuthor"]).'">'.$authors[$projects[$i]["idAuthor"]]["nickname"].'</a></h></td></tr>
								<tr><td><h>Rate: '.strval($projects[$i]["rate"]).'</h></td></tr>
							</table>
						</td>
						
						<td> 
							&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
							<h>Rate this project: </h> 
							<input type="number" id="rate'.strval($projects[$i]["id"]).'" min="0" max="10"> 
							<button id="rateButton'.strval($projects[$i]["id"]).'" onclick="update('.strval($projects[$i]["id"]).')">Send vote</button>
							&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						</td>

						<td><button id="project'.strval($projects[$i]["id"]).'" onclick="redirect('.strval($projects[$i]["id"]).')">Visit project</button></td>
					</tr>
					';
				}
			?>
		</table>

		<script>
			function redirect(id) {
				window.location.href = ("/projects/project.php?id=" + id);
			}

			function update(id) {
				var vote = document.getElementById("rate"+id).value;

				window.location.href = ("/general/addRate.php?id=" + id + "&vote=" + vote);
			}
		</script>

		<h id="rights">Copyright ©2022 All rights reserved | Made by: <a href="https://linktr.ee/tugamer" target="_blank">Tuga</a></h>
	</body>
</html>
