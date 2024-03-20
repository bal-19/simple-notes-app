<?php
include "../crud/user.php";

$username = $_POST['username'];
$password = $_POST['password'];
$konfirmasi = $_POST['confirm_password'];
if ($password == $konfirmasi) {
  register($username, $password);
  echo "<script type='text/javascript'>
                alert('Successfully registered');
                window.location='../login.php';
            </script>";
} else {
  header("Location: ../register.php?error1");
}
?>