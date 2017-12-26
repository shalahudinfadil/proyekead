<?php
require_once('koneksi.php');
if(isset($_POST['login'])) {
  $user = mysqli_real_escape_string($conn,$_POST['user']);
  $pass = mysqli_real_escape_string($conn,$_POST['pass']);

  $validate = "SELECT * FROM akun WHERE user='".$user."'";
  $res = mysqli_query($conn,$validate);
  $numrows = mysqli_num_rows($res);

  if($numrows != 0) {
    while($fetch = mysqli_fetch_assoc($res)){
      $dbuser = $fetch['user'];
      $dbpass = $fetch['pass'];
    }

    if($user === $dbuser && password_verify($pass,$dbpass)) {
      session_start();
      $_SESSION['sess_user'] = $user;
      $_SESSION['sess_time'] = time();
      header("Location: http://localhost/EAD/menu.php");
    } else {
      $login = "Username atau Password Salah!";
    }
  } else {
    $login = "Username Tidak Ditemukan!";
  }
}
 ?>
