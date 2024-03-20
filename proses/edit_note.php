<?php
    include '../crud/note.php';

    $idNote = $_POST['noteId'];
    $name = $_POST['noteTitle'];
    $tags = $_POST['noteTags'];
    $desc = $_POST['noteDescription'];
    $updated = date('Y-m-d');
    $search = $_POST['searchInput'];
    if (array_key_exists('submit', $_POST)) {
        $hasil = editNote($idNote, $name, $tags, $desc, $updated);
        if($hasil != 0) {
            echo "<script type='text/javascript'>
                alert('Successfully edited');
                window.location='../tampil_note.php?note=$idNote';
            </script>";
            } else {
            echo "<script type='text/javascript'>
                alert('Failed to edit');
                window.location='../edit_note.php';  
            </script>";
        }
    }

    if (array_key_exists('search', $_POST)) {
        $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE id=$search");
        $row = mysqli_fetch_assoc($result);
        $idUser = $row['id'];
        $username = $row['username'];
        $pass = $row['password'];
        $hasil = addCollab($idNote, $idUser);
        if($hasil != 0) {
        echo "<script type='text/javascript'>
            alert('Successfully add');
            window.location='../edit_note.php?note=$idNote';
        </script>";
        }
    }
?>