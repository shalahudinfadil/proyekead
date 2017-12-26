<?php
require_once('koneksi.php');
include('materialize.php');
include('header.php');

$id = $_GET['id'];
$penyakit_read = "SELECT * FROM penyakit WHERE id=$id";
$res = mysqli_query($conn,$penyakit_read);
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
            <td><pre><?php echo $r['pengertian']; ?></pre></td>
          </tr>
          <tr>
            <td><pre><?php echo $r['penyebab']; ?></pre></td>
          </tr>
          <tr>
            <td><pre><?php echo $r['gejala']; ?></pre></td>
          </tr>
          <tr>
            <td><pre><?php echo $r['pengobatan']; ?></pre></td>
          </tr>
          <tr>
            <td><pre><?php echo $r['pencegahan']; ?></pre></td>
          </tr>
          <tr>
            <td>Terakhir Diubah : <?php echo $r['timestamp']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
