function update(id) {
	var vote = document.getElementById("rate"+id).value;

	if (vote >= 0 && vote <= 10) {
		window.location.href = ("/general/addRate.php?id=" + id + "&vote=" + vote);
	} else {
		console.log("Vote out of range!");
	}
}

function redirect(id) {
	window.location.href=("/projects/project.php?id=" + id);
}
