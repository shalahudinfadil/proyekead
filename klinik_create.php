<?php
require_once('koneksi.php');
include('materialize.php');
include('header.php');

if(isset($_POST['submit'])) {
  $nama = mysqli_real_escape_string($conn,$_POST['nama']);
  $alamat = mysqli_real_escape_string($conn,nl2br($_POST['alamat']));
  $telfon = mysqli_real_escape_string($conn,$_POST['telfon']);
  $gambar = $_FILES['gambar']['name'];

  $klinik_create = "INSERT INTO klinik (nama,alamat,telfon,gambar)
                      VALUES ('$nama','$alamat','$telfon','$gambar')";
  $res = mysqli_query($conn,$klinik_create);
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
  <title>TAMBAH klinik</title>
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
      <h2>TAMBAH ENTRI</h2>
      <form method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="input-field col s6">
            <input id="nama" type="text" name="nama">
            <label for="nama">Nama RS/Klinik</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="telfon" type="text" name="telfon" placeholder="0215555555" data-length="12">
            <label for="telfon">Nomor Telfon</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8">
            <textarea id="alamat" class="materialize-textarea" name="alamat"></textarea>
            <label for="alamat">Alamat RS/Klinik</label>
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
            <button class="waves-effect waves-light green btn" type="reset">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
