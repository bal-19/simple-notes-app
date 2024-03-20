<?php

function cariUser($username) {
  require_once "koneksi.php";
  $koneksi = koneksi();
  $sql = "SELECT * FROM user WHERE username='$username'";
  $hasil = mysqli_query($koneksi, $sql);
  $result = $hasil->fetch_assoc();

  if (mysqli_num_rows($hasil) > 0) {
    return $result;

    $baris = mysqli_fetch_assoc($hasil);
    $data['username'] = $baris['username'];
    $data['password'] = $baris['password'];
    mysqli_close($koneksi);
    return $data;
  } else {
    mysqli_close($koneksi);
    return null;
  }
}

function register($username, $password){
  require_once "koneksi.php";
  $koneksi = koneksi();
  $query = "INSERT INTO user VALUES (0, '$username', md5('$password'))";
  $result = mysqli_query($koneksi, $query);
}

function otentikasi($username, $password){
  $dataUser = array();
  $pwmd5 = md5($password);
  $dataUser = cariUser($username);
  if ($dataUser != null) {
    if ($pwmd5 == $dataUser['password']) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}
?>