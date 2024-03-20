<?php
  session_start();
  include "../crud/user.php";

  $username = $_POST['username'];
  $password = $_POST['password'];
  

  if (otentikasi($username, $password)) {
    $_SESSION['username'] = $username;
    $dataUser = array();
    $dataUser = cariUser($username);
    $_SESSION['id'] = $dataUser['id'];
    echo "<script type='text/javascript'>
            alert('Successful login');
            window.location='../index.php';
        </script>";
  } else {
    header("Location: ../login.php?error");
  }
?>