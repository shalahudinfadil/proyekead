<?php
require_once('koneksi.php');
include('materialize.php');
include('header.php');

if(isset($_POST['submit'])) {
  $nama = mysqli_real_escape_string($conn,$_POST['nama']);
  $pengertian = mysqli_real_escape_string($conn,nl2br($_POST['pengertian']));
  $penyebab = mysqli_real_escape_string($conn,nl2br($_POST['penyebab']));
  $gejala = mysqli_real_escape_string($conn,nl2br($_POST['gejala']));
  $pengobatan = mysqli_real_escape_string($conn,nl2br($_POST['pengobatan']));
  $pencegahan = mysqli_real_escape_string($conn,nl2br($_POST['pencegahan']));
  $gambar = $_FILES['gambar']['name'];

  $penyakit_create = "INSERT INTO penyakit (nama,pengertian,penyebab,gejala,pengobatan,pencegahan,gambar)
                      VALUES ('$nama','$pengertian','$penyebab','$gejala','$pengobatan','$pencegahan','$gambar')";
  $res = mysqli_query($conn,$penyakit_create);
  if($res) {
    move_uploaded_file($_FILES['gambar']['tmp_name'], "content-image/".$_FILES['gambar']['name']);
    $created = true;
  } else {
    $created = false;
  }
}
?>

<html>
<head>
  <title>TAMBAH PENYAKIT</title>
</head>
<body>
  <div class="container" style="padding-left: 100px; padding-top: 50px;">
    <?php
		if (isset($created)) {
			if($created==true) {
				echo "<script type='text/javascript'>alert('Pesan Terkirim!')</script>";
			} else {
				echo "<script type='text/javascript'>alert('Pesan Gagal Terkirim!')</script>";
			}
		}
		?>
    <div>
      <h2>TAMBAH PENYAKIT</h2>
      <form method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="input-field col s6">
            <input id="nama" type="text" name="nama">
            <label for="nama">Nama Penyakit</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8">
            <textarea  id="pengertian" class="materialize-textarea" name="pengertian"></textarea>
            <label for="pengertian">Pengertian Penyakit</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8">
            <textarea id="penyebab" class="materialize-textarea" name="penyebab" rows="10"></textarea>
            <label for="penyebab">Penyebab Penyakit</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8">
            <textarea id="gejala" class="materialize-textarea" name="gejala"></textarea>
            <label for="gejala">Gejala Penyakit</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8">
            <textarea id="pengobatan" class="materialize-textarea" name="pengobatan"></textarea>
            <label for="pengobatan">Pengobatan Penyakit</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8">
            <textarea id="pencegahan" class="materialize-textarea" name="pencegahan"></textarea>
            <label for="pencegahan">Pencegahan Penyakit</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <p> Unggah Gambar (max. 1 MB) </p> <input type="file" name="gambar" id="gambar">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <button class="waves-effect waves-light btn" type="submit" name="submit">Tambah</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
