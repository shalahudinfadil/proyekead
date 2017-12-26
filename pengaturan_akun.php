<?php
require_once('koneksi.php');
include('materialize.php');
include('header.php');

if(isset($_SESSION['sess_user'])) {
  $user=mysqli_real_escape_string($conn,$_SESSION['sess_user']);
  $user_read = "SELECT * FROM akun WHERE user='$user'";
  $res = mysqli_query($conn,$user_read);
  $r = mysqli_fetch_assoc($res);
  if(isset($_POST['submit_user'])) {
    $_SESSION['sess_user']=$_POST['user_new'];
    $user_new = mysqli_real_escape_string($conn,$_POST['user_new']);
    $user_update = "UPDATE akun SET user='$user_new' WHERE user='$user";

    if($res = mysqli_query($conn,$user_update)) {
      $username = true;
    } else {
      $username = false;
    }
  }

  if(isset($_POST['submit_pass'])) {
    $passlama = mysqli_real_escape_string($conn,$_POST['passlama']);
    $passbaru = mysqli_real_escape_string($conn,$_POST['passbaru']);
    $dbpass = $r['pass'];
    if(password_verify($passlama,$dbpass)) {
      $passencrypted = password_hash($passbaru,PASSWORD_BCRYPT);
      $pass_update = "UPDATE akun SET pass='$passencrypted' WHERE user='$user'";

      if($res = mysqli_query($conn,$pass_update)) {
        $password = true;
      } else {
        $password = false;
      }
    }
  }
}
 ?>
<html>
<head>
  <title>PENGATURAN AKUN</title>
</head>
<body>
  <div class="container" style="padding-left: 100px;" >
    <div>
      <h4>PENGATURAN AKUN</h4>
      <form method="POST">
        <div class="row">
          <span>Ganti Nama Pengguna</span>
          <br>
          <div class="input-field col s6">
            <input id="user_new" type="text" name="user_new">
            <label for="user_new">Nama Pengguna</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <button class="waves-effect waves-light btn" type="submit" name="submit_user">UBAH</button>
            <button class="waves-effect waves-light green btn" type="reset">Reset</button>
          </div>
        </div>
        <div class="divider col s6"></div>
        <div class="row">
          <span>Ganti Password</span>
          <br>
          <div class="input-field col s6">
            <input id="passlama" type="password" name="passlama">
            <label for="passlama">Password Lama</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="passbaru" type="password" name="passbaru">
            <label for="passbaru">Password Baru</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <button class="waves-effect waves-light btn" type="submit" name="submit_pass">UBAH</button>
            <button class="waves-effect waves-light green btn" type="reset">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
