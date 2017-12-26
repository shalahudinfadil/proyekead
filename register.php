<?php
require_once('koneksi.php');
if(isset($_POST['register'])) {
  $user = mysqli_real_escape_string($conn,$_POST['user']);
  $pass = mysqli_real_escape_string($conn,$_POST['pass']);

  $passencrypted = password_hash($pass,PASSWORD_BCRYPT);

  $insert_user = "INSERT INTO akun (user,pass) VALUES ('$user','$passencrypted')";
  $res = mysqli_query($conn,$insert_user);

  if($res) {
    $register = "Anda Berhasil Mendaftar! Silahkan Login";
    header("Location: menu.php");
  } else{
    $register = "Gagal Mendaftar!";
  }
}
 ?>
 <!--
<html>
<body>
  <form method="post">
  <input type="text" name="user"/>
  <input type="text" name="pass"/>
  <input type="submit" name="register"/>
</form>
</html>
-->
