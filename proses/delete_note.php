<?php
    include '../crud/note.php';
    $noteId = $_GET['note'];
    deleteNote($noteId);
    header("Location: ../index.php");
?>
