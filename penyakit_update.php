<?php
require_once('koneksi.php');
include('materialize.php');
include('header.php');
$id = $_GET['id'];
$penyakit_read = "SELECT * FROM penyakit WHERE id=$id";
$res = mysqli_query($conn,$penyakit_read);
$r = mysqli_fetch_assoc($res);

if(isset($_POST['submit'])) {
  $nama = mysqli_real_escape_string($conn,$_POST['nama']);
  $pengertian = mysqli_real_escape_string($conn,nl2br($_POST['pengertian']));
  $penyebab = mysqli_real_escape_string($conn,nl2br($_POST['penyebab']));
  $gejala = mysqli_real_escape_string($conn,nl2br($_POST['gejala']));
  $pengobatan = mysqli_real_escape_string($conn,nl2br($_POST['pengobatan']));
  $pencegahan = mysqli_real_escape_string($conn,nl2br($_POST['pencegahan']));
  $gambar = $_FILES['gambar']['name'];

  $penyakit_update = "UPDATE penyakit SET nama='$nama', pengertian='$pengertian', penyebab='$penyebab', gejala='$gejala', pengobatan='$pengobatan', pencegahan='$pencegahan', gambar='$gambar'
                      WHERE id=$id";
  $res = mysqli_query($conn,$penyakit_update);
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
  <title>EDIT PENYAKIT</title>
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
      <h2>EDIT PENYAKIT</h2>
      <form method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="input-field col s6">
            <input id="nama" type="text" name="nama" value="<?php echo $r['nama']; ?>">
            <label for="nama">Nama Penyakit</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8">
            <textarea  id="pengertian" class="materialize-textarea" name="pengertian"><?php echo $r['pengertian']; ?></textarea>
            <label for="pengertian">Pengertian Penyakit</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8">
            <textarea id="penyebab" class="materialize-textarea" name="penyebab"><?php echo $r['penyebab']; ?></textarea>
            <label for="penyebab">Penyebab Penyakit</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8">
            <textarea id="gejala" class="materialize-textarea" name="gejala"><?php echo $r['gejala']; ?></textarea>
            <label for="gejala">Gejala Penyakit</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8">
            <textarea id="pengobatan" class="materialize-textarea" name="pengobatan"><?php echo $r['pengobatan']; ?></textarea>
            <label for="pengobatan">Pengobatan Penyakit</label>
          </div>
        </div>
        <div class="row>"
          <div class="input-field col s8">
            <textarea id="pencegahan" class="materialize-textarea" name="pencegahan"><?php echo $r['pencegahan']; ?></textarea>
            <label for="pencegahan">Pencegahan Penyakit</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <p> Unggah Gambar (max. 1 MB) <br> *unggah gambar lagi jika tidak ingin mengubah gambar</p> <input type="file" name="gambar" id="gambar" value="<?php echo $r['gambar']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <button class="waves-effect waves-light btn" type="submit" name="submit">Edit</button>
            <button class="waves-effect waves-light green btn" type="reset">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
