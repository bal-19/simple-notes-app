<?php
include 'header.php';
include 'crud/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Apps</title>
    <style>
        .new-notes-button {
            position: fixed;
            bottom: 20px;
            right: 25px;
        }

        .card-link-zoom {
            transition: transform 0.5s;
        }

        .card-link-zoom:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <?php
    $sql = "SELECT notes.*, collaburation.id AS collabId, collaburation.notesId, collaburation.collaburatorId FROM notes LEFT JOIN collaburation ON collaburation.notesId = notes.id WHERE notes.owner =" . $_SESSION['id'] . " OR collaburation.collaburatorId =" . $_SESSION['id'] . "";
    // print_r($sql);
    // die();
    $cek = mysqli_query(koneksi(), $sql);
    $jml = mysqli_num_rows($cek);
    if ($jml > 0) {
        $result = mysqli_query(koneksi(), $sql);
        $no = 1;
        $hasil = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $id_note = $row['id'];
            $name = $row['name'];
            $owner = $row['owner'];
            $tags = $row['tags'];
            $desc = $row['description'];
            $created = $row['created_date'];
            $updated = $row['updated_date'];
            ?>
            <div class="row">
                <div class="p-2 g-col-6">
                    <a href="tampil_note.php?note=<?php echo $id_note; ?>" class="card card-link-zoom text-decoration-none"
                        style="scale: 0.9; width: 45rem;">
                        <div class="card-body shadow">
                            <h2 class="card-title">
                                <?php echo $name ?>
                            </h2>
                            <span class="card-subtitle mb-2 text-body-secondary">Created At
                                <?php echo $created ?>
                            </span>
                            <br>
                            <span class="card-subtitle mb-2 text-body-secondary">Updated At
                                <?php echo $updated ?>
                            </span>
                            <br>
                            <br>
                            <p class="card-text">
                                <?php echo $desc ?>
                            </p>
                            <br>
                            <?php
                            if ($tags != null) {
                                $newTags = explode(", ", $tags);
                                foreach ($newTags as $data) {
                                    ?>

                                    <span class="badge text-bg-secondary">
                                        <?php echo "#" . $data; ?>
                                    </span>

                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </a>
                </div>
            </div>

            <?php
        }
    } else {
        ?>

        <div class="d-flex justify-content-center mt-5">
            <b>You don't have a note yet</b>
        </div>

        <?php
    }
    ?>
    <div class="new-notes-button">
        <a href="tambah_note.php" class="btn btn-dark btn-lg">
            <i class="bi bi-plus-lg"></i> Add Note
        </a>
    </div>
</body>

</html>