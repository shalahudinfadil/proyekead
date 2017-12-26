<?php
require_once('koneksi.php');
include('materialize.php');
include('header.php');

$id = $_GET['id'];
$klinik_read = "SELECT * FROM klinik WHERE id=$id";
$res = mysqli_query($conn,$klinik_read);
$r = mysqli_fetch_assoc($res);
?>

<html>
<head>
  <title><?php echo $r['nama']; ?></title>
</head>
<body>
  <div class="container" style="padding-left: 100px;">
    <div class="row col s2 offset-s10">
      <table>
        <tbody>
          <tr>
            <td><h5><?php echo $r['nama']; ?></h5></td>
          </tr>
          <tr>
            <td><?php echo "<img src='content-image/".$r['gambar']."'/>"; ?></td>
          </tr>
          <tr>
            <td><?php echo $r['telfon']; ?></td>
          </tr>
          <tr>
            <td><pre><?php echo $r['alamat']; ?></pre></td>
          </tr>
          <tr>
            <td>Terakhir Diubah : <?php echo $r['timestamp']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
