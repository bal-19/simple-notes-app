<?php
    include "koneksi.php";
    $koneksi = koneksi();

    function readAllNotes() {
        global $koneksi;
        $data = array();
        $sql = "SELECT * FROM notes";
        $hasil = mysqli_query($koneksi, $sql);
        $i = 0;

        while ($baris = mysqli_fetch_assoc($hasil)) {
            $data [$i]['id'] = $baris['id'];
            $data [$i]['name'] = $baris['name'];
            $data [$i]['owner'] = $baris['owner'];
            $data [$i]['tags'] = $baris['tags'];
            $data [$i]['description'] = $baris['description'];
            $data [$i]['created_date'] = $baris['created_date'];
            $data [$i]['updated_date'] = $baris['updated_date'];
            $i++;
        }
        mysqli_close($koneksi);
        return $data;
    }

    function deleteNote($id) {
        global $koneksi;
        $sql = "DELETE FROM notes WHERE id = $id";

        $hasil = 0;
        if (mysqli_query($koneksi, $sql)) {
            $hasil = 1;
        }
        mysqli_close($koneksi);
        return $hasil;
    }

    function editNote($id, $name, $tags, $description, $updated_date) {
        global $koneksi;
         $sql = "UPDATE notes SET name='$name', tags='$tags', description='$description', updated_date='$updated_date' WHERE id=$id";
         $hasil = 0;
         if (mysqli_query($koneksi, $sql)) {
             $hasil = 1;
         }
         mysqli_close($koneksi);
         return $hasil;
     }
 
    function addNote($name, $owner, $tags, $description, $created_date) {
        global $koneksi;
        $sql = "INSERT INTO notes VALUES(0, '$name', $owner, '$tags', '$description', '$created_date', '')";
        $hasil = 0;
        if (mysqli_query($koneksi, $sql)) {
            $hasil = 1;
        }
        mysqli_close($koneksi);
        return $hasil;
    }

    function addCollab($noteId, $collabId) {
        global $koneksi;
        $sql = "INSERT INTO collaburation VALUES(0, $noteId, $collabId)";
        $hasil = 0;
        if (mysqli_query($koneksi, $sql)) {
            $hasil = 1;
        }
        mysqli_close($koneksi);
        return $hasil;
    }
    
    function deleteCollab($id) {
        global $koneksi;
        $sql = "DELETE FROM collaburation WHERE id=$id";

        $hasil = 0;
        if (mysqli_query($koneksi, $sql)) {
            $hasil = 1;
        }
        mysqli_close($koneksi);
        return $hasil;
    }
?>