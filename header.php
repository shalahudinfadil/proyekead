<?php
include('materialize.php');
session_start();
if(isset($_POST['login'])) {
if(isset($_SESSION['sess_user'])) {
  $_SESSION['sess_time']= time();
  include('session_timer.php');
}
}
?>

<html>
<head>
  <style>
    nav.nav-center ul {
      text-align: left;
  }
  nav.nav-center ul li {
      display: inline;
      float: none;
  }
  nav.nav-center ul li a {
      display: inline-block;
  }
  </style>
</head>
<body>
      <ul id="slide-out" class="side-nav fixed">
    <li><div class="user-view">
      <?php
      if(isset($_SESSION['sess_user'])) {
        ?>
      <div class="background">
        <img src="web-image/sidebar.jpg">
      </div>
      <!-- gambar user ini, ntar aja
      <a href="#!user"><img class="circle" src="images/yuna.jpg"></a>-->
      <a href="http://localhost/EAD/pengaturan_akun.php"><span class="white-text name"><?=$_SESSION['sess_user']; ?></span></a>
      <a href="http://localhost/EAD/logout.php"><span class="white-text name">LOGOUT</span></a>
      <!-- email user, buat ntar
      <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a> -->
    <?php } else {
      ?>
      <div class="background">
        <img src="web-image/sidebar.jpg">
      </div>
      <div style="display: inline-block; vertical-align: middle;">
      <form method="post" action="http://localhost/EAD/login.php">
        <input type="text" name="user" placeholder="Username"/>
        <input type="password" name="pass" placeholder="Password"/>
        <button class="waves-effect waves-light btn" type="submit" name="login">Login</button>
        <button class="waves-effect waves-light blue btn"  type="submit" name="register" formaction="http://localhost/EAD/register.php">Daftar</button>
      </form>
    </div>
    <?php } ?>

    </div></li>
    <li><a class="waves-effect" href="http://localhost/EAD/menu.php"><i class="material-icons">home</i>Beranda</a></li>
    <li><a class="waves-effect" href="http://localhost/EAD/penyakit.php"><i class="material-icons">info</i>Penyakit A-Z</a></li>
    <li><a class="waves-effect" href="http://localhost/EAD/obat.php"><i class="material-icons">healing</i>Obat A-Z</a></li>
    <li><a class="waves-effect" href="http://localhost/EAD/klinik.php"><i class="material-icons">local_hospital</i>RS/Klinik</a></li>

  </ul>
  <?php
  if (isset($created)) {
    if($created==true) {
      echo "<script type='text/javascript'>alert('Pesan Terkirim!')</script>";
    } else {
      echo "<script type='text/javascript'>alert('Pesan Gagal Terkirim!')</script>";
    }
  }
  ?>
</body>
