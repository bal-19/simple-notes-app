<?php
    include 'header.php';
    include 'crud/koneksi.php';

    $noteId = mysqli_real_escape_string(koneksi(), $_GET['note']);
    $result = mysqli_query(koneksi(), "SELECT * FROM notes WHERE id=$noteId");
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $name = $row['name'];
    $owner = $row['owner'];
    $tags = $row['tags'];
    $desc = $row['description'];
    $created = $row['created_date'];
    $updated = $row['updated_date'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
</head>
<body>
    <div class="container mt-4">
		<h2>Edit Note</h2>
        <br>
		<form action="proses/edit_note.php" method="post">
            <input type="hidden" name="noteId" value="<?php echo $id ?>">
			<div class="mb-3">
				<label for="noteTitle" class="form-label">Title</label>
				<input type="text" class="form-control" name="noteTitle" value="<?php echo $name; ?>" required>
			</div>
			<div class="mb-3">
				<label for="noteTags" class="form-label">Tags</label>
				<input type="text" class="form-control" name="noteTags" value="<?php echo $tags; ?>">
			</div>
			<div class="mb-3">
				<label for="noteDescription" class="form-label">Description</label>
				<textarea class="form-control" name="noteDescription" rows="10" required><?php echo $desc; ?></textarea>
			</div>
            <div class="p-3 bg-secondary bg-opacity-10 border border-light rounded">
                <h5>Collaboration</h5>
                User Id
                <br>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="searchInput" placeholder="Search User by Id" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <button type="submit" class="input-group-text" name="search">Add</button>
                </div>
            </div>
            <br>
			<button type="submit" class="btn btn-default" name="submit">
				<span class="text-dark">
                    <b>Save Note</b>
                </span>
			</button>
            <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#yesNoModal">
                <span class="text-danger">
                    <b>Delete Note</b>
                </span>
            </button>
		</form>
        <br>
	</div>



     <div class="modal fade" id="yesNoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this notes?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" onclick="proceed()">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function proceed() {
            window.location.href = "proses/delete_note.php?note=<?php echo $id ?>";
        }
    </script>
</body>
</html>