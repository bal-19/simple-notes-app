<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Note</title>
</head>

<body>
	<div class="container mt-4">
		<h2>Create Note</h2>
		<br>
		<form action="proses/tambah_note.php" method="post">
			<div class="mb-3">
				<label for="noteTitle" class="form-label">Title</label>
				<input type="text" class="form-control" name="noteTitle" placeholder="Your title" required>
			</div>
			<div class="mb-3">
				<label for="noteTags" class="form-label">Tags</label>
				<input type="text" class="form-control" name="noteTags" placeholder="tag1, tag2, tag3">
			</div>
			<div class="mb-3">
				<label for="noteDescription" class="form-label">Description</label>
				<textarea class="form-control" name="noteDescription" placeholder="Your Description" rows="10" required></textarea>
			</div>
			<button type="submit" class="btn btn-default">
				<span class="text-dark">
					<b>Save Note</b>
				</span>
			</button>
			<a class="btn btn-default" href="index.php">
				<span class="text-danger">
					<b>Discard</b>
				</span>
			</a>
		</form>
	</div>
</body>

</html>