<?php
require_once('koneksi.php');
include('materialize.php');
include('header.php');

if(isset($_POST['submit'])) {
  $nama = mysqli_real_escape_string($conn,$_POST['nama']);
  $jenis = mysqli_real_escape_string($conn,$_POST['jenis']);
  $manfaat = mysqli_real_escape_string($conn,nl2br($_POST['manfaat']));
  $peringatan = mysqli_real_escape_string($conn,nl2br($_POST['peringatan']));
  $gambar = $_FILES['gambar']['name'];

  $obat_create = "INSERT INTO obat (nama,jenis,manfaat,peringatan,gambar)
                      VALUES ('$nama','$jenis','$manfaat','$peringatan','$gambar')";
  $res = mysqli_query($conn,$obat_create);
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
  <title>TAMBAH OBAT</title>
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
      <h2>TAMBAH OBAT</h2>
      <form method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="input-field col s6">
            <input id="nama" type="text" name="nama">
            <label for="nama">Nama obat</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <select name="jenis">
              <option value="" disabled selected> Jenis Obat</option>
              <option value="Bebas">Bebas</option>
              <option value="Resep">Resep</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8">
            <textarea id="penyebab" class="materialize-textarea" name="manfaat"></textarea>
            <label for="penyebab">Manfaat Obat</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8">
            <textarea id="gejala" class="materialize-textarea" name="peringatan"></textarea>
            <label for="gejala">Peringatan Obat</label>
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
  <script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });
  </script>
</body>
</html>
