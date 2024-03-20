<?php
    session_start();
    include '../crud/note.php';

    $name = $_POST["noteTitle"];
    $owner = $_SESSION["id"];
    $tags = $_POST["noteTags"];
    $description = $_POST["noteDescription"];
    $created_date= date('Y-m-d');

    $hasil = addNote($name, $owner, $tags, $description, $created_date);
    if($hasil != 0) {
        echo "<script type='text/javascript'>
                alert('successfully added');
                window.location='../index.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('failed to add');
            window.location='../tambah_note.php';  
        </script>";
    }
?>