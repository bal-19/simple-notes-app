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
    <title>Notes View</title>
    <style>
        .edit-notes-button {
            position: fixed;
            bottom: 20px;
            right: 25px;
        }

        .collaboration-list {
            position: fixed;
            bottom: 20px;
            left: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-start text-body-secondary" style="margin-bottom: -55px;">
                <a class="btn btn-default" href="index.php">
                    <span class="text-dark">
                        <b>Go Back</b>
                    </span>
                </a>
            </div>
            <div class="text-end text-body-secondary">
                Created At <?php echo $created; ?> 
                <br> 
                Updated At <?php echo $updated; ?>
            </div>
            <div class="card">
            <div class="card-body shadow" style="padding-bottom: 47vh;">
                <h1 class="card-title"><?php echo $name; ?></h1>

                <?php
                    if ($tags != null) {
                    $newTags = explode(", ", $tags);
                    foreach($newTags as $data) {
                ?>

                <span class="badge text-bg-secondary"><?php echo "#".$data; ?></span>

                <?php 
                        }
                    }
                ?> 
                <div class="card-text fs-6 fw-semibold text-body-secondary" style="text-transform: capitalize;">Owned by <?php 
                     $hasil = mysqli_query(koneksi(), "SELECT * FROM user WHERE id=$owner");
                     $baris = mysqli_fetch_assoc($hasil);
                     echo $baris['username']; 
                ?>
                </div>
                <br>
                <p class="card-text"><?php echo $desc; ?></p>
            </div>
            </div>
        </div>
        </div>
    </div>

    <?php
        if ($owner == $_SESSION['id']) {
    ?>

    <div class="card collaboration-list" style="width: 250px;">
    <div class="card-header">
        <h5 class="card-title">Collaboration List</h5>
    </div>
    <ul class="list-group list-group-flush">

    <?php
        $resul = mysqli_query(koneksi(), "SELECT * FROM collaburation WHERE notesId=$noteId");
        while($ro = mysqli_fetch_assoc($resul)){
            $hasi = mysqli_query(koneksi(), "SELECT * FROM user WHERE id=".$ro['collaburatorId']."");
            $bari = mysqli_fetch_assoc($hasi);
    ?>

        <li class="list-group-item ">
            <div style="text-transform: capitalize; margin-bottom: -27px;">
                <?php
                echo $bari['username'];
                ?>
            </div>
            <div class="text-end">
                <a href="proses/delete_collab.php?note=<?php echo $id; ?>&id=<?php echo $ro['id']; ?>" class="btn btn-danger btn-sm end">Kick</a>
            </div>
        </li>

    <?php
        }
    ?>
    
      </ul>
    </div>

    <?php
        } 
    ?>

    <div class="edit-notes-button">
        <a href="edit_note.php?note=<?php echo $noteId; ?>" class="btn btn-dark btn-lg">
            <i class="bi bi-pencil-square"></i> Edit Note
        </a>
    </div>
</body>
</html>