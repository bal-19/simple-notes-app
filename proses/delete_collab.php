<?php
    include '../crud/note.php';
    $noteId = $_GET['note'];
    $id = $_GET['id'];
    deleteCollab($id);
    header("Location: ../tampil_note.php?note=$noteId");
?>