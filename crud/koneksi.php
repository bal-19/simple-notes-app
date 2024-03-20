<?php
function koneksi() {
    $koneksi = mysqli_connect("localhost", "root", "", "dbnote");

    if(!$koneksi) {
        die("Koneksi Gagal : ". mysqli_connect_error());
    }
    return $koneksi;
}
?>