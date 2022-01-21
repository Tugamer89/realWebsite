<?php
	$id = $_GET["id"];

	include '/home/runner/realWebsite/general/datas.php';

	if (isset($id) and $id >= 0 and $id < count($projects)) {	
		$title = $projects[$id]["title"];
		$fullDescription = $projects[$id]["fullDescription"];
		$rate = $projects[$id]["rate"];
		$authorId = $projects[$id]["idAuthor"];
		$foto = $projects[$id]["image"];
		$nickname = $authors[$authorId]["nickname"];
		$code = $projects[$id]["code"];

	} else {	
		$title = "Id not found";
		$fullDescription = "I said id not found";
		$name = "Oh yeah, id not found!";
		$rate = 0;
		$code = "";
		$authorId = $id;
		$foto = "";
	}
?>

<html>
	<head>
		<link rel="stylesheet" href="/general/style.css">
		<link rel="icon" href="/general/favicon.png">
		<title>Tuga's forum - <?php echo $title ?></title>
	</head>

	<body>
		<center>
			<hT><?php echo $title; ?></hT>
			<?php echo '<h>by <a href="/authors/author.php?id='.strval($authorId).'">'.$nickname.'</a></h>'; ?>

			<br> <br>

			<p>This project has a rating of <?php echo $rate;?>/10</p>

			<p><?php echo $fullDescription; ?></p>

			<img src="<?php echo $foto; ?>" alt="Image not found">

			<br> <br> <br>

			<?php
				if ($code != "") {
					echo "
						Code: <br>
						<iframe src='".$code."' title='".str_replace('.txt', '', $code)."' width='50%' height='100%'></iframe>
					";
				}
			?>

		</center>

		<div id="rights">Copyright ©2022 All rights reserved | Made by: <a href="https://linktr.ee/tugamer" target="_blank">Tuga</a></div>
	</body>
</html>
